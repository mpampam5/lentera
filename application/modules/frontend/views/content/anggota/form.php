<?php if (cek_simpanan_wajib() && cek_simpanan_pokok()): ?>


    <div class="content-anggota" style="margin-top:10px">
      <div class="p-3">
        <p>Untuk dapat mengajukan pinjaman, mendaftarkan anggota dan transaksi lainnya, mohon untuk</p>
        <ul class="mb-1">
          <li>* Membayar <strong>SIMPANAN WAJIB</strong></li>
          <li>* Membayar <strong>SIMPANAN POKOK</strong></li>
        </ul>
      </div>
    </div>



  <?php else: ?>

    <?php if (setting("DAFTAR_ANGGOTA","status") != "1"): ?>
      <div class="mt-5 text-center">
        <h6 class="text-center mt-5 pb-4" style="font-size:14px;line-height:18px"> MOHON MAAF<br> SAAT INI LAYANAN TAMBAH ANGGOTA DI TUTUP</h6>
        <img src="<?=base_url("_template/images/smiling-face.png")?>" width="80" alt="" class="pb-4">
        <p class="text-primary mt-3">Info Lebih Lanjut Hubungi CS Kami: </p>
        <ul style="list-style:none">
          <li><a href="mailto:<?=setting_system("cs")?>"><i class="fa fa-envelope"></i> <?=setting_system("cs")?></a></li>
          <li><a href="tel:+<?=setting_system("nowa")?>"><i class="fa fa-phone"></i> +<?=setting_system("nowa")?></a></li>
        </ul>
      </div>
      <?php else: ?>
        <div class="text-center" style="font-size:12px">
          Untuk mendaftarkan anggota<br> wajib membayar biaya administrasi sebesar<strong> Rp 25.000</strong>. <br>Saldo anda saat ini adalah <strong>Rp <?= format_rupiah(total_balance()) ?></strong>.
        </div>


        <form class="mt-3" id="form" action="<?=site_url("frontend/anggota/add_action")?>" autocomplete="off">
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="">
          </div>

          <div class="form-group">
            <label for="">No.KTP</label>
            <input type="number" class="form-control" id="nik" name="nik" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Tempat lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="">
          </div>

          <div class="form-group">
            <label for="">No. Tlp/HP</label>
            <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="">
          </div>



          <div class="form-group">
            <label for="">Alamat</label>
            <textarea  class="form-control" id="alamat" name="alamat" rows="3" cols="80"></textarea>
          </div>

          <div class="form-group">
            <label for="">Kelurahan/Desa</label>
            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Kabupaten/Kota</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Kode Pos</label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Pendidikan</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="">
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="amount" name="amount" value="<?=setting('BIAYA_PENDAFTARAN')?>">
          </div>


          <div class="mt-5 text-center">
            <button type='button' class='btn btn-secondary text-white btn-md' data-dismiss='modal'>Batal</button>
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-md">Tambahkan</button>
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
                              .html('Tambahkan');
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
<?php endif; ?>
