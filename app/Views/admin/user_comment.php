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
      color:#0099ff
  }
</style>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0 text-dark">User Comment</h1>
        </div>
        <div class="col-sm-10 float-left">
          <!-- <a href="<?//php echo base_url('admin/new_page')?>"><button class="btn btn-outline-primary">Add New Page</button></a>    -->
        </div>
      </div>
    </div>
  </div>

  <div class="content-header">
    <div class="row">
      <div class="col-6">
      <!-- <a href="<?//php echo base_url('admin/trash_pages');?>" class="mx-5">Trash <span>(<?//php echo count($trash_count);?>)</span></a> -->
      </div>
      
      
    
    </div>

  </div>

  <section class="content">
    <div class="card-body table-responsive p-0">

      <table class="newsletter_form table">
        <tr class="table-header" style="background:white;">
          <td>Sno</td>
          <td>Name</td>
          <td>Email</td>
          <td>Subject</td>
          <td>Message</td>
        </tr> 
        <?php $i=1;?>
        <?php foreach ($c_data as $pagedata) { 
          ?>
         
          <tr class="page-list">
            <td>
              <?php echo $i++;?>
            </td>
            <td>
                <?php echo $pagedata['name']; ?>
            </td>
            <td>
                <a href="<?php echo base_url()."/".$pagedata['email']; ?>"><?php echo $pagedata['email']; ?></a>
            </td>
            <td><?php echo $pagedata['subject'];?></td>
            <td><?php echo $pagedata['message']; ?></td>
          </tr>
        <?php } ?>
        <tr class="table-header">
          <td>Sno</td>
          <td>Name</td>
          <td>Email</td>
          <td>Subject</td>
          <td>Message</td>
        </tr>
      </table>
    </div>

      
</div>



<script type="text/javascript">
  // var url = "<?//php echo base_url(); ?>";
  // function add_trash_page(id)
  // {
  //   //console.log(id);
  //   var r = confirm("Do you want to Add this in Trash?");
  //   if (r == true)
  //   {
  //     window.location = url+"/admin/page/page_trash/"+id;
  //    // console.log('sssss');
  //   }  
  //   else
  //     return false;
  // } 
</script>