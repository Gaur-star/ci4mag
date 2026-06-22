
<?= $this->extend('layout/admin') ?>


<?= $this->section('cssLinks') ?>


<style>
  

  .pagination-page a {
    padding: 5px 10px;
    color: #000;
    margin: 2px;
    border: 1px solid #828282;
    border-radius: 6px;
    font-size: 20px;
    text-decoration: none;
    cursor: pointer;
  }

  .pagination-page strong {
    padding: 6px 12px;
    color: #000;
    margin: 2px;
    border: 1px solid #828282;
    border-radius: 10px;
    font-size: 20px;
    background-color: #fff;
  }

  .page-list:hover {
    cursor: pointer;
  }

  .page-list .pageaction {
    display: none;
  }

  .page-list:hover .pageaction {
    display: block;
  }

  .page-list {
    height: 75px;
    color: #09f;
  }
  .table-header td{
      color: #01060a
  }
</style>


<?= $this->endSection() ?>




<?= $this->section('content') ?>


<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">Page List</h1>
        </div>
        <div class="col-sm-10 float-left">
          <a href="<?= base_url('admin/new_page')?>"><button class="btn btn-outline-primary">Add New Page</button></a>   
        </div>
      </div>
    </div>
  </div>

  <div class="content-header">
    <div class="row">
      <div class="col-6">
      <a href="<?= base_url('admin/trash_pages');?>" class="mx-5">Trash <span>(<?= count($trash_count);?>)</span></a>
      </div>
      <!-- <div class="col-3">
        <div class="pagination-page">
          <?php //if($pager): ?>
          <?php //$pagi_path = "admin/page";?>
          <?php //$pager->setPath($pagi_path)?>
          <?php //echo $pager->links();?>
          <?php //endif; ?>
        </div>  
      </div> -->
      <div class="col-3">
        <form action='<?= base_url(); ?>/admin/page' method='get' class='form-inline'>
          <div class="input-group">
            <input name="search" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="input-group-text" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    
    </div>

  </div>

  <section class="content">
    <div class="card-body table-responsive p-0">

      <table class="newsletter_form table">
        <tr class="table-header">
          <td>Title</td>
          <td>Author</td>
          <td>Seo Url</td>
          <td>Visible</td>
          <td>Published Date</td>
        </tr> 
        <?php $count=0;?>
        <?php foreach ($pages as $pagedata) { 
          $count=$count+1;?>
         <?php $text=$pagedata['seo_url'];?>
          <tr class="page-list">
            <td>
              <div><?= $pagedata['title']; ?></div>
              <div class="pageaction">
                <a href="<?= base_url()."/".$text;?>" target="_blank">View</a>
                <a href="<?= base_url('admin/page/pageEdit/') ."/". $pagedata['id']?>">Edit</a>
                <!-- <?php //echo anchor(base_url().'/admin/page/pageEdit/' . $pagedata['id'], '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Edit&nbsp;</span>'); ?> -->
                <!-- <a href="<?= base_url('admin/page/delete') ."/". $pagedata['id']?>">Delete</a> -->
                <a href="#" onclick="add_trash_page(<?= $pagedata['id'];?>)">Trash</a>
                <!-- <?php //echo anchor(base_url().'admin/page/delete/' . $pagedata['id'], '<span class=abc style=font-size:12px;color:#0099ff;>&nbsp;Delete&nbsp;</span>'); ?> -->
              </div>
            </td>
            <td>
                <a href="<?= base_url().'/admin/page?author=' . $pagedata['author'] ?>"><?= $pagedata['author']; ?></a>
            </td>
            <td>
                <a href="<?= base_url()."/".$pagedata['seo_url']; ?>"><?= $pagedata['seo_url']; ?></a>
            </td>
            <td><?= (($pagedata['visibility']=='p')?"Public":"Hidden")?></td>
            <td><?= date("d/M/Y H:i A", strtotime($pagedata['cur_date'])) ?></td>
          </tr>
        <?php } ?>
        <tr class="table-header">
          <td>Title</td>
          <td>Author</td>
           <td>Seo Url</td>
           <td>Visible</td>
          <td>Published Date</td>
        </tr>
      </table>
    </div>

       <div class="pagination-page" style="margin-top:20px;margin-left:100px">
          <?php if($pager): ?>
          <?php $pagi_path = "wp2ci_magazine/admin/page";?>
          <?php $pager->setPath($pagi_path)?>
          <?= $pager->links();?>
          <?php endif; ?>
        </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('scriptLinks') ?>

<script type="text/javascript">
  var url = "<?= base_url(); ?>";
  function add_trash_page(id)
  {
    //console.log(id);
    var r = confirm("Do you want to Add this in Trash?");
    if (r == true)
    {
      window.location = url+"/admin/page/page_trash/"+id;
     // console.log('sssss');
    }  
    else
      return false;
  } 
</script>

<?= $this->endSection() ?>