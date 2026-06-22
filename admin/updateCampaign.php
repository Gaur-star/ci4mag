<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-10 text-center">
          <h1 class="m-0 text-dark">Update Campaign</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="newsletter">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8">
          <div class="newsletter_title_container">
            <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
            <form action="<?php echo base_url() ?>/admin/matico/updateCampaignProcess/<?php echo $campaign_id ?>" method="post" class="newsletter_form">
              <?php  $session = session();  
              echo $session->getFlashdata("msg");         ?>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Campaign Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required="required" placeholder="Enter Campaign Name" name="campaign_name" value="<?php echo $campaig_name ?>">
                </div>
              </div>      
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Campaign Url</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required="required" placeholder="Enter Campaign Url" name="campaign" value="<?php echo $campaign_url ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                 <select class="form-control" name="author">
                     <?php foreach(get_author() as $auth){ ?>
                      <option value="<?php echo $auth["uid"] ?>" <?php echo ($author==$auth["uid"])?"selected":"" ?>><?php echo ucfirst($auth["f_name"]." ".$auth["l_name"]) ?></option>
                     <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Post Status</label>
                <div class="col-sm-10">
                 <select class="form-control" name="status">
                      <option value="p" <?php echo ($post_status=="p")?"selected":"" ?>>Published</option>
                      <option value="h" <?php echo ($post_status=="h")?"selected":"" ?>>Private</option>
                      <option value="d" <?php echo ($post_status=="d")?"selected":"" ?>>Draft</option>
                  </select>
                </div>
              </div>
              <div class="form-group text-center">
                 <button  class="newsletter_button btn btn-primary" type="submit">Update Campaign</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
