<?= $this->extend('App\Views\theme\layouts\structure') ?>

<?= $this->section('title') ?>
<title><?= $page_title ?> | <?= ($site_title->setting_value) ?> </title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<style>
    a.disabled {
        pointer-events: none;
        cursor: default;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="consumer_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="section_title custom_mt"><?= $page_title ?></div>
                <?php foreach($all_posts as $val): ?>
                    <div class="business_item">
                        <a href="<?= permalink($val['date_'],$linkformat).'/'.$val['seo_url'] ?>" class="business_img">
                            <img src="<?= featured_image($val['url'],html_entity_decode($val['content'])) ?>" alt="<?= ($val['alt_text']) ?>">
                        </a>
                        <div class="business_content">
                            <ul class="post-meta">
                                <li>
                                    <a href="<?= base_url('category').'/'.pc_slug($val['catid']) ?>"><?= ($val['categorie']) ?></a>
                                </li>
                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= date_for($val['date_']) ?></span> </li>
                            </ul>
                            <a href="<?= permalink($val['date_'],$linkformat).'/'.$val['seo_url'] ?>" class="business_title"><?= ($val['title']) ?></a>
                            <span class="business_para"><?= first_para(html_entity_decode($val['content'])) ?></span>
                            <a href="<?= permalink($val['date_'],$linkformat).'/'.$val['seo_url'] ?>" class="btn read_more">read more</a>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php if($pager != "0"): ?>
                    <div class="text-center mt-5">
                        <div class="my-2 w-100">
                            <small>Showing <?= $offset+1 ?> to <?php if(($offset+$per_page) > $total_post){ echo $total_post; }else{ echo $offset+$per_page; } ?> of <b><?= $total_post ?></b> entries</small>
                        </div>
                        <div class="my-2 w-100">
                            <a href="<?= base_url('/') ?>/<?= $udate ?>?page=1" class="btn btn-sm btn-outline-primary"> << </a>
                            <a href="<?= base_url('/') ?>/<?= $udate ?>?page=<?= ($_GET['page'] ?? 1) -1 ?>" class="btn btn-sm btn-outline-primary <?php if( ($_GET['page'] ?? 1) == 1): ?>disabled<?php endif ?>"> < </a>
                            <?php
                            if($pager >= 8){
                                if(($_GET['page'] ?? 1) > 4 && (($_GET['page'] ?? 1) < ($pager - 3))){
                                    $first = $_GET['page'] - 3;
                                    $last = $_GET['page'] + 4;
                                }elseif(($_GET['page'] ?? 1) > ($pager - 3)){
                                    $first = $pager - 7;
                                    $last = $pager;
                                }else{
                                    $first = 1;
                                    $last = 8;
                                }
                            }else{
                                $first = 1;
                                $last = $pager;
                            }
                            ?>
                            <?php for($i = $first; $i <= $last; $i++): ?>
                                <a href="<?= base_url('/') ?>/<?= $udate ?>?page=<?= $i ?>" class="btn btn-sm btn-outline-primary <?php if( ($_GET['page'] ?? 1) == $i): ?>active<?php endif ?>"><?= $i ?></a>
                            <?php endfor ?>
                            <a href="<?= base_url('/') ?>/<?= $udate ?>?page=<?= ($_GET['page'] ?? 1) +1 ?>" class="btn btn-sm btn-outline-primary <?php if( ($_GET['page'] ?? 1) == $pager): ?>disabled<?php endif ?>"> > </a>
                            <a href="<?= base_url('/') ?>/<?= $udate ?>?page=<?= $pager ?>" class="btn btn-sm btn-outline-primary"> >> </a>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            <div class="col-sm-4">
                <?= $this->include('theme/layouts/sidebar') ?>
            </div>
            <!-- =====ads section==== -->
            <div class="ads_sec">
                <div class="container">
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="ads_area"><?= $ads->footer ?></div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- =====ads section==== -->
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>
