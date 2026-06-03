<div id="content" class="site-content" style="margin-top:30px">
    <div class="cv-container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <header class="page-header">
                    <h1 class="page-title">AUTHOR: <span><?php echo $author;?></span></h1>
                </header><!-- .page-header -->

                <!-- <a href="<?php //echo base_url().'/spin/author/'.$aut_post[0]['post']['author'].'/page/2'?>">OLD POSTS</a> -->

                <?php 
               //  print_r($author);die;
                    // if($pager)
                    // {
                    //     $pagi_path = 'wp2ci/spin/author/'.$author;
                    //     $pager->setPath($pagi_path);
                    //     echo $pager->simpleLinks();
                    // }
                   
                ?>

                <?php 
                    // echo "<pre>";
                    // print_r($aut_post);
                    // die;
                ?>



               <?php foreach($aut_post as $aut){?>
                 <?php if(!empty($aut['post'])){?>
                <?php 
                // echo "<pre>";
                // print_r($aut['post']['post']['update_date']);
                // die;
                ?>
                    <?php 
                    if($aut['post']['post']['content'])
                    {
                        $content = strip_tags(html_entity_decode($aut['post']['post']['content']));
                        $content = substr($content, 0, 700);
                    }

                    ?>
                <article id="post-461" class="has-thumbnail post-461 post type-post status-publish format-standard has-post-thumbnail hentry category-health-and-biotech tag-inc tag-intersect-ent tag-xent">

                    <div class="nv-article-thumb">

                        <a href="<?php echo base_url().'/'.$aut['post']['url'];?>">

                            <img width="1000" height="667" src="<?php if(!empty($aut['post']['path'][0])){echo $aut['post']['path'][0]['url'];}else{echo base_url().'/'.$settings[12]['setting_value'];}?>"  class="attachment-full size-full wp-post-image lazy" alt=""  data-sizes="(max-width: 1000px) 100vw, 1000px" />
                        </a>

                    </div><!-- .nv-article-thumb -->

                    <div class="nv-archive-post-content-wrapper">

                        <header class="entry-header">

                            <h2 class="entry-title"><a href="<?php echo base_url().'/'.$aut['post']['url'];?>" rel="bookmark"><?php if(!empty($aut['post']['post'])){echo $aut['post']['post']['title'];}?></a></h2>
                            <div class="entry-meta">

                                <span class="posted-on"><a href="<?php echo base_url().'/'.$aut['post']['url'];?>" rel="bookmark"><time class="entry-date published updated" datetime="2019-11-25T06:14:24-05:00"><?php echo date("d M, Y", strtotime($aut['post']['post']['update_date']))?></time></a></span><span class="byline"><span class="author vcard"><a class="url fn n" href="<?php echo base_url().'/spin/author/'.$author;?>"><?php echo $author;?></a></span></span>
                            </div><!-- .entry-meta -->

                        </header><!-- .entry-header -->

                        <div class="entry-content">

                            <p><?php print_r($content);?>...<a href="<?php echo base_url().'/'.$aut['post']['url'];?>" class="readmore">Read More</a></p>

                            <span class="nv-archive-more"><a href="<?php echo base_url().'/'.$aut['post']['url'];?>" class="nv-button"><i class="fa fa-arrow-circle-o-right"></i>Continue Reading</a></span>

                        </div><!-- .entry-content -->
                        <footer class="entry-footer">
                        </footer><!-- .entry-footer -->

                    </div><!-- .nv-archive-post-content-wrapper -->
                </article><!-- #post-461 -->
                <?php }?>
                <?php }?>

            </main><!-- #main -->

            <?php 
                    if($pager)
                    {
                        $pagi_path = 'wp2ci/spin/author/'.$author;
                        $pager->setPath($pagi_path);
                        echo $pager->simpleLinks();
                    }    
                ?>

        </div><!-- #primary -->







        <aside id="secondary" class="widget-area" role="complementary">
            <section id="news_vibrant_recent_posts-13" class="widget news_vibrant_recent_posts">
                <div class="nv-recent-posts-wrapper">
                    <h4 class="widget-title">Latest News</h4>
                    <ul>

                    <?php
                    // echo "<pre>";
                    // print_r($cat_latest_post);
                    // die;
                    ?>

                    <?php foreach($cat_latest_post as $cat){?>

                    <?php
                    // echo "<pre>";
                    // print_r($cat);
                    // die;
                    ?>

                        <li>
                            <div class="nv-single-post nv-clearfix">
                                <div class="nv-post-thumb">
                                    <a href="<?php echo base_url().'/'.$cat['url'];?>">
                                        <img width="272" height="204" src="<?php if(!empty($cat['path'])){echo $cat['path'][0]['url'];}else{echo base_url().'/'.$settings[12]['setting_value'];}?>" class="attachment-news-vibrant-block-thumb size-news-vibrant-block-thumb wp-post-image lazy" alt="" /> </a>
                                </div><!-- .nv-post-thumb -->
                                <div class="nv-post-content">
                                    <h3 class="nv-post-title small-size"><a href="<?php echo base_url().'/'.$cat['url'];?>"><?php echo $cat['post']['title'];?></a></h3>
                                    <div class="nv-post-meta">
                                        <span class="posted-on"><a href="<?php echo base_url().'/'.$cat['url'];?>" rel="bookmark"><time class="entry-date published updated" datetime="2022-08-12T10:05:05-04:00"><?php echo date("d M, Y", strtotime($cat['post']['update_date']))?></time></a></span>
                                    </div>
                                </div><!-- .nv-post-content -->
                            </div><!-- .nv-single-post -->
                        </li>
                       <?php }?>




                    </ul>
                </div><!-- .nv-recent-posts-wrapper -->
            </section>
        </aside><!-- #secondary -->




                <?php 
                    // if($pager)
                    // {
                    //     $pagi_path = 'wp2ci/spin/author/'.$author;
                    //     $pager->setPath($pagi_path);
                    //     echo $pager->simpleLinks();
                    // }    
                ?>


    </div><!-- .cv-container -->
</div><!-- #content -->


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                // $(document).ready(function(){
                //     var query = location.search.replace('?', '')
                //     var sp = new URLSearchParams(query)
                //     var page = sp.get('page') ? parseInt(sp.get('page')) : 1
                //     console.log(123)
                //     if(  page == 1 ){
                //         $(['area-label=Previous']).parent().hide();
                //         $(['area-label=Next']).parent().show();
                //     } else {
                //         $(['area-label=Previous']).parent().show();
                //         $(['area-label=Next']).parent().hide();
                //     }
                // });
                $(document).ready(function(){
                    $(".pager").css({"list-style":"none","justify-content":"space-between","padding-top":"3%"});
                    $(".pager li").css({"display":"inline-block","font-size":"100%"});
                    $(".pager li a").css({"padding":"100px","background-color":"#34b0fa","padding":"12px 75px"});
                    $(".pager li a span").css({"color":"white"});
                    
                    var query = location.search.replace('?', '');
                    var sp = new URLSearchParams(query);
                    var page = sp.get('page') ? parseInt(sp.get('page')) : 1
                  // console.log(page);
                    if(  page == 2 ){
                       // console.log($(".pager li:nth-child(1)"));
                        
                        $(".pager li:nth-child(2)").hide();
                        $(".pager li:nth-child(1)").show();
                        $(".pager").append("<div style='clear:both'></div>");
                        $(".pager li:nth-child(1)").css({"float":"right"});
                        $(".pager li:nth-child(1) a span").text("Newer posts");
                        $(".pager li:nth-child(1) a span").append("<i class='fas fa-caret-right' style='font-size:15px;margin-left: 7px;'></i>");

                    } else {
                       // console.log($(".pager li:nth-child(0)"));
                      //  $('[area-label=Previous]').parent().show();
                      $(".pager li:nth-child(1)").hide();
                      $(".pager li:nth-child(2)").show();
                      $(".pager li:nth-child(2) a span").text("Older posts");
                      $(".pager li:nth-child(2) a span").append("<i class='fas fa-caret-left' style='font-size:15px;margin-left: 7px;'></i>");
                    

                    }
                });


            </script> 

