<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Anggota extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Anggota_model","model");
  }


  function index()
  {
    $this->template->set_title("Anggota");
    $this->template->back(site_url("frontend/home"));
    $this->template->view("content/anggota/index");
  }

  function fetch(){
    $output = '';
    $data = $this->model->fetch_data($this->input->post('limit'), $this->input->post('start'));
    if($data->num_rows() > 0)
    {
     foreach($data->result() as $row)
     {
       if ($row->status=="1") {
        $url = site_url("frontend/anggota/detail/".enc_uri($row->id_anggota));
        $id = "detail-anggota";
       }else {
         $url = site_url("frontend/anggota/form_verifikasi/".enc_uri($row->id_anggota));
         $id="verifikasi-anggota";
       }
      $status = $row->status=="1" ? "<span class='text-success'>Anggota</span>":"<span class='text-danger'>Calon Anggota</span>";
      $output .= '<li class="list-anggota">
                    <a id="'.$id.'" href="'.$url.'">
                      <div class="d-flex flex-row align-items-center">
                        <i class="ti-user icon-lg"></i>
                        <div class="ml-3">
                          <h6 class="" style="font-size:13px!important;"><span class="text-primary">#'.$row->no_anggota.'</span> | '.strtoupper($row->nama).'</h6>
                            <p class="mt-1 text-muted card-text"><i class="fa fa-calendar"></i> Tanggal Bergabung : '.date("d/m/Y H:i",strtotime($row->join_date)).'</p>
                            <p class="mt-1 text-muted card-text"><i class="fa fa-info-circle"></i> Status : '.$status.'</p>
                        </div>
                      </div>
                    </a>
                  </li>';
     }

   }
    echo $output;
  }


function detail($id="")
{
  $qry =  $this->db->get_where("tb_anggota",["id_anggota"=>dec_uri($id)]);

  if ($qry->num_rows() > 0) {
    // $this->template->set_title("Detail Anggota");
    // $this->template->back(site_url("frontend/anggota"));
    $data['row'] = $qry->row();
    $this->template->view("content/anggota/detail",$data,false);
  }
}



function add()
{
  // $this->template->set_title("Tambah Anggota baru");
  // $this->template->back(site_url("frontend/anggota"));
  $this->template->view("content/anggota/form",[],false);
}




function add_action()
{
  if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
          $this->form_validation->set_rules('amount', '&nbsp;*', 'trim|required|xss_clean|callback__amount_check');
          $this->form_validation->set_rules('username', '&nbsp;*', 'trim|alpha_numeric|required|xss_clean|callback__username_check');
          $this->form_validation->set_rules('nama', '&nbsp;*', 'trim|required|xss_clean');
          $this->form_validation->set_rules('nik', '&nbsp;*', 'trim|xss_clean|numeric|required|callback__nik_check');
          $this->form_validation->set_rules("tempat_lahir","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("tgl_lahir","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("no_tlp","&nbsp;*","trim|xss_clean|required|numeric");
          $this->form_validation->set_rules("email","&nbsp;*","trim|xss_clean|required|valid_email|callback__email_check");
          $this->form_validation->set_rules("alamat","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("kelurahan","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("kecamatan","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("kabupaten","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("provinsi","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("kode_pos","&nbsp;*","trim|xss_clean|required|numeric");
          $this->form_validation->set_rules("pekerjaan","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("pendidikan","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_error_delimiters('<span class="error ml-1 text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {
            $biaya_admin = setting('BIAYA_PENDAFTARAN');
            $balance_anggota = total_balance();

            $id_parent = sess('id_anggota');
            $currency = setting('CURRENCY');
            $kode_tr_BP = generate_kodeTR("BP");
            $kode_tr_BS = generate_kodeTR("BS");
            $NO_ANGGOTA = generate_NO_ANGGOTA();
            $date = new_date();
            // Update
            $random = substr(md5(mt_rand()), 0, 5);

            $passHASH = password_hash($random, PASSWORD_BCRYPT);
            $data = [
              'pass_tr' => $passHASH,
              'password' => $passHASH,
              'id_parent' => $id_parent,
              'no_anggota' => $NO_ANGGOTA,
              'username'  => $this->input->post("username",true),
              'nama'  => $this->input->post("nama",true),
              'no_ktp'  => $this->input->post("nik",true),
              'email'  => $this->input->post("email",true),
              'tempat_lahir'  => $this->input->post("tempat_lahir",true),
              'tanggal_lahir'  => $this->input->post("tgl_lahir",true),
              'no_hp'  => $this->input->post("no_tlp",true),
              'alamat'  => $this->input->post("alamat",true),
              'kelurahan'  => $this->input->post("kelurahan",true),
              'kecamatan'  => $this->input->post("kecamatan",true),
              'kota'  => $this->input->post("kabupaten",true),
              'provinsi'  => $this->input->post("provinsi",true),
              'pendidikan'  => $this->input->post("pendidikan",true),
              'pekerjaan'  => $this->input->post("pekerjaan",true),
              'status'  => "1",
              'is_active'  => "1",
              'join_date'  => $date
            ];
            $this->db->insert('tb_anggota', $data);
            $id_child = $this->db->insert_id();

            // biaya pendaftaran
            $data1 = array(
                'id_anggota' => $id_parent,
                'kode_tr' => $kode_tr_BP,
                'id_child' => $id_child,
                'amount' => $biaya_admin,
                'date' => $date
            );
            $this->db->insert('tb_biaya_pendaftaran', $data1);
            $id_daftar = $this->db->insert_id();

            $report_tr1 = array(
                'id_anggota' => $id_parent,
                'id' => $id_daftar,
                'kode_tr' => $kode_tr_BP,
                'debit' => $biaya_admin,
                'credit' => 0,
                'saldo' => $balance_anggota - $biaya_admin,
                'deskripsi' => "Membayar biaya pendaftaran [" . $NO_ANGGOTA . "]",
                'tipe' => "biaya_pendaftaran",
                'date' => $date
            );
            $this->db->insert('tb_report', $report_tr1);



                $balance_parent = total_balance();

                $nama = profile_member($id_child,"nama");
                $bs = $biaya_admin / 2;
                $data2 = array(
                    'kode_tr' => $kode_tr_BS,
                    'id_anggota' => $id_parent,
                    'id_child' => $id_child,
                    'amount' => $bs,
                    'date' => $date
                );
                $this->db->insert('tb_bonus_sponsor', $data2);
                $id_roy = $this->db->insert_id();
                // report transaksi bonus_sponsor
                $report_tr2 = array(
                    'id_anggota' => $id_parent,
                    'id' => $id_roy,
                    'kode_tr' => $kode_tr_BS,
                    'debit' => 0,
                    'credit' => $bs,
                    'deskripsi' => "Mendapatkan royalti referral dari anggota [" . $nama . "]",
                    'saldo' => $balance_parent + $bs,
                    'tipe' => "royalti_pendaftaran",
                    'date' => $date
                );
                $this->db->insert('tb_report', $report_tr2);


                $report_act = array(
                'id_user' => $id_parent,
                'user' => "anggota",
                'keterangan' => "Mendaftarkan anggota [" . $NO_ANGGOTA . "]",
                'date' => $date
            );
            $this->db->insert('tb_report_activity', $report_act);

            $data_email = [
              'pass_tr' => $random,
              'password' => $random,
              'username'  => $this->input->post("username",true),
              'nama'  => $this->input->post("nama",true),
              'email'  => $this->input->post("email",true),
            ];
            $this->_send_email($data_email);


            $json['alert'] = "Anggota Berhasil Di Tambahkan";
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


function form_verifikasi($id)
{
  $qry =  $this->db->get_where("tb_anggota",["id_anggota"=>dec_uri($id)]);
  if ($qry->num_rows() > 0) {
    // $this->template->set_title("Detail Anggota");
    // $this->template->back(site_url("frontend/anggota"));
    $data['row'] = $qry->row();
    $this->template->view("content/anggota/form_verifikasi",$data,false);
  }
}


function verifikasi_action($id)
{
  if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array(), 'url'=>array());
          $this->form_validation->set_rules('amount', '&nbsp;*', 'trim|required|xss_clean|callback__amount_check');
          $this->form_validation->set_rules('username', '&nbsp;*', "trim|alpha_numeric|required|xss_clean|callback__username_update[".$this->input->post("username_lama",true)."]");
          $this->form_validation->set_rules('nama', '&nbsp;*', 'trim|required|xss_clean');
          $this->form_validation->set_rules('nik', '&nbsp;*', 'trim|xss_clean|numeric|required|callback__nik_check');
          $this->form_validation->set_rules("tempat_lahir","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("tgl_lahir","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("no_tlp","&nbsp;*","trim|xss_clean|required|numeric");
          $this->form_validation->set_rules("email","&nbsp;*","trim|xss_clean|required|valid_email|callback__email_update[".$this->input->post("email_lama",true)."]");
          $this->form_validation->set_rules("alamat","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("kelurahan","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("kecamatan","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("kabupaten","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("provinsi","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("kode_pos","&nbsp;*","trim|xss_clean|required|numeric");
          $this->form_validation->set_rules("pekerjaan","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_rules("pendidikan","&nbsp;*","trim|xss_clean|required");
          $this->form_validation->set_error_delimiters('<span class="error ml-1 text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {
            $biaya_admin = setting('BIAYA_PENDAFTARAN');
            $balance_anggota = total_balance();

            $id_parent = sess('id_anggota');
            $currency = setting('CURRENCY');
            $kode_tr_BP = generate_kodeTR("BP");
            $kode_tr_BS = generate_kodeTR("BS");
            $NO_ANGGOTA = generate_NO_ANGGOTA();
            $date = new_date();
            // Update
            $random = substr(md5(mt_rand()), 0, 5);

            $passHASH = password_hash($random, PASSWORD_BCRYPT);
            $data = [
              'pass_tr' => $passHASH,
              'password' => $passHASH,
              'id_parent' => $id_parent,
              'no_anggota' => $NO_ANGGOTA,
              'username'  => $this->input->post("username",true),
              'nama'  => $this->input->post("nama",true),
              'no_ktp'  => $this->input->post("nik",true),
              'email'  => $this->input->post("email",true),
              'tempat_lahir'  => $this->input->post("tempat_lahir",true),
              'tanggal_lahir'  => $this->input->post("tgl_lahir",true),
              'no_hp'  => $this->input->post("no_tlp",true),
              'alamat'  => $this->input->post("alamat",true),
              'kelurahan'  => $this->input->post("kelurahan",true),
              'kecamatan'  => $this->input->post("kecamatan",true),
              'kota'  => $this->input->post("kabupaten",true),
              'provinsi'  => $this->input->post("provinsi",true),
              'pendidikan'  => $this->input->post("pendidikan",true),
              'pekerjaan'  => $this->input->post("pekerjaan",true),
              'status'  => "1",
              'is_active'  => "1",
              'join_date'  => $date
            ];
            $this->db->update('tb_anggota', $data, array("id_anggota"=>dec_uri($id)));
            $id_child = dec_uri($id);

            // biaya pendaftaran
            $data1 = array(
                'id_anggota' => $id_parent,
                'kode_tr' => $kode_tr_BP,
                'id_child' => $id_child,
                'amount' => $biaya_admin,
                'date' => $date
            );
            $this->db->insert('tb_biaya_pendaftaran', $data1);
            $id_daftar = $this->db->insert_id();

            $report_tr1 = array(
                'id_anggota' => $id_parent,
                'id' => $id_daftar,
                'kode_tr' => $kode_tr_BP,
                'debit' => $biaya_admin,
                'credit' => 0,
                'saldo' => $balance_anggota - $biaya_admin,
                'deskripsi' => "Membayar biaya pendaftaran [" . $NO_ANGGOTA . "]",
                'tipe' => "biaya_pendaftaran",
                'date' => $date
            );
            $this->db->insert('tb_report', $report_tr1);



                $balance_parent = total_balance();

                $nama = profile_member($id_child,"nama");
                $bs = $biaya_admin / 2;
                $data2 = array(
                    'kode_tr' => $kode_tr_BS,
                    'id_anggota' => $id_parent,
                    'id_child' => $id_child,
                    'amount' => $bs,
                    'date' => $date
                );
                $this->db->insert('tb_bonus_sponsor', $data2);
                $id_roy = $this->db->insert_id();
                // report transaksi bonus_sponsor
                $report_tr2 = array(
                    'id_anggota' => $id_parent,
                    'id' => $id_roy,
                    'kode_tr' => $kode_tr_BS,
                    'debit' => 0,
                    'credit' => $bs,
                    'deskripsi' => "Mendapatkan royalti referral dari anggota [" . $nama . "]",
                    'saldo' => $balance_parent + $bs,
                    'tipe' => "royalti_pendaftaran",
                    'date' => $date
                );
                $this->db->insert('tb_report', $report_tr2);


                $report_act = array(
                'id_user' => $id_parent,
                'user' => "anggota",
                'keterangan' => "Mendaftarkan anggota [" . $NO_ANGGOTA . "]",
                'date' => $date
            );
            $this->db->insert('tb_report_activity', $report_act);

            $data_email = [
              'pass_tr' => $random,
              'password' => $random,
              'username'  => $this->input->post("username",true),
              'nama'  => $this->input->post("nama",true),
              'email'  => $this->input->post("email",true),
            ];
            $this->_send_email($data_email);


            $json['alert'] = "Anggota Berhasil Di Tambahkan";
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

function _send_email($data)
{
    $subject  = "Pendaftaran sukses!";

    $template = $this->load->view("content/anggota/template_email",$data,true);

    $config['charset']      = 'utf-8';
    $config['protocol']     = "smtp";
    $config['mailtype']     = "html";
    $config['smtp_host']    = "ssl://srv89.niagahoster.com";//pengaturan smtp
    $config['smtp_port']    = 465;
    $config['smtp_user']    = "admin@lenteradigitalindonesia.com"; // isi dengan email kamu
    $config['smtp_pass']    = "Makassar01"; // isi dengan password kamu
    $config['smtp_timeout'] = 4; //4 second
    $config['crlf']         = "\r\n";
    $config['newline']      = "\r\n";

    $this->load->library('email',$config);
    //konfigurasi pengiriman

    $this->email->from($config['smtp_user'], setting_system('WEBNAME'));
    $this->email->to($data['email']);
    $this->email->subject($subject);
    $this->email->message($template);
    if ($this->email->send()) {
      return true;
    }else {
      return false;
  }
}
function _amount_check($str)
{
  if ($str <= total_balance()) {
    if ($str == setting('BIAYA_PENDAFTARAN')) {
      return true;
    }else {
      $this->form_validation->set_message('_amount_check', '* Biaya pendaftaran anggota baru Rp.25.000');
      return false;
    }
  }else {
    $this->form_validation->set_message('_amount_check', '* Saldo Tidak Mencukupi');
    return false;
  }
}


function _username_check($str)
{
  $qry = $this->db->get_where("tb_anggota",["username"=>$str]);
  if ($qry->num_rows()>0) {
    $this->form_validation->set_message('_username_check', '* Ganti username yang lain');
    return false;
  }else {
    return true;
  }
}


function _nik_check($str)
{
  $qry = $this->db->get_where("tb_anggota",["no_ktp"=>$str]);
  if ($qry->num_rows()>0) {
    $this->form_validation->set_message('_nik_check', '* Sudah terdaftar');
    return false;
  }else {
    return true;
  }
}


function _email_check($str)
{
  $qry = $this->db->get_where("tb_anggota",["email"=>$str]);
  if ($qry->num_rows()>0) {
    $this->form_validation->set_message('_email_check', '* Sudah terdaftar');
    return false;
  }else {
    return true;
  }
}



function _username_update($str,$username_lama)
{
  $qry = $this->db->get_where("tb_anggota",["username !="=>$username_lama,"username"=>$str]);
  if ($qry->num_rows()>0) {
    $this->form_validation->set_message('_username_update', '* Ganti username yang lain');
    return false;
  }else {
    return true;
  }
}


function _email_update($str,$email_lama)
{
  $qry = $this->db->get_where("tb_anggota",["email !="=>$email_lama ,"email"=>$str]);
  if ($qry->num_rows()>0) {
    $this->form_validation->set_message('_email_update', '* Sudah terdaftar');
    return false;
  }else {
    return true;
  }
}


}
