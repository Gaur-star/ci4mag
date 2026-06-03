<?= $this->extend('App\Views\theme\layouts\structure') ?>

<?= $this->section('title') ?>
    <title><?= $single_page->title ?> | <?= $site_title->setting_value ?></title>
    <meta name="title" content="<?= $single_page->title ?>">
    <meta name="meta_tag" content="<?= $single_page->meta_tag ?>">
    <meta name="meta_description" content="<?= $single_page->meta_desc ?>">
    <meta name="robots" content="max-image-preview:large">
    
    <!-- All In One SEO Pack 3.7.1[4877,4910] -->
<script type="application/ld+json" class="aioseop-schema">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"<?= base_url('/') ?>/#organization","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>","sameAs":[],"logo":{"@type":"ImageObject","@id":"<?= base_url('/') ?>/#logo","url":"<?= base_url('/').'/'.$site_logo->setting_value; ?>","caption":""},"image":{"@id":"<?= base_url('/') ?>/#logo"}},{"@type":"WebSite","@id":"<?= base_url('/') ?>/#website","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>","publisher":{"@id":"<?= base_url('/') ?>/#organization"}},{"@type":"WebPage","@id":"<?= base_url('/').'/'.$single_page->seo_url ?>/#webpage","url":"<?= base_url('/').'/'.$single_page->seo_url ?>","inLanguage":"en-US","name":"<?= $single_page->title ?>","isPartOf":{"@id":"<?= base_url('/') ?>/#website"},"breadcrumb":{"@id":"<?= base_url('/').'/'.$single_page->seo_url ?>/#breadcrumblist"},"datePublished":"<?= $single_page->cur_date ?>","dateModified":"<?= $single_page->cur_date ?>"},{"@type":"BreadcrumbList","@id":"<?= base_url('/').'/'.$single_page->seo_url ?>/#breadcrumblist","itemListElement":[{"@type":"ListItem","position":1,"item":{"@type":"WebPage","@id":"<?= base_url('/') ?>","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>"}},{"@type":"ListItem","position":2,"item":{"@type":"WebPage","@id":"<?= base_url('/').'/'.$single_page->seo_url ?>","url":"<?= base_url('/').'/'.$single_page->seo_url ?>","name":"<?= $single_page->title ?>"}}]}]}</script>
    <link rel="canonical" href="<?= base_url('/').'/'.$single_page->seo_url ?>" />
    <meta property="og:site_name" content="<?= $site_title->setting_value ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?= base_url('/').'/'.$single_page->seo_url ?>" />
    <meta property="article:published_time" content="<?= $single_page->cur_date ?>" />
    <meta property="og:title" content="<?= $single_page->title ?> | <?= $site_title->setting_value ?>" />
    <meta property="og:description" content="<?= $site_description->setting_value ?>" />
    <meta property="og:image" content="https://issuewireassets.s3-us-west-2.amazonaws.com/primg/default/York-Pedia.jpg" />
    <meta property="article:published_time" content="2019-03-11T13:48:14Z" />
    <meta property="og:image:secure_url" content="https://issuewireassets.s3-us-west-2.amazonaws.com/primg/default/York-Pedia.jpg" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?= $single_page->title ?> | <?= $site_title->setting_value ?>" />
    <meta name="twitter:description" content="<?= $site_description->setting_value ?>" />
    <meta name="twitter:image" content="https://issuewireassets.s3-us-west-2.amazonaws.com/primg/default/York-Pedia.jpg" />
<!-- All In One SEO Pack -->
<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<script type="text/javascript">
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/yorkpedia.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.1"}};
/*! This file is auto-generated */
!function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode,e=(p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0),i.toDataURL());return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(p&&p.fillText)switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([129777,127995,8205,129778,127999],[129777,127995,8203,129778,127999])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(e=t.source||{}).concatemoji?c(e.concatemoji):e.wpemoji&&e.twemoji&&(c(e.twemoji),c(e.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="consumer_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 mt-5" id="main_content">
                <div class="row">
                    <div class="mt-3">
                        <h1><?= $single_page->title ?></h1>
                    </div>
                    <div class="mt-3" style="text-align:justify">
                        <?= preg_replace("/\[[^\]]*\]/", "", html_entity_decode($single_page->content)) ?>
                    </div>
                    <?php if($single_page->seo_url == "contact-us"): ?>
                    <div class="mt-3">
                        <?php if(\Config\Services::session()->getFlashdata('success')): ?>
                        <div class="bg-success py-2 mb-3 text-center text-light mx-5">
                            <?= \Config\Services::session()->getFlashdata('success') ?>
                        </div>
                        <?php endif ?>
                        <form action="<?= base_url('contact-request') ?>" class="form-group mx-5" method="POST">
                            <div class="mb-3">
                                <label for="">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control ">
                            </div>
                            <div class="mb-3">
                                <label for="">Your Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control ">
                            </div>
                            <div class="mb-3">
                                <label for="">Subject <span class="text-danger">*</span></label>
                                <input type="text" name="subject" class="form-control ">
                            </div>
                            <div class="mb-3">
                                <label for="">Your Message <span class="text-danger">*</span></label>
                                <textarea name="message" id="" rows="5" class="form-control "></textarea>
                            </div>
                            <div class="mb-3 text-center">
                                <input type="submit" class="btn btn-primary" value="Send">
                            </div>
                        </form>
                    </div>
                    <?php endif ?>
                </div>
                <hr>
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
