

<?= $this->extend('dashboard/main')  ?>


<?= $this->section('cssLinks') ?>

<?= $this->endSection() ?>

<?= $this->section('content_first_half') ?>

          <!-- =========breadcumb start======== -->
    <main class="breadcumb_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="breadcrumb_area">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Single Post</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </main>

    <!-- ========single post sec start===== -->
    <main class="single_post_sec">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-8">
                <div class="single_post_item">
                    <a href="" class="post_cat">Health</a>
                    <h2>Lorem Ipsum is simply dummy text of the printing and type setting industry simply dummy text type.</h2>
                    <ul class="author_listing">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                          <a href="">John Wick</a>
                        </li>
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span> 20 Jan, 2022</span>
                        </li>
                        <li>
                            <div class="author_listing_icon"><i class="fa-regular fa-eye"></i></div>
                            <span> 21</span>
                        </li>
                        <li>
                            <div class="author_listing_icon"><i class="fa-regular fa-comments"></i></div>
                            <a href="">01</a>
                          </li>
                      </ul>
                      <figure class="single_post_img">
                        <img src="images/banner1.jpeg" alt="" class="img-fluid">
                      </figure>
                      <div class="single_post_content">
                        <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                      <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                      <blockquote>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</blockquote>

                        <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                        <ul class="list-round mr_bottom-20">
                            <li>Lorem Ipsum is simply dummy text of the printing.</li>
                            <li>Lorem Ipsum is simply dummy text of the printing.</li>
                            <li>Lorem Ipsum is simply dummy text of the printing.</li>
                            <li>Lorem Ipsum is simply dummy text of the printing.</li>
                        </ul>
                      </div>

                      <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                      <div class="tags_btns">
                        <span>Tags:</span>
                        <a href="" class="btn tag_btn"># Business</a>
                        <a href="" class="btn tag_btn"># Corporate</a>
                        <a href="" class="btn tag_btn"># Services</a>
                        <a href="" class="btn tag_btn"># Customer</a>
                      </div>

                      <div class="share_social">
                        <a href="#" class="share_social_btn facebook"> <i class="fa-brands fa-facebook-f"></i> <span class="ts-social-title">Facebook</span></a>
                        <a href="#" class="share_social_btn twitter"> <i class="fa-brands fa-twitter"></i> <span class="ts-social-title">Twitter</span></a>
                        <a href="#" class="share_social_btn gplus"> <i class="fa-brands fa-google-plus-g"></i> <span class="ts-social-title">Google +</span></a>
                        <a href="#" class="share_social_btn pinterest"> <i class="fa-brands fa-pinterest"></i> <span class="ts-social-title">Pinterest</span></a>
                      </div>
                      <div class="post-navigation">
                        <div class="post_item">
                            <a href="">
                                <span><i class="fa-solid fa-chevron-left"></i>Previous Post</span>
                                <b>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever</b>
                            </a>
                        </div>
                        <div class="post_item align-right">
                            <a href="">
                                <span>Next Post <i class="fa-solid fa-angle-right"></i></span>
                                <b>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever</b>
                            </a>
                        </div>
                      </div>
                      <div class="author_area">
                        <div class="author_info">
                          <div class="author_img"><img src="images/gadget4.jpeg" alt=""></div>
                          <span>Miss Lisa Doe</span>
                        </div>
                        <div class="author_details">
                          <b>Miss Lisa Doe</b>
                          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum officia quas sed sunt officiis corporis quaerat distinctio obcaecati eligendi necessitatibus, aliquid enim. Provident corrupti repellat doloribus dignissimos consectetur quaerat adipisci.</p>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="section_title bgblack">
                            <span>Related Posts</span>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="related_slider owl-carousel">
                            <div class="latest_news_column">
                              <div class="latest_news_item">
                                <a href="" class="latest_news_img" title=""><img src="images/banner1.jpeg" alt=""></a>
                                <a href="" class="latest_news_title" title="">Zhang social media pop also known when smart innocent...</a>
                                <ul class="author_listing">
                                  <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                    <span> 20 Jan, 2022</span>
                                  </li>
                                </ul>
                                <a href="" class="post_cat" title="">gadget</a>
                              </div>
                            </div>
              
                            <div class="latest_news_column">
                              <div class="latest_news_item">
                                <a href="" class="latest_news_img"><img src="images/banner2.jpeg" alt=""></a>
                                <a href="" class="latest_news_title">Zhang social media pop also known when smart innocent...</a>
                                <ul class="author_listing">
                                  <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                    <span> 20 Jan, 2022</span>
                                  </li>
                                </ul>
                                <a href="" class="post_cat">gadget</a>
                              </div>
                            </div>
              
                            <div class="latest_news_column">
                              <div class="latest_news_item">
                                <a href="" class="latest_news_img"><img src="images/travel2.jpeg" alt=""></a>
                                <a href="" class="latest_news_title">Zhang social media pop also known when smart innocent...</a>
                                <ul class="author_listing">
                                  <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                    <span> 20 Jan, 2022</span>
                                  </li>
                                </ul>
                                <a href="" class="post_cat">gadget</a>
                              </div>
                            </div>
              
                            <div class="latest_news_column">
                             <div class="latest_news_item">
                                <a href="" class="latest_news_img"><img src="images/banner2.jpeg" alt=""></a>
                                <a href="" class="latest_news_title">Zhang social media pop also known when smart innocent...</a>
                                <ul class="author_listing">
                                  <li>
                                    <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                    <span> 20 Jan, 2022</span>
                                  </li>
                                </ul>
                                <a href="" class="post_cat">gadget</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="section_title bgblack">
                            <span>Comments</span>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <ul class="comments_listing">
                            <li>
                              <div class="commment_item">
                                <div class="comment_img"><img src="images/gadget4.jpeg" alt=""></div>
                                <div class="comment_info">
                                  <div class="comment_title"><b>Miss Lisa Doe</b> <span>15 Jan, 2022</span></div>
                                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam rem architecto pariatur aperiam molestias, quisquam explicabo doloremque a consequuntur repudiandae eligendi excepturi labore ea aspernatur iusto tempore? Tempore, assumenda qui!</p>
                                  <button class="btn reply_btn"><i class="fa-solid fa-share"></i> reply</button>
                                </div>
                              </div>
                              <div class="commment_item reply_comment">
                                <div class="comment_img"><img src="images/ad-banner.png" alt=""></div>
                                <div class="comment_info">
                                  <div class="comment_title"><b>Miss Lisa Doe</b> <span>15 Jan, 2022</span></div>
                                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam rem architecto pariatur aperiam molestias, quisquam explicabo doloremque a consequuntur repudiandae eligendi excepturi labore ea aspernatur iusto tempore? Tempore, assumenda qui!</p>
                                  <button class="btn reply_btn"><i class="fa-solid fa-share"></i> reply</button>
                                </div>
                              </div>
                            </li>

                            <li>
                              <div class="commment_item">
                                <div class="comment_img"><img src="images/banner1.jpeg" alt=""></div>
                                <div class="comment_info">
                                  <div class="comment_title"><b>Miss Lisa Doe</b> <span>15 Jan, 2022</span></div>
                                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam rem architecto pariatur aperiam molestias, quisquam explicabo doloremque a consequuntur repudiandae eligendi excepturi labore ea aspernatur iusto tempore? Tempore, assumenda qui!</p>
                                  <button class="btn reply_btn"><i class="fa-solid fa-share"></i> reply</button>
                                </div>
                              </div>
                              <div class="commment_item reply_comment">
                                <div class="comment_img"><img src="images/banner2.jpeg" alt=""></div>
                                <div class="comment_info">
                                  <div class="comment_title"><b>Miss Lisa Doe</b> <span>15 Jan, 2022</span></div>
                                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam rem architecto pariatur aperiam molestias, quisquam explicabo doloremque a consequuntur repudiandae eligendi excepturi labore ea aspernatur iusto tempore? Tempore, assumenda qui!</p>
                                  <button class="btn reply_btn"><i class="fa-solid fa-share"></i> reply</button>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <b class="Leave_cmnt_title">Leave a comment</b>
                          <form class="comment_form">
                            <div class="row">
                              <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Name">
                              </div>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Email">
                              </div>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Phone">
                              </div>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Subject">
                              </div>
                              <div class="col-sm-12">
                                <textarea class="form-control required-field" id="message" placeholder="Comment" rows="6" required=""></textarea>
                              </div>
                              <div class="col-sm-12">
                                <button class="btn form-control post_btn">Post Comment</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                </div>
              </div>


<?= $this->endSection() ?>

<?= $this->section('content_second_half') ?>                                    
           
     <div class="col-sm-12 col-lg-4 right_bar">
              <div class="row">
                <div class="col-sm-12">
                  <div class="section_title bgblack">
                    <span>Follow Us</span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="follow_bar">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href=""><i class="fa-solid fa-rss"></i></a>
                    <a href=""><i class="fa-brands fa-skype"></i></a>
                  </div>
                </div>
  
                <div class="col-sm-12">
                  <div class="section_title bgblack">
                    <span>Popular news</span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="popular_area">
                    <div class="thumb_medium_post">
                      <a href="" class="thumb_medium_img"><img src="images/banner1.jpeg" alt="" class="img-fluid"></a>
                      <div class="thumb_medium_post_overley">
                        <a href="" class="post_cat">Health</a>
                        <a href="" class="thumb_medium_post_title">Zhang social media pop also known when smart innocent</a>
                        <ul class="author_listing">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                            <a href="">John Wick</a>
                          </li>
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span> 20 Jan, 2022</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <ul class="thumb_listing">
                      <li>
                          <a href="" class="thumb_img"><img src="images/banner1.jpeg" alt=""></a>
                          <div class="thumb_content">
                            <a href="" class="thumb_title">Zhang social media pop also known when smart innocent Zhang social media pop also known when smart innocent</a>
                            <ul class="author_listing no_pad">
                              <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                                <a href="">John Wick</a>
                              </li>
                              <li>
                                <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                                <span> 20 Jan, 2022</span>
                              </li>
                            </ul>
                          </div>
                      </li>
    
                      <li>
                        <a href="" class="thumb_img"><img src="images/health1.jpeg" alt=""></a>
                        <div class="thumb_content">
                          <a href="" class="thumb_title">Zhang social media pop also known when smart innocent Zhang social media pop also known when smart innocent</a>
                          <ul class="author_listing no_pad">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                              <a href="">John Wick</a>
                            </li>
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span> 20 Jan, 2022</span>
                            </li>
                          </ul>
                        </div>
                    </li>
    
                    <li>
                      <a href="" class="thumb_img"><img src="images/gadget4.jpeg" alt=""></a>
                      <div class="thumb_content">
                        <a href="" class="thumb_title">Zhang social media pop also known when smart innocent Zhang social media pop also known when smart innocent</a>
                        <ul class="author_listing no_pad">
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                            <a href="">John Wick</a>
                          </li>
                          <li>
                            <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                            <span> 20 Jan, 2022</span>
                          </li>
                        </ul>
                      </div>
                  </li>
    
                  <li>
                    <a href="" class="thumb_img"><img src="images/banner2.jpeg" alt=""></a>
                    <div class="thumb_content">
                      <a href="" class="thumb_title">Zhang social media pop also known when smart innocent Zhang social media pop also known when smart innocent</a>
                      <ul class="author_listing no_pad">
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                          <a href="">John Wick</a>
                        </li>
                        <li>
                          <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                          <span> 20 Jan, 2022</span>
                        </li>
                      </ul>
                    </div>
                </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="section_title bgblack">
                    <span>Trending News</span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="trending_slider owl-carousel owl-loaded owl-drag">
                    
                    
                  <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-832px, 0px, 0px); transition: all 0s ease 0s; width: 2496px;"><div class="owl-item cloned" style="width: 416px;"><div class="trending_item">
                      <div class="thumb_medium_post">
                        <a href="" class="thumb_medium_img"><img src="images/banner1.jpeg" alt="" class="img-fluid"></a>
                        <div class="thumb_medium_post_overley">
                          <a href="" class="post_cat">Health</a>
                          <a href="" class="thumb_medium_post_title">Zhang social media pop also known when smart innocent</a>
                          <ul class="author_listing">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                              <a href="">John Wick</a>
                            </li>
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span> 20 Jan, 2022</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div></div><div class="owl-item cloned" style="width: 416px;"><div class="trending_item">
                      <div class="thumb_medium_post">
                        <a href="" class="thumb_medium_img"><img src="images/banner2.jpeg" alt="" class="img-fluid"></a>
                        <div class="thumb_medium_post_overley">
                          <a href="" class="post_cat">Health</a>
                          <a href="" class="thumb_medium_post_title">Zhang social media pop also known when smart innocent</a>
                          <ul class="author_listing">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                              <a href="">John Wick</a>
                            </li>
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span> 20 Jan, 2022</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div></div><div class="owl-item active" style="width: 416px;"><div class="trending_item">
                      <div class="thumb_medium_post">
                        <a href="" class="thumb_medium_img"><img src="images/banner1.jpeg" alt="" class="img-fluid"></a>
                        <div class="thumb_medium_post_overley">
                          <a href="" class="post_cat">Health</a>
                          <a href="" class="thumb_medium_post_title">Zhang social media pop also known when smart innocent</a>
                          <ul class="author_listing">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                              <a href="">John Wick</a>
                            </li>
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span> 20 Jan, 2022</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div></div><div class="owl-item" style="width: 416px;"><div class="trending_item">
                      <div class="thumb_medium_post">
                        <a href="" class="thumb_medium_img"><img src="images/banner2.jpeg" alt="" class="img-fluid"></a>
                        <div class="thumb_medium_post_overley">
                          <a href="" class="post_cat">Health</a>
                          <a href="" class="thumb_medium_post_title">Zhang social media pop also known when smart innocent</a>
                          <ul class="author_listing">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                              <a href="">John Wick</a>
                            </li>
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span> 20 Jan, 2022</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div></div><div class="owl-item cloned" style="width: 416px;"><div class="trending_item">
                      <div class="thumb_medium_post">
                        <a href="" class="thumb_medium_img"><img src="images/banner1.jpeg" alt="" class="img-fluid"></a>
                        <div class="thumb_medium_post_overley">
                          <a href="" class="post_cat">Health</a>
                          <a href="" class="thumb_medium_post_title">Zhang social media pop also known when smart innocent</a>
                          <ul class="author_listing">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                              <a href="">John Wick</a>
                            </li>
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span> 20 Jan, 2022</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div></div><div class="owl-item cloned" style="width: 416px;"><div class="trending_item">
                      <div class="thumb_medium_post">
                        <a href="" class="thumb_medium_img"><img src="images/banner2.jpeg" alt="" class="img-fluid"></a>
                        <div class="thumb_medium_post_overley">
                          <a href="" class="post_cat">Health</a>
                          <a href="" class="thumb_medium_post_title">Zhang social media pop also known when smart innocent</a>
                          <ul class="author_listing">
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-user"></i></div>
                              <a href="">John Wick</a>
                            </li>
                            <li>
                              <div class="author_listing_icon"><i class="fa-solid fa-clock"></i></div>
                              <span> 20 Jan, 2022</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa-solid fa-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></button></div><div class="owl-dots disabled"></div></div>
                </div>
                <div class="col-sm-12">
                  <div class="section_title bgblack mt-30">
                    <span>Newsletter</span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="newsletter_area">
                    <h4>Subscribe Newsletter!</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis architecto nemo.</p>
                    <input type="text" class="form-control" placeholder="E-Mail Address">
                    <button class="btn submitbtn" aria-label="">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    <!-- ========single post sec close===== -->

<?= $this->endSection() ?>






<?= $this->section('scriptLinks') ?>
  
<?= $this->endSection() ?>