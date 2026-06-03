<style>
  .pagination-page {
    margin-bottom: 20px;
  }

  .pagination-page a {
    padding: 5px 10px;
    color: #000;
    margin: 2px;
    border: 1px solid #828282;
    border-radius: 6px;
    font-size: 20px;
    text-decoration: none;
    cursor: pointer;
  }

  .pagination-page strong {
    padding: 10px 20px;
    color: #000;
    margin: 2px;
    border: 1px solid #828282;
    border-radius: 10px;
    font-size: 20px;
    background-color: #fff;
  }

  .page-list:hover {
    cursor: pointer;
  }

  .page-list .pageaction {
    display: none;
  }

  .page-list:hover .pageaction {
    display: block;
  }

  .page-list {
    height: 130px;
    color: #09f;
  }

  .imgblock {
    // cursor: pointer;
    height: 245px;
    color: #09f;
    border: 1px solid #dfdfdf;
    text-align: center;
    padding: 18px;
    margin: 15px;
  }

  .imgblock .pageaction {
    display: none;
  }

  .imgblock:hover .pageaction {
    display: block;
  }
  




    #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }

  #myImg:hover {opacity: 0.7;}

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (image) */
  /* .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  } */

  /* Caption of Modal Image */
  /* #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  } */

  /* Add Animation */
  /* .modal-content, #caption {  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  } */

  /* @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
  }

  @keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
  } */

  /* The Close Button */
  /* .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  } */

  /* 100% Image Width on Smaller Screens */
  /* @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  } */

  

</style>
<?php 
// if(isset($search_media))
// {
//   echo "<pre>";
//   print_r($search_media);die;
// }
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <h1 class="text-center">Media Gallery</h1>

    <form class="form-inline my-2 my-lg-0 mt-3" method="get" action="<?php echo base_url().'/admin/media'?>">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="media_search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
 <?php if(empty($search_media)){?>
    <form action="<?php echo base_url() ?>/admin/media_library/uploadImg" method="post" enctype='multipart/form-data' class="mt-3">
      <div class="row mb-3">
        <div class="col-12">
          <?php 
            $session = session();
            echo $session->getFlashdata("msg");
          
          // echo "<pre>";
          // print_r($search_media);die;
          if((isset($search_media))&&empty($search_media))
          {?>
            <script>alert('No Image is found !!!');</script>
          <?php }?>
        </div>

        <div class="col-2">
          <label for="mediaupload" class="text-nowrap">
            <img src="<?php echo base_url() . "/assets/images/image-gallery.png" ?>" style="width: 75px" id="imguplodpreview">Choose Image
          </label>
          <input type="file" id="mediaupload" name="fileUpload" style="display:none">
        </div>
        <div class="col-3 mt-2">
          <button class="" type="submit" style="border: 0;background-color: transparent;width: 150px;"><img src="<?php echo base_url() . "/assets/images/upload.png" ?>" style="width: 200px;"></button>
        </div>
        <div class="col-12 pagination-page mt-5">
          <?php
          // echo $this->pagination->create_links();
            if($pager)
            {
              $pagi_parh = 'yorkpedia/admin/media';
              $pager->setPath($pagi_parh);
              if(empty($search_media))
              {
                echo $pager->links();
              }

            }
          ?>
        </div>
      </div>
    </form>
    <?php }?>
  </div>
  <?php 
   $session = session();
   if($session->has('image_delete'))
   {
    echo $session->getFlashdata('image_delete');
   }
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="container-fluid ">
        <div class="row">
          <?php 
          if(isset($search_media)&&(!empty($search_media)))
          {
            foreach($search_media as $media)
            {
              // echo "<pre>";
              // print_r($media['active']);die;
              if($media['active']!=0)
              { ?>
                <div class="col-3 mb-1 mt-1 imgblock">
                <!-- <img src="<?php // echo  $imglink ?>" width="100%" height="200px" id="myImg"> -->
                <img src="<?php  echo  $media['url'] ?>" width="100%" height="200px">
  
                <div class="pageaction">
                  <?php echo anchor('admin/media_library/delete/' . $media['id'], '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Delete&nbsp;</span>'); ?>
                </div>
              </div>
              <?php
              }
            }
          }else{?>

          <?php
          foreach ($pages as $m) {
            if($m['active']!=0)
            {
              $imglink = "";
              if ($m["url"]) {
                $imglink = $m['url'];
              } else {
                $imglink = $m['url'];
              }
          ?>
            <div class="col-3 mb-1 mt-1 imgblock">
              <!-- <img src="<?php // echo  $imglink ?>" width="100%" height="200px" id="myImg"> -->
              <img src="<?php  echo  $imglink ?>" width="100%" height="200px">

              <div class="pageaction">
                <?php echo anchor('admin/media_library/delete/' . $m['id'], '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Delete&nbsp;</span>'); ?>
              </div>
            </div>
          <?php 
            }
          } 
        }?>
        </div>
      </div>
    </div>
  </div>
</div>




<script>

  //////////////////////////////////////////////////////////

  // Get the modal
    // var modal = document.getElementById("myModal");

    // // Get the image and insert it inside the modal - use its "alt" text as a caption
    // var img = document.getElementById("myImg");
    // var modalImg = document.getElementById("img01");
    // var captionText = document.getElementById("caption");
    // img.onclick = function(){
    //   modal.style.display = "block";
    //   modalImg.src = this.src;
    //   captionText.innerHTML = this.alt;
    // }

    // // Get the <span> element that closes the modal
    // var span = document.getElementsByClassName("close")[0];

    // // When the user clicks on <span> (x), close the modal
    // span.onclick = function() { 
    //   modal.style.display = "none";
    // }

  //////////////////////////////////////////////////////////

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imguplodpreview').attr('src', e.target.result);
        console.log(e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#mediaupload").change(function() {
    readURL(this);
  });
</script>
