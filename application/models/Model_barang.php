<?php

class Model_barang extends CI_Model
{
  public function tampil_barang(){
    $query = $this->db->get('stok_barang');
    return $query->result_array();
  }
  public function tampil_barang_input($id){
    $query = $this->db->query("SELECT * from stok_barang where id_barang='".$id."'");
    return $query->row_array();
  }
  public function simpan($id){
    $query = $this->db->query("SELECT * from stok_barang where id_barang='".$id."'");
    $row = $query->row();
    $stok_lama = $row->jumlah;
    $stok_baru = $this->input->post('jumlah');
    $total =$stok_lama + $stok_baru;
    $data = array('jumlah' => $total);
    $this->db->where('id_barang',$id);
    $this->db->update('stok_barang' , $data);
  }
  public function produksi($id,$jumlah,$id1 = null){
    // $query = $this->db->query("SELECT * from resep where id_bahan='".$id."'");
    // $row = $query->row();
    // $id_barang = $row->id_bahan;
    if ($id == "01") {
      $tepung = '2';
      $kanji = '2';
      $garam = '2';
      $cuka = '2';
      $caramel = '2';
      $sakarin = '2';
      $TM = '2';
      $gula_cair = '2';
      $potazium_sorbate = '2';
      $benzoat = '2';
      $hitung_tepung = $tepung * $jumlah;
      $hitung_kanji = $kanji * $jumlah;
      $hitung_garam = $garam * $jumlah;
      $hitung_cuka = $cuka * $jumlah;
      $hitung_caramel = $caramel * $jumlah;
      $hitung_sakarin = $sakarin * $jumlah;
      $hitung_TM = $TM * $jumlah;
      $hitung_gulacair = $gulacair * $jumlah;
      $hitung_potaziumsorbate = $potaziumsorbate * $jumlah;
      $hitung_benzoat = $benzoat * $jumlah;
      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='01'");
      $row = $query->row();
      $stok_tepung = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='02'");
      $row = $query->row();
      $stok_kanji = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='03'");
      $row = $query->row();
      $stok_garam = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='04'");
      $row = $query->row();
      $stok_cuka = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='05'");
      $row = $query->row();
      $stok_caramel = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='06'");
      $row = $query->row();
      $stok_sakarin = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='07'");
      $row = $query->row();
      $stok_TM = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='08'");
      $row = $query->row();
      $stok_gulacair = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='09'");
      $row = $query->row();
      $stok_potaziumsorbate = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='10'");
      $row = $query->row();
      $stok_benzoat = $row->jumlah;
      if ($stok_tepung >= $hitung_tepung && $stok_kanji >= $hitung_kanji && $stok_garam >= $hitung_garam && $stok_cuka >= $hitung_cuka && $stok_caramel >= $hitung_caramel && $stok_sakarin >= $hitung_sakarin && $stok_TM >= $hitung_TM && $stok_gulacair >= $hitung_gulacair && $stok_potaziumsorbate >= $hitung_potaziumsorbate && $stok_benzoat >= $hitung_benzoat) {
        $total_tepung = $stok_tepung - $hitung_tepung;
        $total_kanji = $stok_kanji - $hitung_kanji;
        $total_garam = $stok_garam - $hitung_garam;
        $total_cuka = $stok_cuka - $hitung_cuka;
        $total_caramel = $stok_caramel - $hitung_caramel;
        $total_sakarin = $stok_tepung - $hitung_sakarin;
        $total_TM = $stok_TM - $hitung_TM;
        $total_gulacair = $stok_gulacair - $hitung_gulacair;
        $total_potaziumsorbate = $stok_potaziumsorbate - $hitung_potaziumsorbate;
        $total_benzoat = $stok_benzoat - $hitung_benzoat;

        $query = $this->db->query("SELECT * from stok_barang where id_barang ='".$id."'");
        $row = $query->row();
        $jmlh = $row->jumlah;
        $total_barang = $jmlh + $jumlah;
        if (isset($id1)) {
          $query = $this->db->query("SELECT * from tb_data_pesanan where id_barang ='".$id."'");
          $row = $query->row();
          $jmlh_pesanan = $row->jumlah;

          if ($jmlh_pesanan >= $jmlh) {
            $stok = 0;
          }else {
            $stok = $jmlh - $jmlh_pesanan;
          }
          $data = array('status' => '1');
          $this->db->where('id_pesanan',$id1);
          $this->db->where('id_barang',$id);
          $this->db->update('tb_data_pesanan', $data);

          $data = array('jumlah' => $stok);
          $this->db->where('id_barang','01');
          $this->db->update('stok_barang', $data);
        }else {
          $data = array('jumlah' => $total_barang);
          $this->db->where('id_barang','01');
          $this->db->update('stok_barang', $data);
        }
        $data = array('jumlah' => $total_tepung);
        $this->db->where('id_bahan','01');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_kanji);
        $this->db->where('id_bahan','02');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_garam);
        $this->db->where('id_bahan','03');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_cuka);
        $this->db->where('id_bahan','04');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_caramel);
        $this->db->where('id_bahan','05');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_sakarin);
        $this->db->where('id_bahan','06');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_TM);
        $this->db->where('id_bahan','07');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_gulacair);
        $this->db->where('id_bahan','08');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_potaziumsorbate);
        $this->db->where('id_bahan','09');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_benzoat);
        $this->db->where('id_bahan','10');
        $this->db->update('stok_bahan', $data);
      }
    }

  }
  public function pesanan(){
    $query = $this->db->query("SELECT * from pesanan inner join customer using(id_cust) inner join user on pesanan.sales = user.id where pesanan.status='0' order by tanggal_input asc");
    return $query->result_array();
  }
  public function detail_pesanan($id){
    $query = $this->db->query("SELECT * from pesanan inner join customer using(id_cust) inner join user on pesanan.sales = user.id where id_pesanan='".$id."'");
    return $query->row_array();
  }
  public function brg_pesanan($id){
    $query = $this->db->query("SELECT * from tb_data_pesanan where id_pesanan='".$id."'");
    return $query->result_array();
  }
  public function proses($id,$id2){
    $query = $this->db->query("SELECT * from tb_data_pesanan where id_barang='".$id2."' and id_pesanan='".$id."'");
    return $query->row_array();
  }
  public function stok($id){
    $query = $this->db->query("SELECT * from stok_barang where id_barang='".$id."'");
    return $query->row_array();
  }
  public function pengantaran($id){
    $data = array('status' => '1');
    $this->db->where('id_pesanan', $id);
    $this->db->update('pesanan', $data);
  }

}
