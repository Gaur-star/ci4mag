<style>
  .panel {
    border: 1px solid #cecdcd;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
  }

  .panel .panel-heading {
    background-color: #007bff;
    color: #fff;
    padding: 15px;
    font-size: 20px;
    font-weight: bold;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  .panel .panel-body {
    padding: 10px;
  }

  .modal-dialog {
    margin: 3% 5%;
  }

  .modal-content {
    width: 90vw;
  }

  .image-list {
    width: 100%;
    max-height: 190px;
    border: 5px solid #dfdfdf;
    margin: 10px;
    cursor: pointer;
  }

  .tab-content {
    height: 55vh;
    overflow: scroll;
  }

  .gallery-img-checkbox:checked+.label-gallery-img {
    border: 1px solid black;
  }

  .catagory-list {
    list-style: none;
    padding: 0;
  }

  .catagory-list li {
    font-weight: bold;
    border-bottom: 1px solid #dbdbdb;
    padding: 10px;
  }

  div.editable {
    width: 100%;
    height: 200px;
    border: 1px solid #ccc;
    padding: 5px;
    border-radius: 10px;
    resize: both;
    overflow: auto;
  }

  #keyword {
    height: 100%;
    width: 100%
  }

  .tags-btn {
    font-size: 15px;
  }
</style>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h5>Edit Post</h5>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-8">
                <?php 
                // echo "<pre>";
                // print_r($previews);
                // die;
                ?>
                <?php 
                      $session = session();                
                      echo $session->getFlashdata("msg") ?>
                <form  action="<?php echo base_url() . "/admin/admin/update_post/" . $post_id ?>" method="post" class="newsletter_form1" id="addEditPostForm" enctype='multipart/form-data'>
                  <div style='color:red;' id='error12345'></div>
                  <div style='color:red;' id='error123456'></div>
                  <div class="col-12">

                    <div class="form-group">
                      <label for="title">
                        <h5>Post or Blog Title<span style='color:red;'>*</span></h5>
                      </label>
                      <input type="text" onpaste="myFunction()" name="title" id="title" class="form-control" placeholder="Enter your post title" style="font-size:20px;height:40px;" value="<?php if(!empty($previews['title'])){echo $previews['title'];}else{echo  $post_detail['title'];} ?>" required>
                    </div>

                    <div class="form-group"  id="s_title">
                      <label for="sugest_title">
                        <h5>Post or Blog URL<span style='color:red;'>*</span></h5><small id="uerror" class="text-danger"></small>
                      </label>
                      <input type="text" name="sugest_title" id="sugest_title" class="newsletter_input form-control-lg form-control" required placeholder="Url Link" style="font-size:20px;height:40px;" value="<?php if(!empty($previews['seo_url'])){echo $previews['seo_url'];}else{echo  $post_detail['seo_url'];}?>">
                      
                      <input type="hidden" name="oldUrl" value="<?php echo  $post_detail['seo_url'] ?>" required> 
                    </div>


                    <!-- <div class="form-group">
                      <h5>Post or Blog Content<span style='color:red;'>*</span> </h5>

                      <input type="radio" id="focus1" style="opacity:0;">
                    </div> -->
                    <!-- <div class="form-group">
                      <button class="btn btn-primary" type="button" onclick="addImage()">Add Media</button> -->
                      <!-- <button class="btn btn-outline-danger ml-4" type="button" onclick="removeImage('<?php //echo $post_detail['id'];?>')">Remove Media</button> -->
                      <!-- <button class="btn btn-outline-danger ml-4" type="button" id="remove_editor_img">Remove Media</button> -->
                    <!-- </div> -->
                    <?php 
                      // echo "<pre>";
                      // print_r($post_detail['site_map']);
                      // die;
                    ?>
                    <div class="form-group">
                      <b>Description</b>
                    </div>
                    <div class="form-group" id="blog-edit-area">
                      <textarea placeholder="Content" id="source" name="content" class="form-control" rows="200" cols="500" required="true">
                        <?php //echo isset($posts[0]['content'])?$posts[0]['content']:''; ?>
                        <?php if(!empty($previews['content'])){echo $previews['content'];}else{echo  $post_detail['content'];}?>
                      </textarea>
                    </div>

                    <div class="form-group">
                      <label for="meta_tag">
                        <h5>Meta Tags ( <span style='color:green;'>optional</span> )</h5>
                      </label>
                      <input type="text" placeholder="Enter Meta tag" name="meta_tag" id="meta_tag" class="form-control" value="<?php echo  $post_detail['meta_tag'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="meta_desc">
                        <h5>Meta Description ( <span style='color:green;'>optional</span> )</h5>
                      </label>
                      <textarea class="form-control" placeholder="Enter Meta description" name="meta_desc" id="meta_desc" rows="5"><?php echo  $post_detail['meta_desc'] ?></textarea>
                    </div>
                    <!-- <textarea name="source"></textarea> -->
                  </div>
                  <?php 
                  $d = $post_detail['date_'];
                  $d_create = date_create($d);
                  $date = date_format($d_create,$permalink);
                  ?>
                   <h5>Post Link :</h5>
                   <a href="<?php echo base_url().'/'.$date.'/'.$post_detail['seo_url']?>" target="_blank"><?php echo base_url().'/'.$date.'/'.$post_detail['seo_url']?></a>

              </div>
              <div class="col-md-4">
                <div class="mb-2">
                  <div class="panel">
                    <div class="panel-heading">Publish</div>
                    <div class="panel-body">
                      <div class="form-group">
                        <?php if ($roleId == 1) { ?>
                          <label for="author">Author:</label>
                          <select name="author" id="author" class="form-control">
                            <?php
                            foreach (get_author() as $author) { ?>
                              <option value="<?php echo $author['uid']; ?>" class="<?php echo $post_detail['author'] ?>" <?php echo ($post_detail['author'] == $author['uid']) ? "selected" : ""; ?>>&nbsp;<?php echo $author['f_name'] . " " . $author['l_name']; ?></option>
                            <?php }
                            ?>
                          </select>
                        <?php } ?>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <label for="author">Publish</label>
                        </div>
                        <div class="col-6">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_" value="<?php echo date("m/d/Y", strtotime($post_detail['date_'])) ?>" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group date" id="time_" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#time_" name="time_" value="<?php echo date("h:i A", strtotime($post_detail['time_'])) ?>" />
                            <div class="input-group-append" data-target="#time_" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                          </div>

                          <input type="hidden" id="visibility_post" value="<?php echo $post_detail["visibility"]; ?>" name="visibility">
                          <input type="hidden" name="old_date" value="<?php echo date("Y-m-d", strtotime($post_detail['date_'])) ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-4">
                          <label for="site_map">Include this post in site map</label>
                          <input name="site_map" id="site_map" type="checkbox" value="1" <?php echo ($post_detail["site_map"]) ? "checked" : ""; ?>>
                        </div>
                        <div class="col-12 mt-4">
                          <label for="newssitemap">Include this post in news sitemap</label>
                          <input name="newssitemap" id="newssitemap" type="checkbox" value="1" <?php echo ($post_detail["news_sitemap"]) ? "checked" : ""; ?>>
                        </div>
                        <div class="col-6 mt-4">
                          <label for="no_follow">No follow</label>
                          <input name="no_follow" id="no_follow" type="checkbox" value="true" <?php echo ($post_detail["nofollow"]==1) ? "checked" : ""; ?>>
                        </div>
                        <div class="col-6  mt-4">
                          <label for="no_index">No Index</label>
                          <input name="no_index" id="no_index" type="checkbox" value="true" <?php echo ($post_detail["indexed"] == 1) ? "checked" : ""; ?>>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <!-- <?php $date = date("Y/m/d"); //echo $date;die;?> 
                          <a href="<?php //echo base_url()."/".$date."/".$post_detail['seo_url'] ?>" class="btn btn-sm btn-primary btn-block" value="preview" name="preview" target="_blank">
                            Preview
                          </a> -->
                          <button type="button" class="btn btn-sm btn-primary btn-block" onclick="pre_view('<?php echo $post_detail['id'];?>')">Preview</button>
                        </div>
                        <div class="col-4">
                          <?php //if ($post_detail["visibility"] == "h") { ?>
                            <!-- <button class="btn btn-sm btn-primary btn-block" id="publishbtn" type="button">
                              Publish
                            </button> -->
                          <?php //} else { ?>
                            <button class="btn btn-sm btn-primary btn-block" id="update_post">
                              Update
                            </button>
                          <?php //} ?>
                        </div>
                        <div class="col-4">
                          <?php if ($post_detail["visibility"] == "h") { ?>
                            <button class="btn btn-sm btn-primary btn-block" id="save_draft" type="button">
                              Publish
                            </button>
                          <?php } else { ?>
                            <button class="btn btn-sm btn-primary btn-block" id="switchToDraft" type="button">
                              Draft
                            </button>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-2">
                  <div class="panel">
                    <div class="panel-heading px-2">Feature Image  <button class="btn btn-danger btn-sm" onclick='remove_feature_img(<?php echo $post_detail["id"];?>)'>Remove</button></div>
                    <div class="panel-body">
                      <input type='hidden' name='image' id='image' value="" style="display:none" class="newsletter_input form-control-lg form-control"/>
                      <label for="image" style="width:100%; overflow:hidden;">
                        <?php
                        $imglink = "";
                        if ($post_detail['aws_path']) {
                          $imglink = "https://" . $post_detail['bucket'] . ".s3." . $post_detail['region'] . ".amazonaws.com/" . $post_detail['aws_path'];
                        } else {
                          $imglink = $post_detail['url'];
                        }
                        ?>

                        <img src="<?php echo ($imglink) ? $imglink : base_url() . "/assets/admin-image/admin.png" ?>" id="blah" class="img-thumbnail" onclick="addImage()" style="width:300px;cursor: pointer;">
                      </label>

                    </div>
                  </div>
                </div>
                <div class="mb-2">
                  <div class="panel">
                    <div class="panel-heading">Categories <span style="color:red;">*</span></div>
                    <div class="panel-body">
                      <div class="catagory-select">

                      </div>
                      <input class="form-control mt-2" id="category_filter" value="" onkeyup="catagoryFilter()">
                    </div>
                    <div class="panel-body" style="height: 300px;overflow: scroll;">
                      <ul class="catagory-list" id="catagorycheckbox">
                        <?php
                        foreach ($cat as $catdata) { ?>
                          <li>
                            <input type="checkbox" id="<?php echo $catdata['id'] ?>"class="catagory-checkbox" name="<?php echo (in_array($catdata['id'], $catagories_list)) ? "catselect[]" : "cat[]" ?>" value="<?php echo $catdata['id'] ?>" onclick="catagoryCheckbox(this)" data-name="<?php echo $catdata['categorie'] ?>" <?php echo (in_array($catdata['id'], $catagories_list)) ? "checked" : "" ?>> <?php //echo $catdata['categorie'] ?>
                            <label for="<?php echo $catdata["id"]?>"><?php echo $catdata['categorie'] ?></label>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="mb-2">
                  <div class="panel">
                    <div class="panel-heading">Type Tags</div>
                    <div class="panel-body">
                      <input type="hidden" name="keyword_list" value="">
                      <input type="hidden" name="delete_keyword_list" value="">
                      <input type="hidden" name="delete_catagory_list" value="">
                      <div class="editable">
                        <div id="tag_list">
                          <span> <?php if ($tag_list) {

                                    foreach ($tag_list as $tgList) {
                                      // echo "<pre>";
                                      // print_r($tgList);die;

                                      echo " <span class='badge badge-secondary tags-btn' onclick='removePostTag(this)' data-tags-list='" . $tgList["id"] . "'> " . $tgList["keyword"] . " <i class='fa fa-times' aria-hidden='true'></i> </span> ";
                                    
                                  }
                                  } ?></span>
                          <span id="new_tag"></span>

                        </div>
                        <div contenteditable="true" id="keyword"></div>
                      </div>
                      <div style="color:gray;">Press enter after every tag</div>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--------------------categorie------------------------>

<!---------------------end keyword-------------------->

<div class="modal" id="image_gallery">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Media</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-9">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link active" id="list-gallery-tab" data-toggle="tab" href="#list-gallery">Library</a></li>
              <li class="nav-item"><a class="nav-link" id="image-upload-tab" data-toggle="tab" href="#image-upload">Upload Image</a></li>
            </ul>
            <div class="tab-content">
              <div id="list-gallery" class="tab-pane container active">
                <div id="img-gallery" class="row">
                </div>
              </div>
              <div id="image-upload" class="tab-pane container">
                <div id="img-upload-section" class="row">
                  <div class="col-12">
                    <form id="media-upload" action="<?php echo base_url("admin/admin/imageUpload") ?>" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="inputmediafile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputmediafile" name="img">
                            <label class="custom-file-label" for="inputmediafile">
                              Choose file
                            </label>
                          </div>
                          <div class="input-group-append">
                            <input class="input-group-text" id="uploadmedia-btn" type="submit" value="Upload">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-12">
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                        <span class="sr-only">0% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <p id="img_path"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="insertImage()">Insert into post</button>
      </div>

    </div>
  </div>
</div>



<script>
  var insert_tags = [];
  var selected_editor_img_id = '';
  $(document).ready(function() {
 ///////////// MEDIA REMOVE CODE STARS FROM HERE   ///////////////////////////////////////
    
    // $('#blog-edit-area').click((e)=>{
    //     // console.log(e.target)
    //     if(e.target.tagName == 'IMG'){
    //       console.log(123)
    //       selected_editor_img_id = new Date().getTime();
    //       $(e.target).attr('_sel-remove-id', selected_editor_img_id);
    //     }
        
    // })
    // $('#remove_editor_img').click(()=>{
    //   if(selected_editor_img_id != ''){
    //     $('[_sel-remove-id=' + selected_editor_img_id + ']').remove();
    //     selected_editor_img_id = '';
    //     let blog_content = $('#blog-edit-area').find('.richText-editor').html();
    //     $('#source').val(blog_content);
    //   }
      
 ///////////// MEDIA REMOVE CODE ENDS HERE  ///////////////////////////////////////////


    // $("#source").richText({
    //   heightPercentage: 80,
    // });
    $("#title, #sugest_title").blur(function() {
      var url = $("#sugest_title").val();
      $.ajax({
        type:"post",
        url: window.location.origin+"/wp2ci/admin/checkurl",
        data:{
          'url' : url
        },
        success: function (data) {
          if(data == "new"){
            document.getElementById('uerror').innerText = "";
            $('#save_draft').prop('disabled', false);
          }else{
            document.getElementById('uerror').innerText = "Already exists this URL";
            $('#save_draft').prop('disabled', true);
          }
        }
      });
    });
    
    $("#title").keyup(function() {
      document.getElementById('s_title').style.display = 'block';
      var title = document.getElementById('title').value.toLowerCase();
      var s = title.replace(/[^a-z0-9\/]/gi, '-');
      document.getElementById('sugest_title').value = s;
    });
    $("#title").change(function() {
      document.getElementById('s_title').style.display = 'block';
      var title = document.getElementById('title').value.toLowerCase();
      var s = title.replace(/[^a-z0-9\/]/gi, '-');
      document.getElementById('sugest_title').value = s;
    });
    $("#sugest_title").keyup(function() {
      var sugest_title = document.getElementById('sugest_title').value.toLowerCase();
      var s = sugest_title.replace(/[^a-z0-9\/]/g, "-");
      if(s == ''){
        var title = document.getElementById('title').value.toLowerCase();
        s = title.replace(/[^a-z0-9\/]/gi, '-');
        document.getElementById('sugest_title').value = s;
      }else{
        document.getElementById('sugest_title').value = s;
      }
    });

    var keyword_count = 1;
    var tagIndex = 0;
    $("#keyword").keypress(function(e) {
      console.log(insert_tags.length);
      if (e.keyCode == 13) {
        e.preventDefault();
        var tags = $(this).text();
        insert_tags.push(tags);
        $("input[name='keyword_list']").val(insert_tags);
        // console.log(tags);
        $(this).empty();
        addtags(insert_tags);

      }
    });
    $("#save_draft").on("click", function() {
      $("#visibility_post").val("p");
      $("#addEditPostForm").submit();
    });
    $("#switchToDraft").on("click", function() {
      $("#visibility_post").val("h");
      $("#addEditPostForm").submit();
    });
    catagory_list = "";
    $.each($("input[name='catselect[]']"), function() {
      catagory_list += "<span class='badge badge-pill badge-primary'>" + $(this).attr("data-name") + "</span>";
    });
    $(".catagory-select").html(catagory_list);
    ///////////////////////////////////////////////////////////
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
    $('#time_').datetimepicker({
      format: 'LT'
    });


    $("#inputmediafile").change(function(e) {

      $(".custom-file-label").html(e.target.files[0].name);
    });

    $("#media-upload").on("submit", function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
              var percentComplete = evt.loaded / evt.total;
              percentComplete = parseInt(percentComplete * 100);
              console.log(percentComplete);
              $(".progress-bar").css("width", percentComplete + "%")
              if (percentComplete === 100) {

              }
            }
          }, false);

          return xhr;
        },
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
          $.ajax({

            url: "<?php echo base_url() . "/admin/media_library/media_library" ?>",
            success: function(res) {
              $("#img-gallery").html(res);
              modal_open = true;
              $("#image-upload").removeClass("active");
              $("#list-gallery").addClass("active");
              $("#image-upload-tab").removeClass("active")
              $("#list-gallery-tab").addClass("active")
             // $(".image-list").attr('onmouseover','img_src()');

            }
          });
        },
        error: function(data) {
          console.log("error");
          console.log(data);
        }
      });
    });
  });

  var modal_open = false;
  var removeElemetn = [];
  var removeCatagory = [];
  var page;
  var maxPage;

  function removeTag(e) {
    if (insert_tags.length > 0) {
      insert_tags.splice(e.getAttribute("data-tagIndex"), 1);
    } else {
      insert_tags = [];
    }
    $("input[name='keyword_list']").val(insert_tags);
    // e.remove();
    addtags(insert_tags);
  }

  function addtags(tags) {
    $tg = '';
    for (i = 0; i < tags.length; i++) {
      $tg = $tg + "<span class='badge badge-secondary tags-btn' onclick='removeTag(this)' data-tagIndex='" + i + "'> " + tags[i] + "<i class='fa fa-times' aria-hidden='true'></i></span> ";
    }
    $("#new_tag").html($tg);
  }


  function removePostTag(e) {
    removeElemetn.push(e.getAttribute("data-tags-list"));
    $("input[name='delete_keyword_list']").val(removeElemetn);
    e.remove();
  }

  function addImage() {
    $("#image_gallery").modal("toggle");
    //  $(".richText .richText-editor").append("<div><img src='http://thebizsolutions.com/wordpressdemo/assets/setting-image/New_Project1.png'></div>");
  }

  function insertImage() {
     $(".gallery-img-checkbox:checked").each(function() {
    //   $(".richText .richText-editor").append("<div style='resize:both'><img src='" + $(this).val() + "' style='width:100%'></div>");
    //   var textvalue = $("#source").val();
    //    $("#source").val(textvalue + "<div style='resize:both'><img src='" + $(this).val() + "' style='width:100%'></div>");
    $('#blah').attr('src', $(this).val());
    $('#image').attr('value', $(this).val());
    });

  }

  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }
  $(function() {
    if (!modal_open) {
      $('#image_gallery').on('shown.bs.modal', function(e) {
        page = 0;
        maxPage = '<?php echo $img_no_page ?>';
        $.ajax({
          url: "<?php echo base_url() . "/admin/media_library/media_library" ?>",
          success: function(res) {
            $("#img-gallery").html(res);
            page = 1;
            modal_open = true;
          }
        });
      });
    }
    $(".tab-content").scroll(function() {
      if (page < maxPage) {
        // if ($(".tab-content").scrollTop() + $(".tab-content").height() > $("#img-gallery").height() - 100) {
        //   $.post('<?php echo base_url() . "/admin/media_library/media_library/" ?>' + page, function(res) {
        //     $("#img-gallery").append(res);
        //   });
        //   page++;
        // }

        if ($(".tab-content").scrollTop() > 400) {
          page = page + 1;
          $.post('<?php echo base_url() . "/admin/media_library/media_library/" ?>' + page, function(res) {
            $("#img-gallery").append(res);
          });

        }
      }
    });


  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      // document.getElementById('preview').style.display = 'block';
     // alert(input.files[0]);

      reader.onload = function(e) {
      //  $('#blah').attr('src', e.target.result);
       // console.log(e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#image").change(function() {
    readURL(this);
  });

  function catagoryCheckbox(e) {
    var catagory_list = "";
    if (!e.checked) {
      removeCatagory.push(e.value);
      $("input[name=delete_catagory_list]").val(removeCatagory);
    }
    $.each($("input[name='cat[]']:checked"), function() {
      catagory_list += "<span class='badge badge-pill badge-primary'>" + $(this).attr("data-name") + "</span>";
    });
    $.each($("input[name='catselect[]']:checked"), function() {
      catagory_list += "<span class='badge badge-pill badge-primary'>" + $(this).attr("data-name") + "</span>";
    });
    $(".catagory-select").html(catagory_list);
  }



  function myFunction() {
    // alert(1);
    document.getElementById('s_title').style.display = 'block';
    var title = document.getElementById('title').value.toLowerCase();
    var s = title.replace(/[^a-z0-9]/gi, '-');
    var s1 = s.replace(/-+/g, "-");
    s1 = s1.replace(/(^\-)|(\-$)/gi, "");
    var sugest_title = document.getElementById('sugest_title').value;
    var n = sugest_title.length;
    var res = sugest_title.substring(n - 1, n);
    document.getElementById('sugest_title').value = s1.substring(0, 100);
  }

  // function validate() {

  //   var editor_val = document.getElementById('source').value;
  //   //alert(cat);
  //   if (!(editor_val.length > 6)) {
  //     document.getElementById('error12345').innerHTML = '<br><center>The post content is required.</center>';
  //     return false;
  //   } else {
  //     return true;
  //   }

  // }

  function catagoryFilter() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('category_filter');
    filter = input.value.toUpperCase();
    ul = document.getElementById("catagorycheckbox");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      //  console.log(li[i].textContent);
      a = li[i];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }


  //////////////POst preview section

  function pre_view(id)
  {
    //var content = document.getElementById('source').value;
    var source = CKEDITOR.instances['source'].getData();
    var seo_url=document.getElementById('sugest_title').value;
    var title = document.getElementById('title').value;
    // alert(seo_url);
    // return;


    // var date=<?php //echo $date = date("Y/m/d");?>

    var d = new Date();
    var y=d.getFullYear();
    var m=d.getMonth()+1;
    if(m.toString().length<2)
    {
      var m = '0'+m;
    }
    var day=d.getDate();
    var date=y+"/"+m+"/"+day;
    // var da = y+"/"+m;
    // console.log(date);
    // return;
    $.ajax({
      url:'<?php echo base_url();?>/admin/admin/post_preview/'+id,
      type:'post',
      data:{id:id,content:source,title:title,seo_url:seo_url,date:date},
      
      success:function(data)
      {
        var date_ = data
        // console.log(data);
        // return;
        window.location='<?php echo base_url();?>/'+date_+'/'+seo_url+'/preview';
        
      //  console.log(data);
      }
    });
  }


  /////////// Remove Media

  function remove_feature_img(id)
  {
    // alert(id);
    // return;
    $.ajax({
      url:'<?php echo base_url();?>/admin/admin/remove_image/'+id,
      type:'post',
      data:{id:id},
      success:function(response)
      {
        //alert(response);
      //  window.location='<?php //echo base_url();?>/'+date_+'/'+seo_url;
       // return;
      }
    });
  }

  function img_src(e)
  {
     var img_src = document.getElementsByClassName("image-list");
     var abc = document.getElementById("img_path");
     abc.append(e.getAttribute('src'));
   //  var altt = e.getAttribute('alt');
    //  if(!altt)
    //  {
    //   console.log('nnnn');
    //  }
    //  else
    //  {
    //   console.log(altt);
    //  }
  }


 
  // CKEDITOR.plugins.addExternal( 'abbr', '/myplugins/abbr/', 'plugin.js' );

// extraPlugins needs to be set too
            


</script>


<script src="<?php echo base_url();?>/assets/ckeditor/ckeditor.js"></script>
<script>
  $(document).ready(function(){

    for (key in CKEDITOR.instances) { CKEDITOR.instances[key].destroy(true); }
    CKEDITOR.replace('content',{
					height: 600,

          

  // filebrowserImageBrowseUrl: 'http://localserver.com/wp2ci/assets/ckfinder/ckfinder.html?type=Images',
   // filebrowserUploadUrl: 'http://localserver.com/wp2ci/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserUploadUrl: '<?php echo base_url();?>/home/upload_ck',
    filebrowserBrowseUrl: '<?php echo base_url();?>/home/upload_ck_file_browser',
    filebrowserUploadMethod: "form",
  //filebrowserImageUploadUrl: 'http://localserver.com/wp2ci/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
  // filebrowserImageUploadUrl: 'http://localserver.com/wp2ci/home/upload_ck'
     });


     setTimeout(my_edit_browse_text, 1500);

     
  });

  
function my_edit_browse_text(){
 // console.log('456');
  document.querySelector(".cke_toolbar .cke_button__image_icon").addEventListener('click', ()=>{
      console.log('asd');
      setTimeout(()=>{
      //  console.log('asd');
        document.querySelector('[title="Browse Server"]').innerHTML = 'Upload Image';
      }, 100)
     })
}
  

</script>
