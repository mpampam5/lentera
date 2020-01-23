<div class="alert alert-primary text-center" style="font-size:11px;text-transform:uppercase">
  <?=cek_pembayaran_simpanan_wajib_trakhir()?>
</div>

<ul>
  <li>Saldo Dompet Anda <b>Rp. <?=format_rupiah(total_balance())?></b></li>
</ul>

<form class="mt-4" action="<?=site_url("frontend/simpanan/action_simpanan_wajib")?>" id="form" autocomplete="off">

  <div class="form-group">
    <label for="">Biaya simpanan wajib (Rp) / bulan</label>
    <input type="text" class="form-control" value="<?=format_rupiah(setting("SIMPANAN_WAJIB"))?>" id="amount" name="amount" readonly style="font-weight:bold;color:#d90b0b">
  </div>

  <div class="form-group">
    <label for="">Jumlah bulan yang akan dibayar</label>
    <input type="number" class="form-control" id="bulan" name="bulan" placeholder="jumlah Bulan">
  </div>

  <div class="form-group">
    <label for="">Password transaksi</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Transaksi">
  </div>

  <p class="text-center mt-4">Yakin Ingin Membayar Simpanan Wajib?</p>
  <div class="mt-5 text-center">
    <button type='button' class='btn btn-secondary text-white btn-md' data-dismiss='modal'>Batal</button>
    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-md">Bayar</button>
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
          $("#swajib").html(json.saldo);
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
