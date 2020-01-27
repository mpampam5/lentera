<style media="screen">
  table tr td{
    padding:3px 3px 15px 1px;
    font-size: 14px;
    margin-bottom: 20px;
  }
</style>

        <table>

          <tr>
            <td>Status</td>
            <td>: <?=$row->status=="1" ? "<span class='text-success'>Anggota</span>":"<span class='text-danger'>Calon Anggota</span>"?></td>
          </tr>

          <tr>
            <td>No.Anggota</td>
            <td>: <span class="text-primary"><?=$row->no_anggota?></span></td>
          </tr>

          <tr>
            <td>Username</td>
            <td>: <?=$row->username?></td>
          </tr>

          <tr>
            <td>No.KTP</td>
            <td>: <?=$row->no_ktp?></td>
          </tr>

          <tr>
            <td>Nama</td>
            <td>: <?=$row->nama?></td>
          </tr>

          <tr>
            <td>Tmpt, Tgl lahir</td>
            <td>: <?=$row->tempat_lahir?>, <?=$row->tanggal_lahir?></td>
          </tr>

          <tr>
            <td>No.Tlp</td>
            <td>: <?=$row->no_hp?></td>
          </tr>

          <tr>
            <td>Email</td>
            <td>: <?=$row->email?></td>
          </tr>

          <tr>
            <td>Pekerjaan</td>
            <td>: <?=$row->pekerjaan?></td>
          </tr>

          <tr>
            <td>Pendidikan</td>
            <td>: <?=$row->pendidikan?></td>
          </tr>

          <tr>
            <td>Alamat</td>
            <td>: <?=$row->alamat?></td>
          </tr>

          <tr>
            <td>Kelurahan/Desa</td>
            <td>: <?=$row->kelurahan?></td>
          </tr>

          <tr>
            <td>Kecamatan</td>
            <td>: <?=$row->kecamatan?></td>
          </tr>

          <tr>
            <td>Kabupaten/Kota</td>
            <td>: <?=$row->kota?></td>
          </tr>

          <tr>
            <td>Provinsi</td>
            <td>: <?=$row->provinsi?></td>
          </tr>

          <tr>
            <td>Kode Pos</td>
            <td>: <?=$row->kode_pos?></td>
          </tr>
        </table>

        <hr>
        <div class="text-center mt-3">
          <button type='button' class='btn btn-secondary text-white btn-md' data-dismiss='modal'>TUTUP</button>
        </div>
