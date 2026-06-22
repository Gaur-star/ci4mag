

<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>


<style>
  /* ---loader css */
  .loading {
      display: none;
      flex-direction: row;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      align-items: center;
      z-index: 99;
      background: #00000036;
      justify-content: center;
  }
  .loading__letter {
      font-size: 32px;
      font-weight: normal;
      letter-spacing: 4px;
      text-transform: uppercase;
      font-family: "Audiowide";
      color: #ffffff;
      animation-name: bounce;
      animation-duration: 2s;
      animation-iteration-count: infinite;
  }

  .loading__letter:nth-child(2) {
      animation-delay: .1s;	
  }
  .loading__letter:nth-child(3) {
      animation-delay: .2s;
  }
  .loading__letter:nth-child(4) {
      animation-delay: .3s;	
  }
  .loading__letter:nth-child(5) {
      animation-delay: .4s;
  }
  .loading__letter:nth-child(6) {
      animation-delay: .5s;	
  }
  .loading__letter:nth-child(7) {
      animation-delay: .6s;
  }
  .loading__letter:nth-child(8) {
      animation-delay: .8s;
  }
  .loading__letter:nth-child(9) {
      animation-delay: 1s;
  }
  .loading__letter:nth-child(10) {
      animation-delay: 1.2s;
  }
  .loading__letter:nth-child(11) {
      animation-delay: 1.4s;
  }
  .loading__letter:nth-child(12) {
      animation-delay: 1.6s;
  }
  .loading__letter:nth-child(13) {
      animation-delay: 1.8s;
  }

  @keyframes bounce {
      0% {
          transform: translateY(0px)
      }
      40% {
          transform: translateY(-40px);
      }
      80%,
      100% {
          transform: translateY(0px);
      }
  }
</style>


<?= $this->endSection() ?>




<?= $this->section('content') ?>


<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Users</h1>
        </div>
      </div>
      <div id="success" class="py-2 px-3 my-2" style="background-color: #98FB98;display:none;font-size:large"></div>
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
                  <td>Campaign Name</td>
                  <td>Url</td>
                  <td>Author</td>
                  <td>Action</td>
                  <td>Posts</td>
                  <td>Posts Status</td>
                  <td>Last Run</td>
                </tr>
                <?php 
                // echo "<pre>";
                // print_r($campaign);die;
                ?>
                <?php foreach ($campaign as $key=>$camp) { ?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td>
                        <?= $camp['campaig_name']; ?>
                        <?= anchor('admin/matico/campaignUpdate/' . $camp['campaign_id'], '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Edit&nbsp;</span>'); ?>
                        <?= anchor('admin/matico/deleteCampaignProcess/' . $camp['campaign_id'], '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Delete&nbsp;</span>'); ?>
                      </td>
                      <td><?= $camp['campaign_url']; ?></td>
                      <td><?= $camp['f_name']." ".$camp['l_name']; ?></td>
                      <td><button type="button" data-id="" onclick="startCampaign('<?= $camp['campaign_id'] ?>')">Start</button></td>
                      <td><?= $camp['total_post']; ?></td>
                       <td><?= $camp['post_status']; ?></td>
                      <td><?= $camp['last_run']; ?></td>
                     
                    </tr>
                <?php } ?>
                  <tr style="color:#0099ff;background:white;">
                  <td>Sl No</td>
                  <td>Campaign Name</td>
                  <td>Url</td>
                  <td>Author</td>
                  <td>Action</td>
                  <td>Posts</td>
                  <td>Posts Status</td>
                  <td>Last Run</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="loading" id="ploader">
      <div class="loading__letter">L</div>
      <div class="loading__letter">O</div>
      <div class="loading__letter">A</div>
      <div class="loading__letter">D</div>
      <div class="loading__letter">I</div>
      <div class="loading__letter">N</div>
      <div class="loading__letter">G</div>
      <div class="loading__letter">.</div>
      <div class="loading__letter">.</div>
      <div class="loading__letter">.</div>
    </div>
</section>


<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>


<script>
    function startCampaign(id){
      document.getElementById("ploader").style.display = "flex";
        $.ajax({
        url:"<?= base_url();?>/campaign/insertPost",
        data:{id:id},
        type:"post",   
        success:function(data){
          // console.log(data);
         //   return;
            // alert('Sucessfully campign added');
          document.getElementById("ploader").style.display = "none";
          document.getElementById('success').innerText = 'Sucessfully campign added';
          document.getElementById('success').style.display = 'block';
          setTimeout(function(){
            location.href="<?= base_url()."/admin/matico"?>";
          },3000);

           // return;
            // location.href="</?php echo base_url()."/admin/matico"?>";
            
        }
        });

        // console.log('ssssssss');
    }
</script>

<?= $this->endSection() ?>