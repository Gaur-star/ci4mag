<style>
  .panel {
    border: 1px solid #cecdcd;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
  }
  .panel .panel-heading {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    font-size: 15px;
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
    border-bottom: 1px solid #dbdbdb;
    padding: 10px;
  }
  div.editable {
    width: 100%;
    height: 100px;
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
  .dt_cl {
    font-size: 14px;
    padding: 9px 8px;
  }
  .main-footer {
    margin-left: 0px!important;
  }
</style>

<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 mt-2">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3><?= $page_title ?></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?php
                  $session = session();
                  $data_value['value'] = $session->get('value');
                ?>
                <div class="col-12">
                  <div id="success" class="py-2 px-3 my-2" style="background-color: #98FB98;display:none;font-size:large"></div>
                    <?php 
                      $session = session();
                      echo $session->getFlashdata("msg");
                      $post_data = $session->getFlashdata("post_data");
                    ?>
                    <input type="hidden" id="postid" value="<?php if(isset($postedit)){echo $postedit['id'];} ?>">
                    <div class="form-group">
                      <label for="title" class="mb-0">Post or Blog Title <span style='color:red;'>*</span></label>
                      <!-- <span id="title_error" style="color:red"></span> -->
                      <input type="text"  name="title" id="title" class=" form-control" required placeholder="Enter Your Title"  value="<?php if(isset($postedit)){echo $postedit['title'];} ?>">
                    </div>

                    <div class="form-group">
                      <label for="sugest_title" class="mb-0" style="font-weight:0px">Post or Blog URL <span style='color:red;'>*</span><small id="uerror" class="text-danger"></small></label>
                      <!-- <span id="source_error" style="color:red"></span> -->
                      <input type="text" name="sugest_title" id="sugest_title" class="newsletter_input form-control" placeholder="Url" value="<?php if(isset($postedit)){echo $postedit['seo_url'];} ?>" required>
                    </div>        

                    <!-- <div class="form-group" class="mb-0">
                      <label for="visibility" class="mb-0">Add Visibilty</label>
                      <select class="form-control" name="visibility" id="visibility" required>
                        <option selected value="p">Public</option>
                        <option  value="h">Hidden</option>
                      </select>
                    </div> -->

                    <!----------ckeditor-div----------->
                    <div class="form-group">
                      <label for="source" class="mb-0">Description</label>
                      <textarea id="source" name="content" class="form-control ckeditor">
                      <?php if(isset($postedit)){echo $postedit['content'];} ?>
                      </textarea>
                    </div>
                    <!----------ckeditor----------->
                    <div class="form-group">
                      <label class="mb-0">Post Link</label>
                      <?php if(isset($postedit)){ ?>
                      <div class="border p-1" style="height: 57px;">
                        <a href="<?php if($postedit['visibility'] == 'p'){if($permalink){echo base_url('/').'/'.date($permalink,strtotime($postedit['date_'])).'/'.$postedit['seo_url'];}else{echo base_url('/').'/'.$postedit['seo_url'];}}?>" target="_blank">
                          <?php if($permalink){echo base_url('/').'/'.date($permalink,strtotime($postedit['date_'])).'/'.$postedit['seo_url'];}else{echo base_url('/').'/'.$postedit['seo_url'];}?>
                        </a>
                      </div>
                      <?php }else{ ?>
                      <div class="border p-1" style="height: 57px;" id="plink"></div>
                      <?php } ?>
                    </div>
                  </div>
                  <?php
                    $d = date("Y/m/d");
                    $d_create = date_create($d);
                    $date = date_format($d_create,$permalink); 
                  ?>
                </div>
                <div class="col-md-4">
                  <div class="mb-2">
                    <div class="panel">
                      <div class="panel-heading">Publish</div>
                      <div class="panel-body">
                        <div class="form-group">
                          <?php  if ($roleId == 1) { ?>
                            <label for="author" class="mb-0">Author:</label>
                            <select name="author" id="author" class="form-control">
                              <?php foreach (get_author() as $author) { ?>
                                <option value="<?php echo $author['uid']; ?>" <?php if(isset($postedit)){if($postedit['author'] == $author['uid'])echo "selected";} ?> >&nbsp;<?php echo $author['f_name'] . " " . $author['l_name']; ?></option>
                              <?php } ?>
                            </select>
                          <?php  } ?>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <label for="author" class="mb-0">Publish</label>
                          </div>
                          <div class="col-7">
                            <div class="input-group date">
                              <input type="date" class="form-control datetimepicker-input dt_cl" data-target="#reservationdate" name="date_" id="date_" value="<?php if(isset($postedit)){echo date('Y-m-d',strtotime($postedit['date_']));} ?>"/>
                            </div>
                          </div>
                          <div class="col-5">
                            <div class="input-group date">
                              <input type="time" class="form-control datetimepicker-input dt_cl" name="time_"  id="time" value="<?php if(isset($postedit)){echo date('h:m',strtotime($postedit['time_']));} ?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 mt-3">
                            <input name="site_map" id="site_map" type="checkbox" value="" <?php if(isset($postedit)){if($postedit['site_map'] == 1){echo "checked";}}else{echo "checked";}?> >
                            <label for="site_map">Include this post in site map</label>
                          </div>
                          <div class="col-12 mt-1">
                            <input name="newssitemap" id="newssitemap" type="checkbox" value="" <?php if(isset($postedit)){if($postedit['news_sitemap'] == 1){echo "checked";}}else{echo "checked";}?> >
                            <label for="newssitemap">Include this post in news sitemap</label>
                          </div>
                          <div class="col-6 mt-2">
                            <input name="no_follow" id="no_follow" type="checkbox" value="" <?php if(isset($postedit)){if($postedit['nofollow'] == 1){echo "checked";}}?> >
                            <label for="no_follow">No Follow</label>
                          </div>
                          <div class="col-6  mt-2">
                            <input name="no_index" id="no_index" type="checkbox" value="" <?php if(isset($postedit)){if($postedit['indexed'] == '0'){echo "checked";}}?> >
                            <label for="no_index">No Index</label>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-4">
                            <button id="preview-btn" class="btn btn-sm btn-primary btn-block" type="button" onclick="pre_view()">
                              Preview
                            </button>
                          </div>
                          <?php if(isset($postedit)){ ?>
                            <div class="col-4">
                              <button class="btn btn-sm btn-primary btn-block" type="button" id="update" onclick="update_post()">
                                Update
                              </button>
                              <div id="loader" style="display:none;"></div>
                            </div>
                            <div class="col-4">
                              <button class="btn btn-sm btn-primary btn-block" id="save" onclick="update_post('<?php echo $postedit['visibility']; ?>')" >
                                <?php if($postedit['visibility'] == 'h'){echo "Publish";}elseif($postedit['visibility'] == 'p'){echo "Draft";} ?>
                              </button>
                            </div>
                          <?php }else{ ?>
                            <div class="col-4">
                              <button class="btn btn-sm btn-primary btn-block" type="button" id="publish" onclick="update_post('h')">
                                Publish
                              </button>
                              <div id="loader" style="display:none;"></div>
                            </div>
                            <div class="col-4">
                              <button class="btn btn-sm btn-primary btn-block" id="save_draft" onclick="update_post()">
                                Draft
                              </button>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-2">
                    <div class="panel">
                      <div class="panel-heading">Feature Image</div>
                      <div class="panel-body">
                        <input type='hidden' name='image' id='image'  value="<?php if(isset($postedit)){echo $postedit['image'];}?>" style="display:none"/>
                        <label class="form-group" id="preview" style="height:200px;width:100%; overflow:hidden;">
                          <img id="preview_img" src="<?php if(isset($postedit)){echo $postedit['url'];}else{echo base_url()."/assets/admin-image/noimage.png";} ?>" onclick="addImage()" class="img-thumbnail" style="width:100%;height: 200px;cursor: pointer;">
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="mb-2">
                    <div class="panel">
                      <div class="panel-heading">Categories</div>
                      <div class="panel-body">
                        <div class="catagory-select">

                        </div>
                        <input class="form-control form-control-sm mt-2" id="category_filter" value="" onkeyup="catagoryFilter()">
                        <button class="btn btn-sm btn-primary mt-2"><a href="<?php echo base_url(). '/admin/category'?>" style="color:white;">Categories</a></button>
                      </div>
                      <div class="panel-body" style="height: 250px;overflow: scroll;">
                        <ul class="catagory-list" id="catagorycheckbox">
                          <?php
                          foreach ($cat as $catdata) {  ?>
                            <li>
                              <input 
                                type="checkbox" 
                                id="<?php echo $catdata['id'] ?>" 
                                class="catagory-checkbox" 
                                name="cat[]" 
                                value="<?php echo $catdata['id'] ?>" 
                                data-id="" 
                                onclick="catagoryCheckbox()" 
                                data-name="<?php echo $catdata['categorie'] ?>" 
                                <?php
                                  if (isset($catlist)) {
                                    echo  in_array($catdata['id'], $catlist) ? "checked" : "";
                                  }
                                ?>
                              >
                              <label for="<?php echo $catdata['id']?>"><?php echo $catdata["categorie"]?></label>   
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
                        <input type="hidden" name="keyword_list" id="keyword_list" value="">
                        <div class="editable">
                          <div id="tag_list">
                            <span id="old_tag">
                            <?php 
                            if(isset($taglist)){
                              foreach($taglist as $tag){
                                echo " <span class='badge badge-secondary tags-btn' onclick='removePostTag(this)' data-tags-list='" . $tag["id"] . "'> " . $tag["keyword"] . " <i class='fa fa-times' aria-hidden='true'></i> </span> ";
                              }
                            } 
                            ?>
                            </span>
                            <span id="new_tag"></span>
                          </div>
                          <div contenteditable="true" id="keyword"></div>
                        </div>
                        <div style="color:gray;">Press enter after every tag</div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-2">
                    <div class="panel">
                      <div class="panel-heading">Meta Tags</div>
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="meta_tag" class="mb-0">Meta Tags <small style='color:green;'>( Optional )</small></label>
                          <input type="text" placeholder="Enter Meta tag" name="meta_tag" id="meta_tag" class="form-control form-control-sm" value="<?php if(isset($postedit)){echo $postedit['meta_tag'];} ?>">
                        </div>
                        <div class="form-group">
                          <label for="meta_desc" class="mb-0"> Meta Description <small style='color:green;'>( Optional )</small></label>
                          <textarea class="form-control form-control-sm" placeholder="Enter Meta description" name="meta_desc" id="meta_desc" rows="3"><?php if(isset($postedit)){echo $postedit['meta_desc'];} ?></textarea>
                        </div>
                      </div>
                    </div>
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
          <input type='file' name='image' id='image' onchange='readURL(this);' style="padding:2px;background:#f2f2f2;background-image: url('paper.gif');visibility:hidden;" class="newsletter_input form-control-lg form-control"/>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-9">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" id="list-gallery-tab" data-toggle="tab" href="#list-gallery">Library</a></li>
                <li class="nav-item"><a class="nav-link" id="image-upload-tab" data-toggle="tab" href="#image-upload">Upload Image</a></li>
              </ul>
              <div class="tab-content" id="gallery-content">
                <div id="list-gallery" class="tab-pane container active">
                  <div id="img-gallery" class="row">

                  </div>
                </div>
                <div id="image-upload" class="tab-pane container">
                  <div id="img-upload-section" class="row">
                    <div class="col-12">
                      <form id="media-upload" action="<?php echo base_url() ?>/admin/admin/imageUpload" enctype="multipart/form-data">
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

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="insertImage()">Insert into post</button>
        </div>
      </div>
    </div>
  </div>

<!-- /////////////////////////////////////-------SCRIPT-------------/////////////////////////////////// -->
<script>
  <?php if(isset($postedit)){ ?>
    $('#preview-btn').prop('disabled',false);
  <?php }else{ ?>
    $('#preview-btn').prop('disabled',true);
  <?php } ?>
  $('#publish, #save_draft').prop('disabled',true);
  var update_status = <?php if(isset($postedit)){echo 'false';}else{echo 'true';} ?>;
  <?php if(!isset($postedit)){ ?>
    window.addEventListener('load',function(){
      setInterval(checkautosave,5000);
    });
    window.addEventListener('load',function(){
      setInterval(checkinsert,10000);
    });
  <?php } ?>
  function checkautosave(){
    var upid = document.getElementById('postid').value;
    if(upid){
      auto_save();
    }
  }
  function checkinsert(){
    var title = document.getElementById('title').value;
    var source = htmlEntities(CKEDITOR.instances['source'].getData());
    if(update_status && (title || source)){
      update_status = false;
      insert_post();
      $('#publish, #preview-btn, #save_draft').prop('disabled',false);
    }
  }
  /////////////// Post Publish ///////////////////
  function pad2(number) {
    return (number < 10 ? '0' : '') + number
  }
  function auto_save(){
    var id = document.getElementById('postid').value;
    var title = document.getElementById('title').value;
    var sugest_title = document.getElementById('sugest_title').value;
    var source = htmlEntities(CKEDITOR.instances['source'].getData());
    var author = document.getElementById('author').value;
    var image = document.getElementById('image').value;
    var tag = document.getElementById('keyword_list').value;
    var date_ = document.getElementById('date_').value;
    var time = document.getElementById('time').value;
    var time_ = time.substring(0,5)+":00";
    var meta_tag = document.getElementById('meta_tag').value;
    var meta_desc = document.getElementById('meta_desc').value;
    var site_m = document.getElementById('site_map');
    var news_sitem = document.getElementById('newssitemap');
    var nofollow = document.getElementById('no_follow');
    var noindex = document.getElementById('no_index');

    if(site_m.checked==true){
      site_m.setAttribute("value","1");
      site_map = site_m.value;
    }else{
      site_m.setAttribute("value","0");
      site_map = site_m.value;
    }
    if(news_sitem.checked==true){
      news_sitem.setAttribute("value","1");
      news_sitemap = news_sitem.value;
    }else{
      news_sitem.setAttribute("value","0");
      news_sitemap = news_sitem.value;
    }
    if(nofollow.checked==true){
      nofollow.setAttribute("value","1");
      nofollow = nofollow.value;
    }else{
      nofollow.setAttribute("value","0");
      nofollow = nofollow.value;
    }
    if(noindex.checked==true){
      noindex.setAttribute("value","0");
      noindex = noindex.value;
    }else{
      noindex.setAttribute("value","1");
      noindex = noindex.value;
    }

    cat_id =[];
    $.each($("input[name='cat[]']:checked"), function() {
      cat_id.push($(this).val());
    });
    if(cat_id.length==0){
      cat_id.push(1);
    }
    
    if(image == 0){
      image = 19;
    }

    var all_data = {
      'title' : title,
      'seo_url' : sugest_title,
      'image' : image,
      'content' : source,
      'meta_tag' : meta_tag,
      'meta_desc' : meta_desc,
      'date_' : date_,
      'time_' : time_,
      'author' : author,
      'site_map' : site_map,
      'news_sitemap' : news_sitemap,
      'nofollow' : nofollow,
      'indexed' : noindex,
      'seo_url_text' : sugest_title,
    }
    $.ajax({
      type:'post',
      url: window.location.origin+"/yorkpedia/admin/auto-update/"+id,
      data: {
        'posts' : all_data,
        'categories' : cat_id,
        'keywords' : tag
      },
      success:function(data){
         $("#plink").html(data);
      },
    });
  }
  function update_post(type = ''){
    var id = document.getElementById('postid').value;
    var title = document.getElementById('title').value;
    var sugest_title = document.getElementById('sugest_title').value;
    var source = htmlEntities(CKEDITOR.instances['source'].getData());
    var author = document.getElementById('author').value;
    var date_ = document.getElementById('date_').value;
    var time = document.getElementById('time').value;
    var time_ = time.substring(0,5)+":00";
    var image = document.getElementById('image').value;
    var tag = document.getElementById('keyword_list').value;
    var meta_tag = document.getElementById('meta_tag').value;
    var meta_desc = document.getElementById('meta_desc').value;
    var site_m = document.getElementById('site_map');
    var news_sitem = document.getElementById('newssitemap');
    var nofollow = document.getElementById('no_follow');
    var noindex = document.getElementById('no_index');

    var currentdate = new Date();
    var datetime = currentdate.getFullYear() + "-"+  pad2(parseInt(currentdate.getMonth()) + 1) + "-" + pad2(currentdate.getDate()) + " " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds(); 

    if(site_m.checked==true){
      site_m.setAttribute("value","1");
      site_map = site_m.value;
    }else{
      site_m.setAttribute("value","0");
      site_map = site_m.value;
    }
    if(news_sitem.checked==true){
      news_sitem.setAttribute("value","1");
      news_sitemap = news_sitem.value;
    }else{
      news_sitem.setAttribute("value","0");
      news_sitemap = news_sitem.value;
    }
    if(nofollow.checked==true){
      nofollow.setAttribute("value","1");
      nofollow = nofollow.value;
    }else{
      nofollow.setAttribute("value","0");
      nofollow = nofollow.value;
    }
    if(noindex.checked==true){
      noindex.setAttribute("value","0");
      noindex = noindex.value;
    }else{
      noindex.setAttribute("value","1");
      noindex = noindex.value;
    }

    cat_id =[];
    $.each($("input[name='cat[]']:checked"), function() {
      cat_id.push($(this).val());
    });
    if(cat_id.length==0){
      cat_id.push(1);
    }
    
    if(image == 0){
      image = 19;
    }

    if(type){
      if(type == 'p'){
        var visibility = 'h';
      }else if(type == 'h'){
        var visibility = 'p';
      }
      var all_data = {
        'title' : title,
        'seo_url' : sugest_title,
        'image' : image,
        'content' : source,
        'meta_tag' : meta_tag,
        'meta_desc' : meta_desc,
        'visibility' : visibility,
        'author' : author,
        'date_' : date_,
        'time_' : time_,
        'update_date' : datetime,
        'site_map' : site_map,
        'news_sitemap' : news_sitemap,
        'nofollow' : nofollow,
        'indexed' : noindex,
        'seo_url_text' : sugest_title,
      }
    }else{
      var all_data = {
        'title' : title,
        'seo_url' : sugest_title,
        'image' : image,
        'content' : source,
        'meta_tag' : meta_tag,
        'meta_desc' : meta_desc,
        'author' : author,
        'date_' : date_,
        'time_' : time_,
        'update_date' : datetime,
        'site_map' : site_map,
        'news_sitemap' : news_sitemap,
        'nofollow' : nofollow,
        'indexed' : noindex,
        'seo_url_text' : sugest_title,
      }
    }

    $.ajax({
      url: window.location.origin+"/yorkpedia/admin/checkurl",
      type: 'POST',
      data: {
        'url' : sugest_title,
        'id' : id
      },
      success: function (data) {
        if(data == 'new'){
          $.ajax({
            type:'post',
            url: window.location.origin+"/yorkpedia/admin/update-data/"+id,
            data: {
              'posts' : all_data,
              'categories' : cat_id,
              'keywords' : tag
            },
            success:function(data){
              window.location.href=data;
            },
          });
        }else{
          alert('Already Exits This URL! Change this URL')
        }
      },
    })
  }
  function insert_post(){
    var title = document.getElementById('title').value;
    var visibility = 'h';
    var sugest_title = document.getElementById('sugest_title').value;
    var source = htmlEntities(CKEDITOR.instances['source'].getData());
    var author = document.getElementById('author').value;
    var date_ = document.getElementById('date_').value;
    var time = document.getElementById('time').value;
    var time_ = time.substring(0,5)+":00";
    var image = document.getElementById('image').value;
    var tag = document.getElementById('keyword_list').value;
    var meta_tag = document.getElementById('meta_tag').value;
    var meta_desc = document.getElementById('meta_desc').value;
    var site_m = document.getElementById('site_map');
    var news_sitem = document.getElementById('newssitemap');
    var nofollow = document.getElementById('no_follow');
    var noindex = document.getElementById('no_index');

    var currentdate = new Date();
    var datetime = currentdate.getFullYear() + "-"+  pad2(parseInt(currentdate.getMonth()) + 1) + "-" + pad2(currentdate.getDate()) + " " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds(); 

    if(site_m.checked==true){
      site_m.setAttribute("value","1");
      site_map = site_m.value;
    }else{
      site_m.setAttribute("value","0");
      site_map = site_m.value;
    }
    if(news_sitem.checked==true){
      news_sitem.setAttribute("value","1");
      news_sitemap = news_sitem.value;
    }else{
      news_sitem.setAttribute("value","0");
      news_sitemap = news_sitem.value;
    }
    if(nofollow.checked==true){
      nofollow.setAttribute("value","1");
      nofollow = nofollow.value;
    }else{
      nofollow.setAttribute("value","0");
      nofollow = nofollow.value;
    }
    if(noindex.checked==true){
      noindex.setAttribute("value","0");
      noindex = noindex.value;
    }else{
      noindex.setAttribute("value","1");
      noindex = noindex.value;
    }

    cat_id =[];
    $.each($("input[name='cat[]']:checked"), function() {
      cat_id.push($(this).val());
    });
    if(cat_id.length==0){
      cat_id.push(1);
    }
    
    if(image == 0){
      image = 19;
    }

    var all_data = {
      'title' : title,
      'seo_url' : sugest_title,
      'image' : image,
      'content' : source,
      'meta_tag' : meta_tag,
      'meta_desc' : meta_desc,
      'author' : author,
      'visibility' : visibility,
      'date_' : date_,
      'time_' : time_,
      'active' : '1',
      'date_time' : datetime,
      'update_date' : datetime,
      'flag' : '1',
      'site_map' : site_map,
      'news_sitemap' : news_sitemap,
      'nofollow' : nofollow,
      'indexed' : noindex,
      'seo_url_no' : '0',
      'seo_url_text' : sugest_title,
      'post_parent' : '0',
      'matico' : 'n'
    }
    $.ajax({
      type:'post',
      url: window.location.origin+"/yorkpedia/admin/insert-data",
      data: {
        'posts' : all_data,
        'categories' : cat_id,
        'keywords' : tag
      },
      success:function(data){
        document.getElementById('postid').value = data;
      },
    });
  }
  function pre_view(){
    var id = document.getElementById('postid').value;
    var sugest_title = document.getElementById('sugest_title').value;
    if(sugest_title){
      $.ajax({
        url:'<?php echo base_url();?>/admin/preview-post/'+id,
        type:'post',
        data:{id:id},
        success:function(data){
          window.open(data, '_blank');
        }
      });
    }else{
      alert('Enter URL!');
    }
  }

  /////////////// Title & URL ///////////////////
  $("#title").keyup(function() {
    var title = document.getElementById('title').value.toLowerCase();
    title = title.trim();
    var s = title.replace(/[^a-z0-9\/]/gi, '-');
    s = s.replace(/-+/gi,'-');
    document.getElementById('sugest_title').value = s;
  });
  $("#sugest_title").blur(function() {
    var url = document.getElementById('sugest_title').value.toLowerCase();
    url = url.trim();
    var nurl = url.replace(/[^a-z0-9\/]/gi, '-');
    nurl = nurl.replace(/-+/gi,'-');
    document.getElementById('sugest_title').value = '';
    document.getElementById('sugest_title').value = nurl;
  });

  /////////////// Show Date Time ///////////////////
  var today = new Date();
  date = today.getFullYear()+"-"+pad2(today.getMonth()+1)+"-"+pad2(today.getDate());
  var pdate = $("#date_").val();
  if(pdate){
    $("#date_").val(pdate);
  }else{
    $("#date_").val(date);
  }
  var time = today.
  time = today.toLocaleString('en-US',{hour: 'numeric', minute: 'numeric', hour12: false});
  var ptime = $("#time").val();
  if(ptime){
    $("#time").val(ptime);
  }else{
    $("#time").val(time);
  }
  /////////////// Feature Image ///////////////////
  var modal_open = false;
  var page;
  var maxPage;
  function addImage() {
      $("#image_gallery").modal("toggle");
  }
  function insertImage() {
    $(".gallery-img-checkbox:checked").each(function(){
      var img_id  =  $(this).attr('id');
      img_id = img_id.replace('gallery_img_','');
      $('#preview_img').attr('src', $(this).val());
      $('#image').attr('value', img_id);
    });
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
        if ($(".tab-content").scrollTop() > 400) {
          page = page + 1;
          $.post('<?php echo base_url() ."/"."admin/media_library/media_library/" ?>' + page, function(res) {
            $("#img-gallery").append(res);
          });
        }
      }
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
            url: "<?php echo base_url() ."/admin/media_library/media_library" ?>",
            success: function(res) {
              $("#img-gallery").html(res);
              modal_open = true;
              $("#image-upload").removeClass("active");
              $("#list-gallery").addClass("active");
              $("#image-upload-tab").removeClass("active");
              $("#list-gallery-tab").addClass("active");
            }
          });
        },
        error: function(data) {
        }
      });
    });
  });
    
  /////////////// Category ///////////////////
  catagoryCheckbox();
  function catagoryCheckbox() {
    cat_id =[];
    var catagory_list = "";
    $.each($("input[name='cat[]']:checked"), function() {
      cat_id.push($(this).val());
      catagory_list += "<span class='badge badge-pill badge-primary'>" + $(this).attr("data-name") + "</span>";
    });
    $(".catagory-select").html(catagory_list);
  }
  function catagoryFilter() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('category_filter');
    filter = input.value.toUpperCase();
    ul = document.getElementById("catagorycheckbox");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) {
      a = li[i];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
  /////////////// Tag ///////////////////
  var tagIndex = 0;
  
  var insert_tags = [];
  <?php if(isset($taglist)){
    foreach($taglist as $tag){ ?>
      insert_tags.push("<?php echo $tag['keyword']; ?>");
  <?php  }
  } ?>
  var removeElemetn = [];
  $("input[name='keyword_list']").val(insert_tags);
  $("#keyword").keypress(function(e) {
    if (e.keyCode == 13) {
      e.preventDefault();
      $('#old_tag').hide();
      var tags = $(this).text();
      insert_tags.push(tags);
      $("input[name='keyword_list']").val(insert_tags);
      $(this).empty();
      tagIndex = insert_tags.length - 1;
      addtags(insert_tags);
    }
  });
  function appendTags(tagIndex, tags) {
    $("#tag_list").append(" <span class='badge badge-secondary tags-btn' onclick='removeTag(this)' data-tagIndex='" + tagIndex + "'> " + tags + " <i class='fa fa-times' aria-hidden='true'></i></span> ");
  }
  function addtags(tags) {
    $tg = '';
    for (i = 0; i < tags.length; i++) {
      $tg = $tg + " <span class='badge badge-secondary tags-btn' onclick='removeTag(this)' data-tagIndex='" + i + "'> " + tags[i] + " <i class='fa fa-times' aria-hidden='true'></i></span> ";
    }
    $("#new_tag").html($tg);
  }
  function removeTag(e) {
    if (insert_tags.length > 0) {
      insert_tags.splice(e.getAttribute("data-tagIndex"), 1);
    } else {
      insert_tags = [];
    }
    $("input[name='keyword_list']").val(insert_tags);
    addtags(insert_tags);
  }
  function removePostTag(e) {
    removeElemetn.push(e.getAttribute("data-tags-list"));
    $("input[name='delete_keyword_list']").val(removeElemetn);
    e.remove();
  }

  /////////////////////// htmlencode //////////////////////////
  function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }

</script>
<!-- /////////////////////////////////////-------CK EDITOR-------------/////////////////////////////////// -->

<script src="<?php echo base_url();?>/assets/ckeditor/ckeditor.js"></script>
<script>
  $(document).ready(function(){
    for (key in CKEDITOR.instances) { CKEDITOR.instances[key].destroy(true); }
    CKEDITOR.replace('content',{
      height: 1010,
      filebrowserUploadUrl: '<?php echo base_url();?>/home/upload_ck',
      filebrowserBrowseUrl: '<?php echo base_url();?>/home/upload_ck_file_browser',
      filebrowserUploadMethod: "form",
    });
  });
  function my_edit_browse_text(){
    document.querySelector(".cke_toolbar .cke_button__image_icon").addEventListener('click', ()=>{
      console.log('asd');
      setTimeout(()=>{
        document.querySelector('[title="Browse Server"]').innerHTML = 'Upload Image';
      }, 100)
    })
  }
</script>
