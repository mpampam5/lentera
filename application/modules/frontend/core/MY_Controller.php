<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{


  public function __construct()
    {
      parent::__construct();
      if ($this->session->userdata("login_anggota") != true) {
        redirect(site_url("login"),"refresh");
      }
      $this->load->helper(array("frontend","enc_gue","tanggal_indonesia"));
      $this->load->library(array("template","user_agent","form_validation"));
    }


    function _cek_password($str)
      {

        $qry = $this->db->get_where("tb_anggota",["id_anggota"=>sess('id_anggota')]);
        if ($qry->num_rows() > 0) {
            if (password_verify($str, $qry->row()->pass_tr)) {
              return true;
            }else {
              $this->form_validation->set_message('_cek_password', '* Password Transaksi Salah');
              return false;
            }
        }else {
          $this->form_validation->set_message('_cek_password', '* Password Transaksi Salah');
          return false;
        }
      }



      function _cek_password_login($str)
        {

          $qry = $this->db->get_where("tb_anggota",["id_anggota"=>sess('id_anggota')]);
          if ($qry->num_rows() > 0) {
              if (password_verify($str, $qry->row()->password)) {
                return true;
              }else {
                $this->form_validation->set_message('_cek_password_login', '* Password Login Salah');
                return false;
              }
          }else {
            $this->form_validation->set_message('_cek_password_login', '* Password Login Salah');
            return false;
          }
        }

}
