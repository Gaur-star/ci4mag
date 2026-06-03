<script>
  function myFunction(ele) {
  ele.setAttribute('src', '<?php echo base_url('assets/setting-image/The-Magazine-Plus-default_image.jpg');?>');
  }
</script> 
    
    <!-- =========breadcumb start======== -->
    <main class="breadcumb_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="breadcrumb_area">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page"><?= $single["title"]; ?></li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </main>

    <!-- ========single post sec start===== -->
    <main class="single_post_sec">
        <div class="container">
          <div style="clear:both">
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                  <div class="single_post_item">
                         <?php 
                        foreach($single['post_tags'] as $categorie) { ?>
                          <a href="<?php echo base_url().'/category/' .$categorie?>" class="post_cat"><?= $categorie; ?></a>
                          <?php } ?>
                          <h2><?php if(isset($_SESSION['single_preview'])&&(!empty($post_preview[0]['title']))){echo $post_preview[0]['title'];}else{echo $single["title"];}?></h2>
                          <ul class="author_listing">                
                              <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span><?= date("d M, Y", strtotime($single['date_']));?></span>
                              </li>                    
                          </ul> 
                          <div style="clear:both">                
                          <div class="single_post_content" id="content">
                            <p>  
                              <?php   
                              $allowed_tags=array("h1","a","p","br","img");                     
                              if(isset($_SESSION['single_preview'])&&(!empty($post_preview[0]['content']))){
                                  echo strip_tags(html_entity_decode(($post_preview[0]["content"])), $allowed_tags);
                              }else{
                                  echo strip_tags(html_entity_decode(($single["content"])), $allowed_tags);
                              }
                              ?>
                            </p>                  
                           </div>   
                          </div>      
                      
                  </div>
                </div>

              <div class="col-sm-12 col-lg-4 right_bar">
                <div class="row">              
    
                  <div class="col-sm-12">
                    <div class="section_title bgblack">
                      <span>Latest news</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="popular_area">
                      <div class="thumb_medium_post">
                        <a href="<?= base_url().'/'. $latest_news[0]['seo_url']; ?>" class="thumb_medium_img"><img src="<?= $latest_news[0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                        <div class="thumb_medium_post_overley">
                          <a href="" class="post_cat">Health</a>
                          <a href="<?= base_url().'/'. $latest_news[0]['seo_url']; ?>" class="thumb_medium_post_title"><?= $latest_news[0]['title']; ?></a>
                          <ul class="author_listing">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span><?= date("d M, Y", strtotime($latest_news[0]['date_'])); ?></span>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <ul class="thumb_listing">
                        <li>
                            <a href="<?= base_url().'/'. $latest_news[1]['seo_url']; ?>" class="thumb_img"><img src="<?= $latest_news[1]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                            <div class="thumb_content">
                              <a href="<?= base_url().'/'. $latest_news[1]['seo_url']; ?>" class="thumb_title"><?= $latest_news[1]['title']; ?></a>
                              <ul class="author_listing no_pad">
                                <li>
                                  <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                  <span><?= date("d M, Y", strtotime($latest_news[1]['date_'])); ?></span>
                                </li>
                              </ul>
                            </div>
                        </li>
      
                        <li>
                          <a href="<?= base_url().'/'. $latest_news[2]['seo_url']; ?>" class="thumb_img"><img src="<?= $latest_news[2]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                          <div class="thumb_content">
                            <a href="<?= base_url().'/'. $latest_news[2]['seo_url']; ?>" class="thumb_title"><?= $latest_news[2]['title']; ?></a>
                            <ul class="author_listing no_pad">
                              <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span><?= date("d M, Y", strtotime($latest_news[2]['date_'])); ?></span>
                              </li>
                            </ul>
                          </div>
                      </li>
      
                      <li>
                        <a href="<?= base_url().'/'. $latest_news[3]['seo_url']; ?>" class="thumb_img"><img src="<?= $latest_news[3]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                        <div class="thumb_content">
                          <a href="<?= base_url().'/'. $latest_news[3]['seo_url']; ?>" class="thumb_title"><?= $latest_news[3]['title']; ?></a>
                          <ul class="author_listing no_pad">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span><?= date("d M, Y", strtotime($latest_news[3]['date_'])); ?></span>
                            </li>
                          </ul>
                        </div>
                    </li>
      
                    <li>
                      <a href="<?= base_url().'/'. $latest_news[4]['seo_url']; ?>" class="thumb_img"><img src="<?= $latest_news[4]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="thumb_content">
                        <a href="<?= base_url().'/'. $latest_news[4]['seo_url']; ?>" class="thumb_title"><?= $latest_news[4]['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?= date("d M, Y", strtotime($latest_news[4]['date_'])); ?></span>
                          </li>
                        </ul>
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
      </main>
    <!-- ========single post sec close===== -->


        <!-- =========ads sec=============== -->
        <section class="ads_sec">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <a href="" class="ads_inner">
                  <img src="<?= base_url('assets/newtheme/images/ads_img.jpeg'); ?>" alt="" class="img-fluid">
                </a>
              </div>
            </div>
          </div>
        </section>
        <!-- =========ads sec=============== -->

