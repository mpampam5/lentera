<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_dompet_model extends CI_Model{

  function fetch_data($limit, $start)
   {
     $this->db->select("date, kode_tr, debit, credit, saldo, deskripsi");
     $this->db->from("tb_report");
     $this->db->where("id_anggota", sess("id_anggota"));
     $this->db->order_by("date", "DESC");
     $this->db->limit($limit, $start);
     $query = $this->db->get();
    return $query;
   }

}
