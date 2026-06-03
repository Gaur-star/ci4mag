
 
 <!-- ==========top bar start========= -->
    <main class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <a href="" class="btn defaultbtn logbtn">Login & Signup</a>
                </div>
                <div class="col-sm-6">
                  <div class="social_bar">
                    <a href="#" title=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" title=""><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" title=""><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" title=""><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" title=""><i class="fa-solid fa-rss"></i></a>
                    <a href="#" title=""><i class="fa-brands fa-skype"></i></a>
                  </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ==========top bar start========= -->

    <!-- ==========brand bar start======= -->
    <main class="brand_bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-4">
            <a href="" class="brand_bar_logo" title=""><img src="images/spindigitlogo.png" alt=""></a>
          </div>
            <?= view('dashboard/addPost_1') ?>
        </div>
      </div>
    </main>
    <!-- ==========brand bar close======= -->

    <!-- ==========header start========== -->
    <header class="header_area">
      <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light header_inner">
                <a class="navbar-brand" href="#"><img src="images/spindigitlogo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Business News</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Health and Biotech</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Morning Updates</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Technology</a>
                    </li>
                  </ul>
                </div>
                <form class="search_area">
                  <div class="utf_search_block">
                    <input class="form-control search_input" type="search" placeholder="Enter your keywords..." aria-label="Search">
                  </div>
                  <span class="btn search_btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i><i class="fa-solid fa-xmark"></i></span>
                </form>
            </nav>
      </div>
    </header>
    <!-- ==========header close========== -->