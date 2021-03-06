<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/jquery-toast-plugin/jquery.toast.min.css">
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
            <?php if (setting('LOGIN_ANGGOTA', 'status')=="0"): ?>
              <div class="mt-5 text-center">
                <h6 class="text-center mt-5 pb-4" style="font-size:14px;line-height:18px"> MOHON MAAF<br> SAAT INI LAYANAN TAMBAH ANGGOTA DI TUTUP</h6>
                <img src="<?=base_url("_template/images/smiling-face.png")?>" width="80" alt="" class="pb-4">
                <p class="text-primary mt-3">Info Lebih Lanjut Hubungi CS Kami: </p>
                <ul style="list-style:none">
                  <li><a href="mailto:<?=setting_system("cs")?>"><i class="fa fa-envelope"></i> <?=setting_system("cs")?></a></li>
                  <li><a href="tel:+<?=setting_system("nowa")?>"><i class="fa fa-phone"></i> +<?=setting_system("nowa")?></a></li>
                </ul>
              </div>
              <?php else: ?>
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <div class="brand-logo">
                    <img src="<?=base_url()?>_template/logo.png" alt="logo">
                  </div>

                  <form class="pt-3" id="form" action="<?=$action?>" autocomplete="off">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <span class="input-group-text bg-transparent border-right-0">
                            <i class="ti-user text-success"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control form-control-lg border-left-0" name="username" placeholder="Username">
                      </div>
                      <div id="username"></div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <span class="input-group-text bg-transparent border-right-0">
                            <i class="ti-lock text-success"></i>
                          </span>
                        </div>
                        <input type="password" class="password form-control form-control-lg border-left-0" name="password" placeholder="Password">
                      </div>
                      <div id="password"></div>
                    </div>


                    <div class="mt-3">
                      <button type="submit" id="submit" name="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOG IN</button>
                    </div>

                    <div class="text-center mt-4 font-weight text-white">
                       <a href="https://lenteradigitalindonesia.com/reset" class="text-primary"> Lupa Password?</a>
                    </div>

                    <div class="text-center mt-4  text-white">
                      Belum Memiliki akun? <a href="https://lenteradigitalindonesia.com/register" class="text-primary"> Buat Akun</a>
                    </div>



                    <div class="text-center mt-5">
                      <h5 class="text-white" style="font-size:11px;">Hubungi Kami:</h5>
                      <div class="p-3 mx-auto">
                        <a target="_blank" href="https://wa.me/<?=setting_system("NOWA")?>" style="border-radius:50%;padding:7px 8px 7px 8px" class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i></a>&nbsp;&nbsp;
                        <a target="_blank" href="tel:+<?=setting_system("NOHP")?>" style="border-radius:50%;padding:7px 8px 7px 8px" class="btn btn-primary btn-sm"><i class="fa fa-phone"></i></a>
                      </div>
                        <!-- <ul class="customer-support"> -->

                          <!-- <li><a target="_blank" href="https://wa.me/<?=setting_system("NOWA")?>"><img src="<?=base_url()?>_template/images/whatsapp.png" alt="" title="" /><span>Whatsapp</span></a></li> -->
                      		<!-- <li><a target="_blank" href="tel:+<?=setting_system("NOHP")?>"><img src="<?=base_url()?>_template/images/call.png" alt="" title="" /><span>Telepon</span></a></li> -->
                        <!-- </ul> -->
                    </div>
                  </form>
                </div>
            <?php endif; ?>
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
  <script src="<?=base_url()?>_template/frontend/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
  <!-- endinject -->

  <script type="text/javascript">

// $(document).on("click","#forgot",function(e){
//     e.preventDefault();
//
//     $('.modal-dialog').removeClass('modal-lg')
//                       .removeClass('modal-sm')
//                       .addClass('modal-sm');
//     $("#modalGue").modal('show');
//   });


  $("#form").submit(function(e){
    e.preventDefault();
    var me = $(this);
    $('#submit').prop('disabled', true)
                 .html('<i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Loading...');
    $.ajax({
      url      : me.attr('action'),
      type     : 'POST',
      data     :me.serialize(),
      dataType : 'JSON',
      success:function(json){
       if (json.success==true) {
         if (json.valid==true) {
           window.location.href = json.url;
         }else {
           $(".password").val('');
           $('#submit').prop('disabled', false).text('Login');
           $.toast({
             // heading: 'Gagal Login',
             text: json.alert,
             showHideTransition: 'slide',
             icon: 'error',
             loaderBg: '#3e3e3e',
             position: 'bottom-center'
           });
           $('.text-danger').remove();
         }
       }else {
         $.each(json.alert, function(key, value) {
           var element = $('#' + key);
           $('#submit').prop('disabled', false).text('Login');
           $(element).find('.text-danger').remove();
           $(element).html(value);
         });
       }
     }
    });
  })
</script>

</body>



</html>
