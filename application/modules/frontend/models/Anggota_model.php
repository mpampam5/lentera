<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model{

  function fetch_data($limit, $start)
   {
    $this->db->select("id_anggota,id_parent, nama, no_anggota, join_date, status");
    $this->db->from("tb_anggota");
    $this->db->where("id_parent", sess("id_anggota"));
    // $this->db->where("status","1");
    $this->db->order_by("join_date", "DESC");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query;
   }

}
