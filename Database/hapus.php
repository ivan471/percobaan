<?php
//mendapatkan nilai ID
$id = $_GET['id'];
require_once('koneksi.php');
//membuat SQL Query
$sql = "DELETE FROM pesanan  WHERE id_pesanan=$id;";

//menghapus nilai pada database
if(mysqli_query($con,$sql)){
	echo 'Berhasil Menghapus Pesanan';
}else{
	echo 'Gagal Menghapus Pesanan';
}

mysqli_close($con);

?>
