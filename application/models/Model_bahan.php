<?php

class Model_bahan extends CI_Model
{
  public function tampil_bahan(){
    $query = $this->db->get('stok_bahan');
    return $query->result_array();
  }
    public function tampil_bahan_input($id){
      $query = $this->db->query("SELECT * from stok_bahan where id_bahan='".$id."'");
      return $query->row_array();
    }
    public function simpan($id){
      $query = $this->db->query("SELECT * from stok_bahan where id_bahan='".$id."'");
      $row = $query->row();
      $stok_lama = $row->jumlah;
      $stok_baru = $this->input->post('jumlah');
      $total =$stok_lama + $stok_baru;
      $data = array('jumlah' => $total);
      $this->db->where('id_bahan',$id);
      $this->db->update('stok_bahan' , $data);
    }
}
