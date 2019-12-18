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
    if ($id == "01" || $id == "02" || $id == "10") {
      $tepung = '10';
      $kanji = '20';
      $garam = '30';
      $cuka = '30';
      $caramel = '10';
      $sakarin = '20';
      $TM = '22';
      $gula_cair = '25';
      $potazium_sorbate = '20';
      $benzoat = '20';
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
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }else {
          $data = array('jumlah' => $total_barang);
          $this->db->where('id_barang',$id);
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
    else if ($id == "15" || $id == "16") {
      $tepung = '50';
      $kanji = '100';
      $garam = '150';
      $cuka = '150';
      $caramel = '50';
      $sakarin = '100';
      $TM = '110';
      $gula_cair = '125';
      $potazium_sorbate = '100';
      $benzoat = '100';
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
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }else {
          $data = array('jumlah' => $total_barang);
          $this->db->where('id_barang',$id);
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
    else if ($id == "20") {
      $tepung = '200';
      $kanji = '400';
      $garam = '600';
      $cuka = '600';
      $caramel = '200';
      $sakarin = '400';
      $TM = '440';
      $gula_cair = '550';
      $potazium_sorbate = '400';
      $benzoat = '400';
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
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }else {
          $data = array('jumlah' => $total_barang);
          $this->db->where('id_barang',$id);
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
    else if ($id == "09" || $id == "06" || $id == "05") {
      $tepung = '20';
      $garam = '60';
      $cuka = '60';
      $sakarin = '40';
      $citrit = '40';
      $gula_cair = '100';
      $capsio = '40';
      $benzoat = '40';
      $pasta_cabe = '30';
      $hanoman = '30';
      $bawang = '20';
      $sunset_yellow = '20';
      $ponceau = '20';
      $tartrazine = '20';
      $lombok_biji = '20';
      $hitung_tepung = $tepung * $jumlah;
      $hitung_garam = $garam * $jumlah;
      $hitung_cuka = $cuka * $jumlah;
      $hitung_sakarin = $sakarin * $jumlah;
      $hitung_citrit = $citrit * $jumlah;
      $hitung_gulacair = $gulacair * $jumlah;
      $hitung_capsio = $capsio * $jumlah;
      $hitung_benzoat = $benzoat * $jumlah;
      $hitung_pasta_cabe = $pasta_cabe * $jumlah;
      $hitung_hanoman = $hanoman * $jumlah;
      $hitung_bawang = $bawang * $jumlah;
      $hitung_sunset_yellow = $sunset_yellow * $jumlah;
      $hitung_ponceau = $ponceau * $jumlah;
      $hitung_tartrazine = $tartrazine * $jumlah;
      $hitung_lombak_biji = $lombok_biji * $jumlah;
      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='01'");
      $row = $query->row();
      $stok_tepung = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='03'");
      $row = $query->row();
      $stok_garam = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='04'");
      $row = $query->row();
      $stok_cuka = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='06'");
      $row = $query->row();
      $stok_sakarin = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='11'");
      $row = $query->row();
      $stok_citrit = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='08'");
      $row = $query->row();
      $stok_gulacair = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='13'");
      $row = $query->row();
      $stok_capsio = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='10'");
      $row = $query->row();
      $stok_benzoat = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='12'");
      $row = $query->row();
      $stok_pasta_cabe = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='14'");
      $row = $query->row();
      $stok_hanoman = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='15'");
      $row = $query->row();
      $stok_bawang = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='16'");
      $row = $query->row();
      $stok_sunset_yellow = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='17'");
      $row = $query->row();
      $stok_ponceau = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='18'");
      $row = $query->row();
      $stok_tartrazine = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='22'");
      $row = $query->row();
      $stok_lombok_biji = $row->jumlah;

      if ($stok_tepung >= $hitung_tepung && $stok_garam >= $hitung_garam && $stok_cuka >= $hitung_cuka && $stok_sakarin >= $hitung_sakarin && $stok_citrit >= $hitung_citrit && $stok_gulacair >= $hitung_gulacair && $stok_capsio >= $hitung_capsio && $stok_benzoat >= $hitung_benzoat && $stok_pasta_cabe >= $hitung_pasta_cabe && $stok_hanoman >= $hitung_hanoman && $stok_bawang >= $hitung_bawang && $stok_sunset_yellow >= $hitung_sunset_yellow && $stok_ponceau >= $hitung_ponceau && $stok_tartrazine >= $hitung_tartrazine && $stok_garam >= $hitung_garam) {
        $total_tepung = $stok_tepung - $hitung_tepung;
        $total_garam = $stok_garam - $hitung_garam;
        $total_cuka = $stok_cuka - $hitung_cuka;
        $total_sakarin = $stok_tepung - $hitung_sakarin;
        $total_citrit = $stok_citrit - $hitung_citrit;
        $total_gulacair = $stok_gulacair - $hitung_gulacair;
        $total_capsio = $stok_capsio - $hitung_capsio;
        $total_benzoat = $stok_benzoat - $hitung_benzoat;
        $total_pasta_cabe = $stok_pasta_cabe - $hitung_pasta_cabe;
        $total_hanoman = $stok_hanoman - $hitung_hanoman;
        $total_bawang = $stok_bawang - $hitung_bawang;
        $total_sunset_yellow = $stok_sunset_yellow - $hitung_sunset_yellow;
        $total_ponceau = $stok_sunset_ponceau - $hitung_ponceau;
        $total_tartrazine = $stok_tartrazine - $tartrazine;
        $total_lombok_biji = $stok_lombok_biji - $lombok_biji;

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
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }else {
          $data = array('jumlah' => $total_barang);
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }
        $data = array('jumlah' => $total_tepung);
        $this->db->where('id_bahan','01');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_garam);
        $this->db->where('id_bahan','03');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_cuka);
        $this->db->where('id_bahan','04');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_sakarin);
        $this->db->where('id_bahan','06');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_citrit);
        $this->db->where('id_bahan','11');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_gulacair);
        $this->db->where('id_bahan','08');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_capsio);
        $this->db->where('id_bahan','13');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_benzoat);
        $this->db->where('id_bahan','10');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_pasta_cabe);
        $this->db->where('id_bahan','12');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_hanoman);
        $this->db->where('id_bahan','14');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_hanoman);
        $this->db->where('id_bahan','14');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_bawang);
        $this->db->where('id_bahan','15');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_sunset_yellow);
        $this->db->where('id_bahan','16');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_ponceau);
        $this->db->where('id_bahan','17');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_tartrazine);
        $this->db->where('id_bahan','18');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_lombok_biji);
        $this->db->where('id_bahan','22');
        $this->db->update('stok_bahan', $data);
      }
    }
    else if ($id == "14") {
      $tepung = '1200';
      $garam = '300';
      $cuka = '300';
      $sakarin = '200';
      $citrit = '200';
      $gula_cair = '500';
      $capsio = '200';
      $benzoat = '200';
      $pasta_cabe = '150';
      $hanoman = '150';
      $bawang = '100';
      $sunset_yellow = '100';
      $ponceau = '100';
      $tartrazine = '100';
      $lombok_biji = '100';
      $hitung_tepung = $tepung * $jumlah;
      $hitung_garam = $garam * $jumlah;
      $hitung_cuka = $cuka * $jumlah;
      $hitung_sakarin = $sakarin * $jumlah;
      $hitung_citrit = $citrit * $jumlah;
      $hitung_gulacair = $gulacair * $jumlah;
      $hitung_capsio = $capsio * $jumlah;
      $hitung_benzoat = $benzoat * $jumlah;
      $hitung_pasta_cabe = $pasta_cabe * $jumlah;
      $hitung_hanoman = $hanoman * $jumlah;
      $hitung_bawang = $bawang * $jumlah;
      $hitung_sunset_yellow = $sunset_yellow * $jumlah;
      $hitung_ponceau = $ponceau * $jumlah;
      $hitung_tartrazine = $tartrazine * $jumlah;
      $hitung_lombak_biji = $lombok_biji * $jumlah;
      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='01'");
      $row = $query->row();
      $stok_tepung = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='03'");
      $row = $query->row();
      $stok_garam = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='04'");
      $row = $query->row();
      $stok_cuka = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='06'");
      $row = $query->row();
      $stok_sakarin = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='11'");
      $row = $query->row();
      $stok_citrit = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='08'");
      $row = $query->row();
      $stok_gulacair = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='13'");
      $row = $query->row();
      $stok_capsio = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='10'");
      $row = $query->row();
      $stok_benzoat = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='12'");
      $row = $query->row();
      $stok_pasta_cabe = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='14'");
      $row = $query->row();
      $stok_hanoman = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='15'");
      $row = $query->row();
      $stok_bawang = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='16'");
      $row = $query->row();
      $stok_sunset_yellow = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='17'");
      $row = $query->row();
      $stok_ponceau = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='18'");
      $row = $query->row();
      $stok_tartrazine = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='22'");
      $row = $query->row();
      $stok_lombok_biji = $row->jumlah;

      if ($stok_tepung >= $hitung_tepung && $stok_garam >= $hitung_garam && $stok_cuka >= $hitung_cuka && $stok_sakarin >= $hitung_sakarin && $stok_citrit >= $hitung_citrit && $stok_gulacair >= $hitung_gulacair && $stok_capsio >= $hitung_capsio && $stok_benzoat >= $hitung_benzoat && $stok_pasta_cabe >= $hitung_pasta_cabe && $stok_hanoman >= $hitung_hanoman && $stok_bawang >= $hitung_bawang && $stok_sunset_yellow >= $hitung_sunset_yellow && $stok_ponceau >= $hitung_ponceau && $stok_tartrazine >= $hitung_tartrazine && $stok_garam >= $hitung_garam) {
        $total_tepung = $stok_tepung - $hitung_tepung;
        $total_garam = $stok_garam - $hitung_garam;
        $total_cuka = $stok_cuka - $hitung_cuka;
        $total_sakarin = $stok_tepung - $hitung_sakarin;
        $total_citrit = $stok_citrit - $hitung_citrit;
        $total_gulacair = $stok_gulacair - $hitung_gulacair;
        $total_capsio = $stok_capsio - $hitung_capsio;
        $total_benzoat = $stok_benzoat - $hitung_benzoat;
        $total_pasta_cabe = $stok_pasta_cabe - $hitung_pasta_cabe;
        $total_hanoman = $stok_hanoman - $hitung_hanoman;
        $total_bawang = $stok_bawang - $hitung_bawang;
        $total_sunset_yellow = $stok_sunset_yellow - $hitung_sunset_yellow;
        $total_ponceau = $stok_sunset_ponceau - $hitung_ponceau;
        $total_tartrazine = $stok_tartrazine - $tartrazine;
        $total_lombok_biji = $stok_lombok_biji - $lombok_biji;

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
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }else {
          $data = array('jumlah' => $total_barang);
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }
        $data = array('jumlah' => $total_tepung);
        $this->db->where('id_bahan','01');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_garam);
        $this->db->where('id_bahan','03');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_cuka);
        $this->db->where('id_bahan','04');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_sakarin);
        $this->db->where('id_bahan','06');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_citrit);
        $this->db->where('id_bahan','11');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_gulacair);
        $this->db->where('id_bahan','08');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_capsio);
        $this->db->where('id_bahan','13');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_benzoat);
        $this->db->where('id_bahan','10');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_pasta_cabe);
        $this->db->where('id_bahan','12');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_hanoman);
        $this->db->where('id_bahan','14');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_hanoman);
        $this->db->where('id_bahan','14');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_bawang);
        $this->db->where('id_bahan','15');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_sunset_yellow);
        $this->db->where('id_bahan','16');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_ponceau);
        $this->db->where('id_bahan','17');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_tartrazine);
        $this->db->where('id_bahan','18');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_lombok_biji);
        $this->db->where('id_bahan','22');
        $this->db->update('stok_bahan', $data);
      }
    }
    else if ($id == "19") {
      $tepung = '400';
      $garam = '1200';
      $cuka = '1200';
      $sakarin = '800';
      $citrit = '800';
      $gula_cair = '2000';
      $capsio = '800';
      $benzoat = '800';
      $pasta_cabe = '600';
      $hanoman = '600';
      $bawang = '400';
      $sunset_yellow = '400';
      $ponceau = '400';
      $tartrazine = '400';
      $lombok_biji = '400';
      $hitung_tepung = $tepung * $jumlah;
      $hitung_garam = $garam * $jumlah;
      $hitung_cuka = $cuka * $jumlah;
      $hitung_sakarin = $sakarin * $jumlah;
      $hitung_citrit = $citrit * $jumlah;
      $hitung_gulacair = $gulacair * $jumlah;
      $hitung_capsio = $capsio * $jumlah;
      $hitung_benzoat = $benzoat * $jumlah;
      $hitung_pasta_cabe = $pasta_cabe * $jumlah;
      $hitung_hanoman = $hanoman * $jumlah;
      $hitung_bawang = $bawang * $jumlah;
      $hitung_sunset_yellow = $sunset_yellow * $jumlah;
      $hitung_ponceau = $ponceau * $jumlah;
      $hitung_tartrazine = $tartrazine * $jumlah;
      $hitung_lombak_biji = $lombok_biji * $jumlah;
      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='01'");
      $row = $query->row();
      $stok_tepung = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='03'");
      $row = $query->row();
      $stok_garam = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='04'");
      $row = $query->row();
      $stok_cuka = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='06'");
      $row = $query->row();
      $stok_sakarin = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='11'");
      $row = $query->row();
      $stok_citrit = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='08'");
      $row = $query->row();
      $stok_gulacair = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='13'");
      $row = $query->row();
      $stok_capsio = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='10'");
      $row = $query->row();
      $stok_benzoat = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='12'");
      $row = $query->row();
      $stok_pasta_cabe = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='14'");
      $row = $query->row();
      $stok_hanoman = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='15'");
      $row = $query->row();
      $stok_bawang = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='16'");
      $row = $query->row();
      $stok_sunset_yellow = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='17'");
      $row = $query->row();
      $stok_ponceau = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='18'");
      $row = $query->row();
      $stok_tartrazine = $row->jumlah;

      $query = $this->db->query("SELECT * from stok_bahan where id_bahan ='22'");
      $row = $query->row();
      $stok_lombok_biji = $row->jumlah;

      if ($stok_tepung >= $hitung_tepung && $stok_garam >= $hitung_garam && $stok_cuka >= $hitung_cuka && $stok_sakarin >= $hitung_sakarin && $stok_citrit >= $hitung_citrit && $stok_gulacair >= $hitung_gulacair && $stok_capsio >= $hitung_capsio && $stok_benzoat >= $hitung_benzoat && $stok_pasta_cabe >= $hitung_pasta_cabe && $stok_hanoman >= $hitung_hanoman && $stok_bawang >= $hitung_bawang && $stok_sunset_yellow >= $hitung_sunset_yellow && $stok_ponceau >= $hitung_ponceau && $stok_tartrazine >= $hitung_tartrazine && $stok_garam >= $hitung_garam) {
        $total_tepung = $stok_tepung - $hitung_tepung;
        $total_garam = $stok_garam - $hitung_garam;
        $total_cuka = $stok_cuka - $hitung_cuka;
        $total_sakarin = $stok_tepung - $hitung_sakarin;
        $total_citrit = $stok_citrit - $hitung_citrit;
        $total_gulacair = $stok_gulacair - $hitung_gulacair;
        $total_capsio = $stok_capsio - $hitung_capsio;
        $total_benzoat = $stok_benzoat - $hitung_benzoat;
        $total_pasta_cabe = $stok_pasta_cabe - $hitung_pasta_cabe;
        $total_hanoman = $stok_hanoman - $hitung_hanoman;
        $total_bawang = $stok_bawang - $hitung_bawang;
        $total_sunset_yellow = $stok_sunset_yellow - $hitung_sunset_yellow;
        $total_ponceau = $stok_sunset_ponceau - $hitung_ponceau;
        $total_tartrazine = $stok_tartrazine - $tartrazine;
        $total_lombok_biji = $stok_lombok_biji - $lombok_biji;

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
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }else {
          $data = array('jumlah' => $total_barang);
          $this->db->where('id_barang',$id);
          $this->db->update('stok_barang', $data);
        }
        $data = array('jumlah' => $total_tepung);
        $this->db->where('id_bahan','01');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_garam);
        $this->db->where('id_bahan','03');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_cuka);
        $this->db->where('id_bahan','04');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_sakarin);
        $this->db->where('id_bahan','06');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_citrit);
        $this->db->where('id_bahan','11');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_gulacair);
        $this->db->where('id_bahan','08');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_capsio);
        $this->db->where('id_bahan','13');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_benzoat);
        $this->db->where('id_bahan','10');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_pasta_cabe);
        $this->db->where('id_bahan','12');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_hanoman);
        $this->db->where('id_bahan','14');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_hanoman);
        $this->db->where('id_bahan','14');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_bawang);
        $this->db->where('id_bahan','15');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_sunset_yellow);
        $this->db->where('id_bahan','16');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_ponceau);
        $this->db->where('id_bahan','17');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_tartrazine);
        $this->db->where('id_bahan','18');
        $this->db->update('stok_bahan', $data);

        $data = array('jumlah' => $total_lombok_biji);
        $this->db->where('id_bahan','22');
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
