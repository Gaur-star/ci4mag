 <br>
 <?php foreach($data as $media){ ?>
 <div class="container">
                <div id="div1" style="display:none1;background:">
                <div class="row">
               <div class="col-md-8">
                 <img src="<?php echo base_url().$media['url'];?>" id="img" class="img-thumbnail" style="height:600px;width:600px;">
               </div>
				<div class="col-md-4" style="background:;">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Edit Attachment</div>
                            <br>
 <form action="<?php echo base_url() ?>admin/media_edit/media_edit_process" method="post" class="newsletter_form">
	<input type="hidden" id="id" name="id_" value="<?php echo $media['id'];?>">
  <span>URL</span><br>
    <input value="<?php echo $media['url'];?>" type="text" readOnly class="form-control" required="required" placeholder="Enter your URL" name="url" id="url" style="width:">
								 <br>
                                <span>Title</span>
                                <input value="<?php echo $media['title'];?>" type="text" class="form-control" required="required" placeholder="Enter your title" name="title" id="title" style="width:">
								<br>
                                <span>Caption</span><br> 
                                <textarea rows="5" cols="50" name="caption" id="caption" class="form-control"><?php echo $media['caption'];?></textarea><br>
                                <br>
                                <span>Alt text</span><br>
                                <input value="<?php echo $media['alt_text'];?>" type="text" class="form-control"  placeholder="Enter your alt text" name="alt_text" id="alt_text" style="width:100%;">
								 <br>
                                <span>Description</span><br>
                                <textarea rows="5" cols="50" name="description_" id="description" class="form-control"><?php echo $media['description'];?></textarea>
                                <br><br>
                                <button style="border-radius:5px;" class="btn-primary">Save Attachment</button>
							</form>
  <br><br>
								</div>
                </div>
                </div>
					</div>
				</div>
           </div>
           <?php }?>