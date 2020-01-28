<div class="content-wrapper">


  <div class="content-deposit">
    <!-- <h6 class="text-center mt-2 mb-4">LAPORAN MUTASI SIMPANAN</h6> -->
    <ul id="load_data"></ul>
    <div id="load_data_message"></div>
  </div>

<!-- <a href="#" id="tes" >dsa</a> -->

  <!-- <a href="<?=site_url("frontend/simpanan/add")?>" class="add-anggota btn btn-primary btn-sm"><i class="ti-plus"></i></a> -->

</div>
<!-- content-wrapper ends -->


<script type="text/javascript">


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
    url:"<?php echo base_url(); ?>frontend/simpanan/fetch_komisi_promosi",
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
