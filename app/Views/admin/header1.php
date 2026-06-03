<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Builder</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
 
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/font-awesome/css/fontawesome.min.css">
<script src="<?php echo base_url(); ?>/assets/ckeditor/ckeditor.js" type="text/javascript"></script>

<script src="jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


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
<body  class="hold-transition sidebar-mini" style="overflow-x:hidden;">
<div class="wrapper">
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#">&nbsp;&nbsp;&nbsp;<i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

   
    <!--ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul-->
  </nav>