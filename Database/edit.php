<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//MEndapatkan Nilai Dari Variable
		$id = $_POST['id_pesanan'];
		$tgl = $_POST['tanggal'];
		$jam = $_POST['jam'];

		//import file koneksi database
		require_once('koneksi.php');

		//Membuat SQL Query
		$sql = "UPDATE pesanan SET tanggal = '$tgl', jam = '$jam' WHERE id_pesanan = $id;";

		//Meng-update Database
		if(mysqli_query($con,$sql)){
		echo 'Berhasil Update Data Pesanan';
		}else{
		echo 'Gagal Update Data Pesanan';
		}

		mysqli_close($con);
	}
?>
