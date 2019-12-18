<?php
class Model_data extends CI_Model
{
  public function simpan(){
    $data=[
      'nama' => $this->input->post('nama'),
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
      'alamat' => $this->input->post('alamat'),
      'notelp' => $this->input->post('notlp'),
      'status' => $this->input->post('status')
    ];
    $this->db->insert('user', $data);
  }
  public function signin($username,$pass1){
    $sql= "SELECT * FROM user where username='".$username."' and password='".$pass1."' and status!='Sales' ";
    $query = $this->db->query($sql);
    if(!empty($query->row_array() ) ){
      return $query->row_array();
    }
    return false;
  }
}
?>
