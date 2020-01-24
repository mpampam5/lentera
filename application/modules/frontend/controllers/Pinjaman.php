<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Pinjaman extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Pinjaman_model","model");
  }

  function index()
  {
    $this->template->set_title("Pinjaman");
    $this->template->back(site_url("frontend/home"));
    $this->template->view("content/pinjaman/index");
  }

  function pinjaman_saya()
  {
    $this->template->set_title("Pinjaman Saya");
    $this->template->back(site_url("frontend/pinjaman"));
    $this->template->view("content/pinjaman/pinjaman_saya");
  }

  function fetch_pinjaman(){
    $output = '';
    $data = $this->model->fetch_data_pinjaman($this->input->post('limit'), $this->input->post('start'));
    if($data->num_rows() > 0)
    {
     foreach($data->result() as $row)
     {

       if ($row->status == "0") {
         $status = '<h6 class="text-muted" style="font-size:12px!important;"><i class="ti-filter"></i> <span class="text-warning"> MENUNGGU PERSETUJUAN</span></h6>';
       }elseif ($row->status == "1") {
         $status = '<h6 class="text-muted" style="font-size:12px!important;"><i class="ti-filter"></i> <span class="text-success"> DI SETUJUI</span></h6>';
       }elseif ($row->status == "9") {
         $status = '<h6 class="text-muted" style="font-size:12px!important;"><i class="ti-filter"></i> <span class="text-danger"> DI TOLAK</span></h6>';
       }

       $output .= '<li class="list-deposit">
                      <a>
                        <div class="">
                          <h6 class="text-muted" style="font-size:14px!important;">NO.REF #'.$row->kode_tr.'</h6>
                          <p class="text-muted card-text"><i class="fa fa-calendar"></i> Tanggal : '.date("d/m/Y H:i",strtotime($row->date)).'</p>
                          <h6 class="text-muted" style="font-size:12px!important;"><i class="ti-wallet"></i> Jumlah : Rp.'.format_rupiah($row->amount).'</h6>
                          <h6 class="text-muted" style="font-size:12px!important;"><i class="fa fa-circle"></i> Periode : '.$row->periode.' Bulan</h6>
                          <h6 class="text-muted" style="font-size:12px!important;"><i class="fa fa-window-maximize"></i> Angsuran : '.$row->angsuran.' Kali</h6>
                          '.$status.'
                          <p class="text-muted card-text" style="text-transform:uppercase;font-size:11px;">'.$row->keterangan.'</p>
                        </div>
                      </a>
                    </li>';
     }

    }

    echo $output;
  }

  function pengajuan_pinjaman()
  {
    $this->template->set_title("");
    $this->template->back("");
    $this->template->view("content/pinjaman/pengajuan_pinjaman",[],false);
  }

  function action_pengajuan_pinjaman()
  {
    if ($this->input->is_ajax_request()) {
            $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
            $this->form_validation->set_rules('nilai', '&nbsp;*', 'trim|required|xss_clean|callback__amount_check');
            $this->form_validation->set_rules('angsuran', '&nbsp;*', 'trim|numeric|required|xss_clean');
            $this->form_validation->set_rules('jangka', '&nbsp;*', 'trim|numeric|required|xss_clean');
            $this->form_validation->set_rules('keterangan', '&nbsp;*', 'trim|xss_clean');
            $this->form_validation->set_rules("password","&nbsp;*","trim|xss_clean|required|callback__cek_password");
            $this->form_validation->set_error_delimiters('<span class="error ml-1 text-danger" style="font-size:11px">','</span>');
            if ($this->form_validation->run()) {
              $id_jangka = $this->input->post('jangka',true);
              $query1 = $this->db->query(' SELECT jangka_waktu, bunga
                                            FROM pinjaman
                                            WHERE id_setting_pinjaman = "' . $id_jangka . '" AND status = "1"');
              $result1 = $query1->row_array();
              $periode = $result1['jangka_waktu'];
              $bunga = $result1['bunga'];
              $nilai = replace_rupiah($this->input->post('nilai'));
              $brp_kali_angsuran = $this->input->post('angsuran',true);
              $keterangan = $this->input->post('keterangan',true);
              $kode_tr = generate_kodeTR("PJ");
              $currency = setting('CURRENCY');
              $date = new_date();
                    //insert into table
                    $data1 = [
                        'id_anggota' => sess("id_anggota"),
                        'kode_tr' => $kode_tr,
                        'amount' => $nilai,
                        'bunga' => $bunga,
                        'periode' => $periode,
                        'angsuran' => $brp_kali_angsuran,
                        'keterangan' => $keterangan,
                        'date' => $date,
                        'status' => "0" // 1 berarti baru mengajukan permohonan
                    ];
                    $this->db->insert('tb_pinjaman', $data1);
                    // report activity
                    $report_act = array(
                        'id_user' => sess("id_anggota"),
                        'user' => "anggota",
                        'keterangan' => "Mengajukan permohonan pinjaman [" . $kode_tr . "]  senilai ".$currency." " . format_rupiah($nilai),
                        'date' => $date
                    );
                    $this->db->insert('tb_report_activity', $report_act);

              // $josn['saldo'] = "Rp. ".format_rupiah(pinjaman());
              $json['alert'] = "Pengajuan Pinjaman Berhasil, Silahkan cek pada menu Pinjaman Saya";
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


  function _amount_check($amount)
    {
      $tgl_join = profile('join_date');
      $tgl_tambah3bln =  strtotime("+3 month", strtotime($tgl_join));
      $tgl_hari_ini = strtotime(new_date());
      $kurang = $tgl_hari_ini - $tgl_tambah3bln;
      $selisih = floor($kurang / (24 * 60 * 60)); // convert to days

      if ($selisih > 0) {
        if (simpanan_pokok() > 0 && simpanan_wajib() > 0) {
          if ((replace_rupiah($amount) % 100000) == 0) {
              return TRUE;
          } else {
              $this->form_validation->set_message('_amount_check', '* harus kelipatan Rp 100.000');
              return FALSE;
          }
        }else {
          $this->form_validation->set_message('_amount_check', '* Harap untuk membayar Simpanan Wajib dan Simpanan Pokok terlebih dahulu.');
          return FALSE;
        }
      }else {
        $this->form_validation->set_message('_amount_check', '* Anda harus menjadi anggota selama minimal 3 bulan untuk dapat mengajukan pinjaman.');
        return FALSE;
      }


    }

}
