<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Withdraw extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Withdraw_model","model");
  }


  function index()
  {
    $this->template->set_title("Withdraw");
    $this->template->back(site_url("frontend/home"));
    $this->template->view("content/withdraw/index");
  }

  function fetch(){
    $output = '';
    $data = $this->model->fetch_data($this->input->post('limit'), $this->input->post('start'));
    if($data->num_rows() > 0)
    {
     foreach($data->result() as $row)
     {
       if ($row->status=="0") {
         $status = '<h6 class="text-muted card-text" style="font-size:12px"><span class="text-warning">Menunggu Verifikasi</span></h6>';
       }elseif ($row->status=="1") {
         $status = '<h6 class="text-muted card-text" style="font-size:14px"><i class="fa fa-user"></i> Biaya Admin : Rp.'.format_rupiah($row->biaya_admin).'</h6>
                    <h6 class="text-muted card-text" style="font-size:14px"><i class="fa fa-circle"></i> Total : Rp.'.format_rupiah($row->amount).'</h6>
                    <h6 class="text-muted card-text" style="font-size:12px"><span class="text-success">DANA TELAH DIKIRIM KE REK '.$row->gateway.' - '.$row->no_rek.'</span></h6>';
       }elseif ($row->status=="9") {
         $status = '<h6 class="text-muted card-text" style="font-size:12px"><span class="text-danger">DIBATALKAN OLEH ADMIN</span></h6>';
       }
      $output .= '<li class="list-withdraw">
                      <a>
                        <div class="">
                          <h6 class="text-muted" style="font-size:14px!important;">KD.Transaksi #'.$row->kode_tr.'</h6>
                          <h6 class="text-muted card-text"><i class="fa fa-calendar"></i> Waktu : '.date("d/m/Y H:i",strtotime($row->date)).'</h6>
                          <h6 class="text-muted" style="font-size:14px!important;"><i class="ti-wallet"></i> Withdraw Request : Rp.'.format_rupiah($row->amount_request).'</h6>
                           '.$status.'
                        </div>
                      </a>
                    </li>';
     }

    }

    echo $output;
  }


// function detail($id="")
// {
//   $qry =  $this->model->get_where_detail(dec_uri($id));
//
//   if ($qry->num_rows() > 0) {
//     $this->template->set_title("Detail Deposit");
//     $this->template->back(site_url("frontend/deposit"));
//     $data['row'] = $qry->row();
//     $this->template->view("content/deposit/detail",$data);
//   }
// }


function add()
{
  // $this->template->set_title("Tambah Withdraw baru");
  // $this->template->back(site_url("frontend/withdraw"));
  $this->template->view("content/withdraw/form",[],false);
}


function action()
{
  if (setting("WITHDRAW","status")!="0") {

  if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
          $this->form_validation->set_rules("amount","&nbsp;*","trim|xss_clean|required|callback__cek_withdraw");
          $this->form_validation->set_rules("password","&nbsp;*","trim|xss_clean|required|callback__cek_password");
          $this->form_validation->set_error_delimiters('<span class="error ml-1 text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {

            $amount =replace_rupiah($this->input->post("amount"));
            $kode_tr = generate_kodeTR("WD");

            $data_wd = [
                        'id_anggota' => sess("id_anggota"),
                        'kode_tr' => $kode_tr,
                        'amount' => $amount,
                        'amount_request' => $amount,
                        'date' => new_date(),
                        'status' => "0"
                    ];
            $this->db->insert('tb_withdrawal', $data_wd);

            $report_act = [
                        'id_user' => sess("id_anggota"),
                        'user' => "anggota",
                        'keterangan' => "Permintaan withdraw [" . $kode_tr . "] senilai Rp. " . format_rupiah($amount),
                        'date' => new_date()
                      ];
            $this->db->insert('tb_report_activity', $report_act);

            $json['alert'] = "Withdraw successfully";
            $json['success'] =  true;
            $json['url'] =  site_url("frontend/withdraw");
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


function _cek_withdraw($str)
{
  if (replace_rupiah($str) <= total_balance()) {
    if (replace_rupiah($str) < setting("WD_MIN")) {
        if (setting("WD_MIN")!=0) {
          $this->form_validation->set_message('_cek_withdraw', 'Minimal Rp.'.format_rupiah(setting("WD_MIN")));
          return false;
        }else {
          return true;
        }
      }elseif (replace_rupiah($str) > setting("WD_MAX")) {
        if (setting("WD_MAX")!=0) {
          $this->form_validation->set_message('_cek_withdraw', 'Maksimal Rp.'.format_rupiah(setting("WD_MAX")));
          return false;
        }else {
          return true;
        }
      }else {
        return true;
      }
  }else {
    $this->form_validation->set_message('_cek_withdraw', 'Saldo Tidak Mencukupi');
    return false;
  }
}


}
