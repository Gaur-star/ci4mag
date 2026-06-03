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
    padding: 7px 15px;
    color: #000;
    margin: 2px;
    border: 1px solid #828282;
    border-radius: 10px;
    font-size: 20px;
    background-color: #fff
  }

  .table tr td:nth-child(2) {
    width: 50%
  }

  .table tr td:nth-child(1) {
    width: 0%
  }

  .table tr {
    height: 100px;
    font-size: 12px;
  }

  .fade-color {
    color: #757575;
  }

  .title_name {
    color: #09f;
  }
  .addpost{
    margin-left: -5vw;
    }
</style>

<div class="content-wrapper">
  <div class="container-fluid">
  <?php if(isset($_GET['st'])){ ?>
      <div id="success" class="py-2 px-3 my-2 text-nowrap" style="background-color: #98FB98;font-size:large"><?php echo "Post-published successfully..."; ?></div>
    <?php } ?>
    <div class="row mb-3 ">
      <div class="col-2 mt-3">

      <?php  
      // echo "<pre>";
      // print_r($blog);
      // die;
      ?>
        <h3>Posts</h3>
      </div>
      <div class="col-3 mt-3 addpost">
      <a href="<?php echo base_url("admin/add-post");?>"><button class="btn btn-sm btn-outline-primary" type="button"><b>Add New Post</b></button></a>
      <!-- <button class="btn btn-sm btn-outline-primary" onkeypress="add_post_preview()" type="button"><b>Add New Post</b></button> -->
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 mb-3 text-left">
        <form action='<?php echo base_url(); ?>/admin/posts' method='get' class='form-inline'>

          <div class="input-group col-2" style="padding:0px">
            <select name="order" id="order" class="form-control">
              <option value="ASC" <?php echo (($searchdetail["order"] == "ASC") ? "selected" : "") ?>>ASC</option>
              <option value="DESC" <?php echo (($searchdetail["order"] == "DESC") ? "selected" : "") ?>>DESC</option>
            </select>
          </div>
          <div class="input-group col-2" style="padding:0px">
            <select name="date" class="form-control">
              <option value="">All dates</option>
              <?php
              if ($dateList) {
                foreach ($dateList as $dl) {
                  if ($dl["update_date"] != "0000-00-00 00:00:00") {
              ?>
                    <option value="<?php echo $dl["update_date"] ?>" <?php echo (($searchdetail["date"] == $dl["update_date"]) ? "selected" : "") ?>><?php echo date("M Y", strtotime($dl["update_date"])) ?></option>
              <?php }
                }
              }
              ?>
            </select>
          </div>
          <div class="input-group col-3" style="padding:0px">
            <select name="cat" id="order" class="form-control">
              <option value="">All Categories</option>
              <?php
             // print_r($category);
              if ($catagory) {
              //  print_r($catagory["id"]);die;
                foreach ($catagory as $cat) { //echo $cat["id"]."sssssss";?>
                  <option value="<?php echo $cat["id"] ?>" <?php echo (($searchdetail["category"] == $cat["id"]) ? "selected" : "") ?>><?php echo $cat["categorie"] ?></option>
              <?php }
              }
              ?>
            </select>
          </div>
          <div class="input-group col-2" style="padding:0px">
            <select name="short" id="short" class="form-control">
              <option value="title" <?php echo (($searchdetail["short"] == "title") ? "selected" : "") ?>>Title</option>
              <option value="author" <?php echo (($searchdetail["short"] == "author") ? "selected" : "") ?>>Author</option>
            </select>
          </div>
          <div class="input-group col-3" style="padding:0px">
            <input type="text" class="form-control" placeholder="Search by title" name="search" id="search">
            <div class="input-group-append">
              <button class="input-group-text" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
          <!-- <button class="btn btn-outline-primary" type="submit">SUBMIT</button> -->
        </form>
      </div>
      <?php 
      // echo "<pre>";
      // print_r($blog);die;
      
      ?>
      <div class="col-6 mt-2">

        <a href="<?php echo base_url("admin/posts") ?>">All <span class="fade-color"> (<?php echo $totalpost ?>)</span></a>
        | <a href="<?php echo base_url("admin/posts?vi=pub") ?>">Published <span class="fade-color"> (<?php echo $publish ?>)</span></a>
        | <a href="<?php echo base_url("admin/posts?vi=draft") ?>">Draft <span class="fade-color"> (<?php echo $draft ?>)</span></a>
        | <a href="<?php echo base_url("admin/trash") ?>">Trash <span class="fade-color"> (<?php echo $trashcount ?>)</span></a>
      </div>
      <div class="col-6 text-right">
        <?php
        // echo $this->pagination->create_links();
        ?>
      </div>
      <div class="col-6 mt-2 mb-2">
        <form action='<?php echo base_url(); ?>/admin/admin/bulkpostaction' class='form-inline' method="post">
          <div class="input-group">
            <select name="bulkaction" class="form-control">
              <option value="">Bulk Action</option>
              <option value="del">Trash</option>
            </select>
            <input type="hidden" name="bulkactionlist" value="">
          </div>
          <div class="input-group px-2">
            <button class="btn btn-outline-danger" type="submit">
              Apply
            </button>
          </div>
        </form>
      </div>
      <div class="col-12">
       
      <table class="table table-striped table-valign-middle">
          <tr class="active" style="height: 0px;">
            <td><input type="checkbox" value="" id="bulkactioncheckbox"></td>
            <td>Title</td>
            <td>Author</td>
            <td>Categories</td>
            <td>Date</td>
            <td>Tags</td>
            <!-- <td>Views</td> -->
          </tr>
          <?php
       //   $post_id = array();
          $count = 0;
          $all_post=$blog;

          // foreach($pages as $new_blogs)
          // {
          //   array_push($all_post, $new_blogs);
          // }
          // echo "<pre>";
          // print_r($all_post['keyword']);die;
          foreach ($all_post as $blogdata) {

            //  echo "<pre>";
            //  print_r($blogdata['seo_url']);die;
            $count = $count + 1;
          ?>
            <tr>
              <td><input type="checkbox" class="bulkaction" value="<?php echo $blogdata['id'];?>"></td>
              <td onmouseover="document.getElementById('div<?php echo $blogdata['id']; ?>').style.visibility='visible';" onmouseout="document.getElementById('div<?php echo $blogdata['id']; ?>').style.visibility='hidden';">
                <div class="title_name">
                  <?php echo $blogdata['title']; ?>
                </div>
                <div id="div<?php echo $blogdata['id']; ?>" style="visibility: hidden;cursor: pointer;">
                  <?php
                  $d = $blogdata['date_'];
                  $d_create = date_create($d);
                  $date = date_format($d_create,$permalink);
                  $text = $blogdata['seo_url'];
                  ?>

                 
                  <a href="<?php if($blogdata["visibility"] == "p"){ echo base_url() ."/".$date."/".$text.""; }else{ echo base_url() ."/".$date."/".$text."/preview"; } ?>" target="_blank"> View </a>|
                  <a href="<?php echo base_url() ."/" ."admin/edit-post/" . $blogdata['id'] ?>"> Edit</a>|
                  <a href="#" onclick="delete_post(<?php echo $blogdata['id']; ?>)"> Trash </a>
                </div>
              </td>
              <td style="color:#0099ff;">
                <a href="<?= base_url('admin/posts').'?author='.$blogdata['author'] ?>">
                  <?php if(!empty($blogdata['fname'])){echo $blogdata['fname'];} ?>
                </a>
              </td>
              
              <td style="color:#0099ff;">
              <?php if(isset($blogdata['categorie'])): ?>
                <?php if(empty($blogdata['categorie'])): ?>
                  <span>Uncategorized</span>
                <?php else: ?>
                  <span><?= $blogdata['categorie'] ?></span>
                <?php endif ?>
              <?php endif ?>
              </td>

              <td>
                <?php
                $stamp = strtotime($blogdata['date_time']);
                echo ($blogdata["visibility"] == "p") ? "Published<br>" : "Draft<br>";
                echo  date("Y/m/d", $stamp);
                ?>
              </td>
              <td><?php if(isset($blogdata['keyword'])){ echo $blogdata['keyword']; }?></td>
              <!-- <td><?php //echo ($blogdata['keyword']) ? $blogdata['keyword'] : "0" ?></td> -->
              <!-- <td><?php // echo ($blogdata['visit']) ? $blogdata['visit'] : "0"; ?></td> -->
              <!-- <td></td> -->
            </tr>
          <?php } ?>

          <tr class="active" style="height: 0px;">
            <td></td>
            <td>Title</td>
            <td>Author</td>
            <td>Categories</td>
            <td>Date</td>
            <td>Tags</td>
            <!-- <td>Views</td> -->
          </tr>
        </table>
      </div>
      <div class="col-6 text-right"></div>
      <div class="col-6 text-right pagination-page">
      <ul class="pagination">
        <?php //echo $this->pagination->create_links(); 
         $uri = current_url(true);
         $url = (string) $uri;

        if((count($blog)!=1)&&(count($blog)!=0)&&(strpos($url,"vi=draft") == false))
        {
          if($pager)
          {
            $pagi_path = "yorkpedia/admin/posts";
            $pager->setPath($pagi_path);
            ?>
            <li class="page-item">
            <?php
            echo $pager->links();
            ?>
            <li>
            <?php
          }
        } 
        ?>
        </ul>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript">
var dim = $('#success').is(":visible");
  if(dim == true){
    setInterval(function(){
      $('#success').hide();
      window.location = '<?php echo base_url();?>/admin/posts';
    },2000)
  }
  
  var url = "<?php echo base_url();?>";

  function delete_post(id) {
    // alert(1);
    //confirm("Do you want to delete this?");
    var r = confirm("Do you want to Add this in Trash?");
    if (r == true)
      window.location = url + "/admin/blog_edit/blog_delete/" + id;
    else
      return false;
  }
  $(document).ready(function() {
    $("#bulkactioncheckbox").on("click", function() {
      if ($("#bulkactioncheckbox").prop("checked")) {
        $(".bulkaction").prop('checked', true);
        var deleteBulk = [];
        $(".bulkaction:checked").each(function() {
          deleteBulk.push($(this).val());
        });
      } else {
        var deleteBulk = [];
        $(".bulkaction").prop('checked', false);
      }
      $("input[name=bulkactionlist]").val(deleteBulk);
    });

    $(".bulkaction").on("click", function() {
      var deleteBulk = [];
      $(".bulkaction:checked").each(function() {
        deleteBulk.push($(this).val());
      });
      $("input[name=bulkactionlist]").val(deleteBulk);
    });

  });


  // function add_post_preview()
  // {
   // return console.log('ssssss');
   
  //   var title = 'Untitled';
  //   var seo_url = 'untitled';


  //   var visibility = 'h';
  //   //////////////////////////////////
  //   const date = new Date();
  //   var d = date.getDate();
  //   var month = date.getMonth()+1;
  //   if(month.toString().length<2)
  //   {
  //     var m = '0'+month;
  //   }
  //   else{
  //     var m = month;
  //   }
  //   var y = date.getFullYear();

  //   var hour = date.getHours();
  //   var minute = date.getMinutes();
  //   var seconds = date.getSeconds();
  //   /////////////////////////////////
  //    var date_= y+'-'+m+'-'+d;
  //    var time_ = hour+':'+minute+':'+seconds;
  //    var update_date = date_;
  //    var nofollow = 0;
  //    var seo_url_no = 0;
  //    var seo_url_text = title;
  //    var post_parent = 0;
  //    $.ajax({
  //      url:'<?php // echo base_url()."/admin/addPost";?>',
  //      type:'post',
  //      data:{title:title,seo_url:seo_url,visibility:visibility,date_:date_,time_:time_,update_date:update_date,nofollow:nofollow,seo_url_no:seo_url_no,post_parent:post_parent,seo_url_text:seo_url_text},
  //      success:function(data)
  //      {
  //       // console.log(data);
  //      //  location.href='<?php //echo base_url();?>/admin/posts'
  //        // return;
  //      }
  //    });
  //  // console.log(post_parent);
  // }
  // function add_post_preview()
  // {
  //   $.ajax({
  //        url:'<?php  //echo base_url()."/admin/addPost";?>',
  //        type:'post',
  //   });
  // }

</script>
