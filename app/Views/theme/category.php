<?= $this->extend('App\Views\theme\layouts\structure') ?>

<?= $this->section('title') ?>
<title>Categoty >> <?=($site_title->setting_value) ?></title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="consumer_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 mt-5">
                <?php foreach($header_menu as $cat): ?>
                    <div class="section_title"><?=($cat['categorie']) ?> <a href="<?= base_url('category').'/'.$cat['slug'] ?>" class="btn view_all">view all</a></div>
                    <div class="row mb-5">
                        <div class="col-sm-6">
                            <div class="consume_slider owl-carousel">
                                <?php foreach($category_post[$cat['slug']] as $scat): ?>
                                    <div class="trending_item">
                                        <a href="<?= permalink($scat['date_'],$linkformat).'/'.$scat['seo_url'] ?>" class="trending_item_img">
                                            <img src="<?= featured_image($scat['url'],html_entity_decode($scat['content'])) ?>" alt="<?=($scat['alt_text']) ?>">
                                        </a>
                                        <div class="trending_content">
                                            <ul class="post-meta">
                                                <li><a href="<?= base_url('category').'/'.pc_slug($scat['catid']) ?>"><?=($scat['categorie']) ?></a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= date_for($scat['date_']) ?></span> </li>
                                            </ul>
                                            <a href="<?= permalink($scat['date_'],$linkformat).'/'.$scat['seo_url'] ?>" class="trending_title">
                                                <h3><?=($scat['title']) ?></h3>
                                            </a>
                                            <p><?= first_para(html_entity_decode($scat['content'])) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <ul class="post_gallery_listing">
                                <?php foreach($category_post[$cat['slug']] as $scat): ?>
                                    <li>
                                        <a href="<?= permalink($scat['date_'],$linkformat).'/'.$scat['seo_url'] ?>" class="post_gallery_img">
                                            <img src="<?= featured_image($scat['url'],html_entity_decode($scat['content'])) ?>" alt="<?=($scat['alt_text']) ?>">
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                            <li><a href="<?= base_url('category').'/'.pc_slug($scat['catid']) ?>"><?=($scat['categorie']) ?></a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= date_for($scat['date_']) ?></span> </li>
                                            </ul>
                                            <a href="<?= permalink($scat['date_'],$linkformat).'/'.$scat['seo_url'] ?>" class="post_gallery_title"><?=($scat['title']) ?></a>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-sm-12 col-md-4">
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
