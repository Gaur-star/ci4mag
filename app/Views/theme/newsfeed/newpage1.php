      <main class="about_sec">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-8">
                <?php echo html_entity_decode(($singlepage["content"])) ?>
            </div>


            <div class="col-sm-12 col-lg-4 right_bar">
            <div class="row">
                <div class="col-sm-12">
                <!-- <div class="section_title bgblack">
                    <span>Follow Us</span>
                </div> -->
                </div>
                <div class="col-sm-12">
                <!-- <div class="follow_bar">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href=""><i class="fa-solid fa-rss"></i></a>
                    <a href=""><i class="fa-brands fa-skype"></i></a>
                </div> -->
                </div>
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
                                <a href="<?php echo base_url().'/'. $pop['seo_url'];?>" class="thumb_img"><img src="<?= $pop['media_url'];?>" alt="" onerror="myFunction(this)"></a>
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