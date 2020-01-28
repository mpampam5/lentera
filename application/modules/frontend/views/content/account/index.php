<style media="screen">
  table tr td{
    padding:3px 3px 15px 1px;
    font-size: 14px;
    margin-bottom: 20px;
    color:#606060;
  }
</style>
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h6>Data Pribadi</h6>
      <table>
        <tr>
          <td>Tanggal Bergabung</td>
          <td>: <?=date("d/m/Y H:i",strtotime(profile('join_date')))?></td>
        </tr>

        <tr>
          <td>No.Anggota</td>
          <td>: <span class="text-primary"><?=profile('no_anggota')?></span></td>
        </tr>

        <tr>
          <td>Username</td>
          <td>: <?=profile('username')?></td>
        </tr>

        <tr>
          <td>No.KTP</td>
          <td>: <?=profile('no_ktp')?></td>
        </tr>

        <tr>
          <td>Nama</td>
          <td>: <?=profile('nama')?></td>
        </tr>

        <tr>
          <td>Tmpt, Tgl lahir</td>
          <td>: <?=profile('tempat_lahir')?>, <?=profile('tanggal_lahir')?></td>
        </tr>

        <tr>
          <td>No.Tlp</td>
          <td>: <?=profile('no_hp')?></td>
        </tr>

        <tr>
          <td>Email</td>
          <td>: <?=profile('email')?></td>
        </tr>

        <tr>
          <td>Pekerjaan</td>
          <td>: <?=profile('pekerjaan')?></td>
        </tr>

        <tr>
          <td>Pendidikan</td>
          <td>: <?=profile('pendidikan')?></td>
        </tr>

        <tr>
          <td>Alamat</td>
          <td>: <?=profile('alamat')?></td>
        </tr>

        <tr>
          <td>Kelurahan/Desa</td>
          <td>: <?=profile('kelurahan')?></td>
        </tr>

        <tr>
          <td>Kecamatan</td>
          <td>: <?=profile('kecamatan')?></td>
        </tr>

        <tr>
          <td>Kabupaten/Kota</td>
          <td>: <?=profile('kota')?></td>
        </tr>

        <tr>
          <td>Provinsi</td>
          <td>: <?=profile('provinsi')?></td>
        </tr>

        <tr>
          <td>Kode Pos</td>
          <td>: <?=profile('kode_pos')?></td>
        </tr>
      </table>
      <p style="color:#606060;font-style:italic">Untuk perubahan data pribadi, silahkan menghubungi admin dengan mengikuti persyaratan yang berlaku</p>

      <hr>
      <h6>Data Rekening</h6>
      <table>
        <tr>
          <td>No.Rekening</td>
          <td>: <span id="nrek"><?=profile('no_rekening')?></span></td>
        </tr>

        <tr>
          <td>BANK</td>
          <td>: <span id="sbank"><?=profile('bank')?></span></td>
        </tr>
      </table>

      <hr>

      <div class="text-center p-2">
        <a href="<?=site_url("frontend/account/rekening")?>" id="rekening" class="btn btn-lg btn-primary btn-block">Ubah data Rekening</a>
        <a href="<?=site_url("frontend/account/pass_login")?>" id="pass_login" class="btn btn-lg btn-block btn-danger">Ubah password login</a>
        <a href="<?=site_url("frontend/account/pass_transaksi")?>" id="pass_trans" class="btn btn-lg btn-warning text-white btn-block">Ubah password transaksi</a>
      </div>

    </div>
  </div>
</div>
<!-- content-wrapper ends -->
<script type="text/javascript">
$(document).on("click","#rekening",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Ubah Data Rekening');
$('#modalContent').load($(this).attr("href"));
$("#modalGue").modal('show');
});

$(document).on("click","#pass_login",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Ubah Password Login');
$('#modalContent').load($(this).attr("href"));
$("#modalGue").modal('show');
});

$(document).on("click","#pass_trans",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Ubah Password Transaksi');
$('#modalContent').load($(this).attr("href"));
$("#modalGue").modal('show');
});
</script>
