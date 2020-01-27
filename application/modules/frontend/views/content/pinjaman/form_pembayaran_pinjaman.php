<style media="screen">
  table tr td{
    padding: 3px 0 3px 2px;
    font-size: 12px;
  }
</style>

<table>
  <tr>
    <td>KD.PINJAMAN</td>
    <td>: <b>#<?=$row->kode_pinjaman?></b></td>
  </tr>

  <tr>
    <td>TGL PINJAMAN</td>
    <td>: <?=date("d/m/Y H:i",strtotime($row->tgl_pinjaman))?></td>
  </tr>

  <tr>
    <td>PERIODE</td>
    <td>: <?=$row->periode?> BULAN</td>
  </tr>

  <tr>
    <td>ANGSURAN</td>
    <td>: <?=$row->angsuran?> KALI</td>
  </tr>

  <tr>
    <td>JUMLAH PINJAMAN</td>
    <td>: Rp. <?=format_rupiah($row->jumlah_pinjaman)?></td>
  </tr>

  <tr>
    <td colspan="2"><i style="text-transform:uppercase"><?=$row->keterangan?></i></td>
  </tr>

</table>
  <hr>
<table>
  <tr>
    <td>KD.PEMBAYARAN</td>
    <td>: <b>#<?=$row->kode_bayar_pinjaman?></b></td>
  </tr>

  <tr>
    <td>ANGSURAN KE - </td>
    <td>: <?=$row->angsuran_ke?></td>
  </tr>

  <tr>
    <td>JATUH TEMPO</td>
    <td>: <?=date("d/m/Y H:i",strtotime($row->date))?></td>
  </tr>

  <tr>
    <td>JUMLAH ANGSURAN</td>
    <td>: Rp. <?=format_rupiah($row->jumlah_pembayaran)?></td>
  </tr>

</table>


  <hr>

<form id="form" action="<?=site_url("frontend/pinjaman/bayar_pinjaman_action/".enc_uri($row->id_bayar))?>">
  <p class="text-center mt-4">Yakin Ingin Membayar Angsuran Pinjaman?</p>
  <div class="form-group">
    <input type="hidden" class="form-control" id="jumlah_angsuran" name="jumlah_angsuran" value="<?=$row->jumlah_pembayaran?>">
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" id="kode_pinjaman" name="kode_pinjaman" value="<?=$row->kode_pinjaman?>">
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" id="kode_pembayaran" name="kode_pembayaran" value="<?=$row->kode_bayar_pinjaman?>">
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" id="angsuran_ke" name="angsuran_ke" value="<?=$row->angsuran_ke?>">
  </div>


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
            $("#modalGue").modal('hide');
            $('#load_data').html("");
              lazzy_loader(10);
              load_data(10, 0);
            $.toast({
              text: json.alert,
              showHideTransition: 'slide',
              icon: 'success',
              loaderBg: '#f96868',
              position: 'bottom-center'
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
