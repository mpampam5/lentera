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
         $status = '<h6 class="text-muted" style="font-size:12px!important;"><i class="fa fa-exclamation-circle"></i> <span class="text-warning"> MENUNGGU PERSETUJUAN</span></h6>';
       }elseif ($row->status == "1") {
         $status = '<h6 class="text-muted" style="font-size:12px!important;"><i class="fa fa-exclamation-circle"></i> <span class="text-success"> DI SETUJUI</span></h6>';
       }elseif ($row->status == "9") {
         $status = '<h6 class="text-muted" style="font-size:12px!important;"><i class="fa fa-exclamation-circle"></i> <span class="text-danger"> DI TOLAK</span></h6>';
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



function bayar_pinjaman_saya()
{
  $this->template->set_title("Bayar Pinjaman");
  $this->template->back(site_url("frontend/pinjaman"));
  $this->template->view("content/pinjaman/pembayaran_pinjaman");
}

function fetch_bayar_pinjaman(){
  $output = '';
  $data = $this->model->fetch_data_bayar_pinjaman($this->input->post('limit'), $this->input->post('start'));
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {

     $output .= '<li class="list-deposit">
                    <a>
                      <div class="">
                        <h6 class="text-muted" style="font-size:14px!important;">KD.PEMBAYARAN #'.$row->kode_bayar_pinjaman.'</h6>
                        <p class="text-muted card-text"><i class="fa fa-calendar"></i> Jatuh Tempo : '.date('d/m/Y H:i',strtotime($row->date)).'</p>
                        <h6 class="text-muted" style="font-size:12px!important;"><i class="ti-wallet"></i> Jumlah Pembayaran: Rp. '.format_rupiah($row->jumlah_pembayaran).'</h6>
                        <h6 class="text-muted" style="font-size:12px!important;"><i class="fa fa-clone"></i> Angsuran Ke - '.$row->angsuran_ke.' </h6>
                        <a id="bayar-pinjaman" href="'.site_url("frontend/pinjaman/form_pembayaran_pinjaman/".enc_uri($row->id_bayar)).'" style="color:#fff;" class="mt-2 btn btn-sm btn-primary">BAYAR</a>
                      </div>
                    </a>
                  </li>';
   }

  }
  echo $output;
}


function form_pembayaran_pinjaman($id="")
{
  if ($id!="") {
    $this->template->set_title("");
    $this->template->back("");
    $data['row'] = $this->model->pembayaran_get_where($id);
    $this->template->view("content/pinjaman/form_pembayaran_pinjaman",$data,false);
  }
}


function bayar_pinjaman_action($id="")
{
  if ($id!="") {
    if ($this->input->is_ajax_request()) {
            $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
            $this->form_validation->set_rules('jumlah_angsuran', '&nbsp;*', 'trim|required|xss_clean|callback__angsuran_check['.$id.']');
            $this->form_validation->set_rules('kode_pinjaman', '&nbsp;*', 'trim|required|xss_clean');
            $this->form_validation->set_rules('kode_pembayaran', '&nbsp;*', 'trim|required|xss_clean');
            $this->form_validation->set_rules('angsuran_ke', '&nbsp;*', 'trim|required|xss_clean');
            $this->form_validation->set_error_delimiters('<p class="text-center error ml-1 text-danger" style="font-size:12px;text-transform:uppercase">','</p>');
            if ($this->form_validation->run()) {


              $data1 = ['status' => "1",
                        'tgl_bayar' => new_date()
                        ];

              $this->db->update('tb_pinjaman_bayar',
                                $data1,
                                array("id_bayar" =>dec_uri($id))
                              );

            // report transaksi
            $report_tr1 = array(
                'id_anggota' => sess("id_anggota"),
                'id' => dec_uri($id),
                'kode_tr' => $this->input->post("kode_pembayaran"),
                'debit' => $this->input->post("jumlah_angsuran"),
                'credit' => 0,
                'saldo' => total_balance() - $this->input->post("jumlah_angsuran"),
                'deskripsi' => "Membayar tagihan ke-" . $this->input->post("angsuran_ke") . " dari pinjaman [" . $this->input->post("kode_pinjaman") . "]",
                'tipe' => "bayar_pinjaman",
                'date' => new_date()
            );
            $this->db->insert('tb_report', $report_tr1);

            // report activity
              $report_act = array(
                  'id_user' => sess("id_anggota"),
                  'user' => "anggota",
                  'keterangan' => "Membayar tagihan ke-" . $this->input->post("angsuran_ke") . " dari pinjaman [" . $this->input->post("kode_pinjaman") . "]",
                  'date' => new_date()
              );
              $this->db->insert('tb_report_activity', $report_act);



              $json['alert'] = "pembayaran Angsuran Berhasil";
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
}


function _angsuran_check($str, $id)
{
  $id_bayar =  dec_uri($id);
  $qry = $this->db->get_where("tb_pinjaman_bayar",["id_bayar"=>$id_bayar]);
  if ($qry->num_rows() > 0) {
      $row = $qry->row();
      if ($str = $row->amount) {
          if ($str <= total_balance()) {

            //cek angsuran
            if ($row->angsuran_ke == "1") {
                $sudah_bayar_sebelumnya = TRUE;
            }else {
              $angsuran_sebelumnya = (int) $row->angsuran_ke - 1;
              $cek2 = $this->db->get_where("tb_pinjaman_bayar", ["id_pinjaman"=>$row->id_pinjaman,"angsuran_ke"=>$angsuran_sebelumnya]);
              $result2 = $cek2->row();
              $status_angsuran_sebelumnya = $result2->status;
              if ($status_angsuran_sebelumnya == "1") {
                  $sudah_bayar_sebelumnya = TRUE;
              } else {
                  $sudah_bayar_sebelumnya = FALSE;
              }
            }


            if ($sudah_bayar_sebelumnya) {
              if ($row->status=="0") {
                return true;
              }else {
                $this->form_validation->set_message('_angsuran_check', 'TAGIHAN TELAH DI BAYAR');
                return FALSE;
              }
            }else {
              $this->form_validation->set_message('_angsuran_check', 'Harap membayar tagihan sebelumnya.');
              return FALSE;
            }


          }else {
            $this->form_validation->set_message('_angsuran_check', '* SALDO TIDAK MENCUKUPI,SALDO ANDA RP. '.format_rupiah(total_balance()));
            return FALSE;
          }
      }else {
        $this->form_validation->set_message('_angsuran_check', '* DATA TIDAK VALID');
        return FALSE;
      }
  }else {
    $this->form_validation->set_message('_angsuran_check', '* DATA TIDAK VALID');
    return FALSE;
  }
}


function laporan()
{
  $this->template->set_title("Laporan Pembayaran");
  $this->template->back(site_url("frontend/pinjaman"));
  $this->template->view("content/pinjaman/laporan");
}

function fetch_laporan(){
  $output = '';
  $data = $this->model->fetch_data_laporan($this->input->post('limit'), $this->input->post('start'));
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {

     $output .= '<li class="list-deposit">
                    <a id="detail-pembayaran" href="'.site_url("frontend/pinjaman/detail_laporan/".enc_uri($row->id_bayar)).'">
                      <div class="">
                        <h6 class="text-muted" style="font-size:14px!important;">KD.PEMBAYARAN #'.$row->kode_bayar_pinjaman.'</h6>
                        <h6 class="text-muted" style="font-size:14px!important;">KD.PINJAMANAN #'.$row->kode_pinjaman.'</h6>
                        <p class="text-muted card-text"><i class="fa fa-calendar"></i> Tanggal Pembayaran : '.date('d/m/Y H:i',strtotime($row->tgl_bayar)).'</p>
                        <h6 class="text-muted" style="font-size:12px!important;"><i class="ti-wallet"></i> Jumlah Pembayaran: Rp. '.format_rupiah($row->jumlah_pembayaran).'</h6>
                        <h6 class="text-muted" style="font-size:12px!important;"><i class="fa fa-clone"></i> Angsuran Ke - '.$row->angsuran_ke.' </h6>
                      </div>
                    </a>
                  </li>';
   }

  }
  echo $output;
}


function detail_laporan($id="")
{
  if ($id!="") {
    $this->template->set_title("");
    $this->template->back("");
    $data['row'] = $this->model->pembayaran_get_where_detail($id);
    $this->template->view("content/pinjaman/detail_pembayaran_pinjaman",$data,false);
  }
}


}
