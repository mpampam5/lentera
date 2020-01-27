<div class="content-wrapper" style="margin-bottom:25px;">

  <div class="menu-pinjaman">
    <a href="<?=site_url("frontend/simpanan/form_simpanan_pokok")?>" id="simpanan_pokok" id="pengajuan_pinjaman" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/simpanan_pokok.png" alt="">
      <span>SIMPANAN POKOK</span>
    </a>

    <a href="<?=site_url("frontend/simpanan/form_simpanan_wajib")?>" id="simpanan_wajib" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/simpanan_wajib.png" alt="">
      <span>SIMPANAN WAJIB</span>
    </a>

    <a href="<?=site_url("frontend/simpanan/form_simpanan_sukarela")?>" id="simpanan_sukarela" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/business-and-finance.png" alt="">
      <span>SIMPANAN SUKARELA</span>
    </a>

    <a href="<?=site_url("frontend/simpanan/laporan_mutasi_simpanan")?>" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/bank-statement.png" alt="">
      <span>LAPORAN MUTASI SIMPANAN</span>
    </a>

    <a href="<?=site_url("frontend/simpanan/bagi_untung")?>" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/bagi-untung.png" alt="">
      <span>BAGI UNTUNG</span>
    </a>

    <a href="<?=site_url("frontend/simpanan/komisi_promosi")?>" class="list-pinjaman">
      <img src="<?=base_url()?>_template/images/user-network.png" alt="">
      <span>KOMISI PROMOSI</span>
    </a>

  </div>



  <div class="mt-4 p-3">
    <ul style="font-size:12px;list-style:none">
      <li><i class="fa fa-check-square"></i> Jumlah Simpanan Pokok <b id="spokok">Rp.<?=format_rupiah(simpanan_pokok())?></b></li>
      <li><i class="fa fa-check-square"></i> Jumlah Simpanan Wajib <b id="swajib">Rp.<?=format_rupiah(simpanan_wajib())?></b></li>
      <li><i class="fa fa-check-square"></i> Jumlah Simpanan Sukarela <b id="ssukarela">Rp.<?=format_rupiah(simpanan_sukarela())?></b></li>
      <li><i class="fa fa-check-square"></i> Jumlah Simpanan Sudah Di Transfer <b>Rp.<?=format_rupiah(simpanan_yg_bisa_diambil_by_tipe())?></b></li>
    </ul>
  </div>
</div>



<script type="text/javascript">

$(document).on("click","#simpanan_wajib",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Pembayaran Simpanan Wajib');
$('#modalContent').load($(this).attr("href"));
$("#modalGue").modal('show');
});

$(document).on("click","#simpanan_pokok",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Pembayaran Simpanan Pokok');
$('#modalContent').load($(this).attr("href"));
$("#modalGue").modal('show');
});

$(document).on("click","#simpanan_sukarela",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Pembayaran Simpanan Sukarela');
$('#modalContent').load($(this).attr("href"));
$("#modalGue").modal('show');
});
</script>
