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
      $status = $row->status=="1" ? "<span class='text-success'>Anggota</span>":"<span class='text-danger'>Calon Anggota</span>";
      $output .= '<li class="list-anggota">
                    <a href="'.site_url("frontend/anggota/detail/".enc_uri($row->id_anggota)).'">
                      <div class="d-flex flex-row align-items-center">
                        <i class="ti-user icon-lg"></i>
                        <div class="ml-3">
                          <h6 class="" style="font-size:13px!important;"><span class="text-primary">'.$row->no_anggota.'</span> | '.strtoupper($row->nama).'</h6>
                            <p class="mt-1 text-muted card-text"><i class="fa fa-calendar"></i> Tanggal Bergabung : '.date("d/m/Y",strtotime($row->join_date)).'</p>
                            <p class="mt-1 text-muted card-text"><i class="ti-filter"></i> Status : '.$status.'</p>
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
    $this->template->set_title("Detail Anggota");
    $this->template->back(site_url("frontend/anggota"));
    $data['row'] = $qry->row();
    $this->template->view("content/anggota/detail",$data);
  }
}


function add()
{
  $this->template->set_title("Tambah Anggota baru");
  $this->template->back(site_url("frontend/anggota"));
  $this->template->view("content/anggota/form");
}


}
