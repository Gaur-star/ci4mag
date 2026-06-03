<?php
//  echo "<pre>";
// print_r($details); die;
?> 
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" >Edit Category</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
    <div class="newsletter">
		<div class="container">
			<div class="row">
      <div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
		
<?php $count =0; ?>    				                  <br>
 <form action="<?php echo base_url()."/admin/categorie/update_category/".$page."/".$details["id"] ?>" method="post" class="newsletter_form" style="font-size:15px;">
 
  <input type="hidden" name="id" value="<?php echo $details['id'];?>">
  <div class="row">
  <div class="col-md-7">
  <?php //echo validation_errors(); 
			if(isset($_SESSION['c_vdata'])){
				  echo "<center><div style='color:red;' id=''><br>".$_SESSION['c_vdata']."</div></center>";
          unset($_SESSION['c_vdata']);
        
          	}
			 ?>
  </div>
  </div>
  <br>
  <div class="row">
  <div class="col-md-2">
  <span>Name</span>
  </div>
  <div class="col-md-5">
  <!-- $id,$cat,$p_cat,$desc,$slug,$mtag,$mdesc -->
  <input type="text" value="<?php echo $details['categorie'];?>" class="form-control" required="required" placeholder="Enter your categorie" name="categorie" id="categorie" style="width:100%;">
  		<span style="font-size:14px;color:gray">The name is how it appears on your site.</span>
                </div>
    </div> 
    <div class="row">
  <div class="col-md-2">                           <br>
    <span>Slug</span>
    </div>
    <div class="col-md-5">
    <input type="text"  value="<?php echo $details['slug'];?>" class="form-control" required="required" placeholder="Enter your categorie" name="slug" id="slug"  style="width:100%;">
								<span style="font-size:14px;color:gray">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                </div>
                </div>
                                <br><br>
                                <div class="row">
                <div class="col-md-2">  
                                <span>Parent Category</span></div>
                                <div class="col-md-5">
                                <select name="p_cat" id="p_cat">
                                <option ></option>
                                <!-- <option value="Uncategized">Uncategized</option> -->
                                
                                <?php foreach($cat as $catdata){?>
                                  <option value="<?php echo $catdata['id']; ?>" <?php echo ($catdata['id'] ==  $details['p_categorie']) ? ' selected="selected"' : '';?> ><?php echo $catdata['categorie']; ?></option>
                                <?php } ?>  
                                </select>
                          	<br><span style="font-size:14px;color:gray">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</span>
                </div></div><br><br>
   <div class="row">
  <div class="col-md-2">
    <span>Description</span>
    </div>
  <div class="col-md-5">
  <textarea rows="5" cols="50" name="decription_" class="form-control"><?php echo $details['description'];?></textarea>
   </div>
   </div>
   <br>
   <div class="row">
  <div class="col-md-2">
    <span>Meta Tag</span>
    </div>
  <div class="col-md-5">
  <input type="text" name="meta_tag" class="form-control" value="<?php echo $details['meta_tag'];?>">
   </div>
   </div>
   <br>
   <div class="row">
  <div class="col-md-2">
    <span>Meta Description</span>
    </div>
  <div class="col-md-5">
  <textarea rows="5" cols="50" name="meta_desc" class="form-control"><?php echo $details['meta_desc'];?></textarea>
   </div>
   </div>
    <br><br>
                                <button style="border-radius:5px;" class="btn-primary">Update</button>
</form>
              
              <!-- <script> -->
               <!-- document.getElementById('p_cat').value='<?php echo $details['p_categorie'];?>'; -->
              <!-- </script> -->
              <br><br>
							</div>
					</div>
				</div>
                <div class="col-md-7">
               
                </div>
			</div>
		</div>
       </div>
       <script>
$(document).ready(function(){
  
	$("#categorie").keyup(function(){
    	var title = document.getElementById('categorie').value.toLowerCase();
		var s=title.replace(/[^a-z0-9]/g, "-");
		var s1=s.replace(/-+/g, "-");
		s1=s1.replace(/(^\-)|(\-$)/gi,"");
			document.getElementById('slug').value=s1;
});
  $("#slug").keyup(function(){
		var sugest_title = document.getElementById('slug').value.toLowerCase();
		var s=sugest_title.replace(/[^a-z0-9]/g, "-");
		var s1=s.replace(/  /g, " ");
		s1=s1.replace(/(^\-)|(\-$)/gi,"");
    s1=s1.replace(/(^\s*)|(\s*$)/gi,"");
		document.getElementById('slug').value=s1;
	 });
 });
</script>
</div>
<?php  unset($_SESSION['c_vdata']);?>
