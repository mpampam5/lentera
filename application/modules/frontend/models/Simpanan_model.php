<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_model extends CI_Model{

  function fetch_data($limit, $start)
   {
     $id_anggota = sess("id_anggota");
     $query = $this->db->query("SELECT kode_tr, id_anggota, amount, date, is_in_saldo FROM tb_simpanan_wajib
                                         WHERE id_anggota =  $id_anggota
                                     UNION ALL
                                     SELECT kode_tr, id_anggota, amount, date, is_in_saldo FROM tb_simpanan_pokok
                                         WHERE id_anggota =  $id_anggota
                                     UNION ALL
                                     SELECT kode_tr, id_anggota, amount, date, is_in_saldo FROM tb_simpanan_sukarela
                                         WHERE id_anggota =  $id_anggota
                                     ORDER BY date DESC, kode_tr DESC
                                     LIMIT $limit OFFSET $start
                                    ");
    return $query;
   }




   function fetch_data_bagi_untung($limit, $start)
    {
      $this->db->select("tb_bagi_untung.id_bagi_untung,
                          tb_bagi_untung.kode_tr AS kode_bagi_untung,
                          tb_bagi_untung.id_simp_sukarela,
                          tb_bagi_untung.persen,
                          tb_bagi_untung.amount AS nominal_bagi_untung,
                          tb_bagi_untung.date,
                          tb_simpanan_sukarela.kode_tr AS kode_simpanan_sukarela,
                          tb_simpanan_sukarela.amount AS nominal_simpanan_sukarela,
                          tb_simpanan_sukarela.id_anggota");
      $this->db->from("tb_bagi_untung");
      $this->db->join("tb_simpanan_sukarela","tb_simpanan_sukarela.id_simpanan = tb_bagi_untung.id_simp_sukarela");
      $this->db->where("tb_simpanan_sukarela.id_anggota", sess("id_anggota"));
      $this->db->order_by("tb_bagi_untung.date", "DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query;
    }


    function fetch_data_komisi_promosi($limit, $start)
     {
       $this->db->select("tb_komisi_sponsor.id_komisi_sponsor,
                          tb_komisi_sponsor.kode_tr AS kode_komisi_sponsor,
                          tb_komisi_sponsor.id_simp_sukarela,
                          tb_komisi_sponsor.id_parent,
                          tb_komisi_sponsor.id_child,
                          tb_komisi_sponsor.amount AS nominal_komisi_sponsor,
                          tb_komisi_sponsor.date,
                          tb_simpanan_sukarela.kode_tr AS kode_simpanan_sukarela,
                          tb_simpanan_sukarela.amount AS nominal_simpanan_sukarela");
       $this->db->from("tb_komisi_sponsor");
       $this->db->join("tb_simpanan_sukarela","tb_simpanan_sukarela.id_simpanan = tb_komisi_sponsor.id_simp_sukarela");
       $this->db->where("tb_komisi_sponsor.id_parent", sess("id_anggota"));
       $this->db->order_by("tb_komisi_sponsor.date", "DESC");
       $this->db->limit($limit, $start);
       $query = $this->db->get();
       return $query;
     }

}
