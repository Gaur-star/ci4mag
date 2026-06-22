<script>
  $(document).ready(function() {
    $('#g_pword').click(function() {
      document.getElementById('c_pword').type = 'text';
      document.getElementById('c_pword').value = '<?php echo rand(); ?>';
      document.getElementById('cancel').style.display = 'block';
    });
    $('#cancel').click(function() {
      document.getElementById('c_pword').value = document.getElementById('h_pword').value;
      document.getElementById('c_pword').type = 'hidden';
      document.getElementById('cancel').style.display = 'none';
    });
    
  });
</script>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Profile</h1>
        </div>
      </div>
    </div>
  </div>
  <script>
    function browse_img()
    {
      $('#image').click();
    }
    function readURL(input) {
     // let input = $(btn).parent().find('[type=file]')[0];
      // console.log(input);
      // return;
      if (input.files && input.files[0]) {
        var reader = new FileReader();
       document.getElementById('blah').style.display = 'block';
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
          // console.log(e.target.result);
          // return;
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#image").change(function() {
      readURL(this);
    });
  </script>
  <section class="content">
    <div class="newsletter">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <?php $session = session(); 
            // echo "<pre>";
            // print_r($user);die;
            ?>
             <p style="color:red"><?php echo $session->getFlashdata("message");?></p>
            <form id="form-submit" action="<?php echo base_url();?>/admin/user/useredit_process/<?php echo $user[0]['uid']; ?>" method="post" class="newsletter_form" enctype='multipart/form-data'>
              <h5><b>Name</b></h5>
              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Username</b></div>
                <div class="col-md-10">

                  <input type="text" id="form" name="username" class="form-control" value="<?php echo $user[0]['user_name'] ?>" placeholder="<?php echo $user[0]['user_name']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>First Name</b></div>
                <div class="col-md-10">
                  <input type="text" name="f_name" class="form-control" value="<?php echo $user[0]['f_name']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Last Name</b></div>
                <div class="col-md-10">
                  <input type="text" name="l_name" class="form-control" value="<?php echo $user[0]['l_name']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Nickname</b></div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="nick_name" value="<?php echo $user[0]['nick_name']; ?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Role</b></div>
                <div class="col-md-10">
                  <?php if ($user[0]['role']==1)//$this->roleId == 1)
                  { ?>
                    <select class="form-control" name="rolename">
                      <option value="" disabled selected><?php echo ucfirst($user[0]["rolename"]) ?></option>
                      <?php foreach ($roles as $role) {  ?>
                        <option value="<?php echo $role["role_id"] ?>"><?php echo ucfirst($role["role"]) ?></option>
                      <?php } ?>
                    </select>
                  <?php } else { ?>
                    <h4><?php echo ucfirst($user[0]["rolename"]) ?></h4>
                  <?php } ?>

                </div>
              </div>
              <h5><b>Contact Info</b></h5>

              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Email</b></div>
                <div class="col-md-10">
                  <input type="email" name="email" id="email" class="form-control" value="<?php echo $user[0]['email'];?>" placeholder="<?php echo $user[0]['email']; ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Website</b></div>
                <div class="col-md-10">
                  <input type="text" name="website" class="form-control" value="<?php echo $user[0]['website']; ?>">
                </div>
              </div>
              <h5><b>About Yourself</b></h5>

              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Biography</b></div>
                <div class="col-md-10">
                  <textarea rows="5" cols="60" name="biography" class="form-control"><?php echo $user[0]['biography']; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Profile Picture</b></div>
                <div class="col-md-10">
                  <label for="image">
                    <img class="img-thumbnail" src="<?php echo ($user[0]['image']) ? base_url() . "/". $user[0]['image'] : base_url() . "assets/admin-image/noimage1.png"; ?>" id="blah" style="height:150px;width:200px;">
                  </label>
                  <div>
                      <input type='file' name='image' id='image' onchange='readURL(this);' style="padding:2px;background:#f2f2f2;display:none;" class="newsletter_input form-control-lg form-control" />
                    <button  type="button" class="btn btn-outline-success btn-sm" onclick='browse_img()' >Upload Image</button>
                    <p style="color:red"><?php echo $session->getFlashdata("image_error");?></p>
                  </div>
                  </div>
              </div>


              <h5><b>Account Management</b></h5>
              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>New Password</b></div>
                <div class="col-md-10">
                  <input type="password" name="new_password" class="form-control" value="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-2 col-form-label"><b>Confirm Password</b></div>
                <div class="col-md-10">
                  <input type="password" name="confirm_password" class="form-control" value="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 text-center">
                  <!-- <input type="hidden" name="rolename" value="<?php  // echo $user[0]['rolename']?>"> -->
                  <button style="border-radius:5px;" type="submit" id="submit" class="btn btn-primary">Update Profile</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
// $('#submit').click(function(){
//     var email = $("#email").val();
//     var invalid = false;
//     reWhiteSpace = new RegExp(/^\s+$/);
//     // if()
//     // {
//     //   invalid = true;
//     // }
//     if (/\s/.test(email)) {
//     // It has any kind of whitespace
//       invalid = true;

//     }

//     if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
//     {
//       invalid  = false;
//     }
//     else
//     {
//       invalid = true;
//     }
 
//     if(invalid)
//     {
//       $("#email").after('<span class="text-danger">Enter a valid email address.</span>');

//       $("#form-submit").submit(function(){
//         return false;
//       });
//     }
    
    
// });
function IsEmail(email)
{
  // var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if(!emailReg.test(email)) {
    return false;
  }else{
    return true;
  }
}




</script>