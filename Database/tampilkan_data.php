<?php
// Import file koneksi Database
require_once('Koneksi.php');
$id_user =  $_GET['id'];
//where sales = $id_user
//membuat sql $query
$sql = "SELECT * FROM pesanan inner join customer using(id_cust) where sales='".$id_user."'";
//echo $id_user;
//mendapatkan Berhasil
$r = mysqli_query($con,$sql);

//membuat array kosong
$result = array();

while($row = mysqli_fetch_array($r)){

  //memasukkan nama dan id kedalam array kosong yang telah dibuat
  array_push($result,array(
    "id_pesanan"=>$row['id_pesanan'],
    "nama_cust"=>$row['nama_cust'],
    "status"=>$row['status_pesanan'],
    "tanggal"=>$row['tanggal_pengantaran'],
    "jam"=>$row['jam'],
  ));
}
//menampilkan arrat dalam format Json
echo json_encode(array('result'=>$result));
mysqli_close($con);
?>
