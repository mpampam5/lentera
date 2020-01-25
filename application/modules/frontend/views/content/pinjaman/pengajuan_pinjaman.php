<?php if (setting("pinjaman","status")!="1"): ?>
  <div class="mt-5 text-center">
    <h6 class="text-center mt-5 pb-4" style="font-size:14px;line-height:18px"> MOHON MAAF<br> SAAT INI LAYANAN PENGAJUAN PINJAMAN DI TUTUP</h6>
    <img src="<?=base_url("_template/images/smiling-face.png")?>" width="80" alt="" class="pb-4">
    <p class="text-primary mt-3">Info Lebih Lanjut Hubungi CS Kami: </p>
    <ul style="list-style:none">
      <li><a href="mailto:<?=setting_system("cs")?>"><i class="fa fa-envelope"></i> <?=setting_system("cs")?></a></li>
      <li><a href="tel:+<?=setting_system("nowa")?>"><i class="fa fa-phone"></i> +<?=setting_system("nowa")?></a></li>
    </ul>
  </div>
  <?php else: ?>
    <?php
          $tgl_join = profile('join_date');
          $tgl_tambah3bln =  strtotime("+3 month", strtotime($tgl_join));
          $tgl_hari_ini = strtotime(new_date());
          $kurang = $tgl_hari_ini - $tgl_tambah3bln;
          $selisih = floor($kurang / (24 * 60 * 60)); // convert to days
    ?>


    <?php if ($selisih > 0): ?>
      <?php if (simpanan_pokok() > 0 && simpanan_wajib() > 0): ?>
        <form id="form" action="<?=site_url("frontend/pinjaman/action_pengajuan_pinjaman")?>" autocomplete="off">
          <div class="form-group">
            <label for="">Jumlah Pinjaman (Rp)</label>
            <input type="text" class="form-control rupiah" id="nilai" name="nilai" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Jangka Waktu Pinjaman</label>
            <select class="form-control" id="jangka" name="jangka" style="color:#333333">
              <option value=""> -- pilih --</option>
              <?php foreach (get_ket_pinjaman() as $pj): ?>
                <option value="<?=$pj->id_setting_pinjaman?>"><?=$pj->jangka_waktu?> Bulan</option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">Berapa Kali Angsuran</label>
            <input type="number" class="form-control" id="angsuran" name="angsuran" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="" rows="3" cols="80"></textarea>
          </div>

          <div class="form-group">
            <label for="">Password Transaksi</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="">
          </div>


          <p class="text-center mt-4">Yakin Ingin Mengajukan Pinjaman?</p>
          <div class="mt-5 text-center">
            <button type='button' class='btn btn-secondary text-white btn-md' data-dismiss='modal'>Batal</button>
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-md">Ajukan Pinjaman</button>
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
                  // $("#tpinjaman").html(json.saldo);
                    $("#modalGue").modal('hide');
                    $.toast({
                      text: json.alert,
                      showHideTransition: 'slide',
                      icon: 'success',
                      loaderBg: '#f96868',
                      position: 'bottom-right',
                      hideAfter: 4000
                    });
                }else {
                  $("#submit").prop('disabled',false)
                              .html('Ajukan Pinjaman');
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

        <?php else: ?>

      <?php endif; ?>
        <div class="p-1 text-center">
          Untuk mengajukan pinjaman diharapkan anda memenuhi persyaratan sebagai anggota dengan membayar simpanan wajib & simpanan pokok.
        </div>
      <?php else: ?>
        <div class="p-1 text-center">
          Anda harus menjadi anggota selama minimal 3 bulan untuk dapat mengajukan pinjaman.
        </div>
    <?php endif; ?>

<?php endif; ?>
