<?php

class Model_data extends CI_Model
{
  public function simpan(){
    $data=[
      'nama' => $this->input->post('nama'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'alamat' => $this->input->post('alamat'),
      'notelp' => $this->input->post('notlp'),
      'status' => $this->input->post('status')
    ];
    $this->db->insert('user', $data);
  }
  public function signin($username){
    $sql= "SELECT * FROM user where username='".$username."'";
    $query = $this->db->query($sql);
    if(!empty($query->row_array() ) ){
      return $query->row_array();
    }
    return false;
  }
}
?>
