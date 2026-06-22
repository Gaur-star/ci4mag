


<?= $this->extend('layout/admin') ?>


<?= $this->section('content') ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add New User</h1>
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
            <div class="newsletter_title"><h3>Create a brand new user and add them to this site.</h3></div>
            <form action="<?= base_url()?>/admin/useraddprocess" method="post" class="newsletter_form">
              <?php 
              $session = session();
              echo $session->getFlashdata("msg");
              ?>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username (required)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required="required" placeholder="Enter user name" name="uname">
                </div>
              </div>      
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email (required)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required="required" placeholder="Enter user's email" name="email">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter user's first name" name="fname">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter user's last name" name="lname">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter user's website link" name="website">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Password (required)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required="required" placeholder="Enter passwword" name="pword">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                 <select name="role_" class="form-control">
                     <?php foreach($role as $rol){ ?>
                      <option value="<?= $rol["role_id"] ?>"><?= ucfirst($rol["role"]) ?></option>
                     <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group text-center">
                 <button  class="newsletter_button btn btn-primary" type="submit">Add New User</button>
              </div>
            </form>
            <br><br>
          </div>
        </div>
      </div>

    </div>
</div>

<?= $this->endSection() ?>