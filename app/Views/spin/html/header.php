<!doctype html>
<html lang="en-US" prefix="og: https://ogp.me/ns#" >
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- fontasome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl carousel link -->
    <link rel="stylesheet" href="<?php echo base_url('assets/newtheme/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/newtheme/css/owl.theme.default.min.css') ?>">

    <!-- style.css link -->
    <link rel="stylesheet" href="<?php echo base_url('assets/newtheme/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/newtheme/css/responsive.css') ?>">


    <!-------------------- all meta tags and seo links---------------->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="magazineplus">
    <meta name="meta_tag" content="magazineplus">
    <link rel="icon" type="image/x-icon" href="<?php echo $settings[7]["setting_value"]; ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>magazine</title>
    <script type="application/ld+json" class="aioseop-schema">{"@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"https://themagazineplus.com/#organization","url":"https://themagazineplus.com/","name":"The Magazineplus","sameAs":[],"logo":{"@type":"ImageObject","@id":"https://themagazineplus.com/#logo","url":"https://themagazineplus.s3.us-west-2.amazonaws.com/wp-content/uploads/2022/11/04151304/logomagzine-1.png","caption":""},"image":{"@id":"https://themagazineplus.com/#logo"}},{"@type":"WebSite","@id":"https://themagazineplus.com/#website","url":"https://themagazineplus.com/","name":"The Magazineplus","publisher":{"@id":"https://themagazineplus.com/#organization"},"potentialAction":{"@type":"SearchAction","target":"https://themagazineplus.com/?s={search_term_string}","query-input":"required name=search_term_string"}},{"@type":"WebPage","@id":"https://themagazineplus.com#webpage","url":"https://themagazineplus.com","inLanguage":"en-US","name":"The Magazineplus","isPartOf":{"@id":"https://themagazineplus.com/#website"},"breadcrumb":{"@id":"https://themagazineplus.com#breadcrumblist"},"about":{"@id":"https://themagazineplus.com/#organization"}},{"@type":"BreadcrumbList","@id":"https://themagazineplus.com#breadcrumblist","itemListElement":[{"@type":"ListItem","position":1,"item":{"@type":"WebPage","@id":"https://themagazineplus.com/","url":"https://themagazineplus.com/","name":"The Magazine Plus"}}]}]}</script>
    <meta name='robots' content='max-image-preview:large' />
    <meta name="keywords" content="magazineplus">
    <link rel="canonical" href="<?php echo base_url();?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php if($settings[0]['setting_value']){  print_r($settings[0]['setting_value']); };?>" />
    <meta property="og:url" content="<?php echo base_url();?>" />
    <meta property="og:site_name" content="<?php if($settings[0]['setting_value']){  print_r($settings[0]['setting_value']); };?>" />
    <meta property="og:image" content="<?php echo base_url().'/'. $settings[7]["setting_value"]; ?>" />
    <meta property="og:image:secure_url" content="<?php echo base_url().'/'. $settings[7]["setting_value"]; ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php if($settings[0]['setting_value']){ print_r($settings[0]['setting_value']); };?>" />
    <meta name="twitter:image" content="<?php echo base_url().'/'. $settings[7]["setting_value"]; ?>"/>  
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//s.w.org' />

    <!-------------------all meta tags and seo links end--------------->
    <script>
    function myFunction(ele) {
          ele.setAttribute('src', '<?php echo base_url('assets/setting-image/The-Magazine-Plus-default_image.jpg');?>');
        }
    </script>

    <title>SpinDigit</title>
    <style>
        .date-section{
            font-size: 12px;
            color:#fff;
        }
        .date-section::before {
            content: "\f017";
            display: inline-block;
            font-family: FontAwesome;
            margin-right: 8px;
        }
        /* #add_image_header>img {
            width: 736px;
            height: 90.86px;
            object-fit: fill;
        } */
    </style>
  </head>
  <body>
    <!-- ==========top bar start========= -->
    <main class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <!-- <a href="" class="btn defaultbtn logbtn">Login & Signup</a> -->
                    <div class="date-section">
                        <?php $mydate=getdate(date("U")); echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"; ?>
                    </div>
                </div>
                <div class="col-sm-6">
                  <!-- <div class="social_bar">
                    <a href="#" title=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" title=""><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" title=""><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" title=""><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" title=""><i class="fa-solid fa-rss"></i></a>
                    <a href="#" title=""><i class="fa-brands fa-skype"></i></a>
                  </div> -->
                </div>
            </div>
        </div>
    </main>
    <!-- ==========top bar start========= -->

    <!-- ==========brand bar start======= -->
    <main class="brand_bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-4">
            <a href="<?= base_url();?>" class="brand_bar_logo" title=""><img src="<?= base_url('assets/images/magazinepluslogo.png');?>" alt=""></a>
          </div>
          <div class="col-sm-12 col-md-8">
            <div class="top_ads">
              <img src="<?= base_url('assets/images/ad-banner.png');?>" alt="">
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ==========brand bar close======= -->

    <!-- ==========header start========== -->
    <header class="header_area">
      <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light header_inner">
                <a class="navbar-brand" href="<?= base_url();?>"><img src="<?= base_url('assets/images/spindigitlogo.png');?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa-solid fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 .breadcrumb v1">
                   
                    <li class="nav-item .breadcrumb-level">
                      <a class="nav-link active" aria-current="page" href="<?= base_url();?>">Home</a>
                    </li>
                  
                    <?php foreach($header_menu as $menu){ ?>
                    <li class="nav-item .breadcrumb-level">
                      <?php 
                          if($menu['slug'] == $cat_name){ ?>
                          <!-- <a class="nav-link" href="#">Business News</a> -->
                          <a class="nav-link active" href="<?php echo base_url().'/category/' . $menu['slug']?>"<?php if(isset($cat_name) && $cat_name == $menu['slug']){ ?><?php } ?> ><?= $menu['categorie'] ?></a>
                          <?php  ?>
                      <?php } else{ ?>
                        <a class="nav-link" href="<?php echo base_url().'/category/' . $menu['slug']?>"<?php if(isset($cat_name) && $cat_name == $menu['slug']){ ?><?php } ?> ><?= $menu['categorie'] ?></a>
                     <?php } ?>
                    </li>
                    <?php } ?>  
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#">Health and Biotech</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Morning Updates</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Technology</a>
                    </li> -->
                  </ul>
                </div>
                
                <form class="search_area" method="GET" id="search-form" onsubmit="return validatesearch()" action="<?= base_url('home/search');?>" name="myForm">
                  <div class="utf_search_block">
                  
                    <input class="form-control search_input" type="search" placeholder="Enter your keywords..." aria-label="Search" name="s" id="s">
                    <button  class="btn btn-primary" type="submit" style="position: absolute; right: 7px; top: 8px;"><i class="fa fa-search"></i></button>                              
                  </div>
                  <span class="btn search_btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i><i class="fa-solid fa-xmark"></i></span>
                </form>
            </nav>
      </div>
    </header>
    <!-- ==========header close========== -->