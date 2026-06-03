<?php 
// echo "<pre>";
// print_r($busines_post);

?>


<?= $this->extend('layout/main') ?>

<?= $this->section('cssLinks') ?>

 

<?= $this->endSection() ?>

<?= $this->section('content_first_half') ?>

    <!-- ==========banner start========== -->
    <main class="banner_sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <div class="main_banner_slider owl-carousel">
              <?php for($i=0; $i <= (count($popular)/2); $i++): ?>
              <div class="main_banner_item">
                  <a href="<?= $popular[$i]['seo_url']; ?>" class="main_banner_img" title="">
                      <img src="<?= $popular[$i]['media_url']; ?>" alt="" onerror="myFunction(this)" loading="lazy">
                  </a>
                  <div class="main_banner_overley">
                      <a href="<?= $popular[$i]['seo_url']; ?>" class="hero_text">
                          <h1><?= $popular[$i]['title']; ?></h1>
                      </a>
                      <ul class="author_listing">
                          <!-- <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                              <a href="" title="">John Wick</a>
                          </li> -->
                          <!-- <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span></?= date("d M, Y", strtotime($popular[$i]['date_'])); ?></span>
                          </li> -->
                      </ul>
                  </div>
              </div>
              <?php endfor; ?>
          </div>
          </div>
          <div class="col-lg-5 col-sm-12">
            <div class="row">
              <div class="col-sm-12">
                <?php for($i=(int)(count($popular)/2); $i < (int)((count($popular)/2)+1); $i++): ?>
                <div class="banner_big_post">
                    <a href="<?= $popular[$i]['seo_url']; ?>" class="banner_big_post_img" title=""><img src="<?= $popular[$i]['media_url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="banner_big_post_oveley">
                        <a href="<?= $popular[$i]['seo_url']; ?>" class="banner_big_post_title" title=""><?= $popular[$i]['title']; ?></a>
                        <ul class="author_listing">
                            <!-- <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                <a href="" title="">John Wick</a>
                            </li> -->
                            <!-- <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span></?= date("d M, Y", strtotime($popular[$i]['date_'])); ?></span>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <?php endfor; ?>
              </div>
              <?php for($i=(int)(count($popular)/2)+1; $i < count($popular); $i++): ?>
              <div class="col-sm-6 first-6">                       
                  <div class="banner_small_post">
                      <a href="<?= $popular[$i]['seo_url']; ?>" class="banner_small_img" title=""><img src="<?= $popular[$i]['media_url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="banner_small_post_oveley">
                          <a href="" class="post_cat" title="">gadget</a>
                          <a href="<?= $popular[$i]['seo_url']; ?>" class="banner_small_post_title"><?= $popular[$i]['title']; ?></a>
                          <ul class="author_listing">
                              <!-- <li>
                                  <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                  <a href="" title="">John Wick</a>
                              </li> -->
                          </ul>
                      </div>
                  </div>     
              </div>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ==========banner close========== -->


    <!-- ==========latest news start===== -->
    <main class="latest_news">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="section_title bg_blue">
              <span>Latest News</span>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="latest_news_slider owl-carousel">
              <?php foreach($latest_news as $group): ?>
              <div class="latest_news_column"> 
                <?php  foreach($group as $row): ?>
                <div class="latest_news_item">
                  
                  <a href="<?= $row['seo_url']; ?>" class="latest_news_img" title=""><img src="<?= $row['url']; ?>" alt=""></a>
                  <a href="<?= $row['seo_url']; ?>" class="latest_news_title" title=""><?= $row['title']; ?></a>
                  <ul class="author_listing">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                      <a href="" title="">John Wick</a>
                    </li>
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?= date("d M, Y", strtotime($row['date_']));?></span>
                    </li>
                  </ul>
                  <a href="" class="post_cat" title="">gadget</a>
                  
                </div>
                <?php endforeach; ?>
              </div>
                <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ==========latest news close===== -->

<?= $this->endSection() ?>

<?= $this->section('content_second_half') ?>    

    <!-- ========business sec start========= -->
    <main class="business_sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-8">
            <div class="row">
              <div class="col-sm-12">
                <div class="section_title bg_dblue">
                  <span>ENTERTAINMENT</span>
                </div>
              </div>
              <div class="col-sm-12" style="position: relative;">
                <nav class="tab_filter">
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Corporate</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Sports</button>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                      <div class="col-sm-6">
                        <?php for($i=0; $i < count($entertainment_post)/5; $i++): ?>
                        <div class="item_card">
                            <a href="" class="post_cat">gadget</a>
                            <a href="<?= $entertainment_post[$i]['all_entertainment']['entertainment_url'] ?>" class="item_img">
                                <img src="<?= $entertainment_post[$i]['all_entertainment']['entertainment_path'][0]['url'] ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy">
                            </a>
                            <a href="<?= $entertainment_post[$i]['all_entertainment']['entertainment_url'] ?>" class="item_title"><?= $entertainment_post[$i]['all_entertainment']['post_data']['title'] ?></a>
                            <ul class="author_listing no_pad">
                                <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                    <a href=""><?= $entertainment_post[$i]['all_entertainment']['post_data']['author'] ?></a>
                                </li>
                                <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                    <span><?= date("d M, Y", strtotime($entertainment_post[$i]['all_entertainment']['post_data']['date_'])); ?></span>
                                </li>
                            </ul>
                            <p class="item_para"><?= $content = strip_tags(html_entity_decode($entertainment_post[$i]['all_entertainment']['post_data']['content']));
                                                    $content = substr($content, 0, 700); ?> <?php print_r($content); ?></p>
                        </div>         
                        <?php endfor; ?> 
                      </div>
                      <div class="col-sm-6">
                        <ul class="thumb_listing">
                          <?php for($i=1; $i < count($entertainment_post); $i++ ): ?>
                            <li>
                                <a href="<?= $entertainment_post[$i]['all_entertainment']['entertainment_url'] ?>" class="thumb_img"><img src="<?= $entertainment_post[$i]['all_entertainment']['entertainment_path'][0]['url'] ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                                <div class="thumb_content">
                                    <a href="<?= $entertainment_post[$i]['all_entertainment']['entertainment_url'] ?>" class="thumb_title"><?= $entertainment_post[$i]['all_entertainment']['post_data']['title'] ?></a>
                                    <ul class="author_listing no_pad">
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                            <a href=""><?= $entertainment_post[$i]['all_entertainment']['post_data']['author'] ?></a>
                                        </li>
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                            <span><?= date("d M, Y", strtotime($entertainment_post[$i]['all_entertainment']['post_data']['date_'])); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php endfor; ?>   

                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                      <div class="col-sm-6">
                        <?php for($i=0; $i < count($sports_post)/5; $i++): ?>
                          <div class="item_card">
                              <a href="" class="post_cat">gadget</a>
                              <a href="<?= $sports_post[$i]['all_sports']['sports_url'] ?>" class="item_img">
                                  <img src="<?= $sports_post[$i]['all_sports']['sports_path'][0]['url'] ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy">
                              </a>
                              <a href="<?= $sports_post[$i]['all_sports']['sports_url'] ?>" class="item_title"><?= $sports_post[$i]['all_sports']['post_data']['title'] ?></a>
                              <ul class="author_listing no_pad">
                                  <li>
                                      <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                      <a href=""><?= $sports_post[$i]['all_sports']['post_data']['author'] ?></a>
                                  </li>
                                  <li>
                                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                      <span><?= date("d M, Y", strtotime($sports_post[$i]['all_sports']['post_data']['date_'])); ?></span>
                                  </li>
                              </ul>
                              <p class="item_para"><?= $content = strip_tags(html_entity_decode($sports_post[$i]['all_sports']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content); ?></p>
                          </div>
                          <?php endfor; ?>  
                      </div>
                      <div class="col-sm-6">
                        <ul class="thumb_listing">
                          <?php for($i=1; $i < count($sports_post); $i++ ): ?>
                            <li>
                                <a href="<?= $sports_post[$i]['all_sports']['sports_url'] ?>" class="thumb_img"><img src="<?= $sports_post[$i]['all_sports']['sports_path'][0]['url'] ?>" alt=""></a>
                                <div class="thumb_content">
                                    <a href="<?= $sports_post[$i]['all_sports']['sports_url'] ?>" class="thumb_title"><?= $sports_post[$i]['all_sports']['post_data']['title'] ?></a>
                                    <ul class="author_listing no_pad">
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                            <a href=""><?= $sports_post[$i]['all_sports']['post_data']['author'] ?></a>
                                        </li>
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                            <span><?= date("d M, Y", strtotime($sports_post[$i]['all_sports']['post_data']['date_'])); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php endfor; ?> 

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-50">
              <div class="col-sm-12">
                <div class="section_title bggreen">
                  <span>Software</span>
                </div>
              </div>
              <div class="col-sm-6">
                <?php for($i=0; $i < (count($software_post)/5)-1; $i++ ): ?>
                        <div class="thumb_medium_post">
                            <a href="<?= $software_post[$i]['all_software']['software_url']; ?>" class="thumb_medium_img"><img src="<?= $software_post[$i]['all_software']['software_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                            <div class="thumb_medium_post_overley">
                                <a href="" class="post_cat">software</a>
                                <a href="<?= $software_post[$i]['all_software']['software_url']; ?>" class="thumb_medium_post_title"><?= $software_post[$i]['all_software']['post_data']['title']; ?></a>
                                <ul class="author_listing">
                                    <li>
                                        <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                        <a href=""><?= $software_post[$i]['all_software']['post_data']['author'] ?></a>
                                    </li>
                                    <li>
                                        <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                        <span><?= date("d M, Y", strtotime($software_post[$i]['all_software']['post_data']['date_']));  ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php endfor; ?> 
                <ul class="thumb_listing thumb_medium">
                   <?php for($i=1; $i < (int)count($software_post)/2; $i++ ): ?>
                            <li>
                                <a href="<?= $software_post[$i]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?= $software_post[$i]['all_software']['software_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                                <div class="thumb_content">
                                    <a href="<?= $software_post[$i]['all_software']['software_url']; ?>" class="thumb_title"><?= $software_post[$i]['all_software']['post_data']['title']; ?></a>
                                    <ul class="author_listing no_pad">
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                            <a href=""><?= $software_post[$i]['all_software']['post_data']['author'] ?></a>
                                        </li>
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                            <span><?= date("d M, Y", strtotime($software_post[$i]['all_software']['post_data']['date_']));  ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php endfor; ?> 
                </ul>
              </div>
              <div class="col-sm-6">
                <?php for($i=(int)count($software_post)/2; $i < (int)(count($software_post)/2)+1; $i++ ): ?>
                        <div class="thumb_medium_post">
                            <a href="<?= $software_post[$i]['all_software']['software_url']; ?>" class="thumb_medium_img"><img src="<?= $software_post[$i]['all_software']['software_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                            <div class="thumb_medium_post_overley">
                                <a href="" class="post_cat">Software</a>
                                <a href="<?= $software_post[$i]['all_software']['software_url']; ?>" class="thumb_medium_post_title"><?= $software_post[$i]['all_software']['post_data']['title']; ?></a>
                                <ul class="author_listing">
                                    <li>
                                        <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                        <a href=""><?= $software_post[$i]['all_software']['post_data']['author'] ?></a>
                                    </li>
                                    <li>
                                        <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                        <span><?= date("d M, Y", strtotime($software_post[$i]['all_software']['post_data']['date_']));  ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php endfor; ?>
                <ul class="thumb_listing thumb_medium">
                  <?php for($i=(int)(count($software_post)/2) + 1 ; $i < (int)count($software_post); $i++ ): ?>
                            <li>
                                <a href="<?= $software_post[$i]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?= $software_post[$i]['all_software']['software_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                                <div class="thumb_content">
                                    <a href="<?= $software_post[$i]['all_software']['software_url']; ?>" class="thumb_title"><?= $software_post[$i]['all_software']['post_data']['title']; ?></a>
                                    <ul class="author_listing no_pad">
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                            <a href=""><?= $software_post[$i]['all_software']['post_data']['author'] ?></a>
                                        </li>
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                            <span><?= date("d M, Y", strtotime($software_post[$i]['all_software']['post_data']['date_']));  ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php endfor; ?>    
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-lg-4 right_bar">
            <div class="row">
              <div class="col-sm-12">
                <div class="section_title bgblack">
                  <span>Follow Us</span>
                </div>
              </div>
              <div class="col-sm-12">
                <ul class="follow_bar">
                  <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                  <a href=""><i class="fa-brands fa-twitter"></i></a>
                  <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                  <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                  <a href=""><i class="fa-solid fa-rss"></i></a>
                  <a href=""><i class="fa-brands fa-skype"></i></a>
                </ul>
              </div>

              <div class="col-sm-12">
                <div class="section_title bgblack">
                  <span>BUSINESS</span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="popular_area">
                  <div class="thumb_medium_post">
                    <?php for($i=0; $i < (count($business_post)/5); $i++ ): ?>
                                <a href="<?= $business_post[$i]['all_business_post']['business_url']; ?>" class="thumb_medium_img"><img src="<?= $business_post[$i]['all_business_post']['business_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                                <div class="thumb_medium_post_overley">
                                    <a href="" class="post_cat">Entertainment</a>
                                    <a href="<?= $business_post[$i]['all_business_post']['business_url']; ?>" class="thumb_medium_post_title"><?= $business_post[$i]['all_business_post']['post_data']['title']; ?></a>
                                    <ul class="author_listing">
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                            <a href=""><?= $business_post[$i]['all_business_post']['post_data']['author'] ?></a>
                                        </li>
                                        <li>
                                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                            <span><?= date("d M, Y", strtotime($business_post[$i]['all_business_post']['post_data']['date_'])); ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <?php endfor; ?>
                  </div>
                  <ul class="thumb_listing">
                   <?php for($i=1; $i < count($business_post); $i++ ): ?>
                                <li>
                                    <a href="<?= $business_post[$i]['all_business_post']['business_url']; ?>" class="thumb_img"><img src="<?= $business_post[$i]['all_business_post']['business_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                                    <div class="thumb_content">
                                        <a href="<?= $business_post[$i]['all_business_post']['business_url']; ?>" class="thumb_title"><?= $business_post[$i]['all_business_post']['post_data']['title'];  ?></a>
                                        <ul class="author_listing no_pad">
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                                <a href=""><?= $business_post[$i]['all_business_post']['post_data']['author'] ?></a>
                                            </li>
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                                <span><?= date("d M, Y", strtotime($business_post[$i]['all_business_post']['post_data']['date_'])); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php endfor; ?>                 
                 
  
                  </ul>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="section_title bgblack">
                  <span>Health</span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="trending_slider owl-carousel">
                            <?php foreach($health_post as $post): ?>
                            <div class="trending_item">                                
                                <div class="thumb_medium_post">
                                    <a href="<?= $post['all_health']['health_url']; ?>" class="thumb_medium_img"><img src="<?= $post['all_health']['health_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                                    <div class="thumb_medium_post_overley">
                                        <a href="" class="post_cat">Health</a>
                                        <a href="<?= $post['all_health']['health_url']; ?>" class="thumb_medium_post_title"><?= $post['all_health']['post_data']['title']; ?></a>
                                        <ul class="author_listing">
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                                <a href=""><?= $post['all_health']['post_data']['author'] ?></a>
                                            </li>
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                                <span><?= date("d M, Y", strtotime($post['all_health']['post_data']['date_'])); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>                                
                            </div>
                            <?php endforeach; ?>
                        </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ========business sec close========= -->

    <!-- ========tech sec start============= -->
    <section class="tech_sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="section_title darkblue">
              <span>Technology</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-4">
              <?php for($i=0; $i < count($tech_post)/15; $i++ ): ?>
                <div class="thumb_medium_post">
                    <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_medium_img"><img src="<?= $tech_post[$i]['all_tech_post']['tech_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="thumb_medium_post_overley">
                        <a href="" class="post_cat">Technology</a>
                        <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_medium_post_title"><?= $tech_post[$i]['all_tech_post']['post_data']['title'];  ?></a>
                        <ul class="author_listing">
                            <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                <a href=""><?= $tech_post[$i]['all_tech_post']['post_data']['author'] ?></a>
                            </li>
                            <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span><?= date("d M, Y", strtotime($tech_post[$i]['all_tech_post']['post_data']['date_'])); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endfor; ?>
            <ul class="thumb_listing">
             <?php for($i=1; $i <= count($tech_post)/3; $i++ ): ?>
                    <li>
                        <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_img"><img src="<?= $tech_post[$i]['all_tech_post']['tech_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                        <div class="thumb_content">
                            <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_title"><?= $tech_post[$i]['all_tech_post']['post_data']['title']; ?></a>
                            <ul class="author_listing no_pad">
                                <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                    <a href=""><?= $tech_post[$i]['all_tech_post']['post_data']['author'] ?></a>
                                </li>
                                <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                    <span><?= date("d M, Y", strtotime($tech_post[$i]['all_tech_post']['post_data']['date_'])); ?></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php endfor; ?>
              
            </ul>
          </div>
          <div class="col-sm-6 col-lg-4">
            <?php for($i=count($tech_post)/3; $i < (count($tech_post)/3)+1; $i++ ): ?>
                <div class="thumb_medium_post">
                    <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_medium_img"><img src="<?= $tech_post[$i]['all_tech_post']['tech_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="thumb_medium_post_overley">
                        <a href="" class="post_cat">Technology</a>
                        <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_medium_post_title"><?= $tech_post[$i]['all_tech_post']['post_data']['title']; ?></a>
                        <ul class="author_listing">
                            <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                <a href=""><?= $tech_post[$i]['all_tech_post']['post_data']['author'] ?></a>
                            </li>
                            <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span><?= date("d M, Y", strtotime($tech_post[$i]['all_tech_post']['post_data']['date_']));  ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endfor; ?>
            <ul class="thumb_listing">
              <?php for($i=(count($tech_post)/3)+1; $i < (int)(count($tech_post)/2)+3; $i++ ): ?>
                    <li>
                        <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_img"><img src="<?= $tech_post[$i]['all_tech_post']['tech_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                        <div class="thumb_content">
                            <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_title"><?= $tech_post[$i]['all_tech_post']['post_data']['title']; ?></a>
                            <ul class="author_listing no_pad">
                                <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                    <a href=""><?= $tech_post[$i]['all_tech_post']['post_data']['author'] ?></a>
                                </li>
                                <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                    <span><?= date("d M, Y", strtotime($tech_post[$i]['all_tech_post']['post_data']['date_'])); ?></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php endfor; ?> 
          
            </ul>
          </div>
          <div class="col-sm-6 col-lg-4">
                <?php for($i=(int)(count($tech_post)/2)+3; $i < (int)(count($tech_post)/2)+4; $i++ ): ?>
                <div class="thumb_medium_post">
                    <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_medium_img"><img src="<?= $tech_post[$i]['all_tech_post']['tech_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="thumb_medium_post_overley">
                        <a href="" class="post_cat">Technology</a>
                        <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_medium_post_title"><?= $tech_post[$i]['all_tech_post']['post_data']['title']; ?></a>
                        <ul class="author_listing">
                            <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                <a href=""><?= $tech_post[$i]['all_tech_post']['post_data']['author'] ?></a>
                            </li>
                            <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span> <?= date("d M, Y", strtotime($tech_post[$i]['all_tech_post']['post_data']['date_'])); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endfor; ?>
            <ul class="thumb_listing">
              <?php for($i=(int)(count($tech_post)/2)+4; $i < count($tech_post); $i++ ): ?>
                    <li>
                        <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_img"><img src="<?= $tech_post[$i]['all_tech_post']['tech_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                        <div class="thumb_content">
                            <a href="<?= $tech_post[$i]['all_tech_post']['tech_url']; ?>" class="thumb_title"><?= $tech_post[$i]['all_tech_post']['post_data']['title']; ?></a>
                            <ul class="author_listing no_pad">
                                <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                    <a href=""><?= $tech_post[$i]['all_tech_post']['post_data']['author'] ?></a>
                                </li>
                                <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                    <span><?= date("d M, Y", strtotime($tech_post[$i]['all_tech_post']['post_data']['date_']));  ?></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php endfor; ?>

              

            

          
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- ========tech sec close============= -->


    <!-- ========view more start=========== -->
    <main class="viewmore_sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-sm-12">
            <div class="row">
              <div class="col-sm-12">
                <div class="section_title orangebg">
                  <span>Travel</span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="ver_post_slider owl-carousel">
                  <ul class="ver_post_listing">
                     <?php for($i=0; $i < (int)(count($travel_post)/3); $i++ ): ?>
                                <li class="ver_post_item">
                                    <a href="" class="post_cat">Travel</a>
                                    <a href="<?= $travel_post[$i]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?= $travel_post[$i]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                                    <div class="ver_post_info">
                                        <a href="<?= $travel_post[$i]['all_travel']['travel_url']; ?>" class="ver_post_title1"><?= $travel_post[$i]['all_travel']['post_data']['title']; ?></a>
                                        <ul class="author_listing no_pad">
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                                <a href=""><?= $travel_post[$i]['all_travel']['post_data']['author'] ?></a>
                                            </li>
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                                <span><?= date("d M, Y", strtotime($travel_post[$i]['all_travel']['post_data']['date_'])) ?></span>
                                            </li>
                                        </ul>
                                        <p><?= $content = strip_tags(html_entity_decode($travel_post[$i]['all_travel']['post_data']['content']));
                                            $content = substr($content, 0, 700); ?> <?php print_r($content); ?></p>
                                    </div>
                                </li>
                                <?php endfor; ?>
                   
                  </ul>
                  <ul class="ver_post_listing">
                    <?php for($i=count($travel_post)/3; $i < (count($travel_post)/2)+2; $i++ ): ?>
                                <li class="ver_post_item">
                                    <a href="" class="post_cat">Travel</a>
                                    <a href="<?= $travel_post[$i]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?= $travel_post[$i]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                                    <div class="ver_post_info">
                                        <a href="<?= $travel_post[$i]['all_travel']['travel_url']; ?>" class="ver_post_title"><?= $travel_post[$i]['all_travel']['post_data']['title']; ?></a>
                                        <ul class="author_listing no_pad">
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                                <a href=""><?= $travel_post[$i]['all_travel']['post_data']['author'] ?></a>
                                            </li>
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                                <span><?= date("d M, Y", strtotime($travel_post[$i]['all_travel']['post_data']['date_'])) ?></span>
                                            </li>
                                        </ul>
                                        <p><?= $content = strip_tags(html_entity_decode($travel_post[$i]['all_travel']['post_data']['content']));
                                            $content = substr($content, 0, 700); ?> <?php print_r($content); ?></p>
                                    </div>
                                </li>
                               <?php endfor; ?>
                    
                  </ul>
                  <ul class="ver_post_listing">
                     <?php for($i=(count($travel_post)/2)+2; $i < count($travel_post); $i++ ): ?>
                                <li class="ver_post_item">
                                    <a href="" class="post_cat">Travel</a>
                                    <a href="<?= $travel_post[$i]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?= $travel_post[$i]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                                    <div class="ver_post_info">
                                        <a href="<?= $travel_post[$i]['all_travel']['travel_url']; ?>" class="ver_post_title"><?= $travel_post[$i]['all_travel']['post_data']['title']; ?></a>
                                        <ul class="author_listing no_pad">
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                                <a href=""><?= $travel_post[$i]['all_travel']['post_data']['author'] ?></a>
                                            </li>
                                            <li>
                                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                                <span><?= date("d M, Y", strtotime($travel_post[$i]['all_travel']['post_data']['date_'])) ?></span>
                                            </li>
                                        </ul>
                                        <p><?= $content = strip_tags(html_entity_decode($travel_post[$i]['all_travel']['post_data']['content']));
                                            $content = substr($content, 0, 700); ?> <?php print_r($content); ?></p>
                                    </div>
                                </li>
                                <?php endfor; ?>  
                   
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="section_title bgblack">
              <span>Science</span>
            </div>
            <ul class="thumb_listing review_listing">
              <?php foreach($science_post as $post): ?>
                    <li>
                        <a href="<?= $post['all_science']['science_url']; ?>" class="thumb_img"><img src="<?= $post['all_science']['science_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                        <div class="thumb_content">
                            <a href="<?= $post['all_science']['science_url']; ?>" class="thumb_title"><?= $post['all_science']['post_data']['title']; ?></a>
                            <div class="review_bar">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                <span><i class="fa-regular fa-star"></i></span>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>

              

            

          
            </ul>


            <div class="section_title bgblack">
              <span>Newsletter</span>
            </div>
            <div class="newsletter_area">
              <h4>Subscribe Newsletter!</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis architecto nemo.</p>
              <input type="text" class="form-control" placeholder="E-Mail Address">
              <button class="btn submitbtn" aria-label="">Submit</button>
            </div>

          </div>
        </div>
      </div>
    </main>
    <!-- ========view more close=========== -->

<?= $this->endSection() ?>



<?= $this->section('scriptLinks') ?>
   
<?= $this->endSection() ?>

    
<?= $this->section('addPost_2') ?>
   <?= view('dashboard/addPost_2') ?>
<?= $this->endSection() ?>


<?= $this->section('addPost_3') ?>
   <?= view('dashboard/addPost_3') ?>
<?= $this->endSection() ?>








