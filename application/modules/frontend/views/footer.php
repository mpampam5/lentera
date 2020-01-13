<!-- partial:../../partials/_footer.html -->
<div class="footers">
  <div class="menu-footer">
    <a href="#" data-popup=".popup-login" class="open-popup"><img src="<?=base_url()?>_template/images/icons/white/home.png" alt="" title="" /><span>home</span></a>
    <a href="shop.html"><img src="<?=base_url()?>_template/images/icons/white/users.png" alt="" title="" /><span>Anggota</span></a>
    <a href="#" data-popup=".popup-social" class="open-popup"><img src="<?=base_url()?>_template/images/icons/white/simpanan.png" alt="" title="" /><span>Simpanan</span></a>
    <a href="photos.html"><img src="<?=base_url()?>_template/images/icons/white/pinjaman.png" alt="" title="" /><span>Pinjaman</span></a>
    <a href="features.html"><img src="<?=base_url()?>_template/images/icons/white/user.png" alt="" title="" /><span>Account</span></a>
		<!-- <a href="videos.html"><img src="<?=base_url()?>_template/images/icons/white/whatsapp.png" alt="" title="" /><span>Whatsapp</span></a>
		<a href="tel:01234567"><img src="<?=base_url()?>_template/images/icons/white/phone.png" alt="" title="" /><span>Telepon</span></a> -->
  </div>

</div>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->

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
<!-- Custom js for this page-->
<!-- End custom js for this page-->
<script type="text/javascript">
(function($) {
  'use strict';

  $('#status').fadeOut();
  $('#preloader').delay(350).fadeOut('slow');
  $('#preloader .textload').delay(0).fadeOut('slow');
  $('body').delay(350).css({
      'overflow': 'visible'
  });

})(jQuery);
</script>
</body>

</html>
