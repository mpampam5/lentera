<form id="form" action="<?=site_url("frontend/account/rekening_action")?>" autocomplete="off">
  <div class="form-group">
    <label for="">No. Rekening</label>
    <input type="number" class="form-control" id="no_rekening" name="no_rekening" value="<?=profile("no_rekening")?>">
  </div>

  <div class="form-group">
    <label for="">BANK</label>
    <input type="text" class="form-control" id="bank" name="bank" value="<?=profile("bank")?>">
  </div>

  <div class="mt-5 text-center">
    <button type='button' class='btn btn-secondary text-white btn-md' data-dismiss='modal'>Batal</button>
    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-md">Ubah Data Rekening</button>
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
            $('#nrek').html($("#no_rekening").val());
            $('#sbank').html($("#bank").val());
            $.toast({
              text: json.alert,
              showHideTransition: 'slide',
              icon: 'success',
              loaderBg: '#f96868',
              position: 'bottom-center'
            });
        }else {
          $("#submit").prop('disabled',false)
                      .html('Ubah Data Rekening');
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
