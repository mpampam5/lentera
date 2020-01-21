<nav class="navbar col-lg-12 col-12 p-0 fixed-top  d-flex flex-row">
  <?php if ($title !=  "home"): ?>
  <a href="<?=$back?>" class="navbar-toggler navbar-toggler-left d-lg-none align-self-center">
    <span class="ti-arrow-left" style="color:#28a745;"></span>
  </a>
  <?php endif; ?>


  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <?php if ($title ==  "home"): ?>
      <a class="navbar-brand brand-logo mr-5" href="#">
        <img src="<?=base_url()?>_template/logo-header.png" alt="logo"/>
      </a>
      <a class="navbar-brand brand-logo-mini" href="#">
        <img src="<?=base_url()?>_template/logo-header.png" alt="logo"/>
      </a>
      <?php else: ?>
        <a class="navbar-brand brand-logo-mini" href="#" style="color:#28a745;text-transform:uppercase;font-size:16px;font-weight:bold;">
          <?=$title?>
        </a>
    <?php endif; ?>

  </div>
  <button class="navbar-toggler navbar-toggler-left d-lg-none align-self-center" type="button" data-toggle="offcanvas">
    <span class="fa fa-ellipsis-v" style="color:#28a745;"></span>
  </button>
</nav>
