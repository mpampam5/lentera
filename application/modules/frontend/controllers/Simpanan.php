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
          $desc = "Membayar simpanan wajib Untuk Bulan ".cek_waktu_simpanan_wajib($row->kode_tr);
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
                          <p class="text-muted card-text" style="text-transform:uppercase;font-size:11px;">'.$desc.'</p>
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

            // $randomNum = substr(str_shuffle("1234567"), 0, 3);
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


function form_simpanan_wajib()
{
  $this->template->set_title("");
  $this->template->back("");
  $this->template->view("content/simpanan/form_simpanan_wajib",[],false);
}


function action_simpanan_wajib()
{
  if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
          $this->form_validation->set_rules("amount","&nbsp;*","trim|xss_clean|required|callback__cek_saldo_wajib[".$this->input->post("bulan", true)."]");
          $this->form_validation->set_rules("bulan","&nbsp;*","trim|xss_clean|required|numeric");
          $this->form_validation->set_rules("password","&nbsp;*","trim|xss_clean|required|callback__cek_password");
          $this->form_validation->set_error_delimiters('<span class="error ml-1 text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {

            $randomNum = substr(str_shuffle("1234567"), 0, 3);
            $amount = replace_rupiah($this->input->post("amount"));
            $bulan = $this->input->post("bulan", true);
            $biaya = $bulan * $amount;

            if (simpanan_wajib() == "") {
              $join_date = profile('join_date');
              $tgl = date("Y-m", strtotime($join_date)) . "-01";

              for ($i=0; $i < $bulan; $i++) {
                $bulan_tahun = date("Y-m-d", strtotime("+" . $i . " month", strtotime($tgl)));
                $balance = total_balance();
                $kode_tr = generate_kodeTR("SW");
                $data1 = array(
                    'kode_tr' => $kode_tr,
                    'id_anggota' => sess("id_anggota"),
                    'bulan_tahun' => $bulan_tahun,
                    'amount' => setting('SIMPANAN_WAJIB'),
                    'date' => new_date(),
                    'is_in_saldo' => '0'
                );
                $this->db->insert('tb_simpanan_wajib', $data1);
                $id_simpanan_1 = $this->db->insert_id();

                // report transaksi
                $report_tr1 = array(
                    'id_anggota' => sess("id_anggota"),
                    'id' => $id_simpanan_1,
                    'kode_tr' => $kode_tr,
                    'debit' => setting('SIMPANAN_WAJIB'),
                    'credit' => 0,
                    'saldo' => $balance - setting('SIMPANAN_WAJIB'),
                    'deskripsi' => "Membayar simpanan wajib",
                    'tipe' => "simpanan_wajib",
                    'date' => new_date()
                );
                $this->db->insert('tb_report', $report_tr1);
              } //end for

            }else {
              // ambil tgl mendaftar
              $id_anggota = sess("id_anggota");
              $query = $this->db->query("SELECT max(bulan_tahun) AS bulan_tahun
                                          FROM tb_simpanan_wajib
                                          WHERE id_anggota = $id_anggota");
              $result = $query->row_array();
              $last_date = $result['bulan_tahun'];
              $dateTime = strtotime($last_date);


              for ($i=1; $i <= $bulan; $i++) {
                $balance = total_balance();
                $kode_tr = generate_kodeTR("SW");
                $bulan_tahun = date("Y-m-d", strtotime("+" . $i . " month", $dateTime));

                $data1 = array(
                    'kode_tr' => $kode_tr,
                    'id_anggota' => $id_anggota,
                    'bulan_tahun' => $bulan_tahun,
                    'amount' => setting('SIMPANAN_WAJIB'),
                    'date' => new_date(),
                    'is_in_saldo' => '0'
                  );
                  $this->db->insert('tb_simpanan_wajib', $data1);
                  $id_simpanan_2 = $this->db->insert_id();

                  $report_tr1 = array(
                              'id_anggota' => $id_anggota,
                              'id' => $id_simpanan_2,
                              'kode_tr' => $kode_tr,
                              'debit' => setting('SIMPANAN_WAJIB'),
                              'credit' => 0,
                              'saldo' => $balance - setting('SIMPANAN_WAJIB'),
                              'deskripsi' => "Membayar simpanan wajib",
                              'tipe' => "simpanan_wajib",
                              'date' => new_date()
                          );
                $this->db->insert('tb_report', $report_tr1);
              }

            }

            // report activity
            $report_act = array(
                'id_user' => sess("id_anggota"),
                'user' => "anggota",
                'keterangan' => "Membayar simpanan wajib " . $bulan . " bulan senilai Rp " . format_rupiah($biaya),
                'date' => new_date()
            );
            $this->db->insert('tb_report_activity', $report_act);
            $json['saldo'] = "Rp. ".format_rupiah(simpanan_wajib());
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


function form_simpanan_sukarela()
{
  $this->template->set_title("");
  $this->template->back("");
  $this->template->view("content/simpanan/form_simpanan_sukarela",[],false);
}

function action_simpanan_sukarela()
{
  if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
          $this->form_validation->set_rules("amount","&nbsp;*","trim|xss_clean|required|callback__cek_saldo_sukarela");
          $this->form_validation->set_rules("password","&nbsp;*","trim|xss_clean|required|callback__cek_password");
          $this->form_validation->set_error_delimiters('<span class="error ml-1 text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {

            // $randomNum = substr(str_shuffle("1234567"), 0, 3);
            $amount =replace_rupiah($this->input->post("amount"));
            $kode_tr = generate_kodeTR("SS");
            $balance = total_balance();
            $id_anggota =sess("id_anggota");
            $data1 = array(
                        'kode_tr' => $kode_tr,
                        'id_anggota' => $id_anggota ,
                        'amount' => $amount,
                        'date' => new_date(),
                        'status' => "1",
                        'is_in_saldo' => '0'
                    );
          $this->db->insert('tb_simpanan_sukarela', $data1);
          $id_simpanan = $this->db->insert_id();

          $report_tr1 = array(
                        'id_anggota' => $id_anggota,
                        'id' => $id_simpanan,
                        'kode_tr' => $kode_tr,
                        'debit' => $amount,
                        'credit' => 0,
                        'saldo' => $balance - $amount,
                        'deskripsi' => "Membayar simpanan sukarela",
                        'tipe' => "simpanan_sukarela",
                        'date' => new_date()
                    );
          $this->db->insert('tb_report', $report_tr1);


          // cek apabila ada parent, jika ada maka diberi komisi sponsor
          $query = $this->db->query(' SELECT id_parent, no_anggota
                      FROM tb_anggota
                      WHERE id_anggota = "' . $id_anggota . '" ');
          $result = $query->row_array();
          $id_parent = $result['id_parent'];
          if ($id_parent != "0") {
              $no_anggota = $result['no_anggota'];
              $komisi_sponsor = $biaya * ($persen_komisi_awal / 100);
              $kode_tr_ks_parent = generate_kodeTR("KS");
              $balance2 = total_balance($id_parent);

              $data2 = array(
                  'kode_tr' => $kode_tr_ks_parent,
                  'id_simp_sukarela' => $id_simpanan_1,
                  'id_parent' => $id_parent,
                  'id_child' => $id_anggota,
                  'amount' => $komisi_sponsor,
                  'date' => $date
              );
              $this->db->insert('tb_komisi_sponsor', $data2);
              $id_komisi_sponsor = $this->db->insert_id();
              $report_tr2 = array(
                  'id_anggota' => $id_parent,
                  'id' => $id_komisi_sponsor,
                  'kode_tr' => $kode_tr_ks_parent,
                  'debit' => 0,
                  'credit' => $komisi_sponsor,
                  'saldo' => $balance2 + $komisi_sponsor,
                  'deskripsi' => "Komisi promosi dari simpanan [" . $kode_tr . "] anggota [" . $no_anggota . "]",
                  'tipe' => "komisi_sponsor",
                  'date' => $date
              );
              $this->db->insert('tb_report', $report_tr2);
          }

          $report_act = array(
                        'id_user' => sess("id_anggota"),
                        'user' => "anggota",
                        'keterangan' => "Membayar simpanan sukarela senilai Rp".format_rupiah($amount),
                        'date' => new_date()
                    );
          $this->db->insert('tb_report_activity', $report_act);


            $json['saldo'] = "Rp. ".format_rupiah(simpanan_sukarela());
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


function _cek_saldo_wajib($str,$bulan)
{
  $total = $bulan * replace_rupiah($str);
  if (replace_rupiah($str)!=setting("SIMPANAN_wajib")) {
    $this->form_validation->set_message('_cek_saldo_wajib', 'Simpanan Pokok Rp.'.format_rupiah(setting("SIMPANAN_POKOK")));
    return false;
  }else {
    if ($total <= total_balance()) {
      return true;
    }else {
      $this->form_validation->set_message('_cek_saldo_wajib', 'Saldo Tidak Mencukupi');
      return false;
    }
  }
}


function _cek_saldo_sukarela($str)
{
  if (replace_rupiah($str) < 50000) {
    $this->form_validation->set_message('_cek_saldo_sukarela', 'Simpanan Sukarela Minimal Rp. 50.000');
    return false;
  }else {
    if (replace_rupiah($str) <= total_balance()) {
      if (replace_rupiah($str) % 10000 == 0) {
        return true;
      }else {
        $this->form_validation->set_message('_cek_saldo_sukarela', 'Harus Kelipatan 10.000');
        return false;
      }
    }else {
      $this->form_validation->set_message('_cek_saldo_sukarela', 'Saldo Tidak Mencukupi');
      return false;
    }
  }
}


}
