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
     padding: 5px 10px;
     color: #000;
     margin: 2px;
     border: 1px solid #828282;
     border-radius:6px;
     font-size: 20px;
     background-color: #fff;
   }
   .table tr td{
       height: 54px;
       padding: 0 25px;
   }
   .table tr td>.edit-catagory {
     display: none;
   }

   .table tr:hover td>.edit-catagory {
     display: block;
   }
 </style>

 <div class="content-wrapper">
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Categories</h1>
           <?php
          //  echo "<pre>";
          //  print_r($catagory_list);die;
           ?>
         </div>
         <div class="col-sm-6">
          <form action="<?php echo base_url('admin/category')?>" method="GET" class='form-inline'>
            <div class="input-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search Category">
            <div class="input-group-append">
              <button class="btn input-group-test" type="submit">
              <i class="fas fa-search"></i>
              </button>
            </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
   <section class="content">
     <div class="newsletter">
         <div class="row">
           <div class="col-md-5">
             <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
               <div class="newsletter_title_container">
                 <?php $session = session();
                 echo $session->getFlashdata("msg") ?>
                 <div class="newsletter_title"><b style="color:#595959;">Add New categorie</b></div>
                 <?php if ($edit_id) { ?>
                   <form action="<?php echo base_url('/') .'/'."/admin/categorie/update_category/" . $page_no . "/" . $edit_id ?>" method="post" class="newsletter_form">
                   <?php } else { ?>
                     <form action="<?php echo base_url() .'/'."admin/categorie/categorie_add_process/" . $page_no ?>" method="post">
                     <?php } ?>

                     <div class="form-group">
                       <label>Name :</label>
                       <input type="text" class="form-control" placeholder="Category Name" name="categorie" id="categorie" value="<?php //echo $catagory_detail["categorie"] ?>" required>
                     </div>
                     <div class="form-group">
                       <label>Slug :</label>
                       <input type="text" class="form-control" required="required" name="slug" id="slug" value="<?php //echo $catagory_detail["slug"] ?>">
                     </div>
                     <div class="form-group">
                       <label>Parent Category:</label>
                       <select name="p_categorie" class="form-control">
                         <option value="0">None</option>
                         <?php foreach ($catagory_list as $catdata) { ?>
                           <option value="<?php echo $catdata['id'] ?>" <?php //echo ($catagory_detail["p_categorie"] == $catdata['id']) ? "selected" : "" ?>><?php echo $catdata['categorie']; ?></option>
                         <?php } ?>
                       </select>
                     </div>
                     <div class="form-group">
                       <span style="color:#3d3d29;font-size:14px;"><i>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</i></span>
                     </div>
                     <div class="form-group">
                       <label>Description :</label>
                       <textarea rows="5" cols="50" name="description_" class="form-control"><?php //echo $catagory_detail["description"] ?></textarea>
                     </div>
                     <div class="form-group">
                       <label>Meta Tag:</label>
                       <input value="<?php //echo $catagory_detail["meta_tag"] ?>" type="text" placeholder="Enter Meta tag" name="meta_tag" class="form-control">
                     </div>
                     <div class="form-group">
                       <label>Meta Description :</label>
                       <textarea class="form-control" placeholder="Enter Meta description" name="meta_desc"><?php //echo $catagory_detail["meta_desc"] ?></textarea>
                     </div>
                     <div class="form-group text-center">
                       <button type="submit" style="border-radius:5px;" class="btn btn-primary">Add New Categorie</button>
                     </div>
                     </form>
               </div>
             </div>
           </div>
           <div class="col-md-7">
             <div class="container">
               <div class="row">
                 <div class="col-4">
                   <form action='<?php echo base_url(); ?>/admin/category' class='form-inline'>
                     <!--form class="form-inline ml-3"-->
                     <!-- <div class="input-group">
                       <input name="search" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                       <div class="input-group-append">
                         <button class="input-group-text" type="submit">
                           <i class="fas fa-search"></i>
                         </button>
                       </div>
                     </div> -->
                   </form>
                 </div>
                 <div class="col-8 text-right">
                 <div class="pagination-page">  

                   <?php //echo $this->pagination->create_links();
                   if(count($catagory_list)!=1)
                   {
                    if($pager)
                      {
                        $pagi_path = "wp2ci/admin/category";
                        $pager->setPath($pagi_path);
                        echo $pager->links();
                      }
                   }       
                   ?>
                </div>
                 </div>

                 <table class="table table-striped">
                   <tr style="color:#0099ff;background:white;">
                     <th>Name</th>
                     <th>Slug</th>
                     <th>Count</th>
                   </tr>
                   <?php 
                      // echo "<pre>";
                      // print_r($catagory_list[0]['post_count']);die;
                   ?>
                   <?php 
                    if(count($catagory_list)!=1){
                   foreach ($catagory_list as $catdata) {                    
                     ?>
                     <tr>
                       <td>
                         <div><?php echo $catdata["categorie"];?></div>
                         <div class="edit-catagory"> <a href="<?php echo base_url()."/admin/category_edit/".$page_no."/".$catdata['id'] ?>">Edit</a> <a href="#" onclick="delete_catagory('<?php echo $catdata['id'] ?>')">Delete</a> </div>
                       </td>
                       <td><?php echo $catdata["slug"];?></td>
                       <td><?php echo $catdata["post_count"];?></td>
                     </tr>
                   <?php 
                   } 
                  }else{?>
                      <tr>
                       <td>
                         <div><?php echo $catagory_list[0]['categorie'];?></div>
                         <div class="edit-catagory"> <a href="<?php echo base_url()."/admin/category_edit/".$page_no."/".$catagory_list[0]['id'] ?>">Edit</a> <a href="#" onclick="delete_catagory('<?php echo $catagory_list[0]['id'] ?>')">Delete</a> </div>
                       </td>
                       <td><?php echo $catagory_list[0]["slug"];?></td>
                       <td><?php  echo $catagory_list[0]["post_count"];?></td>
                     </tr>
                  <?php }?>

                <tr style="color:#0099ff;background:white;">
                     <th>Name</th>
                     <th>Slug</th>
                     <th>Count</th>
                   </tr>
                 </table>
               </div>
               <div style="font-size:14px;color:#3d3d29;">
                 <i>
                   <b style="color:#595959;font-size:15px;">Note:</b>
                   Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category Uncategorized.
                   <br><br>
                   Categories can be selectively converted to tags using the category to tag converter.
                 </i>
               </div>
             </div>
           </div>
         </div>
     </div>
 </div>
 <script>
   $(document).ready(function() {
     $("#categorie").keyup(function() {
       var title = document.getElementById('categorie').value.toLowerCase();
       var s = title.replace(/[^a-z0-9]/g, "-");
       var s1 = s.replace(/-+/g, "-");
       s1 = s1.replace(/(^\-)|(\-$)/gi, "");
       document.getElementById('slug').value = s1;
     });
     $("#slug").keyup(function() {
       var sugest_title = document.getElementById('slug').value.toLowerCase();
       var s = sugest_title.replace(/[^a-z0-9]/g, "-");
       var s1 = s.replace(/  /g, " ");
       s1 = s1.replace(/(^\-)|(\-$)/gi, "");
       s1 = s1.replace(/(^\s*)|(\s*$)/gi, "");
       document.getElementById('slug').value = s1;
     });
   });

   function delete_catagory($catagory_id) {
     var x = confirm("Do You Want to delete?");
     if (x) {
       window.location.href = "<?php echo base_url() . "/admin/categorie/catagory_delete/" . $page_no . "/" ?>" + $catagory_id;
     }
   }
  
 </script>
