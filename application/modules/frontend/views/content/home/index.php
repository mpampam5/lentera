<link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/morris.js/morris.css">
<script src="<?=base_url()?>_template/frontend/vendors/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>_template/frontend/vendors/morris.js/morris.min.js"></script>
<!-- <script src="<?=base_url()?>_template/frontend/js/morris.js"></script> -->


<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<div class="header-banner">
  <div class="banner-main">
      <div class="banner-image">
        <img class="image-banner" src="<?=base_url()?>_template/frontend/images/carousel/banner_3.jpg" alt="image"/>
      </div>
      <div class="banner-image">
        <img class="image-banner" src="<?=base_url()?>_template/frontend/images/carousel/banner_2.jpg" alt="image"/>
      </div>
      <div class="banner-image">
        <img class="image-banner" src="<?=base_url()?>_template/frontend/images/carousel/banner_1.jpg" alt="image"/>
      </div>
  </div>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript">
  $('.banner-main').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    });
  </script>


  <div class="curve">
    <img class="curve-img" src="<?=base_url()?>_template/curve.png" alt="curve">
  </div>
</div>






<div class="content-wrapper" style="margin-bottom:25px;">

<p class="text-center mt-3" style="font-weight:bold;">Hi, <?=profile("nama")?></p>

<div class="menu-header">
  <a href="<?=site_url("frontend/account")?>"><img src="<?=base_url()?>_template/images/icons/green/id-card.png" alt="" title="" /><span>Account</span></a>
  <a href="<?=site_url("frontend/deposit")?>"><img src="<?=base_url()?>_template/images/icons/green/deposit.png" alt="" title="" /><span>Deposit</span></a>
	<a href="<?=site_url("frontend/withdraw")?>"><img src="<?=base_url()?>_template/images/icons/green/withdraw.png" alt="" title="" /><span>Withdraw</span></a>
  <a href="<?=site_url("frontend/mutasi_dompet")?>"><img src="<?=base_url()?>_template/images/icons/green/transaction.png" alt="" title="" /><span>Mutasi Dompet</span></a>
</div>


<div class="row p-2">
  <div class="col-sm-12">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" value="<?=site_url("link/referral/12345")?>">
      <div class="input-group-append">
        <button class="btn btn-sm btn-primary" type="button">Copy</button>
      </div>
    </div>
  </div>
</div>

  <div class="widget-dashboard">
    <div class="d-flex flex-row">
      <div class="widget-content">
        <div class="card bg-danger">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-user icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Jumlah Anggota</p>
  								<h6 class=""><?=jumlah_anggota()?></h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-info">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-archive icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Jumlah Simpanan</p>
  								<h6 class=""><?=setting("CURRENCY")?>. <?=format_rupiah(jumlah_simpanan())?></h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-success">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-wallet icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Saldo Dompet</p>
  								<h6 class=""><?=setting("CURRENCY")?>. <?=format_rupiah(total_balance())?></h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-warning">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-stats-up icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Keuntungan</p>
  								<h6 class=""><?=setting("CURRENCY")?>. <?=setting("KEUNTUnGAN_KOPERASI")?></h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-primary">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-layers icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Alokasi Pinjaman</p>
  								<h6 class=""><?=setting("CURRENCY")?>. <?=format_rupiah(alokasi_pinjaman())?></h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-dark">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-files icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Total Tabungan</p>
  								<h6 class=""><?=setting("CURRENCY")?>. <?=format_rupiah(jumlah_deposito())?></h6>
  						</div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <div class="row mb-2">
    <div class="col-lg-12 grid-margin stretch-card mt-4">
      <div class="card">
        <div class="card-body" style="padding:10px;">
          <h4 class="card-title text-center">Simpanan - Pinjaman Tahun <?=date("Y")?></h4>
          <div id="morris-line-example" style="height:200px;margin:5px;"></div>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- content-wrapper ends -->


<script type="text/javascript">
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

Morris.Line({
  element: 'morris-line-example',
  lineColors: ['#63CF72', '#F36368','#cc3333', '#472526'],
  data: [{
    m: '2020-01', // <-- valid timestamp strings
    a: 1000000,
    b:0
  }, {
    m: '2020-02',
    a: 5466555,
    b:1000000
  }, {
    m: '2020-03',
    a: 2436655,
    b:0
  }, {
    m: '2020-04',
    a: 2066565,
    b:0
  }, {
    m: '2020-05',
    a: 1611555,
    b:0
  }, {
    m: '2020-06',
    a: 18700000,
    b:0
  }, {
    m: '2020-07',
    a: 210655,
    b:0
  }, {
    m: '2020-08',
    a: 204565,
    b:1870000
  }, {
    m: '2020-09',
    a: 22465,
    b:0
  }, {
    m: '2020-10',
    a: 3017777,
    b:0
  }, {
    m: '2020-11',
    a: 26277,
    b:0
  }, {
    m: '2020-12',
    a: 2199,
    b:0
  }, ],
  xkey: 'm',
  ykeys: ['a','b'],
  labels: ['Simpanan','Pinjaman'],
  hideHover:true,
  xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
    var month = months[x.getMonth()];
    return month;
  },
  dateFormat: function(x) {
    var month = months[new Date(x).getMonth()];
    return month;
  },
});
</script>




<?php $this->load->view("menu-footer"); ?>
