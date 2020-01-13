<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $id_barang = $_POST['id_barang'];
  $jumlah = $_POST['jumlah'];
  $nama_barang = $_POST['nama_brg'];
  $id_pesanan = $_POST['id_pesanan'];
  require_once('Koneksi.php');

  $sql = "SELECT * from tb_data_pesanan where id_pesanan = $id_pesanan and id_barang= $id_barang";
  //mendapatkan nilai varieble
  $rs = mysqli_query($con,$sql);
  if (mysqli_num_rows($rs) > 0) {
    while ($row = mysqli_fetch_assoc($rs)) {
      $jumlah_sebelum = $row['jumlah'];
    }
    $total= $jumlah_sebelum + $jumlah;
    echo $total;
    $sql = "UPDATE tb_data_pesanan SET jumlah = '$total' WHERE id_pesanan = $id_pesanan and id_barang= $id_barang;";

		//Meng-update Database
		if(mysqli_query($con,$sql)){
		echo 'Berhasil Update Data Pesanan';
		}else{
		echo 'Gagal Update Data Pesanan';
		}
  }else {
    //pembuatan syntax SQL
    $sql = "INSERT INTO tb_data_pesanan (id_pesanan,id_barang,nama_barang,jumlah) VALUES ('$id_pesanan','$id_barang','$nama_barang','$jumlah')";
    //eksekusi query Database
    if (mysqli_query($con, $sql)) {
      echo ' Berhasil';
    } else {
      echo 'Gagal';
    }

  }
  // if (isset($rs)) {
  //   $total= $jumlah_sebelum + $jumlah;
  //   echo $total;
  //   $sql = "UPDATE tb_data_pesanan SET jumlah = '$total' WHERE id_pesanan = $id_pesanan and id_barang= $id_barang;";
  //
	// 	//Meng-update Database
	// 	if(mysqli_query($con,$sql)){
	// 	echo 'Berhasil Update Data Pesanan';
	// 	}else{
	// 	echo 'Gagal Update Data Pesanan';
	// 	}
  // }else {
  //   //pembuatan syntax SQL
  //   $sql = "INSERT INTO tb_data_pesanan (id_pesanan,id_barang,nama_barang,jumlah) VALUES ('$id_pesanan','$id_barang','$nama_barang','$jumlah')";
  //   //eksekusi query Database
  //   if (mysqli_query($con, $sql)) {
  //     echo ' Berhasil';
  //   } else {
  //     echo 'Gagal';
  //   }
  //
  // }
  mysqli_close($con);
}
