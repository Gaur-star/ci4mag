<style>
    .post .post-image{
        width: 20%;
    }
    .post .post-image img{
        width: 100%;
    }
    .post .post-section{
        width: 80%;
        margin-left: 15px;
    }
    .post .post-section .post-title{
        width: 100%;
     font-size: 19px;
    font-weight: bold; 
    }
    .post .post-section .post-desc{
        width: 80%;
    }
    .post{
        display: flex;
        margin: 30px 0px;
    } 



    #contentSection .row .abc img{
        width:150px;
        height:100px;
        object-fit: content;
    }
    /* #contentSection .row .abc {
        width:100%;
        height:100px;
        object-fit: fill;
    } */


    /* .abc img {
        object-fit: contain !important;
    } */
</style>

<?php

function getImageTagFromHtmlContent($text = ''){

    $valid_text = true;
    $new_text = ''; 
    $tag_start = false; 
    $tag_end = false;
    $img_arr = array();
    $total_length = strlen($text);
    $img = '';
    for($i = 0, $img_i = 0; $i < $total_length; $i++){
        if( !$tag_start && ($i+5) < $total_length && ($text[$i] . $text[$i+1] . $text[$i+2] . $text[$i+3] . $text[$i+4]) == '<img ' ){
            $tag_start = true;
            $img = '';
        } 
        else if($tag_start && $text[$i] == '>'){
            $tag_end = true;
        }
        if($tag_start){
            // $img_arr[$img_i] .= $text[$i];
            $img .= $text[$i];
        }
        if($tag_start && $tag_end){
            $tag_start = false;
            $tag_end = false;
            $img_arr[] .= $img;
            $img = '';
            $img_i++;
        }
    }
    return $img_arr;

}


?>
           <?php
            //  echo "<pre>";
            //  print_r($cat_post);die;
             ?>

<section id="contentSection">
    <div class="row">

     <h3 style="color:black;margin-bottom:10px;"><?php if(!empty($cat_post[0]["posts"])){echo $cat_post[0]["posts"]["cat_name"];}?></h3>
        <?php foreach($cat_post as $key=>$value){?>

        <a class="mt-3" href="../<?php if(!empty($value["posts"])){ echo $value["posts"]["url"];}?>">
            <?php if(!empty($value["posts"])){ ?>
            <h4 class="mb-2"><b><?php echo $value["posts"]["the_posts"][0]["title"];?></b></h4>
            <?php

                $image_tags = array();
                $image_tags = getImageTagFromHtmlContent(html_entity_decode($value["posts"]["the_posts"][0]["content"]));
                $content = strip_tags(html_entity_decode($value["posts"]["the_posts"][0]["content"]));
                $content = substr($content, 0, 600);
         
            ?>
            <div class="abc">
                <?php //echo substr(html_entity_decode($value["posts"]["the_posts"][0]["content"]),0,600);?>
                <div>
                    <?php if(!empty($image_tags)){echo $image_tags[0];} ?>
                </div>
                <div>
                    <?php echo $content;?>...
                </div>
                <div>
                    <button class="btn btn-danger" style="border-radius:15px">Read More</button>
                </div>
            </div>
            <?php }?>
            <!-- <button class="btn btn-danger" style="border-radius:15px">Read More</button> -->
        </a>
        <?php }?>
    </div>

    <div class="container">
    <?php 
    if(isset($pager))
    {
        echo $pager->links();
    }
 
    ?>
    </div>

</section>    


