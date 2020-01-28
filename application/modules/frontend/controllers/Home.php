<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."/modules/frontend/core/MY_Controller.php";
class Home extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->template->set_title("home");
    $data['grafik'] = $this->_grafik();
    $this->template->view("content/home/index",$data);
  }



 function _grafik()
    {
        $hari_ini = new_date();
        $tahun_ini = date("Y", strtotime($hari_ini));
        // $bulan_ini = date("m", strtotime($hari_ini));

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $namaBulan = date("F", mktime(0, 0, 0, $bulan, 10));

            $query1 = $this->db->query(' SELECT SUM(amount) FROM tb_simpanan_wajib
                                            WHERE MONTH(bulan_tahun)="' . $bulan . '"
                                            AND YEAR(bulan_tahun)="' . $tahun_ini . '"');
            $result1 = $query1->row_array();
            $s_wajib = $result1['SUM(amount)'];

            $query2 = $this->db->query(' SELECT SUM(amount) FROM tb_simpanan_pokok
                                            WHERE MONTH(date)="' . $bulan . '"
                                            AND YEAR(date)="' . $tahun_ini . '"');
            $result2 = $query2->row_array();
            $s_pokok = $result2['SUM(amount)'];

            $query3 = $this->db->query(' SELECT SUM(amount) FROM tb_simpanan_sukarela
                                            WHERE MONTH(date)="' . $bulan . '"
                                            AND YEAR(date)="' . $tahun_ini . '"');
            $result3 = $query3->row_array();
            $s_sukarela = $result3['SUM(amount)'];

            $simpanan = $s_wajib + $s_pokok + $s_sukarela;
            if ($simpanan <= 0) {
                $simpanan = 0;
            }

            $query_pinjaman = $this->db->query('SELECT SUM(amount)
                                            FROM tb_pinjaman
                                            WHERE MONTH(start_date)="' . $bulan . '"
                                            AND YEAR(start_date)="' . $tahun_ini . '"');
            $result_pinjaman = $query_pinjaman->row_array();
            $pinjaman = $result_pinjaman['SUM(amount)'];
            if ($pinjaman <= 0) {
                $pinjaman = 0;
            }



            $sbulan = date("Y")."-".$bulan;
              $grafik[] = array('m' => date("Y-m", strtotime($sbulan)),
                              'a' => $simpanan,
                              'b' => $pinjaman);


        }

        return json_encode($grafik);
    }

  function mt(){
    $this->template->set_title("Maintenance");
    $this->template->back(site_url("frontend/home"));
    $this->template->view("mt");
  }

}
