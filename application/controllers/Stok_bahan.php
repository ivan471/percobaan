<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_bahan extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('model_bahan');
  }
  public function index($id)
  {
    if (isset($this->session->status)) {
      $data['input'] = $this->model_bahan->tampil_bahan_input($id);
      $this->load->template('stok_bahan', $data);
    }else {
      redirect(base_url().'login');
    }
  }
  public function view_bahan()
  {
    if (isset($this->session->status)) {
      $data['bahan']= $this->model_bahan->tampil_bahan();
      $this->load->template('view_bahan' , $data);
    }else {
      redirect(base_url().'login');
    }
  }
  public function simpan($id){
    $this->model_bahan->simpan($id);
    redirect('/view_bahan');
  }
}
