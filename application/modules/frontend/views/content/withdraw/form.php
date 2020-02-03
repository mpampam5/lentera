<style media="screen">
  select.form-control:focus{
    outline: 1px solid #c9ccd7!important;
  }
</style>

  <?php if (setting("WITHDRAW","status")=="0"): ?>
      <div class="mt-2 text-center">
        <h6 class="text-center mt-5 pb-4" style="font-size:14px;line-height:18px"> MOHON MAAF<br> SAAT INI LAYANAN WITHDRAW DI TUTUP</h6>
        <img src="<?=base_url("_template/images/smiling-face.png")?>" width="80" alt="" class="pb-4">
        <p class="text-primary mt-3">Info Lebih Lanjut Hubungi CS Kami: </p>
        <ul style="list-style:none">
          <li><a href="mailto:<?=setting_system("cs")?>"><i class="fa fa-envelope"></i> <?=setting_system("cs")?></a></li>
          <li><a href="tel:+<?=setting_system("nowa")?>"><i class="fa fa-phone"></i> +<?=setting_system("nowa")?></a></li>
        </ul>
      </div>



    <?php else: ?>

      <?php if (profile("bank")=="" || profile("no_rekening")==""): ?>

        <div class="p-3 text-center">
            <p style="font-size:13px;">Silahkan isi data rekening anda terlebih dahulu</p>
            <p class="alert alert-info" style="font-size:13px;">ACCOUNT >> UBAH DATA REKENING</p>
            <a href="<?=site_url("frontend/account")?>" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Account</a>
        </div>

        <?php else: ?>

          <form class="" action="<?=site_url("frontend/withdraw/action")?>" id="form" autocomplete="off">
            <div class="form-group">
              <label for="">Saldo Dompet (Rp)</label>
              <input type="text" class="form-control" value="<?=format_rupiah(total_balance())?>" readonly style="color:#db3714;font-weight:bold">
            </div>

            <div class="form-group">
              <label for="">Amount (Rp)</label>
              <input type="text" class="form-control rupiah" id="amount" name="amount">
            </div>

            <div class="form-group">
              <label for="">Password Transaksi</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>


            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">
              Buat Withdraw Baru
            </button>
          </form>


    <div class="p-1 mt-5">
      <div class="alert alert-danger">
        <ul style="font-size:12px;">
          <li>Ketika Anda mengirim permintaan withdraw, saldo Anda akan berkurang secara otomatis sesuai jumlah withdraw. Admin akan melakukan konfirmasi untuk withdraw terlebih dahulu. Saldo Anda akan kembali apabila Admin membatalkan permintaan withdraw Anda. Dan saldo akan di kirim ke rekening Anda apabila withdraw sukses.</li>
          <li>Jumlah withdraw Anda akan dipotong 15% biaya admin.</li>
          <li>Mohon pastikan Anda telah mengisi info rekening bank Anda.</li>
        </ul>
      </div>
    </div>




    <script type="text/javascript">
    $(document).ready(function(){
    $('.rupiah').mask('00.000.000.000', {reverse: true});
    });

    $("#form").submit(function(e){
    e.preventDefault();
    var me = $(this);
    $("#submit").prop('disabled',true).html('<div class="spinner-border spinner-border-sm text-white"></div> Loading...');
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
                  position: 'bottom-right'
                  // afterHidden: function () {
                  //     location.href=json.url;
                  // }
                });
            }else {
              $("#submit").prop('disabled',false)
                          .html('Buat Withdraw Baru');
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
      <?php endif; ?>



  <?php endif; ?>


<!-- content-wrapper ends -->
