<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Beranda extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('Mtamu'); // Load Mtamu ke controller ini
  }
  public function index(){
	date_default_timezone_set('Asia/Bangkok');
    $data = $this->Mtamu->view();
    $this->load->view('beranda');
  }
  public function tampil_tamu(){
	$data = $this->Mtamu->view();
	echo json_encode($data);
  }
  public function jenisTandaPengenal(){
    $data = $this->Mtamu->nama_tandaPengenal();
    echo json_encode($data);
  }
  public function perusahaan(){
    $data = $this->Mtamu->nama_perusahaan();
    echo json_encode($data);
  }
  public function simpan(){
    if($this->Mtamu->validation("save")){ // Jika validasi sukses atau hasil validasi adalah true
      $this->Mtamu->save();
      $callback = array(
        'status'=>'sukses'
      );
      }else{
      $callback = array(
        'status'=>'gagal'
      );
      }
    
      echo json_encode($callback);
    }
    public function ubahKeluar($id){
      $this->Mtamu->editKeluar($id);
      $callback = array(
        'status'=>'sukses'
      );
      echo json_encode($callback);
    }    
}



