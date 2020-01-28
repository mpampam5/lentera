<form id="form" action="<?=site_url("frontend/account/pass_transaksi_action")?>" autocomplete="off">
  <div class="form-group">
    <label for="">Password Transaksi Lama</label>
    <input type="password" class="form-control" id="pass_lama" name="pass_lama">
  </div>

  <hr>

  <div class="form-group">
    <label for="">Password Transaksi Baru</label>
    <input type="password" class="form-control" id="pass_baru" name="pass_baru">
  </div>

  <div class="form-group">
    <label for="">Konfirmasi Password Transaksi Baru</label>
    <input type="password" class="form-control" id="pass_baru_kon" name="pass_baru_kon">
  </div>

  <div class="mt-5 text-center">
    <button type='button' class='btn btn-secondary text-white btn-md' data-dismiss='modal'>Batal</button>
    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-md">Ubah Password Transaksi</button>
  </div>
</form>

<script type="text/javascript">
$("#form").submit(function(e){
e.preventDefault();
var me = $(this);
$("#submit").prop('disabled',true).html('<div class="spinner-border spinner-border-sm text-white"></div> prosess...');
$.ajax({
      url             : me.attr('action'),
      type            : 'post',
      data            :  new FormData(this),
      contentType     : false,
      cache           : false,
      dataType        : 'JSON',
      processData     :false,
      success:function(json){
        if (json.success==true) {
            $("#modalGue").modal('hide');
            $.toast({
              text: json.alert,
              showHideTransition: 'slide',
              icon: 'success',
              loaderBg: '#f96868',
              position: 'bottom-center'
            });
        }else {
          $("#submit").prop('disabled',false)
                      .html('Ubah Password Transaksi');
          $.each(json.alert, function(key, value) {
            var element = $('#' + key);
            $(element)
            .closest('.form-group')
            .find('.text-danger').remove();
            $(element).after(value);
          });
        }
      }
});
});
</script>
