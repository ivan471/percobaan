<?php
//mendapatkan nilai ID
$id = $_POST['id_pesanan'];
$id_brg = $_POST['id_barang'];

require_once('koneksi.php');
//membuat SQL Query
$sql = "DELETE FROM tb_data_pesanan WHERE id_pesanan= $id and id_barang= $id_brg;";

//menghapus nilai pada database
if(mysqli_query($con,$sql)){
	echo 'Berhasil Menghapus Data Barang Pesanan';
}else{
	echo 'Gagal Menghapus Data Barang Pesanan';
}

mysqli_close($con);
?>
