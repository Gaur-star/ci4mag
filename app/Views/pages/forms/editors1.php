<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Editors</title>
 
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.css">
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/font-awesome/css/fontawesome.min.css">
<script src="<?php echo base_url(); ?>/assets/ckeditor/ckeditor.js" type="text/javascript"></script>

<script src="jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    function f1(){
      var keyword = document.getElementById('delete_keyword').value;
		var n = keyword.length;
	var last_keyword=keyword;
   
				 var words1=document.getElementById('all_keyword').value;
		
				 	var s1=words1.replace(last_keyword+",", "");
				
				document.getElementById('all_keyword').value=s1;
    
  }
</script>
</head>
<body class="hold-transition sidebar-mini"style="overflow-x:hidden;">

<div class="wrapper">
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     </ul>

    <ul class="navbar-nav ml-auto">
      
     
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  
  <?php
      $this->load->view('admin/sidebar');
  ?>
  
  <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-size:23px;">Add New Post</h1>
          </div>
         
        </div>
      </div>
    </section>

    <section class="content" style="overflow:;">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
             
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            
            </div>
           
            <script>
                    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    document.getElementById('preview').style.display='block';
    document.getElementById('space').style.display='block';
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
            <div class="blog">
		<div class="container">
			<div class="row">
			<?php echo validation_errors(); 
			if(isset($_SESSION['vdata'])){
				  echo "<div style='color:red !important;'>".$_SESSION['vdata']."</div>";
          unset($_SESSION['vdata']);
        
          	}
			 ?>
			<form action="<?php echo base_url() ?>admin/admin/blog_add_process" method="post" class="newsletter_form1" enctype='multipart/form-data'>
			
			<div class="col-md-8">
			<?php foreach($id as $max_id){
			
				?>
			<input type="hidden" name="id" id="id" class="newsletter_input"  placeholder="Enter your post title" value="<?php echo $max_id['max_id']; ?>" ><br><br>
			<?php } ?>			
								<b><input type="text" name="title" id="title" class=" form-control" required  placeholder="Enter your post title" style="font-size:20px;height:40px;" value="<?php echo isset($_SESSION['post']['title']) ? $_SESSION['post']['title']:'' ; ?>"></b><br><br>
							<div style="display:none;" id="s_title">	<input type="text" name="sugest_title" id="sugest_title" class="newsletter_input form-control-lg form-control" required  placeholder="Sujested post title"  style="font-size:20px;height:40px;" value="<?php echo isset($_SESSION['post']['sugest_title']) ? $_SESSION['post']['sugest_title']:'' ; ?>"><br><br></div>
               
                <div class="col-md-5">
								<input type='file' name='image' id='image' onchange='readURL(this);' style="padding:2px;background:#f2f2f2;background-image: url('paper.gif');" class="newsletter_input form-control-lg form-control"/>
								</div>
                <div class="col-md-3" id="preview" style="display:none;">
                <img src="" id="blah" style="height:150px;width:200px;">
                </div>
                
                <div id="space" style="display:none;"><br><br><br><br><br><br></div><br><br>
								<textarea id="source" name="content" class="newsletter_input1 form-control ckeditor" rows="15" cols="100" required value="<?php echo isset($_SESSION['post']['content']) ? $_SESSION['post']['content']:'' ; ?>"></textarea>
                <br><input type="text" placeholder="Enter Meta tag" name="meta_tag" class="form-control">
                <br><textarea class="form-control" placeholder="Enter Meta description" name="meta_desc"></textarea>
								<div id='design'></div>
	</div>
      <div calss="container">
			<div class="col-md-4">
     	

<br>
<div  style="font-size:15px;">
<div class="list-group">
  <a class="list-group-item active"><b style="font-size:18px;color:white;">&nbsp;Publish</b></a>
 
  <a class="list-group-item">	Author 
								<select name="author" class="form-control">
								    <option value="Admin">&nbsp;Admin</option>
								<option value="User">&nbsp;User</option>
								</select></a>
                <a class="list-group-item"><span style> Publish </span><input name="date_" type="date" value="<?php echo date("Y-m-d")?>" class="form-control"></a>
                <a class="list-group-item"><input name="time_" type="time" value="<?php echo date("h:i")?>" class="form-control"></a>
								<a class="list-group-item active">
								<button class="" style="background:#006699;border:2px solid #006699;color:white;font-size:15px;">
                <b>&nbsp;Post&nbsp;</b></button>
								&nbsp;&nbsp;<select name="visibility" class="form-control1" style="background:#006699;border:2px solid #006699;color:white;font-size:15px;">
								    <option value="Public"><b>&nbsp;&nbsp;Public&nbsp;</b></option>
								<option value="Only me"><b>&nbsp;&nbsp;Only me&nbsp;</b></option>
								</select></a>
                </div>
<input type="hidden" id="all_categorie" name="all_categorie">
  <input type="hidden" id="all_categorie_id" name="all_categorie_id">
  
  <br>
  <div class="list-group">
  <a class="list-group-item active"><b style="font-size:18px;color:white;">&nbsp;Categorie</b></a>
  <a class="list-group-item"> <div id="categories" style="font-size:15px;">
  
  </div></a>
  <?php foreach($cat as $catdata){?>
    
    <a class="list-group-item">&nbsp;&nbsp;<input type="checkbox" id="cat<?php echo $catdata['id'];?>" onclick="f<?php echo $catdata['id'];?>();" value="<?php echo $catdata['categorie']; ?>"><?php echo "&nbsp;&nbsp;<b style='font-size:15px;'>".$catdata['categorie']."</b>";?></a>
<script>
function f<?php echo $catdata['id'];?>(){

	var categories=document.getElementById('categories').innerHTML;
	var all_categorie=document.getElementById('all_categorie').value;
	var all_categorie_id=document.getElementById('all_categorie_id').value;
	if(document.getElementById('<?php echo "cat".$catdata['id'];?>').checked==true){
document.getElementById('categories').innerHTML=categories+"<button><span>&nbsp;<?php echo $catdata['categorie']; ?>&nbsp;</span></button>&nbsp;";
	document.getElementById('all_categorie_id').value=all_categorie_id+'<?php echo $catdata['id']; ?>,';
	
	document.getElementById('all_categorie').value=all_categorie+'<?php echo $catdata['categorie']; ?>,';
	}else{
	
		document.getElementById('categories').innerHTML=categories.replace("<button><span>&nbsp;<?php echo $catdata['categorie']; ?>&nbsp;</span></button>&nbsp;", " ");
		document.getElementById('all_categorie').value=all_categorie.replace("<?php echo $catdata['categorie']; ?>,", "");
		document.getElementById('all_categorie_id').value=all_categorie_id.replace("<?php echo $catdata['id']; ?>,", "");
	
	}
}
</script>
<?php } ?>
    </div>
	<br>
	
	<br>
	<input type="hidden" name="all_keyword" id="all_keyword">
  <input type="hidden" name="delete_keyword" id="delete_keyword" >
	<div class="list-group">
  <a class="list-group-item active"><b style="font-size:18px;color:white;">&nbsp;Type Tags</b></a>
  
  <a class="list-group-item"><div id="keywords" style="font-size:15px;">
	</div><textarea rows="3" cols="30" id="keyword" style="font-size:15px;"></textarea><br>Separate tags with commas</a>
</div>

<div>

</div>
						</div>
			</form>
			
					
			</div>
		</div>
	</div>

          </div>
        </div>
       
      </div>
    
    </section>
  
  </div>
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://adminlte.io">Elphill Technology</a>.</strong> All rights
    reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
 
  </aside>
  
</div>

<script>
$(document).ready(function(){
	$("#title").keyup(function(){
    document.getElementById('s_title').style.display='block';
		var title = document.getElementById('title').value.toLowerCase();
		var s=title.replace(/@|_|%|&|!|#| +/g, "-");
		var s1=s.replace(/-+/g, "-");
		s1=s1.replace(/(^\-)|(\-$)/gi,"");
		
		  var sugest_title=document.getElementById('sugest_title').value;
		  var n = sugest_title.length;
		  var res = sugest_title.substring(n-1, n);
	document.getElementById('sugest_title').value=s1;
});
  $("#sugest_title").keyup(function(){
		var sugest_title = document.getElementById('sugest_title').value.toLowerCase();
		var s=sugest_title.replace(/@|_|%|&|!|#/g, "-");
		var s1=s.replace(/  /g, " ");
		s1=s1.replace(/(^\-)|(\-$)/gi,"");
    s1=s1.replace(/(^\s*)|(\s*$)/gi,"");
		document.getElementById('sugest_title').value=s1;
		
  
  });
 
  var keyword_count=1;
  $("#keyword").keyup(function(){
		var keyword = document.getElementById('keyword').value;
		var n = keyword.length;
		 var res = keyword.substring(n-1, n);
		if(res==','){
			var keywords=document.getElementById('keywords').innerHTML;
			var last_keyword=keyword.substring(0, n-1);
			var all_keyword=document.getElementById('all_keyword').value;
      var k=all_keyword.split(last_keyword).length;
      if(!(k==2)){
			document.getElementById('keywords').innerHTML=keywords+"<button id='k"+keyword_count+"'>"+last_keyword+"</button><input type='button' id='key' onclick=document.getElementById('delete_keyword').value=document.getElementById('k"+keyword_count+"').innerHTML;this.style.display='none';document.getElementById('k"+keyword_count+"').style.display='none';f1();  value='&#10006' style='background:#0066ff;border:2px solid #0066ff;color:white;font-size:15px;'>&nbsp;";
			document.getElementById('all_keyword').value=all_keyword+last_keyword+",";
      }
			document.getElementById('keyword').value="";
     
		}
		keyword_count=keyword_count+1;
  });
});
</script>
<?php  unset($_SESSION['vdata']);?>

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
   
    $('.textarea').summernote()
  })
</script>
</body>
</html>
