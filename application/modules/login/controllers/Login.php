<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Get_model","model");
  }

  function index()
  {
    $data['action'] = site_url("log-act");
    $this->load->view("index",$data);
  }

  function action()
  {
    if ($this->input->is_ajax_request()) {
      $json = array('success' => false,
                    "valid"=>false,
                    'url'=>"",
                    'alert'=>array()
                  );
      $this->load->library("form_validation");
      $this->form_validation->set_rules("username","Username","trim|xss_clean|required");
      $this->form_validation->set_rules("password","Password","trim|required");
      $this->form_validation->set_error_delimiters('<span style="font-size:12px;" class="mt-2 text-danger">','</span>');


      if ($this->form_validation->run()) {
          $json["success"] = true;

          $username = $this->input->post("username");
          $password =  $this->input->post("password");

          $qry =  $this->db->select("id_anggota,username,password,status,is_active")
                           ->from("tb_anggota")
                           ->where("username","$username")
                           ->get();


          if ($qry->num_rows() > 0) {
              $row = $qry->row();
              if ($row->status == "1" AND $row->is_active == "1") {
                  if (password_verify($password, $row->password)) {
                    $session = array('id_anggota' => $row->id_anggota ,
                                      'login_anggota' => true
                                    );
                    $this->session->set_userdata($session);

                    $json['valid'] = true;
                    $json['url']  = site_url("frontend/home");
                  }else {
                    $json['alert'] = "Username Atau Password Salah";
                  }
              }else {
                $json['alert'] = "Akun belum aktif atau sedang dinonaktifkan";
              }
          }else {
            $json['alert'] = "Username Atau Password Salah";
          }
      }else {
        foreach ($_POST as $key => $value) {
          $json['alert'][$key] = form_error($key);
        }
      }

      echo json_encode($json);
    }
  }

}
