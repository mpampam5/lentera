<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman_model extends CI_Model{

  function fetch_data_pinjaman($limit, $start)
   {
     $this->db->select("id_pinjaman, kode_tr, amount, bunga, periode, angsuran, date, status, keterangan");
     $this->db->from("tb_pinjaman");
     $this->db->where("id_anggota", sess("id_anggota"));
     $this->db->order_by("date", "DESC");
     $this->db->limit($limit, $start);
     $query = $this->db->get();
     return $query;
   }


function fetch_data_bayar_pinjaman($limit, $start)
{
  $this->db->select("tb_pinjaman_bayar.id_bayar,
                      tb_pinjaman_bayar.kode_tr AS kode_bayar_pinjaman,
                      tb_pinjaman_bayar.id_pinjaman,
                      tb_pinjaman_bayar.amount AS jumlah_pembayaran,
                      tb_pinjaman_bayar.angsuran_ke,
                      tb_pinjaman_bayar.date,
                      tb_pinjaman_bayar.tgl_bayar,
                      tb_pinjaman_bayar.status,
                      tb_pinjaman.kode_tr AS kode_pinjaman,
                      tb_pinjaman.amount AS jumlah_pinjaman,
                      tb_pinjaman.keterangan");
  $this->db->from("tb_pinjaman_bayar");
  $this->db->join("tb_pinjaman","tb_pinjaman.id_pinjaman = tb_pinjaman_bayar.id_pinjaman ");
  $this->db->where("tb_pinjaman.id_anggota", sess("id_anggota"));
  $this->db->where("tb_pinjaman_bayar.status", "0");
  $this->db->order_by("tb_pinjaman_bayar.id_bayar", "DESC");
  // $this->db->order_by("tb_pinjaman_bayar.angsuran_ke", "DESC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query;
}

function pembayaran_get_where($id)
{
  $this->db->select("tb_pinjaman_bayar.id_bayar,
                      tb_pinjaman_bayar.kode_tr AS kode_bayar_pinjaman,
                      tb_pinjaman_bayar.id_pinjaman,
                      tb_pinjaman_bayar.amount AS jumlah_pembayaran,
                      tb_pinjaman_bayar.angsuran_ke,
                      tb_pinjaman_bayar.date,
                      tb_pinjaman_bayar.tgl_bayar,
                      tb_pinjaman_bayar.status,
                      tb_pinjaman.kode_tr AS kode_pinjaman,
                      tb_pinjaman.amount AS jumlah_pinjaman,
                      tb_pinjaman.periode AS periode,
                      tb_pinjaman.angsuran AS angsuran,
                      tb_pinjaman.date AS tgl_pinjaman,
                      tb_pinjaman.keterangan");
  $this->db->from("tb_pinjaman_bayar");
  $this->db->join("tb_pinjaman","tb_pinjaman.id_pinjaman = tb_pinjaman_bayar.id_pinjaman ");
  $this->db->where("tb_pinjaman_bayar.id_bayar", dec_uri($id));
  $this->db->where("tb_pinjaman.id_anggota", sess("id_anggota"));
  $this->db->where("tb_pinjaman_bayar.status", "0");
  $query = $this->db->get();
  return $query->row();
}


function fetch_data_laporan($limit, $start)
{
  $this->db->select("tb_pinjaman_bayar.id_bayar,
                      tb_pinjaman_bayar.kode_tr AS kode_bayar_pinjaman,
                      tb_pinjaman_bayar.id_pinjaman,
                      tb_pinjaman_bayar.amount AS jumlah_pembayaran,
                      tb_pinjaman_bayar.angsuran_ke,
                      tb_pinjaman_bayar.date,
                      tb_pinjaman_bayar.tgl_bayar,
                      tb_pinjaman_bayar.status,
                      tb_pinjaman.kode_tr AS kode_pinjaman,
                      tb_pinjaman.amount AS jumlah_pinjaman,
                      tb_pinjaman.keterangan");
  $this->db->from("tb_pinjaman_bayar");
  $this->db->join("tb_pinjaman","tb_pinjaman.id_pinjaman = tb_pinjaman_bayar.id_pinjaman ");
  $this->db->where("tb_pinjaman.id_anggota", sess("id_anggota"));
  $this->db->where("tb_pinjaman_bayar.status", "1");
  $this->db->order_by("tb_pinjaman_bayar.tgl_bayar", "DESC");
  // $this->db->order_by("tb_pinjaman_bayar.angsuran_ke", "DESC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query;
}


function pembayaran_get_where_detail($id)
{
  $this->db->select("tb_pinjaman_bayar.id_bayar,
                      tb_pinjaman_bayar.kode_tr AS kode_bayar_pinjaman,
                      tb_pinjaman_bayar.id_pinjaman,
                      tb_pinjaman_bayar.amount AS jumlah_pembayaran,
                      tb_pinjaman_bayar.angsuran_ke,
                      tb_pinjaman_bayar.date,
                      tb_pinjaman_bayar.tgl_bayar,
                      tb_pinjaman_bayar.status,
                      tb_pinjaman.kode_tr AS kode_pinjaman,
                      tb_pinjaman.amount AS jumlah_pinjaman,
                      tb_pinjaman.periode AS periode,
                      tb_pinjaman.angsuran AS angsuran,
                      tb_pinjaman.date AS tgl_pinjaman,
                      tb_pinjaman.keterangan");
  $this->db->from("tb_pinjaman_bayar");
  $this->db->join("tb_pinjaman","tb_pinjaman.id_pinjaman = tb_pinjaman_bayar.id_pinjaman ");
  $this->db->where("tb_pinjaman_bayar.id_bayar", dec_uri($id));
  $this->db->where("tb_pinjaman.id_anggota", sess("id_anggota"));
  $this->db->where("tb_pinjaman_bayar.status", "1");
  $query = $this->db->get();
  return $query->row();
}

}
