<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Attachment Details</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <form action='<?php echo base_url(); ?>admin/media_library/search' method='get' class='form-inline ml-3'>
      <!--form class="form-inline ml-3"-->
      <div class="input-group input-group-sm">
        <input name="search" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button style="background:white;" class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </div>
  <br>

  <section class="content">
    <div class="newsletter">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body table-responsive p-0">
              <?php foreach ($count as $counter) {
                $page = $counter['count(*)'] / 5;
                if ($this->uri->segment(3) == 'search' || $this->uri->segment(3) == 'search_pagination') {
                  for ($i = 0; $i < $page; $i++) {
                    echo anchor('admin/media_library/search_pagination/' . $i, '<input type=button value=' . $i . ' id=' . $i . ' name=page>&nbsp;');
                  }
                } else {
                  for ($i = 0; $i < $page; $i++) {
                    echo anchor('admin/media_library/pagination/' . $i, '<input type=button value=' . $i . ' id=' . $i . ' name=page>&nbsp;');
                  }
                }
              }
              if (isset($_SESSION['pagination'])) {
                echo "<script>
                  document.getElementById('" . $_SESSION['pagination'] . "').style.background='#0099ff'; 
                  document.getElementById('" . $_SESSION['pagination'] . "').style.color='white'; 
                  </script>";
              }
              ?>
              <table class="table" style="border:2px solid white;font-size:15px;">
                <tr style="color:#0099ff;background:white;">
                  <td>File</td>
                  <td>Author</td>
                  <td>Uploaded to</td>
                  <td>Date</td>
                </tr>
                <?php foreach ($media as $mediadata) { ?>
                  <form action="<?php echo base_url() ?>/admin/media_library/media_delete_process" method="post" class="newsletter_form">
                    <input type="hidden" class="newsletter_input" name="id" value="<?php echo $mediadata['id']; ?>">
                    <tr>
                      <td style="color:#0099ff;" onmouseover="document.getElementById('d1').style.dispaly='block';">
                        <img id="f<?php echo $mediadata['id']; ?>" src="<?php echo base_url() . $mediadata['url']; ?>" style="height:40px;width:40px;">
                        <?php echo $mediadata['url']; ?>
                        <br>
                        <div id="d1" style="display:none1;">
                          <button id="fa<?php echo $mediadata['id']; ?>" type="button" name="edit" style="background:#f5f5f0;border:1px solid #f5f5f0;font-size:12px;color:#0099ff;">Edit</button>
                          <?php $id = $mediadata['id'];
                          echo anchor('/admin/media_library/media_delete_process/' . $id, '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Delete&nbsp;</span>'); ?>
                          <!--button   name="delete" style="background:#f5f5f0;border:1px solid #f5f5f0;font-size:12px;color:#0099ff;">Delete</button-->
                        </div>
                      </td>
                      <td style="color:#0099ff;"><?php
                                                  if (strlen($mediadata['author']) > 0) {
                                                    echo $mediadata['author'];
                                                  } else {
                                                    echo "--";
                                                  }
                                                  ?></td>
                      <td>uncategorized</td>
                      <td><?php echo $mediadata['create_date']; ?></td>
                    </tr>
                  </form>

                  <?php

                  $page = $this->uri->segment(3);
                  //echo "<script>alert('".$page."');</script>";
                  if ($page == 'pagination' || $page == 'search_pagination') {
                  ?>
                    <script>
                      $(document).ready(function() {
                        $('#f<?php echo $mediadata['id']; ?>').click(function() {
                          name = <?php echo $mediadata['id']; ?>;

                          $.ajax({
                            type: 'POST',
                            url: 'http://localhost/web-builder/admin/media_edit_ajax/send_id',
                            data: {
                              'name': name
                            },
                            success: function(data) {

                            }
                          });
                          $.post('../../media_edit_ajax/send_id', {
                            name: name
                          }, function(data) {
                            $('#d2').html(data);
                          });
                        });

                        $('#fa<?php echo $mediadata['id']; ?>').click(function() {
                          name = <?php echo $mediadata['id']; ?>;
                          $.ajax({
                            type: 'POST',
                            url: 'http://localhost/web-builder/admin/media_edit_ajax/send_id',
                            data: {
                              'name': name
                            },
                            success: function(data) {

                            }
                          });
                          $.post('../../media_edit_ajax/send_id', {
                            name: name
                          }, function(data) {
                            $('#d2').html(data);
                          });
                        });
                      });
                    </script>
                  <?php } else if ($page == 'search') { ?>
                    <script>
                      $(document).ready(function() {
                        $('#f<?php echo $mediadata['id']; ?>').click(function() {
                          name = <?php echo $mediadata['id']; ?>;

                          $.ajax({
                            type: 'POST',
                            url: 'http://localhost/web-builder/admin/media_edit_ajax/send_id',
                            data: {
                              'name': name
                            },
                            success: function(data) {

                            }
                          });
                          $.post('../media_edit_ajax/send_id', {
                            name: name
                          }, function(data) {
                            $('#d2').html(data);
                          });
                        });

                        $('#fa<?php echo $mediadata['id']; ?>').click(function() {
                          name = <?php echo $mediadata['id']; ?>;
                          $.ajax({
                            type: 'POST',
                            url: 'http://localhost/web-builder/admin/media_edit_ajax/send_id',
                            data: {
                              'name': name
                            },
                            success: function(data) {

                            }
                          });
                          $.post('../media_edit_ajax/send_id', {
                            name: name
                          }, function(data) {
                            $('#d2').html(data);
                          });
                        });
                      });
                    </script>
                  <?php } else {
                  ?>
                    <script>
                      $(document).ready(function() {
                        $('#f<?php echo $mediadata['id']; ?>').click(function() {
                          name = <?php echo $mediadata['id']; ?>;

                          $.ajax({
                            type: 'POST',
                            url: 'http://localhost/web-builder/admin/media_edit_ajax/send_id',
                            data: {
                              'name': name
                            },
                            success: function(data) {

                            }
                          });
                          $.post('media_edit_ajax/send_id', {
                            name: name
                          }, function(data) {
                            $('#d2').html(data);
                          });
                        });

                        $('#fa<?php echo $mediadata['id']; ?>').click(function() {
                          name = <?php echo $mediadata['id']; ?>;
                          $.ajax({
                            type: 'POST',
                            url: 'http://localhost/web-builder/admin/media_edit_ajax/send_id',
                            data: {
                              'name': name
                            },
                            success: function(data) {

                            }
                          });
                          $.post('media_edit_ajax/send_id', {
                            name: name
                          }, function(data) {
                            $('#d2').html(data);
                          });
                        });
                      });
                    </script>
                  <?php } ?>
                <?php } ?>
                <tr style="color:#0099ff;background:white;">
                  <td>File</td>
                  <td>Author</td>
                  <td>Uploaded to</td>
                  <td>Date</td>
                </tr>
              </table>
            </div>
          </div><br><br>
          <div id="d2">
          </div>
        </div>
      </div>
    </div>
</div>