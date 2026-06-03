<?php //$img_url="https://yorkpedia.s3.us-west-2.amazonaws.com/";?>
 
 <?php 
// echo "<pre>";
// print_r($settings);die;
 ?>


<?php 

// echo "<pre>";
// print_r($posts[0]['fetch_post']);die;

// $count_zz = count($posts[0]['fetch_post']['the_category']);

//  foreach($posts[0]['fetch_post']['the_category'] as $key=>$value)
//  {
//   echo "<pre>";
//   print_r($value['cat'][0]['categorie']);die;
//  }

?>


<section id="sliderSection">
 <div class="row">

     <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
         <div class="post_img_zz">
           <?php if((!empty($posts[0]['fetch_post']['url'])) && (!empty($posts[0]['fetch_post']['the_category']))){?>
           <a href="<?php echo $posts[0]['fetch_post']['url'];?>">
             <img src="<?php if(empty($posts[0]['fetch_post']['path'])){echo $settings[12]['setting_value'];}else{echo $posts[0]['fetch_post']['path']['url'];}?>" alt="">
           </a>
           <div class="info_zz">

           <a href="<?php echo $posts[0]['fetch_post']['url'];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $posts[0]["title"];?>'</b></p></a>

             <p>
             <?php foreach($posts[0]['fetch_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
               <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                 <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                 <?php echo $value['cat'][0]['categorie'];?>
                 </a>
               </button>
               <?php }
               }?>
             </p>
           </div>          
         </div>    
     </div>  


       
     <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
         <div class="post_img_zz">
           <?php  if((!empty($posts[1]['fetch_post']['url'])) && (!empty($posts[1]['fetch_post']['the_category']))){?>
           <a href="<?php echo $posts[1]['fetch_post']['url'];?>">
             <img src="<?php if(empty($posts[1]['fetch_post']['path'])){echo $settings[12]['setting_value'];}else{echo $posts[1]['fetch_post']['path']['url'];}?>" alt="">
           </a>
           <div class="info_zz">

           <a href="<?php echo $posts[1]['fetch_post']['url'];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $posts[1]["title"];?>'</b></p></a>

             <p>
             <?php foreach($posts[1]['fetch_post']['the_category'] as $key=>$value){?>
               <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                 <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                 <?php echo $value['cat'][0]['categorie'];?>
                 </a>
               </button>
               <?php }
               }?>
             </p>
           </div>          
         </div>    
     </div>  
   
 </div>

</section>


<section id="sliderSection" style="margin-bottom:8px">
 <div class="row">
   
   
 <div class="col-md-4 col-lg-4 col-sm-4 colmn_zz">
         <div class="post_img_zz">
           <?php if((!empty($posts[2]['fetch_post']['url'])) && (!empty($posts[2]['fetch_post']['the_category']))){?>
           <a href="<?php echo $posts[2]['fetch_post']['url'];?>">
             <img src="<?php if(empty($posts[2]['fetch_post']['path'])){echo $settings[12]['setting_value'];}else{echo $posts[2]['fetch_post']['path']['url'];}?>" alt="">
           </a>
           <div class="info_zz">

           <a href="<?php echo $posts[2]['fetch_post']['url'];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $posts[2]["title"];?>'</b></p></a>

             <p>
             <?php foreach($posts[2]['fetch_post']['the_category'] as $key=>$value){?>
               <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                 <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                 <?php echo $value['cat'][0]['categorie'];?>
                 </a>
               </button>
               <?php }
               }?>
             </p>
           </div>          
         </div>    
     </div>  

     <div class="col-md-4 col-lg-4 col-sm-4 colmn_zz">
         <div class="post_img_zz">
           <?php if((!empty($posts[3]['fetch_post']['url'])) && (!empty($posts[3]['fetch_post']['the_category']))){?>
           <a href="<?php echo $posts[3]['fetch_post']['url'];?>">
             <img src="<?php if(empty($posts[3]['fetch_post']['path'])){echo $settings[12]['setting_value'];}else{echo $posts[3]['fetch_post']['path']['url'];}?>" alt="">
           </a>
           <div class="info_zz">

           <a href="<?php echo $posts[3]['fetch_post']['url'];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $posts[3]["title"];?>'</b></p></a>

             <p>
             <?php foreach($posts[3]['fetch_post']['the_category'] as $key=>$value){?>
               <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                 <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                 <?php echo $value['cat'][0]['categorie'];?>
                 </a>
               </button>
               <?php }
               }?>
             </p>
           </div>          
         </div>    
     </div>  
       
     <div class="col-md-4 col-lg-4 col-sm-4 colmn_zz">
         <div class="post_img_zz">
           <?php if((!empty($posts[4]['fetch_post']['url'])) && (!empty($posts[4]['fetch_post']['the_category']))){?>
           <a href="<?php echo $posts[4]['fetch_post']['url'];?>">
             <img src="<?php if(empty($posts[4]['fetch_post']['path'])){echo $settings[12]['setting_value'];}else{echo $posts[4]['fetch_post']['path']['url'];}?>" alt="">
           </a>
           <div class="info_zz">

           <a href="<?php echo $posts[4]['fetch_post']['url'];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $posts[4]["title"];?>'</b></p></a>

             <p>
             <?php foreach($posts[4]['fetch_post']['the_category'] as $key=>$value){?>
               <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                 <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                 <?php echo $value['cat'][0]['categorie'];?>
                 </a>
               </button>
               <?php }
               }?>
             </p>
           </div>          
         </div>    
     </div>   
   
 
 </div>  
</section>

<?php // die;?>
<section id="contentSection">
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">

    <!---------------------------------------------- TECHNOLOGY STARTS HERE ------------------->
      <div class="jumbotron" style="background-color:grey;margin:0%;padding:1%;border-bottom: 6px solid red;margin-bottom:40px;">
        <h4 style="color:black;">Technology</h4>
      </div>
      
          <?php 
        //  echo '<pre>';
        //  print_r($tech_post[0]);
        //  die(); 
           ?>


        <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                    <?php if((!empty($tech_post[0]["all_tech_post"]['tech_url'])) && (!empty($tech_post[0]["all_tech_post"]['the_category']))){?>
                    <a href="<?php echo $tech_post[0]["all_tech_post"]["tech_url"];?>">
                        <img src="<?php if(empty($tech_post[0]["all_tech_post"]["tech_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $tech_post[0]["all_tech_post"]["tech_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $tech_post[0]["all_tech_post"]["tech_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $tech_post[0]["all_tech_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($tech_post[0]['all_tech_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div>  
          
          <!-- <div class="col-md-6 col-lg-6 col-sm-6 colmn">
              <a href="<?php //echo $tech_post[0]["all_tech_post"]["tech_url"];?>" class="img_cont" style="background-image:url('<?php //echo $img_url.$tech_post[0]["all_tech_post"]["tech_path"][0]["url"];?>'); display:block">
                <p style="color:white;margin-top:210px;text-shadow: 4px 4px 5px black;"><b>'<?php //echo $tech_post[0]["all_tech_post"]["post_data"]["title"];?>'<b></p>
              <a>
          </div>   -->
                <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($tech_post[1]["all_tech_post"]["tech_url"])) && (!empty($tech_post[1]["all_tech_post"]["the_category"]))){?>
                    <a href="<?php echo $tech_post[1]["all_tech_post"]["tech_url"];?>">
                        <img src="<?php if(empty($tech_post[1]["all_tech_post"]["tech_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $tech_post[1]["all_tech_post"]["tech_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $tech_post[1]["all_tech_post"]["tech_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $tech_post[1]["all_tech_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($tech_post[1]['all_tech_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div>  
        </div>
        <div class="row">
          
        <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($tech_post[2]["all_tech_post"]["tech_url"])) && (!empty($tech_post[2]["all_tech_post"]["the_category"]))){?>
                    <a href="<?php echo $tech_post[2]["all_tech_post"]["tech_url"];?>">
                        <img src="<?php if(empty($tech_post[2]["all_tech_post"]["tech_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $tech_post[2]["all_tech_post"]["tech_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $tech_post[2]["all_tech_post"]["tech_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $tech_post[2]["all_tech_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($tech_post[2]['all_tech_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div>   
                    
                <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($tech_post[3]["all_tech_post"]["tech_url"])) && (!empty($tech_post[3]["all_tech_post"]["the_category"]))){?>
                    <a href="<?php echo $tech_post[3]["all_tech_post"]["tech_url"];?>">
                        <img src="<?php if(empty($tech_post[3]["all_tech_post"]["tech_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $tech_post[3]["all_tech_post"]["tech_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $tech_post[3]["all_tech_post"]["tech_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $tech_post[3]["all_tech_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($tech_post[3]['all_tech_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div>    

            </div>

        <div class="row">
          
        <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($tech_post[4]["all_tech_post"]["tech_url"])) && (!empty($tech_post[4]["all_tech_post"]["the_category"]))){?>
                    <a href="<?php echo $tech_post[4]["all_tech_post"]["tech_url"];?>">
                        <img src="<?php if(empty($tech_post[4]["all_tech_post"]["tech_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $tech_post[4]["all_tech_post"]["tech_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $tech_post[4]["all_tech_post"]["tech_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $tech_post[4]["all_tech_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($tech_post[4]['all_tech_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div>     
            
                <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($tech_post[5]["all_tech_post"]["tech_url"])) && (!empty($tech_post[5]["all_tech_post"]["the_category"]))){?>
                    <a href="<?php echo $tech_post[5]["all_tech_post"]["tech_url"];?>">
                        <img src="<?php if(empty($tech_post[5]["all_tech_post"]["tech_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $tech_post[5]["all_tech_post"]["tech_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $tech_post[5]["all_tech_post"]["tech_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $tech_post[5]["all_tech_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($tech_post[5]['all_tech_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div>   

        </div>

 <?php // die;?>

    <div class="jumbotron" style="background-color:grey;margin:0%;padding:1%;border-bottom: 6px solid red;margin-bottom:40px;margin-top:10px;">
        <h4 style="color:black;">ENTERTAINMENT</h4>
      </div>
      
          <?php 
        //  echo '<pre>';
        //  print_r($entartainment_post[0]["all_entartainment_post"]["entartainment_url"]);
        //  die();

          //[4]["all_food_post"]["food_path"][0]["url"]
          ?>


        <div class="row">
          
                <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($entartainment_post[0]["all_entartainment_post"]["entartainment_url"])) && (!empty($entartainment_post[0]["all_entartainment_post"]["the_category"]))){?>
                    <a href="<?php echo $entartainment_post[0]["all_entartainment_post"]["entartainment_url"];?>">
                        <img src="<?php if(empty($entartainment_post[0]["all_entartainment_post"]["entartainment_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $entartainment_post[0]["all_entartainment_post"]["entartainment_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $entartainment_post[0]["all_entartainment_post"]["entartainment_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $entartainment_post[0]["all_entartainment_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($entartainment_post[0]['all_entartainment_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div>   
                    
                <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($entartainment_post[1]["all_entartainment_post"]["entartainment_url"])) && (!empty($entartainment_post[1]["all_entartainment_post"]["the_category"]))){?>
                    <a href="<?php echo $entartainment_post[1]["all_entartainment_post"]["entartainment_url"];?>">
                        <img src="<?php if(empty($entartainment_post[1]["all_entartainment_post"]["entartainment_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $entartainment_post[1]["all_entartainment_post"]["entartainment_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $entartainment_post[1]["all_entartainment_post"]["entartainment_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $entartainment_post[1]["all_entartainment_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($entartainment_post[1]['all_entartainment_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div>  

        </div>

        <div class="row">
          
           <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($entartainment_post[2]["all_entartainment_post"]["entartainment_url"])) && (!empty($entartainment_post[2]["all_entartainment_post"]["the_category"]))){?>
                    <a href="<?php echo $entartainment_post[2]["all_entartainment_post"]["entartainment_url"];?>">
                        <img src="<?php if(empty($entartainment_post[2]["all_entartainment_post"]["entartainment_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $entartainment_post[2]["all_entartainment_post"]["entartainment_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $entartainment_post[2]["all_entartainment_post"]["entartainment_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $entartainment_post[2]["all_entartainment_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($entartainment_post[2]['all_entartainment_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div> 
                    
                <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($entartainment_post[3]["all_entartainment_post"]["entartainment_url"])) && (!empty($entartainment_post[3]["all_entartainment_post"]["the_category"]))){?>
                    <a href="<?php echo $entartainment_post[3]["all_entartainment_post"]["entartainment_url"];?>">
                        <img src="<?php if(empty($entartainment_post[3]["all_entartainment_post"]["entartainment_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $entartainment_post[3]["all_entartainment_post"]["entartainment_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $entartainment_post[3]["all_entartainment_post"]["entartainment_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $entartainment_post[3]["all_entartainment_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($entartainment_post[3]['all_entartainment_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div> 

        </div>

        <div class="row">
          
        <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($entartainment_post[4]["all_entartainment_post"]["entartainment_url"])) && (!empty($entartainment_post[4]["all_entartainment_post"]["the_category"]))){?>
                    <a href="<?php echo $entartainment_post[4]["all_entartainment_post"]["entartainment_url"];?>">
                        <img src="<?php if(empty($entartainment_post[4]["all_entartainment_post"]["entartainment_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $entartainment_post[4]["all_entartainment_post"]["entartainment_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $entartainment_post[4]["all_entartainment_post"]["entartainment_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $entartainment_post[4]["all_entartainment_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($entartainment_post[4]['all_entartainment_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div> 
                    
                <div class="col-md-6 col-lg-6 col-sm-6 colmn_zz">
                    <div class="post_img_zz">
                   <?php if((!empty($entartainment_post[5]["all_entartainment_post"]["entartainment_url"])) && (!empty($entartainment_post[5]["all_entartainment_post"]["the_category"]))){?>
                    <a href="<?php echo $entartainment_post[5]["all_entartainment_post"]["entartainment_url"];?>">
                        <img src="<?php if(empty($entartainment_post[5]["all_entartainment_post"]["entartainment_path"][0]["url"])){echo $settings[12]['setting_value'];}else{echo $entartainment_post[5]["all_entartainment_post"]["entartainment_path"][0]["url"];}?>" alt="">
                    </a>
                    <div class="info_zz">

                    <a href="<?php echo $entartainment_post[5]["all_entartainment_post"]["entartainment_url"];?>"><p style="color:white;text-shadow: 4px 4px 5px black;"><b>'<?php echo $entartainment_post[5]["all_entartainment_post"]["post_data"]["title"];?>'</b></p></a>

                        <p>
                        <?php foreach($entartainment_post[5]['all_entartainment_post']['the_category'] as $key=>$value){ //print_r($value);die;?>
                        <button class="btn btn-danger" style="font-size:9px;border-radius:15px">
                            <a href="<?php echo base_url();?>/category/<?php echo $value['cat'][0]['slug'];?>" style="color:honeydew">
                            <?php echo $value['cat'][0]['categorie'];?>
                            </a>
                        </button>
                        <?php }
                        }?>
                        </p>
                    </div>          
                    </div>    
                </div> 

        </div>

    </div>
    <!---------------------------------------- ENTERTAINMENT ENDS HERE ------------------------------->
 <?php // die; ?>
    <!-- </div>
    </div>
                </section> -->
    <div class="col-lg-4 col-md-4 col-sm-4">
      <aside class="right_content">
        <div class="single_sidebar">
          <h2><span>Popular Post</span></h2>
          <ul class="spost_nav">
            <?php
              // echo "<pre>";
              // print_r($popular);die;
            if (isset($popular)) {
              foreach ($popular as $pop) { ?>
                <li>
                  <div class="media wow fadeInDown">
                    <a href="<?php echo base_url() ."/". $pop["seo_url"] ?>" class="media-left">
                      <img alt="<?php echo $pop["title"] ?>" src="<?php echo $pop["image"] ? $pop["image"] : $settings[12]["setting_value"] ?>">
                    </a>
                    <div class="media-body">
                      <a href="<?php echo base_url() ."/".$pop["seo_url"] ?>" class="catg_title">
                        <?php echo $pop["title"] ?>
                      </a>
                    </div>
                  </div>
                </li>
            <?php }
            } ?>
          </ul>
        </div>

      </aside>
    </div>
</div>
</section>

<script>
// function abc()
// {
//   console.log("ssssssssss");
// }


</script>