<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title><?//php // echo $settings[0]['setting_value']?></title> -->
  <title>Web2</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url('assets/setting-image/favicon4.ico') ?>" type="image/ico" sizes="16x16">
  <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?> ">

  <link rel="stylesheet" href="<?= base_url('assets/admin/css/adminlte.min.css') ?> ">
  <link rel="stylesheet" href="<?= base_url('assets/admin/bootstrap/css/bootstrap.min.css') ?> ">
  
  <script src="<?= base_url('assets/admin/js/jquery-3.2.1.min.js') ?> "></script>
  <script src="<?= base_url('assets/admin/bootstrap/js/bootstrap.min.js') ?> "></script>
  
  <?php if (isset($stylesheets)) {

    foreach ($stylesheets as $js) {
      echo '<link href="' . base_url() ."/" .$js . '" rel="stylesheet">';
    }
  } ?>
  <?php if (isset($javascripts)) {

    foreach ($javascripts as $js) {
      echo '<script src="' . base_url() ."/".$js . '"></script>';
    }
  } ?>
  
<style>
body{
  font-size: 14px;
  overflow-x:hidden;
}

#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<?php 
// echo "<pre>";
// print_r($settings);die;
?>
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <?php /*echo ucfirst($this->fname)*/ ?>
          <?= $u_firstname ?>
        </li>
      </ul>
    </nav>