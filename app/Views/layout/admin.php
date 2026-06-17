<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="<?= base_url('assets/setting-image/favicon4.ico') ?>" type="image/ico" sizes="16x16">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?> ">

    <link rel="stylesheet" href="<?= base_url('assets/admin/css/adminlte.min.css') ?> ">
    <link rel="stylesheet" href="<?= base_url('assets/admin/bootstrap/css/bootstrap.min.css') ?> ">
  
    <script src="<?= base_url('assets/admin/js/jquery-3.2.1.min.js') ?> "></script>
    <script src="<?= base_url('assets/admin/bootstrap/js/bootstrap.min.js') ?> "></script>

    <title>Admin</title>
    
</head>
<body>
    

    <?= $this->include('admin/header') ?>


    <?= $this->include('admin/sidebar') ?>

    <?= $this->include('admin/body_content') ?>


    <?= $this->view('admin/footer') ?>
</body>
</html>