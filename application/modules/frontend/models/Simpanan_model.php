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
                                     ORDER BY date DESC
                                     LIMIT $limit OFFSET $start
                                    ");
    return $query;
   }

}
