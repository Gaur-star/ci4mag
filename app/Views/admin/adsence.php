<style>
  .input-title {
    font-size: 16px;
    line-height: 35px;
  }

  .content-wrapper {
    padding: 10px;
  }
</style>
<div class="content-wrapper">
  <div class="content-header">
    <h1>Adsence</h1>
    <hr>
  </div>

  <div class="container-fluid">
    <form action="<?php echo base_url() ?>/admin/adsence/adsence_update" method="post" class="newsletter_form" >
      <div class="form-group">
        <div class="row">
          <div class="col-2"><span class="input-title">ad position</span></div>
          <div class="col-6"> <input type="text" value="header" class="form-control" required="required" name="" style="width:100%;"></div>
         
        </div>
      </div>                    
      <div class="form-group row">
        <div class="col-2"><span class="input-title">Description</span></div>
        <div class="col-6">
          <textarea rows="5" cols="50" name="header" class="form-control"><?php echo $old_data[0]["header"]; ?></textarea>
          <input type="hidden" value="1" class="form-control" required="required" name="id" style="width:100%;">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-2"><span class="input-title">Ad position</span></div>
        <div class="col-6">
          <input type="text" placeholder="Enter Meta tag" name="" class="form-control" value="sidebar">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-2"><span class="input-title">Description</span></div>
        <div class="col-6">
          <textarea rows="5" cols="50" class="form-control" name="sidebar"><?php echo $old_data[0]["sidebar"]; ?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-8 text-center">
          <button class="btn btn-primary" >Update</button>
        </div>
      </div>

    </form>


  </div>
</div>
<?php unset($_SESSION['st_vdata']); ?>
<script>
//   function readURL(input) {
//     if (input.files && input.files[0]) {
//     //  return alert(input.files);
//       var reader = new FileReader();
//       reader.onload = function(e) {
//         $('#blah').attr('src', e.target.result);
//       }
//       reader.readAsDataURL(input.files[0]);
//     }
//   }

//   function faviconshow(input) {
//     if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       reader.onload = function(e) {
//         $('#favico').attr('src', e.target.result);
//       }
//       reader.readAsDataURL(input.files[0]);
//     }
//   }

//   function noimageshow(input) {
//     if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       reader.onload = function(e) {
//         $('#defaultImage').attr('src', e.target.result);
//       }
//       reader.readAsDataURL(input.files[0]);
//     }
//   }

//   $("#image").change(function() {
//     readURL(this);
//   });
//   $("#favicon").change(function() {
//     faviconshow(this);
//   });

//   $("#defaultImageInput").change(function() {
//     noimageshow(this);
//   });
</script>