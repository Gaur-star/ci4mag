<?= $this->extend('App\Views\theme\layouts\structure') ?>

<?= $this->section('title') ?>
<title><?=($category_name) ?> | <?=($site_title->setting_value) ?> </title>
<meta name='robots' content='max-image-preview:large' />

<!-- All In One SEO Pack 3.7.1[4877,4912] -->
<meta name="keywords"  content="<?= $category_key ?>" />
<script type="application/ld+json" class="aioseop-schema">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"<?= base_url('/') ?>/#organization","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>","sameAs":[],"logo":{"@type":"ImageObject","@id":"<?= base_url('/') ?>/#logo","url":"<?= base_url('/').'/'.$site_logo->setting_value ?>","caption":""},"image":{"@id":"<?= base_url('/') ?>/#logo"}},{"@type":"WebSite","@id":"<?= base_url('/') ?>/#website","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>","publisher":{"@id":"<?= base_url('/') ?>/#organization"}},{"@type":"CollectionPage","@id":"<?= base_url('category').'/'.$cat_url ?>/#collectionpage","url":"<?= base_url('category').'/'.$cat_url ?>","inLanguage":"en-US","name":"<?= $category_name ?>","isPartOf":{"@id":"<?= base_url('/') ?>/#website"},"breadcrumb":{"@id":"<?= base_url('category').'/'.$cat_url ?>/#breadcrumblist"}},{"@type":"BreadcrumbList","@id":"<?= base_url('category').'/'.$cat_url ?>/#breadcrumblist","itemListElement":[{"@type":"ListItem","position":1,"item":{"@type":"WebPage","@id":"<?= base_url('/') ?>","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>"}},{"@type":"ListItem","position":2,"item":{"@type":"WebPage","@id":"<?= base_url('category').'/'.$cat_url ?>","url":"<?= base_url('category').'/'.$cat_url ?>","name":"<?= $category_name ?>"}}]}]}</script>
<link rel="canonical" href="<?= base_url('category').'/'.$cat_url ?>" />
<!-- All In One SEO Pack -->
<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<script type="text/javascript">
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/yorkpedia.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.1"}};
/*! This file is auto-generated */
!function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode,e=(p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0),i.toDataURL());return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(p&&p.fillText)switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([129777,127995,8205,129778,127999],[129777,127995,8203,129778,127999])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(e=t.source||{}).concatemoji?c(e.concatemoji):e.wpemoji&&e.twemoji&&(c(e.twemoji),c(e.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
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
            <div class="col-sm-12 col-md-8">
                <div class="section_title custom_mt"><?= $category_name ?></div>
                <?php foreach($category_post as $val): ?>
                    <div class="business_item">
                        <a href="<?= permalink($val['date_'],$linkformat).'/'.$val['seo_url'] ?>" class="business_img">
                            <img src="<?= featured_image($val['url'],html_entity_decode($val['content'])) ?>" alt="<?=($val['alt_text']) ?>">
                        </a>
                        <div class="business_content">
                            <ul class="post-meta">
                                <li><a href="<?= base_url('category').'/'.pc_slug($val['catid']) ?>"><?=($val['categorie']) ?></a></li>
                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= date_for($val['date_']) ?></span> </li>
                            </ul>
                            <a href="<?= permalink($val['date_'],$linkformat).'/'.$val['seo_url'] ?>" class="business_title"><?=($val['title']) ?></a>
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
                            <a href="<?= base_url('category') ?>/<?= strtolower($category_name) ?>?page=1" class="btn btn-sm btn-outline-primary"> << </a>
                            <a href="<?= base_url('category') ?>/<?= strtolower($category_name) ?>?page=<?= ($_GET['page'] ?? 1) -1 ?>" class="btn btn-sm btn-outline-primary <?php if( ($_GET['page'] ?? 1) == 1): ?>disabled<?php endif ?>"> < </a>
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
                                <a href="<?= base_url('category') ?>/<?= strtolower($category_name) ?>?page=<?= $i ?>" class="btn btn-sm btn-outline-primary <?php if( ($_GET['page'] ?? 1) == $i): ?>active<?php endif ?>"><?= $i ?></a>
                            <?php endfor ?>
                            <a href="<?= base_url('category') ?>/<?= strtolower($category_name) ?>?page=<?= ($_GET['page'] ?? 1) +1 ?>" class="btn btn-sm btn-outline-primary <?php if( ($_GET['page'] ?? 1) == $pager): ?>disabled<?php endif ?>"> > </a>
                            <a href="<?= base_url('category') ?>/<?= strtolower($category_name) ?>?page=<?= $pager ?>" class="btn btn-sm btn-outline-primary"> >> </a>
                        </div>
                    </div>
                <?php endif ?>
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
