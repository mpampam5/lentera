<style media="screen">
  .card-body{
    padding: 3px!important;
  }

  table tr td{
    padding:3px 3px 15px 2px;
    font-size: 14px;
    margin-bottom: 20px;
  }
  .modal .modal-dialog .modal-content .modal-body{
    padding: 10px 5px 3px 5px!important;
  }
</style>

        <?php
        if ($row->status_deposit=="0") {
          $status = "<span class='text-warning'>Menunggu Verifikasi</span>";
        }elseif ($row->status_deposit=="1") {
          $status = "<span class='text-success'>Terverifikasi</span>";
        }elseif ($row->status_deposit=="2") {
          $status = "<span class='text-danger'>Pending</span>";
        }
         ?>
        <table class="mt-3">

          <tr>
            <td>Status</td>
            <td>: <?=$status?></td>
          </tr>

          <tr>
            <td>Kode Transaksi</td>
            <td>: <span class="text-primary">#<?=$row->kode_tr?></span></td>
          </tr>

          <tr>
            <td>Gateway</td>
            <td>: <?=$row->gateway?></td>
          </tr>

          <tr>
            <td>Nomor rekening</td>
            <td>: <?=$row->no_rekening?></td>
          </tr>

          <tr>
            <td>Nama Rekening</td>
            <td>: <?=$row->atas_nama?></td>
          </tr>

          <tr>
            <td>Total Transfer</td>
            <td>: Rp. <?=format_rupiah($row->amount+$row->last_code)?></td>
          </tr>


        </table>


  <?php if ($row->status_deposit!="1"): ?>
    <div class="mt-4 p-2">
      <ul class="mb-3" style="font-size:12px;">
        <li>Mohon melakukan transfer ke <b><?=$row->gateway?> - <?=$row->no_rekening?></b> a.n. <b><?=$row->atas_nama?></b>.</li>
        <li>Gunakan kode unik <b><?=$row->last_code?></b> untuk memudahkan proses verifikasi.</li>
        <li>Total transfer Anda yaitu <b>Rp. <?=format_rupiah($row->amount+$row->last_code)?></b>.</li>
        <li>Mohon masukkan kode deposit <b><?=$row->code?></b>, No. Anggota <b><?=profile("no_anggota")?></b> pada deskripsi.</li>
      </ul>

      <div class="alert alert-info text-center" style="font-size:12px;">
        Apabila deposit tidak di verifikasi dalam 1x24 jam (jam kerja), mohon hubungi via email <b><?=setting_system("cs")?></b> atau via Whatsapp <b>+<?=setting_system("nowa")?></b>.
      </div>
    </div>
  <?php endif; ?>

<!-- content-wrapper ends -->
