<div class="content-wrapper" style="margin-bottom:25px;">

  <div class="menu-pinjaman">
    <a href="<?=site_url("frontend/pinjaman/pengajuan_pinjaman")?>" id="pengajuan_pinjaman" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/pengajuan-pinjaman.png" alt="">
      <span>Pengajuan Pinjaman</span>
    </a>

    <a href="<?=site_url("frontend/pinjaman/pinjaman_saya")?>" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/loan.png" alt="">
      <span>Pinjaman Saya</span>
    </a>

    <a href="<?=site_url("frontend/pinjaman/bayar_pinjaman_saya")?>" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/business-and-finance.png" alt="">
      <span>Bayar Pinjaman</span>
    </a>

    <a href="<?=site_url("frontend/pinjaman/laporan")?>" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/bank-statement.png" alt="">
      <span>Laporan Pembayaran</span>
    </a>

  </div>



  <div class="mt-4 p-3">
    <ul style="font-size:12px;list-style:none">
      <li><i class="fa fa-check-square"></i> Jumlah Pinjaman <b id="tpinjaman">Rp.<?=format_rupiah(pinjaman())?></b></li>
      <li><i class="fa fa-check-square"></i> Jumlah Pinjaman Yang Belum Di Bayar <b>Rp.<?=format_rupiah(pinjaman_bayar("0"))?></b></li>
      <li><i class="fa fa-check-square"></i> Jumlah Pinjaman Yang Telah Di Bayar <b>Rp.<?=format_rupiah(pinjaman_bayar("1"))?></b></li>
    </ul>
  </div>
</div>



<script type="text/javascript">
$(document).on("click","#pengajuan_pinjaman",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Pengajuan Pinjaman');
$('#modalContent').load($(this).attr("href"));
$("#modalGue").modal('show');
});
</script>
