
<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>

<style>
  .input-title {
    font-size: 16px;
    line-height: 35px;
  }

  .content-wrapper {
    padding: 10px;
  }
</style>

<?= $this->endSection() ?>




<?= $this->section('content') ?>


<div class="content-wrapper">
  <div class="content-header">
    <h1>Setting</h1>
    <hr>
  </div>

  <div class="container-fluid">
    <form action="<?= base_url() ?>/admin/settings/settings_edit_process" method="post" class="newsletter_form" enctype='multipart/form-data'>
      <?php //echo validation_errors();
      if (isset($_SESSION['st_vdata'])) {
        echo "<div style='color:red !important;'>" . $_SESSION['st_vdata'] . "</div>";
        unset($_SESSION['st_vdata']);
      }
      ?>
      <div class="form-group">
        <div class="row">
          <div class="col-2"><span class="input-title">Site Name</span></div>
          <div class="col-6"> <input type="text" value="<?= $setting[0]["setting_value"]; ?>" class="form-control" required="required" name="<?= $setting[0]["id"]; ?>" style="width:100%;"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-2"><span class="input-title">Site Logo</span></div>
          <div class="col-3">
            <label for="image" style="cursor:pointer">
              <?php
              if ($setting[1]["setting_value"]) {
                // echo "<pre>";
                // print_r($setting[1]["setting_value"]);die;
                echo '<img class="img-thumbnail" src="' . base_url($setting[1]["setting_value"]) . '" id="blah" style="height:150px;width:200px;">';
              } else {
                echo '<img class="img-thumbnail" src="' . base_url('assets/images/no_img.png') . '" id="blah" style="height:150px;width:200px;">';
              }
              ?></label>

            <input type='file' name='image' id='image' onchange='readURL(this);' style="padding:2px;background:#f2f2f2;visibility:hidden;" class="newsletter_input form-control-lg form-control" />
          </div>
          <div class="col-2 text-right"><span class="input-title">Default Image</span></div>
          <div class="col-3">
            <label for="defaultImageInput" style="cursor:pointer">
              <?php
              // echo print_r($setting[12]);die;
              if ($setting[1]["setting_value"]) {
                echo '<img class="img-thumbnail" src="' . base_url() ."/". $setting[12]["setting_value"] . '" id="defaultImage" style="height:150px;width:200px;">';
              } else {
                echo '<img class="img-thumbnail" src="' . base_url('assets/images/no_img.png') . '" id="defaultImage" style="height:150px;width:200px;">';
              }
              ?></label>

            <input type='file' name='deafultimage' id='defaultImageInput' onchange='noimageshow(this);' style="padding:2px;background:#f2f2f2;visibility:hidden;" class="newsletter_input form-control-lg form-control" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-2"><span class="input-title">Fav Icon</span></div>
          <div class="col-3">
            <label for="favicon" style="cursor:pointer">
              <?php
             // echo $setting[7]["setting_value"];die;
              if ($setting[7]["setting_value"]) {
                echo '<img class="img-thumbnail" src="' . base_url() ."/". $setting[7]["setting_value"] . '" id="favico" style="height:50px;width:50px;">';
              } else {
                echo '<img class="img-thumbnail" src="'.base_url('assets/images/icons/favicon.ico').'" id="favico" style="height:50px;width:50px;">';
              }
              ?>
            </label>
            <input type='file' name='fav' id='favicon' onchange='faviconshow(this);' style="padding:2px;background:#f2f2f2;visibility:hidden;" class="newsletter_input form-control-lg form-control" />
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-2"><span class="input-title">Sitemap link</span></div>
          <div class="col-6"><a href="<?= base_url(); ?>/sitemap.xml" target="_blank"><?= base_url() . '/' .'sitemap.xml' ?></a></div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-2"><span class="input-title">Permalink</span></div>
          <div class="col-6">
            <select name="permalink" class="form-control">
      
              <?php foreach($permalink as $perma) { ?>
                <option value="<?= $perma["permalinkListId"] ?>" <?= ($perma["status"]=="active")?"selected":"" ?>><?= $perma["linkname"] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group row">

        <div class="col-2"><span class="input-title">Site Email</span></div>
        <div class="col-6"> <input type="text" value="<?= $setting[2]["setting_value"]; ?>" class="form-control" required="required" name="<?= $setting[2]["id"]; ?>" id="email" style="width:100%;"></div>
      </div>
      <div class="form-group row">

        <div class="col-2"><span class="input-title">Site Description</span></div>
        <div class="col-6">
          <textarea rows="5" cols="50" name="<?= $setting[3]["id"]; ?>" class="form-control"><?= $setting[3]["setting_value"]; ?></textarea>
        </div>
      </div>
      <div class="form-group row">

        <div class="col-2"><span class="input-title">Site Keyword</span></div>
        <div class="col-6">
          <input type="text" placeholder="Enter Meta tag" name="<?= $setting[4]["id"]; ?>" class="form-control" value="<?= $setting[4]["setting_value"]; ?>">
        </div>
      </div>
      <div class="form-group row">

        <div class="col-2"><span class="input-title">About</span></div>
        <div class="col-6">
          <textarea class="form-control" name="<?= $setting[8]["id"]; ?>"><?= $setting[8]["setting_value"]; ?></textarea>
        </div>
      </div>
      <div class="form-group row">

        <div class="col-2"><span class="input-title">Footer</span></div>
        <div class="col-6">
          <input type="text" placeholder="Footer" name="<?= $setting[9]["id"]; ?>" class="form-control" value="<?= $setting[9]["setting_value"]; ?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-8 text-center">
          <button class="btn btn-primary">Update Setting</button>
        </div>
      </div>

    </form>


  </div>
</div>
<?php unset($_SESSION['st_vdata']); ?>


<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>


<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
    //  return alert(input.files);
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function faviconshow(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#favico').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function noimageshow(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#defaultImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#image").change(function() {
    readURL(this);
  });
  $("#favicon").change(function() {
    faviconshow(this);
  });

  $("#defaultImageInput").change(function() {
    noimageshow(this);
  });
</script>


<?= $this->endSection() ?>