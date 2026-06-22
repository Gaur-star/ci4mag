
<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>

<?= $this->endSection() ?>




<?= $this->section('content') ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-10 text-center">
          <h1 class="m-0 text-dark">Add Campaign</h1>
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
            <div class="newsletter_title text-center"><h3>Create a brand new campaign</h3></div>
            <form action="<?= base_url("/") ?>/admin/matico/addCampaignProcess" method="post" class="newsletter_form">
              <?php  $session = session();
                echo $session->getFlashdata("msg");?>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Campaign Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required="required" placeholder="Enter Campaign Name" name="campaign_name">
                </div>
              </div>      
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Campaign Url</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required="required" placeholder="Enter Campaign Url" name="campaign">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                 <select class="form-control" name="author">
                     <?php helper('webbuild_usable_helper');
                     foreach(get_author() as $auth){ ?>
                      <option value="<?= $auth["uid"] ?>"><?= ucfirst($auth["f_name"]." ".$auth["l_name"]) ?></option>
                     <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Post Status</label>
                <div class="col-sm-10">
                 <select class="form-control" name="status">
                      <option value="p">Published</option>
                      <option value="h">Private</option>
                      <option value="d">Draft</option>
                  </select>
                </div>
              </div>
              <div class="form-group text-center">
                 <button  class="newsletter_button btn btn-primary" type="submit">Add New Campaign</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>

<?= $this->endSection() ?>