<?php
// Import file koneksi Database
require_once('Koneksi.php');

//membuat sql $query
$sql = "SELECT id_pesanan FROM pesanan order by id_pesanan desc limit 1";

//mendapatkan Berhasil
$r = mysqli_query($con, $sql);
//membuat array kosong
$result = array();
while ($row = mysqli_fetch_array($r)) {
    //memasukkan id kedalam array kosong yang telah dibuat
    array_push($result, array(
        "id_pesanan" => $row['id_pesanan'] + 1,
    ));
}
//menampilkan arrat dalam format Json
echo json_encode(array('result' => $result));
mysqli_close($con);
