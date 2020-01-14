<!-- partial:../../partials/_footer.html -->
<div class="footers">
  <div class="menu-footer">
    <a href="#" data-popup=".popup-login" class="open-popup"><img src="<?=base_url()?>_template/images/icons/white/home.png" alt="" title="" /><span>home</span></a>
    <a href="shop.html"><img src="<?=base_url()?>_template/images/icons/white/users.png" alt="" title="" /><span>Anggota</span></a>
    <a href="#" onclick="openPopup()" class="open-popup"><img src="<?=base_url()?>_template/images/icons/white/credit-card.png" alt="" title="" /><span>Simpanan</span></a>
    <a href="photos.html"><img src="<?=base_url()?>_template/images/icons/white/pinjaman.png" alt="" title="" /><span>Pinjaman</span></a>
    <a href="videos.html"><img src="<?=base_url()?>_template/images/icons/white/deposit.png" alt="" title="" /><span>Deposit</span></a>
		<a href="tel:01234567"><img src="<?=base_url()?>_template/images/icons/white/withdraw.png" alt="" title="" /><span>Withdraw</span></a>
    <a href="features.html"><img src="<?=base_url()?>_template/images/icons/white/money.png" alt="" title="" /><span>Mutasi Dompet</span></a>
    <a href="features.html"><img src="<?=base_url()?>_template/images/icons/white/user.png" alt="" title="" /><span>Account</span></a>
  </div>

</div>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->


<!-- popup -->

<div class="">
<div id="popup" class="popup popup-content">
  <a href="#" onclick="closePopup()" class="close-popup" data-popup=".popup-social"><i class="ti-close"></i></a>

  </div>
</div>
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


function openPopup() {
  document.getElementById("popup").style.display = "block";
  $("#popup").addClass("active");
}

function closePopup() {
  document.getElementById("popup").style.display = "none";
  $("#popup").removeClass("active");
}
</script>
</body>

</html>
