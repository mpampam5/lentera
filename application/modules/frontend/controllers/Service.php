<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Service extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    // $this->load->model("Simpanan_model","model");
  }

function aturan_sanksi()
{
  $this->template->set_title("Aturan & Sanksi");
  $this->template->back(site_url("frontend/home"));
  $this->template->view("content/service/aturan_sanksi");
}


function ad_art()
{
  $this->template->set_title("AD/ART");
  $this->template->back(site_url("frontend/home"));
  $this->template->view("content/service/ad_art");
}


function customer_support()
{
  $this->template->set_title("Customer Support");
  $this->template->back(site_url("frontend/home"));
  $this->template->view("content/service/customer_support");
}


}
