<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lentera Digital Indonesia</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/font-awesomes/css/all.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/css/vertical-layout-light/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url()?>_template/frontend/images/favicon.png" />

  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/jquery-toast-plugin/jquery.toast.min.css">

  <script src="<?=base_url()?>_template/frontend/vendors/js/vendor.bundle.base.js"></script>

  <script src="<?=base_url()?>_template/frontend/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</head>

<body>
  <div id="preloader"><div class="textload">Loading</div><div id="status"><div class="spinner"></div></div></div>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top  d-flex flex-row">


      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#">
          <img src="<?=base_url()?>_template/logo-header.png" alt="logo"/>
        </a>
        <a class="navbar-brand brand-logo-mini" href="#">
          <img src="<?=base_url()?>_template/logo-header.png" alt="logo"/>
        </a>
      </div>


      <button class="navbar-toggler navbar-toggler-left d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="ti-layout-grid4" style="color:#28a745;"></span>
      </button>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->


      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <button type="button" class="btn-close-canvas navbar-toggler navbar-toggler-left d-lg-none align-self-center" data-toggle="offcanvas"><i class="ti ti-close"></i></button>

        <div class="header-menu">
          <!-- <a href="<?=site_url("frontend/home")?>"> -->
            <img src="<?=base_url()?>_template/logo.png" alt="">
          <!-- </a> -->
        </div>

          <ul class="main-menu">
        			<li><a href="index.html"><img src="<?=base_url()?>_template/images/icons/gray/home.png" alt="" title="" /><span>Home</span></a></li>
              <li><a href="index.html"><img src="<?=base_url()?>_template/images/icons/gray/group.png" alt="" title="" /><span>Anggota</span></a></li>
              <!-- <li><a href="features.html"><img src="images/icons/gray/book.png" alt="" title="" /><span>Aturan & Sanksi</span></a></li> -->
              <!-- <li><a href="features.html"><img src="images/icons/gray/features.png" alt="" title="" /><span>AD/ART</span></a></li> -->
        			<li><a href="about.html"><img src="<?=base_url()?>_template/images/icons/gray/money.png" alt="" title="" /><span>Tabungan</span></a></li>
        			<li><a href="features.html"><img src="<?=base_url()?>_template/images/icons/gray/product.png" alt="" title="" /><span>Produk</span></a></li>
              <li><a href="features.html"><img src="<?=base_url()?>_template/images/icons/gray/team.png" alt="" title="" /><span>Sosial</span></a></li>
              <li><a href="features.html"><img src="<?=base_url()?>_template/images/icons/gray/mobile-app.png" alt="" title="" /><span>Layanan PPOB</span></a></li>
            </ul>

            <div class="text-center mt-5">
              <h5 class="text-center text-white" style="font-size:11px;">CUSTOMER SUPPORT</h5>
                <ul class="customer-support">
                  <li><a href="videos.html"><img src="<?=base_url()?>_template/images/whatsapp.png" alt="" title="" /><span>Whatsapp</span></a></li>
              		<li><a href="tel:01234567"><img src="<?=base_url()?>_template/images/call.png" alt="" title="" /><span>Telepon</span></a></li>
                </ul>
            </div>


      </nav>

      <!-- partial -->
      <div class="main-panel">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <div class="header-banner">
          <div class="banner-main">
              <div class="banner-image">
                <img class="image-banner" src="<?=base_url()?>_template/frontend/images/carousel/banner_3.jpg" alt="image"/>
              </div>
              <div class="banner-image">
                <img class="image-banner" src="<?=base_url()?>_template/frontend/images/carousel/banner_2.jpg" alt="image"/>
              </div>
              <div class="banner-image">
                <img class="image-banner" src="<?=base_url()?>_template/frontend/images/carousel/banner_1.jpg" alt="image"/>
              </div>
          </div>
          <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
          <script type="text/javascript">
          $('.banner-main').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
            });
          </script>


          <div class="curve">
            <img class="curve-img" src="<?=base_url()?>_template/curve.png" alt="curve">
          </div>
        </div>
