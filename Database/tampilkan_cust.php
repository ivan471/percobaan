<?php
// Import file koneksi Database
require_once('Koneksi.php');

//membuat sql $query
$sql = "SELECT * FROM customer";

//mendapatkan Berhasil
$r = mysqli_query($con,$sql);

//membuat array kosong
$result = array();

while($row = mysqli_fetch_array($r)){

  //memasukkan nama dan id kedalam array kosong yang telah dibuat
  array_push($result,array(
    "id_cust"=>$row['id_cust'],
    "nama_cust"=>$row['nama_cust'],
  ));
}
//menampilkan arrat dalam format Json
echo json_encode(array('result'=>$result));
mysqli_close($con);
?>
