<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Simpanan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Simpanan_model","model");
  }


  function index()
  {
    $this->template->set_title("Simpanan");
    $this->template->back(site_url("frontend/home"));
    $this->template->view("content/simpanan/index");
  }

  function fetch(){
    $output = '';
    $data = $this->model->fetch_data($this->input->post('limit'), $this->input->post('start'));
    if($data->num_rows() > 0)
    {
     foreach($data->result() as $row)
     {
       $kode = substr($row->kode_tr, 0, 2);
                                if ($kode == "SW") {
                                    $desc = "Membayar simpanan wajib Bulan ".cek_waktu_simpanan_wajib($row->kode_tr);
                                } elseif ($kode == "SP") {
                                    $desc = "Membayar simpanan pokok";
                                } elseif ($kode == "SS") {
                                    $desc = "Membayar simpanan sukarela";
                                }
      $output .= '<li class="list-deposit">
                      <a>
                        <div class="">
                          <h6 class="text-muted" style="font-size:14px!important;">NO.REF #'.$row->kode_tr.'</h6>
                          <p class="text-muted card-text"><i class="fa fa-calendar"></i> Tanggal : '.date("d/m/Y H:i",strtotime($row->date)).'</p>
                          <h6 class="text-muted" style="font-size:12px!important;"><i class="ti-wallet"></i> Jumlah : Rp.'.format_rupiah($row->amount).'</h6>
                          <p class="text-muted card-text" style="text-transform:uppercase;font-size:12px;">'.$desc.'</p>
                        </div>
                      </a>
                    </li>';
     }

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

function form_simpanan_pokok()
{
  $this->template->set_title("");
  $this->template->back("");
  $this->template->view("content/simpanan/form_simpanan_pokok",[],false);
}



function action_simpanan_pokok()
{
  if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
          $this->form_validation->set_rules("amount","&nbsp;*","trim|xss_clean|required|callback__cek_saldo");
          $this->form_validation->set_rules("password","&nbsp;*","trim|xss_clean|required|callback__cek_password");
          $this->form_validation->set_error_delimiters('<span class="error ml-1 text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {

            $randomNum = substr(str_shuffle("1234567"), 0, 3);
            $amount =replace_rupiah($this->input->post("amount"));
            $kode_tr = generate_kodeTR("SP");
            $balance = total_balance();
            $data1 = array(
                        'kode_tr' => $kode_tr,
                        'id_anggota' => sess("id_anggota"),
                        'amount' => setting("SIMPANAN_POKOK"),
                        'date' => new_date(),
                        'is_in_saldo' => '0'
                    );
          $this->db->insert('tb_simpanan_pokok', $data1);
          $id_simpanan = $this->db->insert_id();

          $report_tr1 = array(
                        'id_anggota' => sess("id_anggota"),
                        'id' => $id_simpanan,
                        'kode_tr' => $kode_tr,
                        'debit' => setting("SIMPANAN_POKOK"),
                        'credit' => 0,
                        'saldo' => $balance - setting("SIMPANAN_POKOK"),
                        'deskripsi' => "Membayar simpanan pokok",
                        'tipe' => "simpanan_pokok",
                        'date' => new_date()
                    );
          $this->db->insert('tb_report', $report_tr1);


          $report_act = array(
                        'id_user' => sess("id_anggota"),
                        'user' => "anggota",
                        'keterangan' => "Membayar simpanan pokok [" . $kode_tr . "]  senilai Rp " . format_rupiah(setting("SIMPANAN_POKOK")),
                        'date' => new_date()
                    );
          $this->db->insert('tb_report_activity', $report_act);

            $json['alert'] = "Pembayaran Berhasil";
            $json['success'] =  true;

          }else {
            foreach ($_POST as $key => $value)
              {
                $json['alert'][$key] = form_error($key);
              }
          }

          echo json_encode($json);
      }


}


function _cek_saldo($str)
{
  if (replace_rupiah($str)!=setting("SIMPANAN_POKOK")) {
    $this->form_validation->set_message('_cek_saldo', 'Simpanan Pokok Rp.'.format_rupiah(setting("SIMPANAN_POKOK")));
    return false;
  }else {
    if (replace_rupiah($str) <= total_balance()) {
      return true;
    }else {
      $this->form_validation->set_message('_cek_saldo', 'Saldo Tidak Mencukupi');
      return false;
    }
  }

}


}
