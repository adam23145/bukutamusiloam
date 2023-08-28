<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mtamu extends CI_Model {

  public function view(){
    $this->db->order_by('jam_masuk', 'desc'); // Mengurutkan berdasarkan tanggal terbaru
    return $this->db->query('SELECT 
    DATE(t.jam_masuk) AS wkt,
    t.id_tamu,
    t.nama,
    t.nomer_identitas,
    p.nama_perusahaan,
    t.nomor_telepon,
    t.jenis_kelamin,
    jtp.jenis_pengenal,
    t.jenis_tanda_pengenal,
    TIME(t.jam_masuk) as jam_masuk,
    TIME(t.jam_keluar) as jam_keluar,
    t.perusahaan,
    t.keperluan
    FROM tb_tamu t
    JOIN tb_perusahaan p ON t.perusahaan = p.id
    JOIN tb_jenis_tanda_pengenal jtp ON t.jenis_tanda_pengenal = jtp.jenis_pengenal;')->result();
  }
}