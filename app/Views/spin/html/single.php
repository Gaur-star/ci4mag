<section id="contentSection">
  <div class=container-fluid>
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9">
          <div class="left_content">
            <div class="single_page">
                <h1><?php if(isset($_SESSION['single_preview'])&&(!empty($post_preview[0]['title']))){echo $post_preview[0]['title'];}else{echo $single["title"];}?></h1>
                <div class="post_tags">
                <?php foreach($single['post_tags'] as $categorie) { ?> <a href="<?php echo base_url().'/category/' .$categorie?>"><button class="button-xsmall pure-button"><?php echo $categorie; ?></button></a>
                <?php } ?>
                </div>

                <div class="post_commentbox">
                <a href="#"><i class="fa fa-user"></i> <?php if(($single["f_name"]!='issuewire')&&($single["f_name"]!='Issuewire')){echo $single["f_name"];}?></a>
                <span><i class="fa fa-calendar"></i><?php echo date("d/M/y", strtotime($single["date_"])) ?></span>
                    <?php if ($single["tags"]) { echo '<a href="#"><i class="fa fa-tags"></i>'; 
                    foreach ($single["tags"] as $tag) {
                    echo $tag["keyword"] . ",";
                    } echo '</a>'; } ?>
                </div>

                <div class="single_page_content_2" >
                <?php
                    if(isset($_SESSION['single_preview'])&&(!empty($post_preview[0]['content'])))
                    {
                    echo html_entity_decode(($post_preview[0]["content"]));
                    }
                    else{
                    echo html_entity_decode(($single["content"]));
                    }
                    ?>
                </div>
            </div>
          </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-3">
      <aside class="right_content"> 
        <div class="single_sidebar">        
            <div class="" id="add_box_sidebar">
                <code id="image_add_sidebar"><?php echo $add[0]['sidebar'] ?></code>
            </div><!-- .nv-header-ads-area -->
             </br></br></br></br></br></br>
            <h2><span>Related Post</span></h2>
            <ul class="spost_nav">
                <?php if (isset($relatedPost)) {
                      foreach ($relatedPost as $let) { if(
                      $let["title"] != $single["title"]
                ){?>
                <li>
                    <div class="media"> 
                        <a href="<?php echo base_url() ."/". $let["seo_url"] ?>" class="media-left"> 
                        <img alt="<?php echo $let["title"] ?>" 
                        src="<?php  if(isset($let["url"])){echo $let["url"];}else{echo base_url().'/'.$settings[12]["setting_value"];}?>">
                        </a>
                        <div class="media-body">
                        <a href="<?php echo base_url() ."/". $let["seo_url"] ?>" class="catg_title"> <?php echo $let["title"] ?></a> 
                        </div>
                    </div>
                </li>
                <?php } }
                } 
                ?>
            </ul>
        </div>
      </aside>
    </div>
  </div>
</section>