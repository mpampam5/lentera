<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

function setting_system($field)
{
  $ci  =& get_instance();
  $qry = $ci->db->get_where("system",["id"=>999]);
  return $qry->row()->$field;
}

function setting($kode = null , $field = "nilai")
{
  $ci=& get_instance();
  $kd = strtoupper($kode);
  $qry = $ci->db->get_where("tb_lentera_setting",["kode"=>"$kd"]);
  if ($qry->num_rows() > 0) {
      return $qry->row()->$field;
  }else {
      return "Not available";;
  }
}

function sess($str)
{
   $ci=& get_instance();
  return $ci->session->userdata($str);
}

function format_rupiah($int)
  {
    return number_format($int, 0, ',', '.');
  }


function jumlah_anggota(){
    $ci=& get_instance();
    $qry = $ci->db->get_where("tb_anggota",["status"=>"1"]);
    return $qry->num_rows();
}


//balance

function alokasi_pinjaman()
{
  $ci=& get_instance();
  $qry = $ci->db->query("SELECT
                            SUM(amount) AS amount
                         FROM
                            tb_pinjaman_bayar
                         WHERE
                            status='1'");
  return $qry->row()->amount;
}
