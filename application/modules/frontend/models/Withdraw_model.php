<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw_model extends CI_Model{

  function fetch_data($limit, $start)
   {
      $this->db->select("tb_withdrawal.id_withdrawal,
                          tb_withdrawal.kode_tr,
                          tb_withdrawal.id_anggota,
                          tb_withdrawal.amount,
                          tb_withdrawal.amount_request,
                          tb_withdrawal.gateway,
                          tb_withdrawal.no_rek,
                          tb_withdrawal.date,
                          tb_withdrawal.status,
                          tb_biaya_withdraw.amount AS biaya_admin");
      $this->db->from("tb_withdrawal");
      $this->db->join("tb_biaya_withdraw","tb_biaya_withdraw.id_withdrawal = tb_withdrawal.id_withdrawal","left");
      $this->db->where("id_anggota", sess("id_anggota"));
      $this->db->order_by("date", "DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();
    return $query;
   }


   function get_where_detail($id_deposit)
   {
     $this->db->select("tb_deposit.id_deposit,
                       tb_deposit.kode_tr,
                       tb_deposit.id_anggota,
                       tb_deposit.amount,
                       tb_deposit.last_code,
                       tb_deposit.id_gateway,
                       tb_deposit.`code`,
                       tb_deposit.date,
                       tb_deposit.status AS status_deposit,
                       tb_gateway.gateway,
                       tb_gateway.no_rekening,
                       tb_gateway.atas_nama,
                       tb_gateway.status");
     $this->db->from("tb_deposit");
     $this->db->join("tb_gateway","tb_gateway.id_gateway = tb_deposit.id_gateway");
     $this->db->where("id_anggota", sess("id_anggota"));
     $this->db->where("id_deposit", $id_deposit);
     $this->db->order_by("date", "DESC");
     $query = $this->db->get();
     return $query;
   }

}
