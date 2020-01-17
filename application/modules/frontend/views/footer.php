<!-- partial:../../partials/_footer.html -->
<?php $this->load->view("menu-footer"); ?>
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
