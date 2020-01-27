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
    <td>TANGGAL PEMBAYARAN</td>
    <td>: <?=date("d/m/Y H:i",strtotime($row->tgl_bayar))?></td>
  </tr>

  <tr>
    <td>JUMLAH ANGSURAN</td>
    <td>: Rp. <?=format_rupiah($row->jumlah_pembayaran)?></td>
  </tr>

</table>
<hr>
<div class="text-center mt-3">
  <button type='button' class='btn btn-secondary text-white btn-md' data-dismiss='modal'>TUTUP</button>
</div>
