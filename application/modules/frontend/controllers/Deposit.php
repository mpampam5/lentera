<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Deposit extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Deposit_model","model");
  }


  function index()
  {
    $this->template->set_title("Deposit");
    $this->template->back(site_url("frontend/home"));
    $this->template->view("content/deposit/index");
  }

  function fetch(){
    $output = '';
    $data = $this->model->fetch_data($this->input->post('limit'), $this->input->post('start'));
    if($data->num_rows() > 0)
    {
     foreach($data->result() as $row)
     {
       if ($row->status_deposit=="0") {
         $status = "<span class='text-warning'>Menunggu Verifikasi</span>";
       }elseif ($row->status_deposit=="1") {
         $status = "<span class='text-success'>Terverifikasi</span>";
       }elseif ($row->status_deposit=="2") {
         $status = "<span class='text-danger'>Pending</span>";
       }
      $output .= '<li class="list-deposit">
                      <a href="'.site_url("frontend/deposit/detail/".enc_uri($row->id_deposit)).'">
                        <div class="">
                          <h6 class="text-muted" style="font-size:14px!important;">KD.Transaksi #'.$row->kode_tr.'</h6>
                          <h6 class="text-muted" style="font-size:14px!important;"><i class="ti-wallet"></i> Jumlah Deposit : Rp.'.format_rupiah($row->amount).'</h6>
                          <p class="text-muted card-text"><i class="fa fa-calendar"></i> Tanggal Deposit : '.date("d/m/Y H:i",strtotime($row->date)).'</p>
                          <p class="text-muted card-text"><i class="ti-bag"></i> Gateway : BANK '.$row->gateway.'</p>
                          <p class="text-muted card-text"><i class="ti-filter"></i> Status : '.$status.'</p>
                        </div>
                      </a>
                    </li>';
     }

    }else {
      $output.='<p class="text-center mt-5" style="font-style:italic">Data Belum Ada</p>';
    }
    echo $output;
  }


function detail($id="")
{
  $qry =  $this->model->get_where_detail(dec_uri($id));

  if ($qry->num_rows() > 0) {
    $this->template->set_title("Detail Deposit");
    $this->template->back(site_url("frontend/deposit"));
    $data['row'] = $qry->row();
    $this->template->view("content/deposit/detail",$data);
  }
}


function add()
{
  $this->template->set_title("Tambah Deposit baru");
  $this->template->back(site_url("frontend/deposit"));
  $this->template->view("content/deposit/form");
}


function action()
{
  if (setting("deposit","status")!="0") {

  if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
          $this->form_validation->set_rules("amount","&nbsp;*","trim|xss_clean|required|callback__cek_deposit");
          $this->form_validation->set_rules("gateway","*&nbsp;","trim|xss_clean|required|numeric");
          $this->form_validation->set_error_delimiters('<span class="error ml-1 text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {

            $randomNum = substr(str_shuffle("1234567"), 0, 3);
            $amount =replace_rupiah($this->input->post("amount"));
            $kode_tr = generate_kodeTR("DP");
            $data_depo = [
                    'id_anggota' => sess("id_anggota"),
                    'kode_tr' => $kode_tr,
                    'amount' => $amount,
                    'last_code' => rand(100, 999),
                    'id_gateway' => $this->input->post("gateway"),
                    'code' => substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6),
                    'date' => new_date(),
                    'status' => "0"
                ];

            $this->db->insert('tb_deposit', $data_depo);


            $report_act =[
                          'id_user' => sess("id_anggota"),
                          'user' => "anggota",
                          'keterangan' => "Permintaan deposit [" . $kode_tr . "] senilai " . setting("CURRENCY") . " " . format_rupiah($amount),
                          'date' => new_date()
                        ];
            $this->db->insert('tb_report_activity', $report_act);

            $json['alert'] = "Deposit successfully";
            $json['success'] =  true;
            $json['url'] =  site_url("frontend/deposit");
          }else {
            foreach ($_POST as $key => $value)
              {
                $json['alert'][$key] = form_error($key);
              }
          }

          echo json_encode($json);
      }

    }
}


function _cek_deposit($str)
{
  if (replace_rupiah($str) < setting("depo_min")) {
      if (setting("depo_min")!=0) {
        $this->form_validation->set_message('_cek_deposit', 'Minimal Rp.'.format_rupiah(setting("depo_min")));
        return false;
      }else {
        return true;
      }
    }elseif (replace_rupiah($str) > setting("depo_max")) {
      if (setting("depo_max")!=0) {
        $this->form_validation->set_message('_cek_deposit', 'Maksimal Rp.'.format_rupiah(setting("depo_max")));
        return false;
      }else {
        return true;
      }
    }else {
      return true;
    }
}


}
