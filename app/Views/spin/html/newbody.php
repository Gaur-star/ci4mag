<!-- ==========banner start========== -->
<main class="banner_sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-sm-12">
            <div class="main_banner_slider owl-carousel">
              <div class="main_banner_item">
                <a href="<?= $posts[0]['fetch_post']['url'];?>" class="main_banner_img" title="">
                  <img src="<?php echo $posts[0]['fetch_post']['path']['url'];?>" alt="" onerror="myFunction(this)" loading="lazy">
                </a>
                <div class="main_banner_overley">
                  <a href="<?php echo $posts[0]['fetch_post']['url'];?>" class="hero_text"><h1><?php echo $posts[0]['title'];?></h1></a>
                  <ul class="author_listing">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php echo date("d M, Y", strtotime($posts[0]['date_']));?></span>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="main_banner_item">
                <a href="<?php echo $posts[1]['fetch_post']['url'];?>" class="main_banner_img" title="">
                  <img src="<?php echo $posts[1]['fetch_post']['path']['url'];?>" alt="" onerror="myFunction(this)" loading="lazy">
                </a>
                <div class="main_banner_overley">
                  <a href="<?php echo $posts[1]['fetch_post']['url'];?>" class="hero_text"><h1><?php echo $posts[1]['title'];?></h1></a>
                  <ul class="author_listing">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php echo date("d M, Y", strtotime($posts[1]['date_']));?></span>
                    </li>
                  </ul>
                </div>
              </div>
             
              <div class="main_banner_item">
                <a href="<?php echo $posts[2]['fetch_post']['url'];?>" class="main_banner_img" title="">
                  <img src="<?php echo $posts[2]['fetch_post']['path']['url'];?>" alt="" onerror="myFunction(this)" loading="lazy">
                </a>
                <div class="main_banner_overley">
                  <a href="<?php echo $posts[2]['fetch_post']['url'];?>" class="hero_text" title=""><h1><?php echo $posts[2]['title'];?></h1></a>
                  <ul class="author_listing">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php echo date("d M, Y", strtotime($posts[2]['date_']));?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-sm-12">
            <div class="row">
              <div class="col-sm-12">
                <div class="banner_big_post">
                  <a href="<?php echo $posts[3]['fetch_post']['url'];?>" class="banner_big_post_img" title=""><img src="<?php echo $posts[3]['fetch_post']['path']['url'];?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                  <div class="banner_big_post_oveley">
                    <a href="<?php echo $posts[3]['fetch_post']['url'];?>" class="banner_big_post_title" title=""><?php echo $posts[3]['title'];?></a>
                    <ul class="author_listing">
                      <li>
                        <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                        <span><?php echo date("d M, Y", strtotime($posts[3]['date_']));?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 first-6">
                <div class="banner_small_post">
                    <a href="<?php echo $posts[4]['fetch_post']['url'];?>" class="banner_small_img" title=""><img src="<?php echo $posts[4]['fetch_post']['path']['url'];?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="banner_small_post_oveley">
                      <a href="<?php echo $posts[4]['fetch_post']['url'];?>" class="banner_small_post_title"><?php echo $posts[4]['title'];?></a>
                      <ul class="author_listing">
                      </ul>
                    </div>
                </div>
              </div>
              <div class="col-sm-6 second-6">
                <div class="banner_small_post">
                    <a href="<?php echo $posts[5]['fetch_post']['url'];?>" class="banner_small_img" title=""><img src="<?php echo $posts[5]['fetch_post']['path']['url'];?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="banner_small_post_oveley">
                      <a href="<?php echo $posts[5]['fetch_post']['url'];?>" class="banner_small_post_title" title=""><?php echo $posts[5]['title'];?></a>
                      <ul class="author_listing">
                      </ul>
                    </div>
                </div>
              </div>
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
                  <div class="latest_news_column">
                    <div class="latest_news_item">
                      <a href="<?= $latest_news[0]['seo_url'];?>" class="latest_news_img" title=""><img src="<?= $latest_news[0]['url'];?>" alt="" onerror="myFunction(this)" loading="lazy" ></a>
                      <a href="<?= $latest_news[0]['seo_url'];?>" class="latest_news_title" title=""><?= $latest_news[0]['title'];?></a>
                      <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($latest_news[0]['date_']));?></span>
                        </li>
                      </ul>
                    </div>

                    <div class="latest_news_item">
                      <a href="<?= $latest_news[4]['seo_url'];?>" class="latest_news_img" title=""><img src="<?= $latest_news[4]['url'];?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <a href="<?= $latest_news[4]['seo_url'];?>" class="latest_news_title" title=""><?= $latest_news[4]['title'];?></a>
                      <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($latest_news[4]['date_']));?></span>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="latest_news_column">
                    <div class="latest_news_item">
                      <a href="<?= $latest_news[1]['seo_url'];?>" class="latest_news_img"><img src="<?= $latest_news[1]['url'];?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <a href="<?= $latest_news[1]['seo_url'];?>" class="latest_news_title"><?= $latest_news[1]['title'];?></a>
                      <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($latest_news[1]['date_']));?></span>
                        </li>
                      </ul>
                    </div>

                    <div class="latest_news_item">
                      <a href="<?= $latest_news[5]['seo_url'];?>" class="latest_news_img"><img src="<?= $latest_news[5]['url'];?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <a href="<?= $latest_news[5]['seo_url'];?>" class="latest_news_title"><?= $latest_news[5]['title'];?></a>
                      <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($latest_news[5]['date_']));?></span>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="latest_news_column">
                    <div class="latest_news_item">
                      <a href="<?= $latest_news[2]['seo_url'];?>" class="latest_news_img"><img src="<?= $latest_news[2]['url'];?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <a href="<?= $latest_news[2]['seo_url'];?>" class="latest_news_title"><?= $latest_news[2]['title'];?></a>
                      <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($latest_news[2]['date_']));?></span>
                        </li>
                      </ul>
                    </div>

                    <div class="latest_news_item">
                      <a href="<?= $latest_news[6]['seo_url'];?>" class="latest_news_img"><img src="<?= $latest_news[6]['url'];?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <a href="<?= $latest_news[6]['seo_url'];?>" class="latest_news_title"><?= $latest_news[6]['title'];?></a>
                      <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($latest_news[6]['date_']));?></span>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="latest_news_column">
                    <div class="latest_news_item">
                      <a href="<?= $latest_news[3]['seo_url'];?>" class="latest_news_img"><img src="<?= $latest_news[3]['url'];?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <a href="<?= $latest_news[3]['seo_url'];?>" class="latest_news_title"><?= $latest_news[3]['title'];?></a>
                      <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($latest_news[3]['date_']));?></span>
                        </li>
                      </ul>
                    </div>

                    <div class="latest_news_item">
                      <a href="<?= $latest_news[7]['seo_url'];?>" class="latest_news_img"><img src="<?= $latest_news[7]['url'];?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <a href="<?= $latest_news[7]['seo_url'];?>" class="latest_news_title"><?= $latest_news[7]['title'];?></a>
                      <ul class="author_listing">
                        </li>
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($latest_news[7]['date_']));?></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
    <!-- ==========latest news close===== -->


    <!-- =========ads sec=============== -->
    <section class="ads_sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a href="" class="ads_inner">
              <img src="<?=base_url('assets/images/ads_img.jpeg')?>" alt="" class="img-fluid">
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- =========ads sec=============== -->

    <!-- ========business sec start========= -->
    <main class="business_sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-8">
            <div class="row">
              <div class="col-sm-12">
                <div class="section_title bg_dblue">
                  <span>Business News</span>
                </div>
              </div>
              <div class="col-sm-12" style="position: relative;">
                <nav class="tab_filter">
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="item_card">
                          <a href="<?= $buisness_post[0]['all_buisness_post']['buisness_url'] ?>" class="item_img">
                            <img src="<?= $buisness_post[0]['all_buisness_post']['buisness_path'][0]['url'] ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy">
                          </a>
                          <a href="<?= $buisness_post[0]['all_buisness_post']['buisness_url'] ?>" class="item_title"><?= $buisness_post[0]['all_buisness_post']['post_data']['title'] ?></a>
                          <ul class="author_listing no_pad">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span><?php echo date("d M, Y", strtotime($buisness_post[0]['all_buisness_post']['post_data']['date_'])); ?></span>
                            </li>
                          </ul>
                          <p class="item_para"><?= $content = strip_tags(html_entity_decode($buisness_post[0]['all_buisness_post']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <ul class="thumb_listing">
                          <li>
                            <a href="<?= $buisness_post[1]['all_buisness_post']['buisness_url'] ?>" class="thumb_img"><img src="<?php echo $buisness_post[1]['all_buisness_post']['buisness_path'][0]['url'] ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                            <div class="thumb_content">
                              <a href="<?= $buisness_post[1]['all_buisness_post']['buisness_url'] ?>" class="thumb_title"><?php echo $buisness_post[1]['all_buisness_post']['post_data']['title'] ?></a>
                              <ul class="author_listing no_pad">
                                <li>
                                  <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                  <span><?php echo date("d M, Y", strtotime($buisness_post[1]['all_buisness_post']['post_data']['date_'])); ?></span>
                                </li>
                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="<?= $buisness_post[2]['all_buisness_post']['buisness_url'] ?>" class="thumb_img"><img src="<?php echo $buisness_post[2]['all_buisness_post']['buisness_path'][0]['url'] ?>" alt="" onerror="myFunction(this)"></a>
                            <div class="thumb_content">
                              <a href="<?= $buisness_post[2]['all_buisness_post']['buisness_url'] ?>" class="thumb_title"><?php echo $buisness_post[2]['all_buisness_post']['post_data']['title'] ?></a>
                              <ul class="author_listing no_pad">
                                <li>
                                  <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                  <span><?php echo date("d M, Y", strtotime($buisness_post[2]['all_buisness_post']['post_data']['date_'])); ?></span>
                                </li>
                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="<?= $buisness_post[3]['all_buisness_post']['buisness_url'] ?>" class="thumb_img"><img src="<?php echo $buisness_post[3]['all_buisness_post']['buisness_path'][0]['url'] ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                            <div class="thumb_content">
                              <a href="<?= $buisness_post[3]['all_buisness_post']['buisness_url'] ?>" class="thumb_title"><?php echo $buisness_post[3]['all_buisness_post']['post_data']['title'] ?></a>
                              <ul class="author_listing no_pad">
                                <li>
                                  <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                  <span><?php echo date("d M, Y", strtotime($buisness_post[3]['all_buisness_post']['post_data']['date_'])); ?></span>
                                </li>
                              </ul>
                            </div>
                          </li>

                          <li>
                            <a href="<?= $buisness_post[4]['all_buisness_post']['buisness_url'] ?>" class="thumb_img"><img src="<?php echo $buisness_post[4]['all_buisness_post']['buisness_path'][0]['url'] ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                            <div class="thumb_content">
                              <a href="<?= $buisness_post[4]['all_buisness_post']['buisness_url'] ?>" class="thumb_title"><?php echo $buisness_post[4]['all_buisness_post']['post_data']['title'] ?></a>
                              <ul class="author_listing no_pad">
                                <!-- <li>
                                  <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                  <a href="">John Wick</a>
                                </li> -->
                                <li>
                                  <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                  <span><?php echo date("d M, Y", strtotime($buisness_post[4]['all_buisness_post']['post_data']['date_']));  ?></span>
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
            <div class="row mt-50">
              <div class="col-sm-12">
                <div class="section_title bggreen">
                  <span>Software</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="thumb_medium_post">
                  <a href="<?php echo $software_post[0]['all_software']['software_url']; ?>" class="thumb_medium_img"><img src="<?php if($software_post[0]['all_software']['software_path'][0]['url']){echo $software_post[0]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                  <div class="thumb_medium_post_overley">
                    <a href="" class="post_cat">Software</a>
                    <a href="<?php echo $software_post[0]['all_software']['software_url']; ?>" class="thumb_medium_post_title"><?php echo $software_post[0]['all_software']['post_data']['title']; ?></a>
                    <ul class="author_listing">
                      <li>
                        <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                        <span><?php echo date("d M, Y", strtotime($software_post[0]['all_software']['post_data']['date_']));  ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
                <ul class="thumb_listing thumb_medium">
                  <li>
                      <a href="<?php echo $software_post[1]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?php if($software_post[1]['all_software']['software_path'][0]['url']){echo $software_post[1]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="thumb_content">
                        <a href="<?php echo $software_post[1]['all_software']['software_url']; ?>" class="thumb_title"><?php echo $software_post[1]['all_software']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($software_post[1]['all_software']['post_data']['date_']));  ?></span>
                          </li>
                        </ul>
                      </div>
                  </li>

                  <li>
                    <a href="<?php echo $software_post[2]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?php if($software_post[2]['all_software']['software_path'][0]['url']){echo $software_post[2]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="thumb_content">
                      <a href="<?php echo $software_post[2]['all_software']['software_url']; ?>" class="thumb_title"><?php echo $software_post[2]['all_software']['post_data']['title']; ?></a>
                      <ul class="author_listing no_pad">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($software_post[2]['all_software']['post_data']['date_']));  ?></span>
                        </li>
                      </ul>
                    </div>
                </li>

                <li>
                  <a href="<?php echo $software_post[3]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?php if($software_post[3]['all_software']['software_path'][0]['url']){echo $software_post[3]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                  <div class="thumb_content">
                    <a href="<?php echo $software_post[3]['all_software']['software_url']; ?>" class="thumb_title"><?php echo $software_post[3]['all_software']['post_data']['title']; ?></a>
                    <ul class="author_listing no_pad">
                      <li>
                        <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                        <span><?php echo date("d M, Y", strtotime($software_post[3]['all_software']['post_data']['date_']));  ?></span>
                      </li>
                    </ul>
                  </div>
              </li>

              <li>
                <a href="<?php echo $software_post[4]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?php if($software_post[4]['all_software']['software_path'][0]['url']){echo $software_post[4]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php echo $software_post[4]['all_software']['software_url']; ?>" class="thumb_title"><?php echo $software_post[4]['all_software']['post_data']['title']; ?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php echo date("d M, Y", strtotime($software_post[4]['all_software']['post_data']['date_']));  ?></span>
                    </li>
                  </ul>
                </div>
            </li>
                </ul>
              </div>
              <div class="col-sm-6">
                <div class="thumb_medium_post">
                  <a href="<?php echo $software_post[5]['all_software']['software_url']; ?>" class="thumb_medium_img"><img src="<?php if($software_post[5]['all_software']['software_path'][0]['url']){echo $software_post[5]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                  <div class="thumb_medium_post_overley">
                    <a href="" class="post_cat">Software</a>
                    <a href="<?php echo $software_post[5]['all_software']['software_url']; ?>" class="thumb_medium_post_title"><?php echo $software_post[5]['all_software']['post_data']['title']; ?></a>
                    <ul class="author_listing">
                      <li>
                        <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                        <span><?php echo date("d M, Y", strtotime($software_post[5]['all_software']['post_data']['date_']));  ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
                <ul class="thumb_listing thumb_medium">
                  <li>
                      <a href="<?php echo $software_post[6]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?php if($software_post[6]['all_software']['software_path'][0]['url']){echo $software_post[6]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="thumb_content">
                        <a href="<?php echo $software_post[6]['all_software']['software_url']; ?>" class="thumb_title"><?php echo $software_post[6]['all_software']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($software_post[6]['all_software']['post_data']['date_']));  ?></span>
                          </li>
                        </ul>
                      </div>
                  </li>

                  <li>
                    <a href="<?php echo $software_post[7]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?php if($software_post[7]['all_software']['software_path'][0]['url']){echo $software_post[7]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="thumb_content">
                      <a href="<?php echo $software_post[7]['all_software']['software_url']; ?>" class="thumb_title"><?php echo $software_post[7]['all_software']['post_data']['title']; ?></a>
                      <ul class="author_listing no_pad">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php echo date("d M, Y", strtotime($software_post[7]['all_software']['post_data']['date_']));  ?></span>
                        </li>
                      </ul>
                    </div>
                </li>

                <li>
                  <a href="<?php echo $software_post[8]['all_software']['software_url']; ?>" class="thumb_img"><img src="<?php if($software_post[8]['all_software']['software_path'][0]['url']){echo $software_post[8]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                  <div class="thumb_content">
                    <a href="<?php echo $software_post[8]['all_software']['software_url']; ?>" class="thumb_title"><?php echo $software_post[8]['all_software']['post_data']['title']; ?></a>
                    <ul class="author_listing no_pad">
                      <li>
                        <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                        <span><?php echo date("d M, Y", strtotime($software_post[8]['all_software']['post_data']['date_']));  ?></span>
                      </li>
                    </ul>
                  </div>
              </li>

              <li>
                  <a href="<?php echo $software_post[9]['all_software']['software_url'];?>" class="thumb_img"><img src="<?php if($software_post[9]['all_software']['software_path'][0]['url']){echo $software_post[9]['all_software']['software_path'][0]['url']; }else{echo $settings[12]['setting_value'];}?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php echo $software_post[9]['all_software']['software_url']; ?>" class="thumb_title"><?php echo $software_post[9]['all_software']['post_data']['title']; ?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php echo date("d M, Y", strtotime($software_post[9]['all_software']['post_data']['date_']));  ?></span>
                    </li>
                  </ul>
                </div>
            </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-lg-4 right_bar">
            <div class="row">
              <!-- <div class="col-sm-12">
                <div class="section_title bgblack">
                  <span>Follow Us</span>
                </div>
              </div> -->
              <!-- <div class="col-sm-12">
                <ul class="follow_bar">
                  <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                  <a href=""><i class="fa-brands fa-twitter"></i></a>
                  <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                  <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                  <a href=""><i class="fa-solid fa-rss"></i></a>
                  <a href=""><i class="fa-brands fa-skype"></i></a>
                </ul>
              </div> -->

              <div class="col-sm-12">
                <div class="section_title bgblack">
                  <span>Entertainment</span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="popular_area">
                  <div class="thumb_medium_post">
                    <a href="<?php if($entertainment_post[0]['all_entertainment']['post_data']){echo $entertainment_post[0]['all_entertainment']['entertainment_url']; }?>" class="thumb_medium_img"><img src="<?php if($entertainment_post[0]['all_entertainment']['post_data']){ echo $entertainment_post[0]['all_entertainment']['entertainment_path'][0]['url']; }?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="thumb_medium_post_overley">
                      <a href="" class="post_cat">Entertainment</a>
                      <a href="<?php if($entertainment_post[0]['all_entertainment']['post_data']){echo $entertainment_post[0]['all_entertainment']['entertainment_url']; }?>" class="thumb_medium_post_title"><?php if($entertainment_post[0]['all_entertainment']['post_data']){ echo $entertainment_post[0]['all_entertainment']['post_data']['title']; }?></a>
                      <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php if($entertainment_post[0]['all_entertainment']['post_data']){ echo date("d M, Y", strtotime($entertainment_post[0]['all_entertainment']['post_data']['date_']));  }?></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <ul class="thumb_listing">
                    <li>
                        <a href="<?php if($entertainment_post[1]['all_entertainment']['post_data']){ echo $entertainment_post[1]['all_entertainment']['entertainment_url']; ?>" class="thumb_img"><img src="<?php echo $entertainment_post[1]['all_entertainment']['entertainment_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                        <div class="thumb_content">
                          <a href="<?php if($entertainment_post[1]['all_entertainment']['post_data']){echo $entertainment_post[1]['all_entertainment']['entertainment_url']; ?>" class="thumb_title"><?php echo $entertainment_post[1]['all_entertainment']['post_data']['title']; }?></a>
                          <ul class="author_listing no_pad">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span><?php if($entertainment_post[1]['all_entertainment']['post_data']){ echo date("d M, Y", strtotime($entertainment_post[1]['all_entertainment']['post_data']['date_']));  }?></span>
                            </li>
                          </ul>
                        </div>
                    </li>
  
                    <li>
                      <a href="<?php if($entertainment_post[2]['all_entertainment']['post_data']){echo $entertainment_post[2]['all_entertainment']['entertainment_url']; }?>" class="thumb_img"><img src="<?php if($entertainment_post[2]['all_entertainment']['post_data']){ echo $entertainment_post[2]['all_entertainment']['entertainment_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="thumb_content">
                        <a href="<?php if($entertainment_post[2]['all_entertainment']['post_data']){echo $entertainment_post[2]['all_entertainment']['entertainment_url']; }?>" class="thumb_title"><?php if($entertainment_post[0]['all_entertainment']['post_data']){echo $entertainment_post[2]['all_entertainment']['post_data']['title']; }?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php if($entertainment_post[2]['all_entertainment']['post_data']){echo date("d M, Y", strtotime($entertainment_post[2]['all_entertainment']['post_data']['date_']));  }?></span>
                          </li>
                        </ul>
                      </div>
                  </li>
  
                  <li>
                    <a href="<?php if($entertainment_post[3]['all_entertainment']['post_data']){ echo $entertainment_post[3]['all_entertainment']['entertainment_url']; }?>" class="thumb_img"><img src="<?php if($entertainment_post[3]['all_entertainment']['post_data']){ echo $entertainment_post[3]['all_entertainment']['entertainment_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                    <div class="thumb_content">
                      <a href="<?php if($entertainment_post[3]['all_entertainment']['post_data']){echo $entertainment_post[4]['all_entertainment']['entertainment_url']; }?>" class="thumb_title"><?php if($entertainment_post[0]['all_entertainment']['post_data']){echo $entertainment_post[3]['all_entertainment']['post_data']['title']; }?></a>
                      <ul class="author_listing no_pad">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?php if($entertainment_post[3]['all_entertainment']['post_data']){echo date("d M, Y", strtotime($entertainment_post[3]['all_entertainment']['post_data']['date_']));  }?></span>
                        </li>
                      </ul>
                    </div>
                </li>
  
                <li>
                  <a href="<?php if($entertainment_post[4]['all_entertainment']['post_data']){echo $entertainment_post[4]['all_entertainment']['entertainment_url']; }?>" class="thumb_img"><img src="<?php if($entertainment_post[4]['all_entertainment']['post_data']){echo $entertainment_post[4]['all_entertainment']['entertainment_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                  <div class="thumb_content">
                    <a href="<?php if($entertainment_post[4]['all_entertainment']['post_data']){echo $entertainment_post[4]['all_entertainment']['entertainment_url']; }?>" class="thumb_title"><?php if($entertainment_post[4]['all_entertainment']['post_data']){echo $entertainment_post[4]['all_entertainment']['post_data']['title']; }?></a>
                    <ul class="author_listing no_pad">
                      <li>
                        <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                        <span><?php if($entertainment_post[4]['all_entertainment']['post_data']){echo date("d M, Y", strtotime($entertainment_post[5]['all_entertainment']['post_data']['date_']));  }?></span>
                      </li>
                    </ul>
                  </div>
              </li>
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
                  <div class="trending_item">
                    <div class="thumb_medium_post">
                      <a href="<?php echo $health_post[0]['all_health']['health_url']; ?>" class="thumb_medium_img"><img src="<?php echo $health_post[0]['all_health']['health_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="thumb_medium_post_overley">
                        <a href="" class="post_cat">Health</a>
                        <a href="<?php echo $health_post[0]['all_health']['health_url']; ?>" class="thumb_medium_post_title"><?php echo $health_post[6]['all_health']['post_data']['title']; ?></a>
                        <ul class="author_listing">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($health_post[6]['all_health']['post_data']['date_']));  ?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="trending_item">
                    <div class="thumb_medium_post">
                      <a href="<?php echo $health_post[1]['all_health']['health_url']; ?>" class="thumb_medium_img"><img src="<?php echo $health_post[7]['all_health']['health_path'][0]['url']; ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="thumb_medium_post_overley">
                        <a href="" class="post_cat">Health</a>
                        <a href="<?php echo $health_post[1]['all_health']['health_url']; ?>" class="thumb_medium_post_title"><?php echo $health_post[7]['all_health']['post_data']['title']; ?></a>
                        <ul class="author_listing">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($health_post[7]['all_health']['post_data']['date_']));  ?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
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
        <?php if($tech_post){?>
        <div class="row">
          <div class="col-sm-6 col-lg-4">

            <div class="thumb_medium_post">
              <a href="<?php if($tech_post[0]['all_tech_post']['post_data']) {echo $tech_post[0]['all_tech_post']['tech_url'];} ?>" class="thumb_medium_img"><img src="<?php if($tech_post[0]['all_tech_post']['post_data']) {echo $tech_post[0]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
              <div class="thumb_medium_post_overley">
                <a href="" class="post_cat">Technology</a>
                <a href="<?php if($tech_post[0]['all_tech_post']['post_data']) { echo $tech_post[0]['all_tech_post']['tech_url']; } ?>" class="thumb_medium_post_title"><?php if($tech_post[0]['all_tech_post']['post_data']) {echo $tech_post[0]['all_tech_post']['post_data']['title']; }?></a>
                <ul class="author_listing">
                  <li>
                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                    <span><?php if($tech_post[0]['all_tech_post']['post_data']) {echo date("d M, Y", strtotime($tech_post[0]['all_tech_post']['post_data']['date_']));  }?></span>
                  </li>
                </ul>
              </div>
            </div>

            <ul class="thumb_listing">
              <li>
                <a href="<?php if($tech_post[1]['all_tech_post']['post_data']) {echo $tech_post[1]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[1]['all_tech_post']['post_data']) {echo $tech_post[1]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[1]['all_tech_post']['post_data']) {echo $tech_post[1]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[1]['all_tech_post']['post_data']) {echo $tech_post[1]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[1]['all_tech_post']['post_data']) {echo date("d M, Y", strtotime($tech_post[1]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[2]['all_tech_post']['post_data']){echo $tech_post[2]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[2]['all_tech_post']['post_data']){echo $tech_post[2]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[2]['all_tech_post']['post_data']){echo $tech_post[2]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[2]['all_tech_post']['post_data']){echo $tech_post[2]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[2]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[2]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[3]['all_tech_post']['post_data']){echo $tech_post[3]['all_tech_post']['tech_url'];}?>" class="thumb_img"><img src="<?php if($tech_post[3]['all_tech_post']['post_data']){echo $tech_post[3]['all_tech_post']['tech_path'][0]['url'];} ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[3]['all_tech_post']['post_data']){echo $tech_post[3]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[3]['all_tech_post']['post_data']){echo $tech_post[3]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[3]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[3]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[4]['all_tech_post']['post_data']){echo $tech_post[4]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[4]['all_tech_post']['post_data']){echo $tech_post[4]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[4]['all_tech_post']['post_data']){echo $tech_post[4]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[4]['all_tech_post']['post_data']){echo $tech_post[4]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[4]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[4]['all_tech_post']['post_data']['date_'])); } ?></span>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="thumb_medium_post">
              <a href="<?php if($tech_post[5]['all_tech_post']['post_data']){echo $tech_post[5]['all_tech_post']['tech_url']; }?>" class="thumb_medium_img"><img src="<?php if($tech_post[5]['all_tech_post']['post_data']){echo $tech_post[5]['all_tech_post']['tech_path'][0]['url'];} ?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
              <div class="thumb_medium_post_overley">
                <a href="" class="post_cat">Technology</a>
                <a href="<?php if($tech_post[5]['all_tech_post']['post_data']){echo $tech_post[5]['all_tech_post']['tech_url']; }?>" class="thumb_medium_post_title"><?php if($tech_post[5]['all_tech_post']['post_data']){echo $tech_post[5]['all_tech_post']['post_data']['title']; }?></a>
                <ul class="author_listing">
                  <li>
                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                    <span><?php if($tech_post[5]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[5]['all_tech_post']['post_data']['date_']));  }?></span>
                  </li>
                </ul>
              </div>
            </div>

            <ul class="thumb_listing">

              <li>
                <a href="<?php if($tech_post[6]['all_tech_post']['post_data']){echo $tech_post[6]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[6]['all_tech_post']['post_data']){echo $tech_post[6]['all_tech_post']['tech_path'][0]['url'];} ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[6]['all_tech_post']['post_data']){echo $tech_post[6]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[6]['all_tech_post']['post_data']){echo $tech_post[6]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[6]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[6]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[7]['all_tech_post']['post_data']){echo $tech_post[7]['all_tech_post']['tech_url'];} ?>" class="thumb_img"><img src="<?php if($tech_post[7]['all_tech_post']['post_data']){echo $tech_post[7]['all_tech_post']['tech_path'][0]['url'];} ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[7]['all_tech_post']['post_data']){echo $tech_post[7]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[7]['all_tech_post']['post_data']){echo $tech_post[7]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[7]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[7]['all_tech_post']['post_data']['date_'])); } ?></span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[8]['all_tech_post']['post_data']){echo $tech_post[8]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[8]['all_tech_post']['post_data']){echo $tech_post[8]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[8]['all_tech_post']['post_data']){echo $tech_post[8]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[8]['all_tech_post']['post_data']){echo $tech_post[8]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[8]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[8]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[9]['all_tech_post']['post_data']){echo $tech_post[9]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[9]['all_tech_post']['post_data']){echo $tech_post[9]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[9]['all_tech_post']['post_data']){echo $tech_post[9]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[9]['all_tech_post']['post_data']){echo $tech_post[9]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[9]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[9]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

            </ul>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="thumb_medium_post">
              <a href="<?php if($tech_post[10]['all_tech_post']['post_data']){echo $tech_post[10]['all_tech_post']['tech_url']; }?>" class="thumb_medium_img"><img src="<?php if($tech_post[10]['all_tech_post']['post_data']){echo $tech_post[10]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" class="img-fluid" onerror="myFunction(this)" loading="lazy"></a>
              <div class="thumb_medium_post_overley">
                <a href="" class="post_cat">Technology</a>
                <a href="<?php if($tech_post[10]['all_tech_post']['post_data']){echo $tech_post[10]['all_tech_post']['tech_url']; }?>" class="thumb_medium_post_title"><?php if($tech_post[10]['all_tech_post']['post_data']){echo $tech_post[10]['all_tech_post']['post_data']['title']; }?></a>
                <ul class="author_listing">
                  <li>
                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                    <span> <?php if($tech_post[10]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[10]['all_tech_post']['post_data']['date_']));  }?></span>
                  </li>
                </ul>
              </div>
            </div>

            <ul class="thumb_listing">

              <li>
                <a href="<?php if($tech_post[11]['all_tech_post']['post_data']){echo $tech_post[11]['all_tech_post']['tech_url']; ?>" class="thumb_img"><img src="<?php echo $tech_post[11]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[11]['all_tech_post']['post_data']){echo $tech_post[11]['all_tech_post']['tech_url']; ?>" class="thumb_title"><?php echo $tech_post[11]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[11]['all_tech_post']['post_data']){ echo date("d M, Y", strtotime($tech_post[11]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[12]['all_tech_post']['post_data']){echo $tech_post[12]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[12]['all_tech_post']['post_data']){echo $tech_post[12]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[12]['all_tech_post']['post_data']){echo $tech_post[12]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[12]['all_tech_post']['post_data']){echo $tech_post[12]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[12]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[12]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[13]['all_tech_post']['post_data']){echo $tech_post[13]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[13]['all_tech_post']['post_data']){echo $tech_post[13]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[13]['all_tech_post']['post_data']){echo $tech_post[13]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[13]['all_tech_post']['post_data']){echo $tech_post[13]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[13]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[13]['all_tech_post']['post_data']['date_']));  }?><span>
                    </li>
                  </ul>
                </div>
              </li>

              <li>
                <a href="<?php if($tech_post[14]['all_tech_post']['post_data']){echo $tech_post[14]['all_tech_post']['tech_url']; }?>" class="thumb_img"><img src="<?php if($tech_post[14]['all_tech_post']['post_data']){echo $tech_post[14]['all_tech_post']['tech_path'][0]['url']; }?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?php if($tech_post[14]['all_tech_post']['post_data']){echo $tech_post[14]['all_tech_post']['tech_url']; }?>" class="thumb_title"><?php if($tech_post[14]['all_tech_post']['post_data']){echo $tech_post[14]['all_tech_post']['post_data']['title']; }?></a>
                  <ul class="author_listing no_pad">
                    <li>
                      <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                      <span><?php if($tech_post[14]['all_tech_post']['post_data']){echo date("d M, Y", strtotime($tech_post[14]['all_tech_post']['post_data']['date_']));  }?></span>
                    </li>
                  </ul>
                </div>
              </li>

            </ul>

          </div>
        </div>
      <?php } ?>
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
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[0]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[0]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[0]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[0]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[0]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[0]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[1]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[1]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[1]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[1]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span> <?php echo date("d M, Y", strtotime($travel_post[1]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[1]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[0]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[2]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[0]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[2]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[2]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[2]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[3]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[3]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[3]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[3]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[3]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[3]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                  </ul>
                  <ul class="ver_post_listing">
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[4]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[4]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[4]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[4]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[4]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[4]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[5]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[5]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[5]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[5]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[5]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[5]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[6]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[6]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[6]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[6]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[6]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[6]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[7]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[7]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[7]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[7]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[7]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[7]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                  </ul>
                  <ul class="ver_post_listing">
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[8]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[8]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[8]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[8]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[8]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[8]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[9]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[9]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[9]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[9]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[9]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[9]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[10]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[10]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[10]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[10]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[10]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[10]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                    <li class="ver_post_item">
                      <a href="" class="post_cat">Travel</a>
                      <a href="<?php echo $travel_post[11]['all_travel']['travel_url']; ?>" class="var_post_img"><img src="<?php echo $travel_post[11]['all_travel']['travel_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                      <div class="ver_post_info">
                        <a href="<?php echo $travel_post[11]['all_travel']['travel_url']; ?>" class="ver_post_title"><?php echo $travel_post[11]['all_travel']['post_data']['title']; ?></a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span><?php echo date("d M, Y", strtotime($travel_post[11]['all_travel']['post_data']['date_']))?></span>
                          </li>
                        </ul>
                        <p><?= $content = strip_tags(html_entity_decode($travel_post[11]['all_travel']['post_data']['content']));
                                $content = substr($content, 0, 700); ?> <?php print_r($content);?></p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-lg-4 col-sm-12">
          <?php if($science_post){ ?>
            <div class="section_title bgblack">
              <span>Science</span>
            </div>
            <ul class="thumb_listing review_listing">
            <?php foreach($science_post as $sc) { ?>
              <li>
                <a href="<?= $sc['all_science']['science_url']; ?>" class="thumb_img"><img src="<?= $sc['all_science']['science_path'][0]['url']; ?>" alt="" onerror="myFunction(this)" loading="lazy"></a>
                <div class="thumb_content">
                  <a href="<?= $sc['all_science']['science_url']; ?>" class="thumb_title"><?= $sc['all_science']['post_data']['title']; ?></a>
                  <ul class="author_listing no_pad">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span><?= date("d M, Y", strtotime($sc['all_science']['post_data']['date_']));?></span>
                        </li>
                      </ul>
                </div>
              </li>
              <?php } ?>                  
            </ul>
            <?php } ?>

            <?php if($popular){ ?>

            <div class="section_title bgblack">
              <span>Popular News</span>
            </div>
            <div class="col-sm-12">
              <div class="popular_area">
                <ul class="thumb_listing">
                  <?php foreach($popular as $pop) { ?>
                  <li>
                  <a href="<?= $pop['seo_url'];?>" class="thumb_img"><img src="<?= $pop['media_url'];?>" onerror="myFunction(this)" alt=""></a>
                    <div class="thumb_content">
                    <a href="<?= $pop['seo_url'];?>" class="thumb_title"><?= $pop['title'];?></a>
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
    </main>
    <!-- ========view more close=========== -->

        <!-- =========ads sec=============== -->
        <section class="ads_sec">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <a href="" class="ads_inner">
                  <img src="<?= base_url('assets/images/ads_img.jpeg')?>" alt="" class="img-fluid">
                </a>
              </div>
            </div>
          </div>
        </section>
        <!-- =========ads sec=============== -->
