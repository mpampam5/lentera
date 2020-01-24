<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman_model extends CI_Model{

  function fetch_data_pinjaman($limit, $start)
   {
     $this->db->select("id_pinjaman, kode_tr, amount, bunga, periode, angsuran, date, status, keterangan");
     $this->db->where("id_anggota", sess("id_anggota"));
     $this->db->from("tb_pinjaman");
     $this->db->order_by("date", "DESC");
     return $this->db->get();
   }

}
