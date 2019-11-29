<?php
// Import file koneksi Database
require_once('Koneksi.php');
$id = $_GET['id'];
//membuat sql $query
$sql = "SELECT * FROM tb_data_pesanan where id_pesanan=$id";

//mendapatkan Berhasil
$r = mysqli_query($con, $sql);

//membuat array kosong
$result = array();

while ($row = mysqli_fetch_array($r)) {

  //memasukkan nama dan id kedalam array kosong yang telah dibuat
  array_push($result, array(
    "id_pesanan" => $row['id_pesanan'],
    "id_barang" => $row['id_barang'],
    "nama_brg" => $row['nama_barang'],
    "jumlah" => $row['jumlah'],
  ));
}
//menampilkan arrat dalam format Json
echo json_encode(array('result' => $result));
mysqli_close($con);
