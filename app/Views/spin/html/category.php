    <!-- =========breadcumb start======== -->
    <main class="breadcumb_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="breadcrumb_area">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                          <li class="breadcrumb-item" aria-current="page"><?= $cat_post[0]['posts']['cat_name']; ?></li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </main>

    <!-- ========single post sec start===== -->
    <main class="business_sec">
        <div class="container">
          <div class="row">           
              <div class="col-sm-12 col-lg-8">
                <ul class="ver_post_listing business_listing">
                  <?php if($cat_post){ ?>
                  <?php foreach($cat_post as $cat) { 
                    // echo "<pre>"; print_r($cat);die;
                    ?>

                    <li class="ver_post_item">
                      <a href="#" class="post_cat"><?php if($cat['posts']) { echo $cat['posts']['cat_name']; } ?></a>
                      <a href="<?php echo base_url().'/'. $cat['posts']['url']; ?>" class="var_post_img"><img src="<?php if($cat['posts']['path'][0]['url']) { echo $cat['posts']['path'][0]['url'];
                                } else { echo base_url().'/'.$settings[12]['setting_value']; } ?>" alt="" onerror="myFunction(this)" alt=""></a>
                      <div class="ver_post_info">
                        <a href="<?php echo base_url() . '/' . $cat['posts']['url'] ; ?>" class="ver_post_title"><?php if($cat['posts']['the_posts'][0]['title']) { echo $cat['posts']['the_posts'][0]['title']; } ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($cat['posts']['the_posts'][0]['date_']));?></span>
                          </li>                         
                        </ul>
                        <p><?php $content = strip_tags(html_entity_decode($cat['posts']['the_posts'][0]['content'])); $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                        <a href="<?php echo base_url().'/'.$cat['posts']['url'];?>" class="btn post_btn continue_btn">Continue Reading <i class="fa-solid fa-arrow-right"></i></a>
                      </div>
                    </li>

                  <?php } ?>
                  <?php } ?>
                </ul>
                <!-- <ul class="pagination">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#"><i class="fa-solid fa-angles-right"></i></a></li>
                </ul> -->
                <ul class="pagination">
                  <li class="active">
                  <?= $pager_links ?>
                  </li>
                </ul>
              </div>
            


            <div class="col-sm-12 col-lg-4 right_bar">
           

              <div class="row">
                <!-- <div class="col-sm-12">
                  <div class="section_title bgblack">
                    <span>Follow Us</span>
                  </div>
                </div> -->
                <!-- <div class="col-sm-12">
                  <div class="follow_bar">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href=""><i class="fa-solid fa-rss"></i></a>
                    <a href=""><i class="fa-brands fa-skype"></i></a>
                  </div>
                </div> -->
                <?php if($popular){ ?>
                <div class="col-sm-12">
                  <div class="section_title bgblack">
                    <span>Popular news</span>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="popular_area">
                    <ul class="thumb_listing">
                    <?php foreach($popular as $pop) { ?>
                      <li>
                          <a href="<?php echo base_url().'/'. $pop['seo_url'];?>" class="thumb_img"><img src="<?= $pop['media_url'];?>" onerror="myFunction(this)" alt=""></a>
                          <div class="thumb_content">
                            <a href="<?php echo base_url().'/'. $pop['seo_url'];?>" class="thumb_title"><?= $pop['title'];?></a>
                            <ul class="author_listing no_pad">
                              <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span><?= date("d M, Y", strtotime($pop['date_']));?></span>
                              </li>
                            </ul>
                          </div>
                      </li>      
                      <?php } ?>           
                    </ul>
                  </div>
                </div>
                <?php } ?>

                <div class="col-sm-12">
                    <div class="section_title bgblack">
                      <span>Trending News</span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="trending_slider owl-carousel">
                      <div class="trending_item">
                        <div class="thumb_medium_post">
                          <a href="<?= base_url() . '/' . $trending[0]['seo_url']; ?>" class="thumb_medium_img"><img src="<?= $trending[0]['url'];?>" alt="" class="img-fluid"></a>
                          <div class="thumb_medium_post_overley">
                            <a href="" class="post_cat"><?= $trending[0]['categorie'] ?></a>
                            <a href="<?= base_url() . '/' . $trending[0]['seo_url']; ?>" class="thumb_medium_post_title"><?= $trending[0]['title']; ?></a>
                            <ul class="author_listing">
                              <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span><?= date("d M, Y", strtotime($trending[0]['date_']));?></span>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="trending_item">
                        <div class="thumb_medium_post">
                          <a href="<?= base_url() . '/' . $trending[1]['seo_url']; ?>" class="thumb_medium_img"><img src="<?= $trending[1]['url'];?>" onerror="myFunction(this)" alt="" class="img-fluid"></a>
                          <div class="thumb_medium_post_overley">
                            <a href="" class="post_cat"><?= $trending[1]['categorie'] ?></a>
                            <a href="<?= base_url() .'/'.$trending[1]['seo_url']; ?>" class="thumb_medium_post_title"><?= $trending[1]['title']; ?></a>
                            <ul class="author_listing">
                              <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span><?= date("d M, Y", strtotime($trending[1]['date_']));?></span>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-sm-12">
                    <div class="section_title bgblack mt-50">
                        <span>Newsletter</span>
                      </div>
                  </div> -->
                  <!-- <div class="col-sm-12" >
                    <div class="newsletter_area">
                        <h4>Subscribe Newsletter!</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis architecto nemo.</p>
                        <input type="text" class="form-control" placeholder="E-Mail Address">
                        <button class="btn submitbtn" aria-label="">Submit</button>
                    </div>
                  </div> -->
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
                <img src="images/ads_img.jpeg" alt="" class="img-fluid">
            </a>
            </div>
        </div>
        </div>
    </section>
    <!-- =========ads sec=============== -->

        