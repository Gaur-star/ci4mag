<main class="about_sec">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-8">
                <!-- <//?php echo html_entity_decode(($singlepage["content"])) ?> -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact_info_details">
                            <p>We can be reached directly using the following emails.</p>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="contact_details_item">
                                        <div class="contact_icon"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="contact_details">
                                            <span>Editor In Chief</span>
                                            <a href="mailto:editor@spindigit.com">editor@spindigit.com</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="contact_details_item">
                                        <div class="contact_icon"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="contact_details">
                                            <span>Assistant Editor</span>
                                            <a href="mailto:asieditor@spindigit.com">asieditor@spindigit.com</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="contact_details_item">
                                        <div class="contact_icon"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="contact_details">
                                            <span>Advertising & Media Team</span>
                                            <a href="mailto:media@spindigit.com">media@spindigit.com</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="contact_details_item">
                                        <div class="contact_icon"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="contact_details">
                                            <span>General Enquiries</span>
                                            <a href="mailto:asieditor@spindigit.com">Info@spindigit.com</a>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="col-sm-12 col-md-6">
                                    <div class="contact_details_item">
                                        <div class="contact_icon"><i class="fa-solid fa-location-dot"></i></div>
                                        <div class="contact_details">
                                            <span>Corporate Office</span>
                                            <div class="info_det">Office Number 11, 269 Bays Mountain Trl, Kingsport, TN, 37660, United States of America</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="contact_details_item">
                                        <div class="contact_icon"><i class="fa-solid fa-phone"></i></div>
                                        <div class="contact_details">
                                            <span>Phone</span>
                                            <a href="tel:+1 276 452 1111">+1 276 452 1111</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact_form">
                    <form class="comment_form" action="<?php echo base_url('contact_us') ?>" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-sm-12">
                                <b class="Leave_cmnt_title">Leave a Message</b>
                                <form class="comment_form">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" placeholder="Name" name="name" id="name" required="">
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" placeholder="Email" name="email" id="email" required="">
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" required="">
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject" required="">
                                    </div>
                                    <div class="col-sm-12">
                                      <textarea class="form-control required-field" placeholder="Comment" name="message" id="message" rows="6" required=""></textarea>
                                    </div>
                                    <div class="col-sm-12">
                                      <button class="btn  post_btn">Send Message</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                        </div>
                    </form>
                </div>
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