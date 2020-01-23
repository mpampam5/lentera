<ul>
  <li>Simpanan sukarela minimal Rp. 50.000</li>
  <li>Anda akan mendapatkan bagi untung sebesar 0-10% per bulan selama 1 tahun.</li>
  <li>Saldo Dompet Anda <b>Rp. <?=format_rupiah(total_balance())?></b></li>
</ul>

<form class="mt-4" action="<?=site_url("frontend/simpanan/action_simpanan_sukarela")?>" id="form" autocomplete="off">

  <div class="form-group">
    <label for="">Biaya Simpanan Sukarela (Rp)</label>
    <input type="text" class="form-control rupiah" id="amount" name="amount">
  </div>

  <div class="form-group">
    <label for="">Password Transaksi</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Transaksi">
  </div>

  <p class="text-center mt-4">Yakin Ingin Membayar Simpanan Sukarela?</p>
  <div class="mt-5 text-center">
    <button type='button' class='btn btn-secondary text-white btn-md' data-dismiss='modal'>Batal</button>
    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-md">Bayar</button>
  </div>
</form>



<script type="text/javascript">
$(document).ready(function(){
  $('.rupiah').mask('00.000.000.000', {reverse: true});
});

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
          $("#ssukarela").html(json.saldo);
            $("#modalGue").modal('hide');
            $('#load_data').html("");
              lazzy_loader(10);
              load_data(10, 0);
            $.toast({
              text: json.alert,
              showHideTransition: 'slide',
              icon: 'success',
              loaderBg: '#f96868',
              position: 'bottom-right'
            });
        }else {
          $("#submit").prop('disabled',false)
                      .html('Bayar');
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
