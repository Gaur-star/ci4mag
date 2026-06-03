<?= $this->extend('App\Views\theme\layouts\structure') ?>

<?= $this->section('title') ?>
    <title><?= $site_title->setting_value ?></title>
    <meta name="title" content="<?= $site_title->setting_value ?>">
    <meta name="meta_tag" content="<?= $site_keyword->setting_value ?>">
    <meta name="meta_description" content="<?= $site_description->setting_value ?>">
    <meta name="keywords" content="<?= $site_keyword->setting_value ?>">
    <meta name="robots" content="max-image-preview:large">
    
    <!-- All In One SEO Pack 3.7.1[4877,4893] -->
<script type="application/ld+json" class="aioseop-schema">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"<?= base_url('/') ?>/#organization","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>","sameAs":[],"logo":{"@type":"ImageObject","@id":"<?= base_url('/') ?>/#logo","url":"<?= base_url('/').'/'.$site_logo->setting_value ?>","caption":""},"image":{"@id":"<?= base_url('/') ?>/#logo"}},{"@type":"WebSite","@id":"<?= base_url('/') ?>/#website","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>","publisher":{"@id":"<?= base_url('/') ?>/#organization"}},{"@type":"WebPage","@id":"<?= base_url('/') ?>#webpage","url":"<?= base_url('/') ?>","inLanguage":"en-US","name":"<?= $site_title->setting_value ?>","isPartOf":{"@id":"<?= base_url('/') ?>/#website"},"breadcrumb":{"@id":"<?= base_url('/') ?>#breadcrumblist"},"datePublished":"2019-11-26T06:01:25+05:30","dateModified":"2019-11-26T06:01:25+05:30","about":{"@id":"<?= base_url('/') ?>/#organization"}},{"@type":"BreadcrumbList","@id":"<?= base_url('/') ?>#breadcrumblist","itemListElement":[{"@type":"ListItem","position":1,"item":{"@type":"WebPage","@id":"<?= base_url('/') ?>","url":"<?= base_url('/') ?>","name":"<?= $site_title->setting_value ?>"}}]}]}</script>
    <link rel="canonical" href="<?= base_url('/') ?>" />
    <meta property="og:site_name" content="<?= $site_title->setting_value ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= base_url('/') ?>" />
    <meta property="og:title" content="<?= $site_title->setting_value ?>" />
    <meta property="og:image" content="<?= base_url('/').'/'.$site_logo->setting_value ?>" />
    <meta property="og:image:secure_url" content="<?= base_url('/').'/'.$site_logo->setting_value ?>" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:title" content="<?= $site_title->setting_value ?>" />
    <meta property="twitter:image" content="<?= base_url('/').'/'.$site_logo->setting_value ?>" />
    
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

<!-- =======banner section start=== -->

<main class="main_banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="banner_top_slider owl-carousel">
                    <?php foreach($latest_post as $lp): ?>
                        <div class="banner_top_item">
                            <a class="banner_top_img" href="<?= permalink($lp['date_'],$linkformat).'/'.$lp['seo_url'] ?>">
                                <img src="<?= featured_image($lp['url'],html_entity_decode($lp['content'])) ?>" alt="<?= ($lp['alt_text']) ?>">
                            </a>
                            <div class="banner_top_content">
                                <a href="<?= permalink($lp['date_'],$linkformat).'/'.$lp['seo_url'] ?>"><?= $lp['title'] ?></a>
                                <p><?= first_para(html_entity_decode($lp['content'])) ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper big_img">
                        <?php foreach($latest_post as $lp): ?>
                            <div class="swiper-slide">
                                <a href="<?= permalink($lp['date_'],$linkformat).'/'.$lp['seo_url'] ?>">
                                	<img src="<?= featured_image($lp['url'],html_entity_decode($lp['content'])) ?>" alt="<?= ($lp['alt_text']) ?>" />
                                </a>
                                <div class="swiper_overley">
                                    <ul class="cat_links">
                                        <li><a href="<?= base_url('category') ?>/<?= pc_slug($lp['catid']) ?>"><?= ($lp['categorie']) ?></a></li>
                                        <li><a href="<?= base_url() ?>">home</a></li>
                                    </ul>
                                    <a href="<?= permalink($lp['date_'],$linkformat).'/'.$lp['seo_url'] ?>">
                                        <h1 class="h1_text"><?= $lp['title'] ?></h1>
                                    </a>
                                    <div class="timing"><span><i class="fa-regular fa-calendar-days"></i></span> <?= (date_for($lp['date_'])) ?></div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach($latest_post as $lp): ?>
                            <div class="swiper-slide">
                                <img src="<?= featured_image($lp['url'],html_entity_decode($lp['content'])) ?>" alt="<?= ($lp['alt_text']) ?>" />
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="post_gallry">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Trendy-tab" data-bs-toggle="tab" data-bs-target="#Trendy" type="button" role="tab" aria-controls="Trendy" aria-selected="true">Trendy</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="false">latest</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular" type="button" role="tab" aria-controls="popular" aria-selected="false">popular</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Trendy" role="tabpanel" aria-labelledby="home-tab">
                            <ul class="post_gallery_listing">
                                <?php for($i=0; $i<4; $i++): ?>
                                    <li>
                                        <a href="<?= permalink($trendy_post[$i]['date_'],$linkformat).'/'.$trendy_post[$i]['seo_url'] ?>" class="post_gallery_img">
                                            <img src="<?= featured_image($trendy_post[$i]['url'],html_entity_decode($trendy_post[$i]['content'])) ?>" alt="<?= ($trendy_post[$i]['alt_text']) ?>">
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="<?= base_url('category').'/'.pc_slug($trendy_post[$i]['catid']) ?>"><?= ($trendy_post[$i]['categorie']) ?></a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= (date_for($trendy_post[$i]['date_'])) ?></span> </li>
                                            </ul>
                                            <a href="<?= permalink($trendy_post[$i]['date_'],$linkformat).'/'.$trendy_post[$i]['seo_url'] ?>" class="post_gallery_title"><?= $trendy_post[$i]['title'] ?></a>
                                        </div>
                                    </li>
                                <?php endfor ?>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="profile-tab">
                            <ul class="post_gallery_listing">
                                <?php for($i=0; $i<4; $i++): ?>
                                    <li>
                                        <a href="<?= permalink($latest_post[$i]['date_'],$linkformat).'/'.$latest_post[$i]['seo_url'] ?>" class="post_gallery_img">
                                            <img src="<?= featured_image($latest_post[$i]['url'],html_entity_decode($latest_post[$i]['content'])) ?>" alt="<?= ($latest_post[$i]['alt_text']) ?>">
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="<?= base_url('category').'/'.pc_slug($latest_post[$i]['catid']) ?>"><?= ($latest_post[$i]['categorie']) ?></a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= (date_for($latest_post[$i]['date_'])) ?></span> </li>
                                            </ul>
                                            <a href="<?= permalink($latest_post[$i]['date_'],$linkformat).'/'.$latest_post[$i]['seo_url'] ?>" class="post_gallery_title"><?= $latest_post[$i]['title'] ?></a>
                                        </div>
                                    </li>
                                <?php endfor ?>
                            </ul>
                        </div>
                        <?php if(!empty($popular_post)): ?>
                        <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="contact-tab">
                            <ul class="post_gallery_listing">
                                <?php for($i=0; $i<4; $i++): ?>
                                    <li>
                                        <a href="<?= permalink($popular_post[$i]['date_'],$linkformat).'/'.$popular_post[$i]['seo_url'] ?>" class="post_gallery_img">
                                            <img src="<?= featured_image($popular_post[$i]['url'],html_entity_decode($popular_post[$i]['content'])) ?>" alt="<?= ($popular_post[$i]['alt_text']) ?>">
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="<?= base_url('category').'/'.pc_slug($popular_post[$i]['catid']) ?>"><?= ($popular_post[$i]['categorie']) ?></a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= (date_for($popular_post[$i]['date_'])) ?></span> </li>
                                            </ul>
                                            <a href="<?= permalink($popular_post[$i]['date_'],$linkformat).'/'.$popular_post[$i]['seo_url'] ?>" class="post_gallery_title"><?= $popular_post[$i]['title'] ?></a>
                                        </div>
                                    </li>
                                <?php endfor ?>
                            </ul>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- =======banner section close=== -->

<!-- =======feature news section start==== -->
<section class="features_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section_title">Top 10 News</div>
            </div>
            <div class="col-sm-12">
                <div class="features_slider owl-carousel">
                    <?php foreach($popular_post as $pp): ?>
                        <div class="features_item">
                            <img src="<?= featured_image($pp['url'],html_entity_decode($pp['content'])) ?>" alt="<?= ($pp['alt_text']) ?>">
                            <div class="features_overley">
                                <ul class="post-meta">
                                    <li><a href="<?= base_url('category').'/'.pc_slug($pp['catid']) ?>"><?= $pp['categorie'] ?></a></li>
                                    <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= (date_for($pp['date_'])) ?></span> </li>
                                </ul>
                                <a href="<?= permalink($pp['date_'],$linkformat).'/'.$pp['seo_url'] ?>" class="features_title"><?= $pp['title'] ?></a>
                                <p><?= first_para(html_entity_decode($pp['content'])) ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =======feature news section close==== -->


<!-- ======trending news section start==== -->
<section class="trending_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="section_title">trending news</div>
                <div class="trending_slider_new owl-carousel">
                    <?php foreach($trendy_post as $tp): ?>
                        <div class="trending_item">
                            <a href="<?= permalink($tp['date_'],$linkformat).'/'.$tp['seo_url'] ?>" class="trending_item_img">
                                <img src="<?= featured_image($tp['url'],html_entity_decode($tp['content'])) ?>" alt="<?= $tp['alt_text'] ?>">
                            </a>
                            <div class="trending_content">
                                <ul class="post-meta">
                                    <li><a href="<?= base_url('category')."/".pc_slug($tp['catid']) ?>"><?= $tp['categorie'] ?></a></li>
                                    <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= (date_for($tp['date_'])) ?></span> </li>
                                </ul>
                                <a href="<?= permalink($tp['date_'],$linkformat).'/'.$tp['seo_url'] ?>" class="trending_title">
                                    <h3><?= $tp['title'] ?></h3>
                                </a>
                                <p><?= first_para(html_entity_decode($tp['content'])) ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <?php foreach($trendy_post as $tp): ?>
                        <div class="col-sm-6">
                            <ul class="post_gallery_listing">
                                <li>
                                    <a href="<?= permalink($tp['date_'],$linkformat).'/'.$tp['seo_url'] ?>" class="post_gallery_img">
                                        <img src="<?= featured_image($tp['url'],html_entity_decode($tp['content'])) ?>" alt="<?= $tp['alt_text'] ?>">
                                        <div class="trending_icon"><i class="fa-solid fa-bolt-lightning"></i></div>
                                    </a>
                                    <div class="post_gallery_content">
                                        <ul class="post-meta">
                                            <li><a href="<?= base_url('category')."/".pc_slug($tp['catid']) ?>"><?= $tp['categorie'] ?></a></li>
                                            <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= (date_for($tp['date_'])) ?></span> </li>
                                        </ul>
                                        <a href="<?= permalink($tp['date_'],$linkformat).'/'.$tp['seo_url'] ?>" class="post_gallery_title"><?= $tp['title'] ?></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="sidebar">
                    <!-- <div class="section_title">Follow Us</div>
                    <ul class="trending_social">
                        <li>
                            <a href="">
                                <span class="trending_social_icon"><i class="fa-brands fa-facebook-f"></i></span>
                                <div class="trending_social_content">
                                    <b>34,456</b>
                                    <p>Fans</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="trending_social_icon"><i class="fa-brands fa-twitter"></i></span>
                                <div class="trending_social_content">
                                    <b>34,456</b>
                                    <p>Followers</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="trending_social_icon"><i class="fa-brands fa-youtube"></i></span>
                                <div class="trending_social_content">
                                    <b>34,456</b>
                                    <p>Fans</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="trending_social_icon"><i class="fa-brands fa-instagram"></i></span>
                                <div class="trending_social_content">
                                    <b>34,456</b>
                                    <p>Fans</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="trending_social_icon"><i class="fa-brands fa-linkedin-in"></i></span>
                                <div class="trending_social_content">
                                    <b>34,456</b>
                                    <p>Fans</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="trending_social_icon"><i class="fa-brands fa-maxcdn"></i></span>
                                <div class="trending_social_content">
                                    <b>34,456</b>
                                    <p>Fans</p>
                                </div>
                            </a>
                        </li>
                    </ul> -->
                    <div class="section_title">Most View</div>
                    <?php if(!empty($popular_post)): ?>
                    <div class="most_view_slider owl-carousel">
                        <ul class="most_slider_item post_gallery_listing">
                            <?php for($i=0; $i < (int)count($popular_post)/2; $i++): ?>
                                <li>
                                    <a href="<?= permalink($popular_post[$i]['date_'],$linkformat).'/'.$popular_post[$i]['seo_url'] ?>" class="post_gallery_img">
                                        <img src="<?= featured_image($popular_post[$i]['url'],html_entity_decode($popular_post[$i]['content'])) ?>" alt="<?= $popular_post[$i]['alt_text'] ?>">
                                        <div class="no_indicator"><?= $i+1 ?></div>
                                    </a>
                                    <div class="post_gallery_content">
                                        <ul class="post-meta">
                                            <li><a href="<?= base_url('category')."/".pc_slug($popular_post[$i]['catid']) ?>"><?= $popular_post[$i]['categorie'] ?></a></li>
                                            <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= date_for($popular_post[$i]['date_']) ?></span> </li>
                                        </ul>
                                        <a href="<?= permalink($popular_post[$i]['date_'],$linkformat).'/'.$popular_post[$i]['seo_url'] ?>" class="post_gallery_title"><?= $popular_post[$i]['title'] ?></a>
                                    </div>
                                </li>
                            <?php endfor ?>
                        </ul>
                        <ul class="most_slider_item post_gallery_listing">
                            <?php for($i=(int)count($popular_post)/2; $i < (int)count($popular_post); $i++): ?>
                                <li>
                                    <a href="<?= permalink($popular_post[$i]['date_'],$linkformat).'/'.$popular_post[$i]['seo_url'] ?>" class="post_gallery_img">
                                        <img src="<?= featured_image($popular_post[$i]['url'],html_entity_decode($popular_post[$i]['content'])) ?>" alt="<?= $popular_post[$i]['alt_text'] ?>">
                                        <div class="no_indicator"><?= $i+1 ?></div>
                                    </a>
                                    <div class="post_gallery_content">
                                        <ul class="post-meta">
                                            <li><a href="<?= base_url('category')."/".pc_slug($popular_post[$i]['catid']) ?>"><?= $popular_post[$i]['categorie'] ?></a></li>
                                            <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= date_for($popular_post[$i]['date_']) ?></span> </li>
                                        </ul>
                                        <a href="<?= permalink($popular_post[$i]['date_'],$linkformat).'/'.$popular_post[$i]['seo_url'] ?>" class="post_gallery_title"><?= $popular_post[$i]['title'] ?></a>
                                    </div>
                                </li>
                            <?php endfor ?>
                        </ul>
                    </div>
                    <?php endif ?>
                    <div class="section_title mt-4 d-sm-block d-none">Popular Category</div>
                    <div class="border mt-4 py-1 px-3 d-sm-block d-none" style="background-color: #f5f3f3;">
                        <?php foreach($header_menu as $menu): ?>
                            <div class="py-3">
                                <a class="text-reset text-decoration-none" style="display:inline-flex; align-items: center" href="<?= base_url() ?>/category/<?= pc_slug($menu['categorie_id']) ?>">
                                   <span class="categories_icon"><?= substr($menu['categorie'],0,1) ?></span> <h5 class="cat-title"><?= ($menu['categorie']) ?></h5>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======trending news section close==== -->

<!-- =====ads section==== -->
<div class="ads_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ads_area">
                    <?= $ads->footer ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =====ads section==== -->


<!-- ========single play post section start===== -->
<!-- <section class="Single_play_post">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="single_play_post_inner">
                    <div class="Single_play_slider owl-carousel">
                        <div class="single_play_item">
                            <img src="images/trending/Screenshot_2.png" alt="">
                            <div class="single_play_item_overley">
                                <ul class="post-meta">
                                    <li><a href="">Technology</a></li>
                                    <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                </ul>
                                <a href="" class="sinle_post_title">
                                    <h3>Success is not a good food failure makes you humble</h3>
                                </a>
                            </div>
                            <a href="" class="trending_btn_b"><i class="fa-solid fa-bolt-lightning"></i></a>
                        </div>
                        <div class="single_play_item">
                            <img src="images/trending/America-stock-price-update-CHK-stocks-news-review-300x200.jpeg" alt="">
                            <div class="single_play_item_overley">
                                <ul class="post-meta">
                                    <li><a href="">Technology</a></li>
                                    <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                </ul>
                                <a href="" class="sinle_post_title">
                                    <h3>Success is not a good food failure makes you humble</h3>
                                </a>
                            </div>
                            <button class="play_btn"><i class="fa-solid fa-play"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- ========single play post section close===== -->


<!-- ========video news section start=========== -->
<!-- <div class="video_news_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="video_news_inner">
                    <div class="row ">
                        <div class="col-sm-8">
                            <div class="video_thumb_outer">
                                <div class="section_title">News Videos <a href="" class="btn view_all">view all</a></div>
                                <div class="video_area">
                                    <div class="video_thumb">
                                        <img src="images/main_banner/banner1.jpeg" alt="">
                                        <button class="youtube_play" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-brands fa-youtube"></i>
                                        </button>
                                    </div>
                                    <div class="video_cont">
                                        <ul class="post-meta">
                                            <li><a href="">Technology</a></li>
                                            <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                        </ul>
                                        <a href="" class="video_title">Riots Report Shows London Needs To Maintain Police Numbers, Says Mayor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="section_title">Popular News</div>
                            <div class="popular_news_slider owl-carousel">
                                <ul class="popular_slider_item">
                                    <li>
                                        <a href="" class="post_gallery_img">
                                            <img src="images/post_gallery/banner2.jpeg" alt="">
                                            <div class="no_indicator">1</div>
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="">Technology</a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                            </ul>
                                            <a href="" class="post_gallery_title">Copa America: Luis Suarez from devastated US</a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="" class="post_gallery_img">
                                            <img src="images/trending/adelante-enhances-capabilities-with-zendesk-setup-solution17.png" alt="">
                                            <div class="no_indicator">2</div>
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="">Technology</a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                            </ul>
                                            <a href="" class="post_gallery_title">Copa America: Luis Suarez from devastated US</a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="" class="post_gallery_img">
                                            <img src="images/trending/America-stock-price-update-CHK-stocks-news-review-300x200.jpeg" alt="">
                                            <div class="no_indicator">3</div>
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="">Technology</a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                            </ul>
                                            <a href="" class="post_gallery_title">Copa America: Luis Suarez from devastated US</a>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="popular_slider_item">
                                    <li>
                                        <a href="" class="post_gallery_img">
                                            <img src="images/post_gallery/banner2.jpeg" alt="">
                                            <div class="no_indicator">1</div>
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="">Technology</a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                            </ul>
                                            <a href="" class="post_gallery_title">Copa America: Luis Suarez from devastated US</a>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="" class="post_gallery_img">
                                            <img src="images/trending/adelante-enhances-capabilities-with-zendesk-setup-solution17.png" alt="">
                                            <div class="no_indicator">2</div>
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="">Technology</a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                            </ul>
                                            <a href="" class="post_gallery_title">Copa America: Luis Suarez from devastated US</a>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="" class="post_gallery_img">
                                            <img src="images/trending/America-stock-price-update-CHK-stocks-news-review-300x200.jpeg" alt="">
                                            <div class="no_indicator">3</div>
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                                <li><a href="">Technology</a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> Dec 26, 2022</span> </li>
                                            </ul>
                                            <a href="" class="post_gallery_title">Copa America: Luis Suarez from devastated US</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ========video news section close=========== -->


<!-- ======consumer goods section start========= -->
<section class="consumer_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php for($i=0; $i <= 2 ; $i++): ?>
                    <div class="section_title"><?= $category_post[$header_menu[$i]['slug']][$i]['categorie'] ?> <a href="<?= base_url('category').'/'.pc_slug($category_post[$header_menu[$i]['slug']][$i]['catid']) ?>" class="btn view_all">view all</a></div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="consume_slider owl-carousel">
                                <?php foreach($category_post[$header_menu[$i]['slug']] as $scat): ?>
                                    <div class="trending_item">
                                        <a href="<?= permalink($scat['date_'],$linkformat).'/'.$scat['seo_url'] ?>" class="trending_item_img">
                                            <img src="<?= featured_image($scat['url'],html_entity_decode($scat['content'])) ?>" alt="<?= ($scat['alt_text']) ?>">
                                        </a>
                                        <div class="trending_content">
                                            <ul class="post-meta">
                                                <li><a href="<?= base_url('category').'/'.pc_slug($scat['catid']) ?>"><?= ($scat['categorie']) ?></a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= date_for($scat['date_']) ?></span> </li>
                                            </ul>
                                            <a href="<?= permalink($scat['date_'],$linkformat).'/'.$scat['seo_url'] ?>" class="trending_title">
                                                <h3><?= ($scat['title']) ?></h3>
                                            </a>
                                            <p><?= first_para(html_entity_decode($scat['content'])) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <ul class="post_gallery_listing">
                                <?php foreach($category_post[$header_menu[$i]['slug']] as $scat): ?>
                                    <li>
                                        <a href="<?= permalink($scat['date_'],$linkformat).'/'.$scat['seo_url'] ?>" class="post_gallery_img">
                                            <img src="<?= featured_image($scat['url'],html_entity_decode($scat['content'])) ?>" alt="<?= ($scat['alt_text']) ?>">
                                        </a>
                                        <div class="post_gallery_content">
                                            <ul class="post-meta">
                                            <li><a href="<?= base_url('category').'/'.pc_slug($scat['catid']) ?>"><?= ($scat['categorie']) ?></a></li>
                                                <li class="post_date"><span><i class="fa-solid fa-clock"></i> <?= date_for($scat['date_']) ?></span> </li>
                                            </ul>
                                            <a href="<?= permalink($scat['date_'],$linkformat).'/'.$scat['seo_url'] ?>" class="post_gallery_title"><?= ($scat['title']) ?></a>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                <?php endfor?>
            </div>
            <div class="col-sm-4">
                <div class="side_sticky">
                    <div class="side_ads">
                        <?= $ads->sidebar ?>
                    </div>
                    <!-- <div class="newsletter_area">
                        <div class="section_title">Newsletter</div>
                        <span>Your email address will not be this published. Required fields are News Today.</span>
                        <div class="newsletter_input">
                            <input type="text" class="form-control" placeholder="Your email address">
                            <button class="btn sign_submit">sign up</button>
                        </div>
                        <small>We hate spam as much as you do</small>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======consumer goods section close========= -->

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= $this->endSection() ?>
