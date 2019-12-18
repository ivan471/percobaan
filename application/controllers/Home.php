<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('model_data');
    $this->load->model('model_barang');
  }

  public function index()
  {
    if (isset($this->session->status)) {
      $data['pesanan']= $this->model_barang->pesanan();
      $this->load->template('index' , $data);
    }else {
      redirect(base_url().'login');
    }
  }
  public function detail_pesanan($id)
  {
    if (isset($this->session->status)) {
      $data['pesanan']= $this->model_barang->detail_pesanan($id);
      $data['brg_pesanan']= $this->model_barang->brg_pesanan($id);
      $this->load->template('detail_pesanan', $data);
    }else {
      redirect(base_url().'login');
    }
  }
  public function daftar()
  {
    $this->load->template('tab2');
  }
  public function simpan()
  {
    $this->model_data->simpan();
    redirect(base_url());
  }
  public function login()
  {
    $this->load->template('login');
  }
  public function signin()
  {
    $username = $this->input->post('username');
    $pass = $this->input->post('password');
    $pass1 = md5($pass);
    $user = $this->model_data->signin( $username,$pass1 );
    if( isset($user)){
      // password cocok, login berhasil
      // simpan data session untuk mengenali user di setiap halaman
      $this->session->status = $user['status'];
      $this->session->nama = $user['nama'];
      $this->session->uid = $user['id'];
      // kembali ke halaman depan
      redirect('/');
    } else {
      echo "Login Gagal";
    }
    // if ($user = $this->model_data->signin($username)) {
    //   if ($user['password'] == $pass) {
    //     $this->session->status = $user['status'];
    //     $this->session->nama = $user['nama'];
    //     $this->session->uid = $user['id'];
    //     redirect(base_url());
    //   }else{
    //     echo "Login Gagal";
    //   }
    // }else {
    //   echo "Tidak Terdaftar";
    // }
  }
  public function Logout()
  {
    $this->session->sess_destroy();
    redirect('/login');
  }
  public function history(){
    if (isset($this->session->status)) {
      $data['pesanan']= $this->model_barang->pesanan();
      $this->load->template('history' , $data);
    }else {
      redirect(base_url().'login');
    }
  }
  public function pengantaran($id){
    if (isset($this->session->status)) {
      $this->model_barang->pengantaran($id);
      redirect('/');
    }else {
      redirect(base_url().'login');
    }
  }
}
