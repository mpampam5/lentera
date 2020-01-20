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


function profile($field)
{
  $ci=&get_instance();
  $qry = $ci->db->select("id_anggota,
                          id_parent,
                          no_anggota,
                          username,
                          password,
                          nama,
                          email,
                          tempat_lahir,
                          tanggal_lahir,
                          no_ktp,
                          no_hp,
                          alamat,
                          kecamatan,
                          kelurahan,
                          kota,
                          provinsi,
                          kode_pos,
                          pekerjaan,
                          jabatan,
                          perusahaan,
                          alamat_perusahaan,
                          kota_perusahaan,
                          pendidikan,
                          pass_tr,
                          join_date,
                          status,
                          is_active,
                          bank,
                          no_rekening")
                  ->from("tb_anggota")
                  ->where("id_anggota", $ci->session->userdata("id_anggota"))
                  ->get()
                  ->row();
  return $qry->$field;
}

function jumlah_anggota(){
    $ci=& get_instance();
    $qry = $ci->db->get_where("tb_anggota",["status"=>"1"]);
    return $qry->num_rows();
}


//balance

function alokasi_pinjaman()
{
  $ci=&get_instance();
  $qry = $ci->db->query("SELECT
                            SUM(amount) AS amount
                         FROM
                            tb_pinjaman_bayar
                         WHERE
                            status='1'");
  return $qry->row()->amount;
}

function jumlah_deposito()
{
  $ci=&get_instance();
  $query1 = $ci->db->query(" SELECT SUM(amount)
                                  FROM tb_deposito");
  $result1 = $query1->row_array();
  return $result1['SUM(amount)'];
}

function jumlah_simpanan()
{
  $ci=&get_instance();
  $query1 = $ci->db->query(' SELECT SUM(amount)
                                  FROM tb_simpanan_wajib');
  $result1 = $query1->row_array();
  $s_wajib = $result1['SUM(amount)'];

  $query2 = $ci->db->query(' SELECT SUM(amount)
                                  FROM tb_simpanan_pokok');
  $result2 = $query2->row_array();
  $s_pokok = $result2['SUM(amount)'];

  $query3 = $ci->db->query(' SELECT SUM(amount)
                                  FROM tb_simpanan_sukarela');
  $result3 = $query3->row_array();
  $s_sukarela = $result3['SUM(amount)'];

  return $s_wajib + $s_pokok + $s_sukarela;
}



// ###########################################################################
    // TOTAL
    function total_balance()
    {
      $ci=&get_instance();
        $id_anggota = $ci->session->userdata("id_anggota");
        $dp_sukses = deposit_sukses($id_anggota);

        $wd_sukses = withdrawal_sukses($id_anggota);
        $wd_pending = withdrawal_pending($id_anggota);
        $wd = $wd_pending + $wd_sukses;
        $wd_batal = withdrawal_batal($id_anggota);

        $keuntungan = total_keuntungan($id_anggota);
        $deposito_nonaktif = deposito_nonaktif($id_anggota);
        $deposito_aktif = deposito_aktif($id_anggota);
        $simpanan = total_simpanan($id_anggota);
        $biaya_pendaftaran = biaya_pendaftaran($id_anggota);
        $biaya_withdraw = biaya_withdraw($id_anggota);
        $simpanan_masuk_saldo = simpanan_yg_bisa_diambil($id_anggota);
        $pinjaman = pinjaman($id_anggota);
        $pinjaman_dibayar = pinjaman_bayar("1", $id_anggota);

        $total = $dp_sukses + $keuntungan + $deposito_nonaktif + $simpanan_masuk_saldo  + $pinjaman - $wd - $simpanan - $deposito_aktif - $biaya_pendaftaran - $biaya_withdraw - $pinjaman_dibayar;

        if ($total <= 0) {
            return 0;
        } else {
            return $total;
        }
    }

    // DEPOSIT
    function deposit_sukses($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_deposit
                                    WHERE status =  '1' AND
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // WITHDRAWAL
    function withdrawal_sukses($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_withdrawal
                                    WHERE status =  '1' AND
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function withdrawal_pending($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_withdrawal
                                    WHERE status =  '0' AND
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function withdrawal_batal($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_withdrawal
                                    WHERE status =  '9' AND
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // DEPOSITO
    function deposito_aktif($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_deposito
                                    WHERE id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function deposito_nonaktif($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_deposito
                                    WHERE status =  '0' AND
                                        id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function deviden($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(tb_deviden.amount)
                                    FROM tb_deviden, tb_deposito
                                    WHERE tb_deviden.id_deposito = tb_deposito.id_deposito
                                        AND id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(tb_deviden.amount)'];
    }

    // KEUNTUNGAN
    function total_keuntungan($id_anggota = "")
    {
      $ci=&get_instance();
        $royalti = royalti($id_anggota);
        $bonus_sponsor  = bonus_sponsor($id_anggota);
        $deviden  = deviden($id_anggota);
        $komisi_sponsor = komisi_sponsor($id_anggota);
        $bagi_untung = bagi_untung($id_anggota);

        return $royalti + $deviden + $bonus_sponsor + $komisi_sponsor + $bagi_untung;
    }

    // Biaya withdraw
    function biaya_withdraw($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(tb_biaya_withdraw.amount)
                                    FROM tb_biaya_withdraw, tb_withdrawal
                                    WHERE tb_withdrawal.id_withdrawal = tb_biaya_withdraw.id_withdrawal
                                        AND tb_withdrawal.id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(tb_biaya_withdraw.amount)'];
    }

    // Biaya pendaftaran
    function biaya_pendaftaran($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_biaya_pendaftaran
                                    WHERE id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // Bonus_Sponsor
    function bonus_sponsor($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_bonus_sponsor
                                    WHERE id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // komisi_sponsor
    function komisi_sponsor($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(amount)
                                    FROM tb_komisi_sponsor
                                    WHERE id_parent = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // bagi_untung
    function bagi_untung($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(" SELECT SUM(tb_bagi_untung.amount)
                                    FROM tb_bagi_untung, tb_simpanan_sukarela
                                    WHERE tb_simpanan_sukarela.id_simpanan = tb_bagi_untung.id_simp_sukarela
                                        AND tb_simpanan_sukarela.id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(tb_bagi_untung.amount)'];
    }

    // Royalti
    function royalti($id_anggota = "")
    {
      $ci=&get_instance();

        $query = $ci->db->query(" SELECT SUM(tb_royalti.amount)
                                    FROM tb_royalti, tb_deposito
                                    WHERE tb_royalti.id_deposito = tb_deposito.id_deposito
                                        AND id_anggota = '" . $id_anggota . "'");
        $result = $query->row_array();
        return $result['SUM(tb_royalti.amount)'];
    }

    // SIMPANAN
    function total_simpanan($id_anggota = "")
    {
      $ci=&get_instance();
        $pokok = simpanan_pokok($id_anggota);
        $wajib = simpanan_wajib($id_anggota);
        $sukarela = simpanan_sukarela($id_anggota);

        return $wajib + $pokok + $sukarela;
    }

    function simpanan_pokok($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_pokok
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function simpanan_wajib($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_wajib
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function simpanan_sukarela($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_sukarela
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function simpanan_yg_bisa_diambil($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(' SELECT SUM(amount)
                                    FROM tb_simp_bisa_diambil
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function simpanan_yg_bisa_diambil_by_tipe($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(' SELECT SUM(amount)
                                    FROM tb_simp_bisa_diambil
                                    WHERE id_anggota = "' . $id_anggota . '"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    // #########################################

    function pinjaman($id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(' SELECT SUM(amount)
                                    FROM tb_pinjaman
                                    WHERE id_anggota = "' . $id_anggota . '" AND status ="1"');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function pinjaman_bayar($status = "1", $id_anggota = "")
    {
      $ci=&get_instance();
        $query = $ci->db->query(' SELECT SUM(tb_pinjaman_bayar.amount)
                                    FROM tb_pinjaman_bayar, tb_pinjaman
                                    WHERE tb_pinjaman_bayar.id_pinjaman = tb_pinjaman.id_pinjaman
                                    AND tb_pinjaman.id_anggota = "' . $id_anggota . '" AND tb_pinjaman_bayar.status ="' . $status . '"');
        $result = $query->row_array();
        return $result['SUM(tb_pinjaman_bayar.amount)'];
    }
