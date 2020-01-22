<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Mutasi_dompet extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Mutasi_dompet_model","model");
  }

  function index()
  {
    $this->template->set_title("Mutasi Dompet");
    $this->template->back(site_url("frontend/home"));
    $this->template->view("content/mutasi_dompet/index");
  }


  function fetch(){
    $output = '';
    $data = $this->model->fetch_data($this->input->post('limit'), $this->input->post('start'));
    if($data->num_rows() > 0)
    {
     foreach($data->result() as $row)
     {
      $output .= '<li class="list-mutasi-dompet">
                      <a>
                        <div class="">
                          <h6 class="text-muted" style="font-size:14px!important;">KD.Transaksi #'.$row->kode_tr.'</h6>
                          <p class="text-muted card-text"><i class="fa fa-calendar"></i> Tanggal Transaksi : '.date("d/m/Y H:i",strtotime($row->date)).'</p>
                          <p class="text-muted card-text"><i class="ti-angle-double-right"></i> Debit : Rp.'.format_rupiah($row->debit).'</p>
                          <p class="text-muted card-text"><i class="ti-angle-double-left"></i> Credit : Rp.'.format_rupiah($row->credit).'</p>
                          <h6 class="text-muted" style="font-size:14px!important;"><i class="ti-wallet"></i> Sisa Saldo Dompet : Rp.'.format_rupiah($row->saldo).'</h6>
                          <p class="text-muted card-text" style="text-transform:uppercase;font-size:12px;">'.$row->deskripsi.'</p>
                        </div>
                      </a>
                    </li>';
     }

    }
    echo $output;
  }

}
