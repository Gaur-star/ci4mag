
<script>
$(document).ready(function(){
   $('#g_pword').click(function(){
    document.getElementById('g_pword').style.display='none';
       document.getElementById('c_pword').type='text';
      document.getElementById('c_pword').value='<?php echo rand();?>';
      document.getElementById('cancel').style.display='block';
    });
  $('#cancel').click(function(){
     document.getElementById('c_pword').value=document.getElementById('h_pword').value;
      document.getElementById('c_pword').type='hidden';
      document.getElementById('g_pword').style.display='block';
      document.getElementById('cancel').style.display='none';
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
   <script>
                    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    document.getElementById('blah').style.display='block';
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
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
		<div class="container">
			<div class="row">
	 <form action="<?php echo base_url() ?>admin/profile/profile_edit_process" method="post" class="newsletter_form" enctype='multipart/form-data'>
   <?php echo validation_errors(); 
			if(isset($_SESSION['p_vdata'])){
				  echo "<center><div style='color:red;' id=''><br>".$_SESSION['p_vdata']."</div></center>";
          unset($_SESSION['p_vdata']);
        
          	}
			 ?>
    <?php foreach($admin as $_POST){?>
    <div class="container">
    <br>
    <h5>&nbsp;&nbsp;&nbsp;<b>Personal Options</b></h5>
    <br><br>
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
    <div class="row">
     <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Visual Editor</b></div><div class="col-md-4">
           <input type="checkbox" class="checkbox disabled" value="y" name="editor" id="editor">&nbsp;Disable the visual editor when writing</div>
           </div>
    <br>
    <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Syntax Highlighting</b></div><div class="col-md-4">
           <input type="checkbox" value="y" name="syntax" id="syntax">&nbsp;Disable syntax highlighting when editing code</div>
           </div> 
    <br>
    <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Admin Color Scheme</b></div>
           <div class="col-md-8">
           <div class="row">
           <div class="col-md-2"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/color/default.png"><input type="radio" name="color" id="Default" value="Default" style="position:absolute;top:10%;left:10%;"></div>
           <div class="col-md-2"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/color/light.png"><input type="radio" name="color" id="Light" value="Light" style="position:absolute;top:10%;left:10%;"></div>
           <div class="col-md-2"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/color/blue.png"><input type="radio" name="color" id="Blue" value="Blue" style="position:absolute;top:10%;left:10%;"></div>
           <div class="col-md-2"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/color/coffe.png"><input type="radio" name="color" id="Coffee" value="Coffee" style="position:absolute;top:10%;left:10%;"></div>
           </div><br>
           <div class="row">
           <div class="col-md-2"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/color/ectoplasm.png"><input type="radio" name="color" id="Ectoplasm" value="Ectoplasm" style="position:absolute;top:10%;left:10%;"></div>
           <div class="col-md-2"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/color/midnight.png"><input type="radio" name="color" id="Midnight" value="Midnight" style="position:absolute;top:10%;left:10%;"></div>
           <div class="col-md-2"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/color/ocean.png"><input type="radio" name="color" id="Ocean" value="Ocean" style="position:absolute;top:10%;left:10%;"></div>
           <div class="col-md-2"><img class="img-thumbnail" src="<?php echo base_url(); ?>assets/color/sunrise.png"><input type="radio" name="color" id="Sunrise" value="Sunrise" style="position:absolute;top:10%;left:10%;"></div>
           </div>
           </div>
           </div>
    <br>
     <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Keyboard Shortcuts</b></div><div class="col-md-8">
           <input type="checkbox" name="shortcut"  id="shortcut" value="y">&nbsp;Enable keyboard shortcuts for comment moderation. More information</div>
             </div> 
    <br>
    <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Toolbar</b></div><div class="col-md-4">
           <input type="checkbox" name="tool"  id="tool" value="y">&nbsp;Show Toolbar when viewing site</div>
            </div>
    <br>
    <h5>&nbsp;&nbsp;&nbsp;<b>Name</b></h5>
    <br><br>
     <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Username</b></div><div class="col-md-4">
           <input type="text" name="username" class="form-control" value="<?php echo $_POST['u_name'];?>">&nbsp;</div>
          </div> 
    <br>
    <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>First Name</b></div><div class="col-md-4">
           <input type="text" name="f_name" class="form-control" value="<?php echo $_POST['f_name'];?>"></div>
           </div>
    <br>
     <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Last Name</b></div><div class="col-md-4">
           <input type="text" name="l_name" class="form-control" value="<?php echo $_POST['l_name'];?>"></div>
           </div> 
    <br>
    <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Nickname (<i>required</i>)</b></div><div class="col-md-4">
           <input type="text" class="form-control" name="nick_name" value="<?php echo $_POST['nick_name'];?>"></div>
          </div>
    <br>
     <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Display name publicly as</b></div>
           <div class="col-md-4"><select class="form-control" name="d_name"><option>admin</option></select></div>
           </div> 
    <br>
    <h5>&nbsp;&nbsp;&nbsp;<b>Contact Info</b></h5>
    <br><br>
    <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Email (<i>required</i>)</b></div><div class="col-md-4">
           <input type="email" name="email" class="form-control" value="<?php echo $_POST['email'];?>"></div>
            </div>
    <br>
     <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Website</b></div><div class="col-md-4">
           <input type="text" name="website" class="form-control" value="<?php echo $_POST['website'];?>"></div>
           </div>
    <br>
    <h5>&nbsp;&nbsp;&nbsp;<b>About Yourself</b></h5>
    <br><br>
     <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Biographical Info</b></div><div class="col-md-4">
           <textarea rows="5" cols="60" name="biography" class="form-control"><?php echo $_POST['biography'];?></textarea></div>
            </div>
    <br>
     <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>Profile Picture</b></div><div class="col-md-4">
           <label for="image" class="btn" style="background:#ebebe0;color:gray;border:2px solid gray;">Add Media</label>
           <input type='file' name='image' id='image' onchange='readURL(this);' style="padding:2px;background:#f2f2f2;visibility:hidden;" class="newsletter_input form-control-lg form-control" />
			  <img src="<?php echo base_url().$_POST['image'];?>" id="blah" style="height:150px;width:200px;display:none1" class="img-thumbnail"></div>
         </div> 
    <br>
    <h5>&nbsp;&nbsp;&nbsp;<b>Account Management</b></h5>
    <br><br>
    <div class="row">
           <div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;<b>New Password</b></div><div class="col-md-4"><button type="button" id="g_pword" style="border-radius:5px;">&nbsp;Genarate Password</button>
           <input type="hidden" class="form-control" id="h_pword" value="<?php echo $_POST['p_word'];?>"><input type="hidden" class="form-control" id="c_pword"  name="c_pword" value="<?php echo $_POST['p_word'];?>"><button type="button" id="cancel" style="display:none;">Cancel</button>
           </div>
          </div> 
    <br>
    <br>
     <div class="row">
           <div class="col-md-3"></div><div class="col-md-4"><button type="submit" class="btn-primary" name="update" style="border-radius:5px;">&nbsp;Update Profile</button></div>
             </div>
             <br>
   </div>
    <?php } ?>
      </form>
  <br> 
 <?php
       if($_POST['editor']=='y'){
           echo "<script>
           document.getElementById('editor').checked = true;
                </script>";
       }
       if($_POST['syntax']=='y'){
        echo "<script>
        document.getElementById('syntax').checked = true;
             </script>";
    }
    if($_POST['shorcut']=='y'){
        echo "<script>
        document.getElementById('shortcut').checked = true;
             </script>";
    }
    if($_POST['tool']=='y'){
        echo "<script>
        document.getElementById('tool').checked = true;
             </script>";

    if($_POST['color']=='Default'){
        echo "<script>
        document.getElementById('Default').checked = true;
             </script>";
    }else if($_POST['color']=='Light'){
        echo "<script>
        document.getElementById('Light').checked = true;
             </script>";
    }else if($_POST['color']=='blue'){
        echo "<script>
        document.getElementById('Blue').checked = true;
             </script>";
    }else if($_POST['color']=='Coffe'){
        echo "<script>
        document.getElementById('Coffe').checked = true;
             </script>";
    }else if($_POST['color']=='Ectoplasm'){
        echo "<script>
        document.getElementById('Ectoplasm').checked = true;
             </script>";
    }else if($_POST['color']=='Midnight'){
        echo "<script>
        document.getElementById('Midnight').checked = true;
             </script>";
    }else if($_POST['color']=='Ocean'){
        echo "<script>
        document.getElementById('Ocean').checked = true;
             </script>";
    }else if($_POST['color']=='Sunrise'){
        echo "<script>
        document.getElementById('Sunrise').checked = true;
             </script>";
    }
 }
 ?>
 </div></div></div></div></div>
 <?php  unset($_SESSION['p_vdata']);?>