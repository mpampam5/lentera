<!-- partial:../../partials/_footer.html -->

<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<div class="modal fade" id="modalGue" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body" id="modalContent" style="max-height: 687px; overflow-y: auto;"></div>
      </div>
    </div>
</div>
<!-- plugins:js -->

<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?=base_url()?>_template/frontend/vendors/inputmask/dist/jquery.mask.min.js"></script>
<script src="<?=base_url()?>_template/frontend/js/off-canvas.js"></script>
<script src="<?=base_url()?>_template/frontend/vendors/clipboard/clipboard.min.js"></script>
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

  $('#modalGue').on('hide.bs.modal', function () {
		setTimeout(function(){
				$('#modalTitle, #modalContent , #modalFooter').html('');
			}, 500);
	  });






    //copy
     var clipboard = new ClipboardJS('.btn-clipboard');
     clipboard.on('success', function(e) {
      console.log(e);
      $.toast({
        text: 'copy link referral success',
        showHideTransition: 'slide',
        icon: 'info',
        loaderBg: '#f96868',
        position: 'top-center',
      });
     });
    clipboard.on('error', function(e) {
      console.log(e);
    });


})(jQuery);

</script>
</body>

</html>
