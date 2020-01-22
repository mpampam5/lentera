<div class="content-wrapper">

  <div class="widget-dashboard mb-3">
    <div class="d-flex flex-row">
      <div class="widget-content">
        <div class="card bg-danger">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center mb-2" style=" border-bottom:1px solid #fff;">
              <i class="fa fa-life-ring icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Simpanan Pokok</p>
  								<h6 id="spokok"><?=setting("CURRENCY")?>. <?=format_rupiah(simpanan_pokok())?></h6>
  						</div>
            </div>
            <?php if (simpanan_pokok() > 0): ?>
                <a  style="font-size:14px;color:#fff;text-transform:uppercase"> LUNAS</a>
              <?php else: ?>
                <a href="<?=site_url("frontend/simpanan/form_simpanan_pokok")?>" id="simpanan_pokok" class="" style="font-size:14px;color:#fff;text-transform:uppercase"><i class="ti-arrow-circle-right"></i> Klik Untuk Bayar</a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-info">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center mb-2" style=" border-bottom:1px solid #fff;">
              <i class="fa fa-life-ring icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Simpanan Wajib</p>
  								<h6 class=""><?=setting("CURRENCY")?>. <?=format_rupiah(jumlah_simpanan())?></h6>
  						</div>
            </div>
            <a href="#" class="" style="font-size:14px;color:#fff;text-transform:uppercase"><i class="ti-arrow-circle-right"></i> Klik Untuk Bayar</a>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-success">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center mb-2" style=" border-bottom:1px solid #fff;">
              <i class="fa fa-life-ring icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Simpanan Sukarela</p>
  								<h6 class=""><?=setting("CURRENCY")?>. <?=format_rupiah(total_balance())?></h6>
  						</div>
            </div>
            <a href="#" class="" style="font-size:14px;color:#fff;text-transform:uppercase"><i class="ti-arrow-circle-right"></i> Klik Untuk Bayar</a>
          </div>
        </div>
      </div>

      <div class="widget-content">
        <div class="card bg-warning">
          <div class="card-body">
            <div class="d-flex flex-row align-items-center mb-2" style=" border-bottom:1px solid #fff;">
              <i class="fa fa-life-ring icon-lg"></i>
              <div class="ml-3">
                  <p class="mt-2 text-muted card-text">Simpanan Sudah Di Transfer</p>
  								<h6 class=""><?=setting("CURRENCY")?>. <?=setting("KEUNTUnGAN_KOPERASI")?></h6>
  						</div>
            </div>
            <a href="#" class="" style="font-size:14px;color:#fff;text-transform:uppercase">&nbsp;</a>
          </div>
        </div>
      </div>


    </div>
  </div>

  <div class="content-deposit">
    <h6 class="text-center mb-4">Laporan Mutasi Simpanan</h6>
    <ul id="load_data"></ul>
    <div id="load_data_message"></div>
  </div>

<!-- <a href="#" id="tes" >dsa</a> -->

  <!-- <a href="<?=site_url("frontend/simpanan/add")?>" class="add-anggota btn btn-primary btn-sm"><i class="ti-plus"></i></a> -->

</div>
<!-- content-wrapper ends -->


<script type="text/javascript">

$(document).on("click","#simpanan_pokok",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Pembayaran Simpanan Pokok');
$('#modalContent').load($(this).attr("href"));
$("#modalGue").modal('show');
});


var limit = 10;
var start = 0;
var action = 'inactive';

function lazzy_loader(limit)
{
  var output = '<p class="text-center"><img src="<?=base_url()?>_template/preloader.svg" style="width:60px;height:60px;"></p>';
  $('#load_data_message').html(output);
}

// $("#tes").click(function(){
//   $('#load_data').html("");
//   lazzy_loader(limit);
//   load_data(limit, start);
// })

lazzy_loader(limit);

function load_data(limit, start)
{
  $.ajax({
    url:"<?php echo base_url(); ?>frontend/simpanan/fetch",
    method:"POST",
    data:{limit:limit, start:start},
    cache: false,
    success:function(data)
    {
      if(data == '')
      {
        $('#load_data_message').html('');
        action = 'active';
      }
      else
      {
        $('#load_data').append(data);
        $('#load_data_message').html('');
        action = 'inactive';
      }
    }
  })
}

if(action == 'inactive')
{
  action = 'active';
  load_data(limit, start);
}

$(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
    lazzy_loader(limit);
    action = 'active';
    start = start + limit;
    setTimeout(function(){
      load_data(limit, start);
    }, 1000);
  }
});

</script>
