
<?= $this->extend('layout/admin') ?>


<?= $this->section('content') ?>


<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Users</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="newsletter">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <?php 
              $session = session();
              echo $session->getFlashdata("msg");
              ?>
            <div class="card-body table-responsive p-0">
              <table class="table">
                <tr style="color:#0099ff;background:white;">
                  <td>Sl No</td>
                  <td>Username</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Role</td>
                  <td>Status</td>
                  <td>Posts</td>
                </tr>
                <?php foreach ($user as $key=>$userdata) { ?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td>
                      <?= $userdata['user_name']; ?>
                        <a href="<?= base_url('admin/userlist/user_edit/').'/'.(int)$userdata['uid']?>">
                        Edit
                        </a>
                        <a href="<?= base_url('admin/user/deleteuser/').'/'.$userdata['uid'] ?>">
                        Delete
                        </a>
                        <?php //echo anchor('admin/user/user_edit/' . $userdata['uid'], '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Edit&nbsp;</span>'); ?>
                        <?php //echo anchor('admin/user/deleteuser/' . $userdata['uid'], '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Delete&nbsp;</span>'); ?>
                      </td>
                      <td><?= $userdata['f_name']." ".$userdata['l_name']; ?></td>
                      <td><?= $userdata['email']; ?></td>
                      <td><?= $userdata['role']; ?></td>
                      <td><?= $userdata['status']; ?></td>
                      <td><?= $userdata['posts']; ?></td>
                    </tr>
                <?php } ?>
                <tr style="color:#0099ff;background:white;">
                  <td>Sl No</td>
                  <td>User Name</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Role</td>
                  <td>Posts</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?= $this->endSection() ?>