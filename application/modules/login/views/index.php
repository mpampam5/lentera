<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url()?>_template/frontend/images/favicon.png" />

  <style media="screen">
  .content-wrapper{
    background-color: #16192b;
  }
  .auth .auth-form-light{
    background-color: #16192b;
  }
  .brand-logo{
    display: block!important;
    text-align: center!important;
  }
    .brand-logo img{
      width: 100px!important;
      /* height: 100px; */
    }

  .form-group,input[type=text],input[type=password]{
    color:#dadada!important;
    text-decoration: none!important;
  }

  .custom-support{
    margin-bottom: 5px;
    width: auto;
    display: block;
    text-align: center;
  }

  .customer-support li{
    display: inline-block;
    margin: 10px 10px 10px 10px;
  }

  .customer-support li a {
  text-decoration: none;
  color: #fff;
  }


  .customer-support li a img {
    display: block;
    margin: auto;
    max-width: 20px;
  }

  .customer-support li a span {
    text-transform: uppercase;
    font-size: 8px;
    display: block;
    text-align: center;
    padding: 5px 0 0 0;
    letter-spacing: 0.5px;
  }

  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?=base_url()?>_template/logo.png" alt="logo">
              </div>

              <form class="pt-3">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-success"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-success"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
                  </div>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">LOG IN</a>
                </div>

                <div class="text-center mt-4 font-weight text-white">
                   <a href="register.html" class="text-primary"> Lupa Password?</a>
                </div>

                <div class="text-center mt-4  text-white">
                  Belum Memiliki akun? <a href="register.html" class="text-primary"> Buat Akun</a>
                </div>



                <div class="text-center mt-5">
                  <h5 class="text-white" style="font-size:11px;">Hubungi Kami:</h5>
                    <ul class="customer-support">
                      <li><a href="videos.html"><img src="<?=base_url()?>_template/images/whatsapp.png" alt="" title="" /><span>Whatsapp</span></a></li>
                  		<li><a href="tel:01234567"><img src="<?=base_url()?>_template/images/call.png" alt="" title="" /><span>Telepon</span></a></li>
                    </ul>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url()?>_template/frontend/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url()?>_template/frontend/js/off-canvas.js"></script>
  <script src="<?=base_url()?>_template/frontend/js/hoverable-collapse.js"></script>
  <script src="<?=base_url()?>_template/frontend/js/template.js"></script>
  <script src="<?=base_url()?>_template/frontend/js/settings.js"></script>
  <script src="<?=base_url()?>_template/frontend/js/todolist.js"></script>
  <!-- endinject -->
</body>



</html>
