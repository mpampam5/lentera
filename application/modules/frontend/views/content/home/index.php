<link rel="stylesheet" href="<?=base_url()?>_template/frontend/vendors/morris.js/morris.css">
<script src="<?=base_url()?>_template/frontend/vendors/raphael/raphael.min.js"></script>/
<script src="<?=base_url()?>_template/frontend/vendors/morris.js/morris.min.js"></script>
<!-- <script src="<?=base_url()?>_template/frontend/js/morris.js"></script> -->
<div class="content-wrapper" style="margin-bottom:35px;">

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
  								<h6 class="">2</h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-info">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-user icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Jumlah Simpanan</p>
  								<h6 class="">Rp. 1.200.000</h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-success">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-user icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Saldo Dompet</p>
  								<h6 class="">Rp. 0</h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-warning">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-user icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Keuntungan</p>
  								<h6 class="">Rp. 30.000.000</h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-primary">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-user icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Alokasi Pinjaman</p>
  								<h6 class="">Rp. 0</h6>
  						</div>
            </div>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-dark">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center">
              <i class="ti-user icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Total Tabungan</p>
  								<h6 class="">Rp. 0</h6>
  						</div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card mt-2">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Simpanan - Pinjaman Tahun 2020</h4>
          <div id="morris-line-example" style="height:200px"></div>
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
  lineColors: ['#63CF72', '#F36368'],
  data: [{
    m: '2020-01', // <-- valid timestamp strings
    a: 1000000
  }, {
    m: '2020-02',
    a: 5466555
  }, {
    m: '2020-03',
    a: 2436655
  }, {
    m: '2020-04',
    a: 2066565
  }, {
    m: '2020-05',
    a: 1611555
  }, {
    m: '2020-06',
    a: 18700000
  }, {
    m: '2020-07',
    a: 210655
  }, {
    m: '2020-08',
    a: 204565
  }, {
    m: '2020-09',
    a: 22465
  }, {
    m: '2020-10',
    a: 3017777
  }, {
    m: '2020-11',
    a: 26277
  }, {
    m: '2020-12',
    a: 2199
  }, ],
  xkey: 'm',
  ykeys: ['a'],
  labels: ['Rp.'],
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
