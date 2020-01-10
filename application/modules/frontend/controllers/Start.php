<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if ($this->session->userdata("logins_person")!=true) {
        $this->load->view("start");
    }else {
      redirect(site_url("frontend/home"),"refresh");
    }
  }

}
