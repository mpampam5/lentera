<div class="content-wrapper">
  <div class="content-deposit">
    <ul id="load_data"></ul>
    <div id="load_data_message"></div>
  </div>
</div>
<!-- content-wrapper ends -->


<script type="text/javascript">

$(document).on("click","#detail-pembayaran",function(e){
  e.preventDefault();
  $('.modal-dialog').removeClass('modal-sm')
                  .removeClass('modal-md')
                  .addClass('modal-lg');
$("#modalTitle").text('Detail Pembayaran Angsuran Pinjaman');
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


lazzy_loader(limit);

function load_data(limit, start)
{
  $.ajax({
    url:"<?php echo base_url(); ?>frontend/pinjaman/fetch_laporan",
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
