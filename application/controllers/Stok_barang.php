<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_barang extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('model_barang');
  }
  public function index($id)
  {
    if (isset($this->session->status)) {
      $data['input'] = $this->model_barang->tampil_barang_input($id);
      $this->load->template('stok_barang', $data);
    }else {
      redirect(base_url().'login');
    }
  }
  public function view_barang()
  {
    $data['barang']= $this->model_barang->tampil_barang();
    $this->load->template('view_barang' , $data);
  }
  public function simpan($id){
    $this->model_barang->simpan($id);
    redirect('/view_barang');
  }
  public function produksi($id,$id2){
    $query= $this->model_barang->proses($id,$id2);
    $jumlah_pesanan = $query['jumlah'];
    $stok= $this->db->query("SELECT * from stok_barang where id_barang='".$id2."'");
    $query1 = $stok->row();
    $jumlah_stok = $query1->jumlah;
      if ($jumlah_pesanan > $jumlah_stok ) {
      $data['total'] =  $jumlah_pesanan-$jumlah_stok;
    }else {
      $data['total'] = $jumlah_pesanan;
    }
    $data['barang']= $this->model_barang->proses($id,$id2);
    $data['button'] = '1';
    $this->load->template('produksi', $data);
  }
  public function proses_produksi($id){
    $jumlah = $this->input->post('jumlah');
    $id_pesanan = $this->input->post('id_pesanan');
    $this->model_barang->produksi($id,$jumlah,$id_pesanan);
    redirect('/detail_pesanan'.'/'.$id);
  }
  public function produksi_stok($id){
    if (isset($this->session->status)) {
      $data['button'] = '0';
      $data['barang'] = $this->model_barang->stok($id);
      $this->load->template('produksi', $data);
    }else {
      redirect(base_url().'login');
    }
  }
  public function tambah_stok($id){
    $jumlah = $this->input->post('jumlah');
    $this->model_barang->produksi($id,$jumlah);
    redirect('/view_barang');
  }
}
