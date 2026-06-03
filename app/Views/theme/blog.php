<?= $this->extend('App\Views\theme\layouts\structure') ?>

<?= $this->section('title') ?>
    <title><?= $single_post->title ?> >> <?= $site_title->setting_value ?></title>
    <meta name="title" content="<?= $single_post->title ?>">
    <meta name="meta_tag" content="<?= $single_post->meta_tag ?>">
    <meta name="meta_description" content="<?= $single_post->meta_desc ?>">
    <meta name="keywords" content="<?php foreach($single_post_keywords as $spk){ echo $spk['keyword'].', '; } ?>">
    <meta name="robots" content="<?php if($single_post->indexed == '1'){ echo "index"; }else{ echo "noindex"; } ?>, <?php if($single_post->nofollow == '1'){ echo "nofollow"; }else{ echo "follow"; } ?>">
    
    <!-- All In One SEO Pack 3.7.1[4877,4964] -->
    <script type="application/ld+json" class="aioseop-schema">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"<?= base_url('/') ?>/#organization","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>","sameAs":[],"logo":{"@type":"ImageObject","@id":"<?= base_url('/') ?>/#logo","url":"<?= base_url('/').'/'.$site_logo->setting_value; ?>","caption":""},"image":{"@id":"<?= base_url('/') ?>/#logo"}},{"@type":"WebSite","@id":"<?= base_url('/') ?>/#website","url":"<?= base_url('/') ?>/","name":"<?= $site_title->setting_value ?>","publisher":{"@id":"<?= base_url('/') ?>/#organization"}},{"@type":"WebPage","@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/#webpage","url":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>","inLanguage":"en-US","name":"<?= $single_post->title ?>","isPartOf":{"@id":"<?= base_url('/') ?>/#website"},"breadcrumb":{"@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>"},"description":"<?= $site_description->setting_value ?>","image":{"@type":"ImageObject","@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/#primaryimage","url":"<?= base_url('/').'/'.$site_logo->setting_value ?>","width":780,"height":410},"primaryImageOfPage":{"@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/#primaryimage"},"datePublished":"<?= $single_post->date_time ?>","dateModified":"<?= $single_post->update_date ?>"},{"@type":"Article","@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/#article","isPartOf":{"@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/#webpage"},"author":{"@id":"<?= base_url('/') ?>/author/eva-schmidt/#author"},"headline":"<?= $single_post->title ?>","datePublished":"<?= $single_post->date_time ?>","dateModified":"<?= $single_post->update_date ?>","commentCount":0,"mainEntityOfPage":{"@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/#webpage"},"publisher":{"@id":"<?= base_url('/') ?>/#organization"},"articleSection":"Business, Services, Importance of a Press Release, Importance of Press Releases in Public Relations","image":{"@type":"ImageObject","@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/#primaryimage","url":"https://yorkpedia.s3.us-west-2.amazonaws.com/wp-content/uploads/2023/04/04150100/importance-of-a-press-release.jpg","width":780,"height":410}},{"@type":"Person","@id":"<?= base_url('/') ?>/author/eva-schmidt/#author","name":"Eva Schmidt","sameAs":[],"image":{"@type":"ImageObject","@id":"<?= base_url('/') ?>/#personlogo","url":"https://secure.gravatar.com/avatar/db73c2e1fae42d26e51d793f504ebab5?s=96&d=mm&r=g","width":96,"height":96,"caption":"Eva Schmidt"}},{"@type":"BreadcrumbList","@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/#breadcrumblist","itemListElement":[{"@type":"ListItem","position":1,"item":{"@type":"WebPage","@id":"<?= base_url('/') ?>","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>"}},{"@type":"ListItem","position":2,"item":{"@type":"WebPage","@id":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/","url":"<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>/","name":"<?= $single_post->title ?>"}}]}]}</script>
    <link rel="canonical" href="<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>" />
    <meta property="og:site_name" content="<?= $site_title->setting_value ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?= permalink($single_post->date_,$linkformat).'/'.$single_post->seo_url ?>" />
    <meta property="article:published_time" content="<?= $single_post->date_time ?>" />
    <meta property="article:modified_time" content="<?= $single_post->update_date ?>" />
    <meta property="og:title" content="<?= $single_post->title ?>" />
    <meta property="og:description" content="<?= $site_description->setting_value ?>" />
    <meta property="og:image" content="<?= $single_post->url ?>" />
    <meta property="og:image:secure_url" content="<?= $single_post->url ?>" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:title" content="<?= $single_post->title ?>" />
    <meta name="twitter:description" content="<?= $site_description->setting_value ?>" />
    <meta property="twitter:image" content="<?= $single_post->url ?>" />
    
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
    .single_url_btn {
    display: -webkit-box;
    max-width: 100%;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    text-decoration: none;
    font-size: 14px;
}
.single_url_link {
    background: #6c757d!important;
    padding: 8px;
    margin-top: 20px;
    text-decoration: none;
    color: #fff;
    max-width: 30%;
    display: inline-flex;
    font-size: 14px;
    align-items: center;
}
div#main_content .single_url_link:last-child {
    display: inline-flex;
    justify-content: flex-end;
}
#btitle {
    display: -webkit-box;
    max-width: 100%;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    text-decoration: none;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="consumer_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs clearfix"><span class="breadcrumb">You are here</span>
                    <div id="supernews-breadcrumbs">
                        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
                            <ul class="trail-items" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <meta name="numberOfItems" content="5">
                                <meta name="itemListOrder" content="Ascending">
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"
                                    class="trail-item trail-begin"><a href="<?= base_url('/') ?>" rel="home" itemprop="item"><span
                                            itemprop="name">Home</span></a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="trail-item"><a
                                        href="<?= base_url('/').'/'.date('Y',strtotime($single_post->date_)) ?>" itemprop="item"><span itemprop="name"><?= date('Y',strtotime($single_post->date_)) ?></span></a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="trail-item"><a
                                        href="<?= base_url('/').'/'.date('Y/m',strtotime($single_post->date_)) ?>" itemprop="item"><span itemprop="name"><?= date('F',strtotime($single_post->date_)) ?></span></a>
                                    <meta itemprop="position" content="3">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="trail-item"><a
                                        href="<?= base_url('/').'/'.date('Y/m/d',strtotime($single_post->date_)) ?>" itemprop="item"><span itemprop="name"><?= date('d',strtotime($single_post->date_)) ?></span></a>
                                    <meta itemprop="position" content="4">
                                </li>
                                <li><span itemprop="name" id="btitle"><?= $single_post->title ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row main-row">
            <div class="col-sm-12 col-md-4">
                <?= $this->include('theme/layouts/sidebar') ?>
            </div>
            <div class="col-sm-12 col-md-8 mt-3" id="main_content" style="overflow: hidden;">
                <div class="row">
                    <div class="mt-3 mt-flex">
                        <?php foreach($single_post_category as $pc): ?>
                            <a href="<?= base_url('category').'/'.pc_slug($pc['catid']) ?>" class="text-decoration-none mb-1"><span style="background: var(--primary_color);border-radius:5px;" class="text-light px-2 mx-md-1 mb-1"><?= $pc['categorie'] ?></span></a>
                        <?php endforeach ?>
                    </div>
                    <div class="mt-3">
                        <h1 class="title-font"><?= $single_post->title ?></h1>
                    </div>
                    <div class="mt-3 text-secondary">
                        <span class="px-2 mr-2"><i class="fa-solid fa-calendar-days mr-2"></i> <?= date_for($single_post->date_) ?></span>
                        <?php if($single_post->author != 4): ?>/ Author -<span class="px-2 mx-md-1 mb-1"><?= $single_post->f_name.' '.$single_post->l_name; ?></span><?php endif ?>
                    </div>
                    <div class="mt-3" style="text-align: justify;" id="content">
                        <?php echo preg_replace("/\[[^\]]*\]/", "", html_entity_decode($single_post->content)) ?>
                    </div>
                    <div class="mt-4 justify-content-between d-flex">
                        <?php if($prev_url): ?>
                        <a class="text-left single_url_link" style="background: var(--theme_green)!important;" href="<?= permalink($prev_url->date_,$linkformat).'/'.$prev_url->seo_url ?>">
                            <span><i class="fa-solid fa-caret-left"></i></span><div style="background-color: var(--theme_green)!important;" class="text-light px-2 single_url_btn"> <?= $prev_url->title ?></div>
                        </a>
                        <?php endif ?>
                        <?php if($next_url): ?>
                        <a class="text-right single_url_link" style="background-color: var(--theme_green)!important;" href="<?= permalink($next_url->date_,$linkformat).'/'.$next_url->seo_url ?>">
                            <div style="background-color: var(--theme_green);" class="text-light px-2 single_url_btn"><?= $next_url->title ?> </div><span><i class="fa-solid fa-caret-right"></i></span>
                        </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row container mx-auto px-0">
            <div class="col-12">
                <h3 class="text-success">Related Post</h3>
            </div>
            <?php foreach($related_post as $rp): ?>
                <div class="col-md-6 d-flex my-3">
                    <a href="<?= permalink($rp['date_'],$linkformat).'/'.$rp['seo_url'] ?>" class="post_gallery_img">
                        <img src="<?= featured_image($rp['url'], html_entity_decode($rp['content'])) ?>" alt="<?= ($rp['alt_text']) ?>">
                    </a>
                    <div class="post_gallery_content px-2">
                        <ul class="post-meta">
                            <li>
                                <a href="<?= base_url('category').'/'.pc_slug($rp['catid']) ?>"><?= ($rp['categorie']) ?></a>
                            </li>
                            <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= (date_for($rp['date_'])) ?></span> </li>
                        </ul>
                        <a href="<?= permalink($rp['date_'],$linkformat).'/'.$rp['seo_url'] ?>" class="post_gallery_title"><?= esc($rp['title']) ?></a>
                    </div>
                </div>
            <?php endforeach ?>
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
    <!-- =====More on Yorkpedia==== -->
    <div class="row my-2 mx-2" id="more_post">
        <ul class="list-group">
            <li class="list-group-item" style="padding: 0.2rem 0.6rem!important;background-color:beige"><h5>More on YorkPedia</h5></li>
            <?php foreach($more_post as $mp): ?>
                <li class="list-group-item more-post"><i class="fa-solid fa-link mx-2"></i><a rel="nofollow" href="<?= permalink($mp['date_'],$linkformat).'/'.$mp['seo_url'] ?>"><?= $mp['title'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    var author = "<?php echo $single_post->author; ?>";
    var f_p = $("#content p:first");
    var f_d = $("#content div:first div:first");
    var f_i = $("#content img");
    if(author == 4){
        if(f_p.length > 0){
            $("#more_post").insertAfter("#content p:first");
        }else if(f_d.length > 0){
            $("#more_post").insertAfter("#content div:first div:first");
        }else {
            if(f_i.length > 0){
                $("#more_post").insertAfter("#content img");
            }else{
                $("#more_post").hide();
            }
        }
    }else{
        $("#more_post").hide();
    }
</script>
<?= $this->endSection() ?>
