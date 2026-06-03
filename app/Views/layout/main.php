
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- fontasome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl carousel link -->
    <link rel="stylesheet" href="<?= base_url('css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/owl.theme.default.min.css') ?>">

    <!-- style.css link -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/responsive.css') ?>">

    <?= $this->renderSection('cssLinks') ?>

    <title>SpinDigit</title>
  </head>
  <body>
   
    <?= $this->include('dashboard/header') ?>

    <?= $this->renderSection('content_first_half') ?>

    <?= $this->renderSection('addPost_2') ?>

    <?= $this->renderSection('content_second_half') ?>    

    <?= $this->renderSection('addPost_3') ?>

    <!-- ==========footer start======== -->

    <?= view('dashboard/footer') ?>

    <!-- ==========footer close======== -->

      <section class="copy_right">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="copyright_text">
                <span>Copyright © 2022 All Rights Reserved.</span>
              </div>
            </div>
          </div>
        </div>
      </section>
    
      <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha512-jGsMH83oKe9asCpkOVkBnUrDDTp8wl+adkB2D+//JtlxO4SrLoJdhbOysIFQJloQFD+C4Fl1rMsQZF76JjV0eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('js/custom.js') ?>"></script>

      <!-- Option 1: Bootstrap Bundle with Popper -->
    <?= $this->renderSection('scriptLinks') ?>

  </body>
</html>