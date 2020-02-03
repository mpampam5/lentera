
  <?php if (setting("deposit","status")=="0"): ?>
      <div class="mt-2 text-center">
        <h6 class="text-center mt-5 pb-4" style="font-size:14px;line-height:18px"> MOHON MAAF<br> SAAT INI LAYANAN DEPOSIT DI TUTUP</h6>
        <img src="<?=base_url("_template/images/smiling-face.png")?>" width="80" alt="" class="pb-4">
        <p class="text-primary mt-3">Info Lebih Lanjut Hubungi CS Kami: </p>
        <ul style="list-style:none">
          <li><a href="mailto:<?=setting_system("cs")?>"><i class="fa fa-envelope"></i> <?=setting_system("cs")?></a></li>
          <li><a href="tel:+<?=setting_system("nowa")?>"><i class="fa fa-phone"></i> +<?=setting_system("nowa")?></a></li>
        </ul>
      </div>



    <?php else: ?>


            <form class="" action="<?=site_url("frontend/deposit/action")?>" id="form" autocomplete="off">
              <div class="form-group">
                <select class="form-control" id="gateway" name="gateway" style="color:#333333">
                  <option value="">-- Pilih Gateway --</option>
                  <?php $gateway = $this->db->get_where("tb_gateway",["status"=>"1"]); ?>
                  <?php foreach ($gateway->result() as $gt): ?>
                    <option value="<?=$gt->id_gateway?>"><?=$gt->gateway?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <input type="text" class="form-control rupiah" id="amount" name="amount" placeholder="Nilai Deposit">
              </div>


              <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">
                Buat Deposit Baru
              </button>
            </form>




      <div class=" p-1 mt-4">
        <ul style="font-size:14px;">
          <li>Minimal Deposit <b>Rp.<?=format_rupiah(setting("depo_min"))?></b></li>
          <li>Maksimal Deposit <b>Rp.<?=format_rupiah(setting("depo_max"))?></b></li>
        </ul>
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
                            .html('Buat Deposit Baru');
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

<!-- content-wrapper ends -->
