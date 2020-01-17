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


      }else {
        foreach ($_POST as $key => $value) {
          $json['alert'][$key] = form_error($key);
        }
      }

      echo json_encode($json);
    }
  }

}
