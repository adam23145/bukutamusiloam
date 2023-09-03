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
  public function nama_tandaPengenal(){
    return $this->db->get('tb_jenis_tanda_pengenal')->result();
  }
  public function nama_perusahaan(){
    return $this->db->get('tb_perusahaan')->result();
  }
  public function validation($mode){
    $this->load->library('form_validation');
    if($mode == "save"){
      $this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
      $this->form_validation->set_rules('input_jeniskelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('input_nomor_iden', 'Nomor iden', 'required');
      $this->form_validation->set_rules('input_namaperusahaan', 'Nama Perusahaan', 'required');
      $this->form_validation->set_rules('input_keperluan', 'Keperluan', 'required');
      $this->form_validation->set_rules('input_nomor_telepon', 'Nomor Telepon', 'required');
      $this->form_validation->set_rules('input_namapengenal', 'Jenis Pengenal', 'required');
      $jenis_pengenal = $this->input->post('input_namapengenal');
      if ($jenis_pengenal === "other") {
        if (empty($jenis_tanda_pengenal)) {
          $this->form_validation->set_rules('input_lainnya', 'Jenis Pengenal', 'required');
        }
      }
  }
  if($this->form_validation->run()){return true;}
  else{return false;}
  }
  public function save(){
    $data = array(
        "nama" => $this->input->post('input_nama'),
        "jenis_kelamin" => $this->input->post('input_jeniskelamin'),
        "nomer_identitas" => $this->input->post('input_nomor_iden'),
        "perusahaan" => $this->input->post('input_namaperusahaan'),
        "keperluan" => $this->input->post('input_keperluan'),
        "nomor_telepon" => $this->input->post('input_nomor_telepon'),
    );

      $jenis_pengenal = $this->input->post('input_namapengenal');
      if ($jenis_pengenal === "other") {
          $jenis_tanda_pengenal = $this->input->post('input_lainnya');
          
          if (!empty($jenis_tanda_pengenal)) {
              $data["jenis_tanda_pengenal"] = strtoupper($jenis_tanda_pengenal);
      
              // Insert data into 'tb_tamu' table
              $this->db->insert('tb_tamu', $data);
              
              // Check if the 'jenis_pengenal' already exists in 'tb_jenis_tanda_pengenal' table
              $existing_jenis_tanda = $this->db->get_where('tb_jenis_tanda_pengenal', array('jenis_pengenal' => $jenis_tanda_pengenal))->row();
              
              if (!$existing_jenis_tanda) {
                  // Insert data into 'tb_jenis_tanda_pengenal' table
                  $data_jenis_tanda = array(
                      "jenis_pengenal" => strtoupper($jenis_tanda_pengenal)
                  );
                  $this->db->insert('tb_jenis_tanda_pengenal', $data_jenis_tanda);
              }
          } else {

          }
      } else {
          $jenis_tanda_pengenal = strtoupper($jenis_pengenal);
          $data["jenis_tanda_pengenal"] = strtoupper($jenis_tanda_pengenal);
      
          // Insert data into 'tb_tamu' table
          $this->db->insert('tb_tamu', $data);
      }
  }
  public function editKeluar($id) {
    $this->db->set('jam_keluar', 'NOW()', false); // Use false as the third argument to prevent CodeIgniter from escaping the query
    $this->db->where('id_tamu', $id);
    $this->db->update('tb_tamu');
}
}