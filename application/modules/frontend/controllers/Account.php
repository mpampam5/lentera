<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Account extends MY_Controller{

function index()
{
  $this->template->set_title("Account");
  $this->template->back(site_url("frontend/home"));
  $this->template->view("content/account/index");
}


function rekening()
{
  $this->template->view("content/account/rekening",[],false);
}


function rekening_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->form_validation->set_rules("no_rekening","*&nbsp;","trim|xss_clean|required|numeric");
      $this->form_validation->set_rules("bank","*&nbsp;","trim|xss_clean|required");
      $this->form_validation->set_error_delimiters('<span class="error mt-1 text-danger" style="font-size:11px">','</span>');
      if ($this->form_validation->run()) {
        $id_anggota = sess("id_anggota");
        $data = [
                'bank' => strtoupper($this->input->post('bank', TRUE)),
                'no_rekening' => $this->input->post('no_rekening', TRUE)
            ];
            $this->db->update('tb_anggota', $data, "id_anggota = '" . $id_anggota . "'");

            // report activity
            $report_act = array(
                'id_user' => $id_anggota,
                'user' => "anggota",
                'keterangan' => "Update data rekening",
                'date' => new_date()
            );
        $this->db->insert('tb_report_activity', $report_act);
        $json['alert'] = "Data Rekening Berhasil Di Ubah";
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


function pass_login()
{
  $this->template->view("content/account/pass_login",[],false);
}


function pass_login_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->form_validation->set_rules("pass_lama","*&nbsp;","trim|xss_clean|required|callback__cek_password_login");
      $this->form_validation->set_rules("pass_baru","*&nbsp;","trim|xss_clean|required|min_length[6]");
      $this->form_validation->set_rules("pass_baru_kon","*&nbsp;","trim|xss_clean|required|matches[pass_baru]",[
        "matches" => "* Konfirmasi Password Baru tidak valid"
      ]);
      $this->form_validation->set_error_delimiters('<span class="error mt-1 text-danger" style="font-size:11px">','</span>');
      if ($this->form_validation->run()) {
        $id_anggota = sess("id_anggota");
        $data = [
                'password' => password_hash($this->input->post('pass_baru_kon', TRUE), PASSWORD_BCRYPT)
            ];
            $this->db->update('tb_anggota', $data, "id_anggota = '" . $id_anggota . "'");
            // report activity
            $report_act = array(
                'id_user' => $id_anggota,
                'user' => "anggota",
                'keterangan' => "Update password",
                'date' => new_date()
            );
            $this->db->insert('tb_report_activity', $report_act);


        $json['alert'] = "Password Login Berhasil Di Ubah";
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


function pass_transaksi()
{
  $this->template->view("content/account/pass_transaksi",[],false);
}


function pass_transaksi_action()
{
  if ($this->input->is_ajax_request()) {
      $json = array('success'=>false, 'alert'=>array());
      $this->form_validation->set_rules("pass_lama","*&nbsp;","trim|xss_clean|required|callback__cek_password");
      $this->form_validation->set_rules("pass_baru","*&nbsp;","trim|xss_clean|required|min_length[6]");
      $this->form_validation->set_rules("pass_baru_kon","*&nbsp;","trim|xss_clean|required|matches[pass_baru]",[
        "matches" => "* Konfirmasi Password Baru tidak valid"
      ]);
      $this->form_validation->set_error_delimiters('<span class="error mt-1 text-danger" style="font-size:11px">','</span>');
      if ($this->form_validation->run()) {
        $id_anggota = sess("id_anggota");
        $data = [
                'pass_tr' => password_hash($this->input->post('pass_baru_kon', TRUE), PASSWORD_BCRYPT)
            ];
            $this->db->update('tb_anggota', $data, "id_anggota = '" . $id_anggota . "'");
            // report activity
            $report_act = array(
                'id_user' => $id_anggota,
                'user' => "anggota",
                'keterangan' => "Update password transaksi",
                'date' => new_date()
            );
            $this->db->insert('tb_report_activity', $report_act);


        $json['alert'] = "Password Transaksi Berhasil Di Ubah";
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
