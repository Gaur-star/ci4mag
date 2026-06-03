<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <?php 
                        $session = session();
                    echo $session->getFlashdata("msg") ?>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Ip List Block</th>
                                        <th>
                                            <form class="form-inline" action="<?php echo base_url("admin/admin/addIp") ?>" method="post">
                                            <div class="form-group">
                                                 <label for="ipadd"> Ip : </label>
                                                 <input type="text" class="form-control" id="ipadd" name="ip" required>
                                             </div>
                                              <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Add Ip</button>
                                              </div>
                                           </form>
                                        </th>
                                    </tr>
                                </thead>
                                <?php foreach ($ips as $ip) { ?>
                                    <tr>
                                        <td>
                                         <?php echo $ip["ip"] ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url()."/admin/removeblockIp/".$ip["id"] ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>        
            