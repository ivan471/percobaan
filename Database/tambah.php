<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //mendapatkan nilai varieble
  $customer = $_POST['id_customer'];
  $tanggal = $_POST['tanggal'];
  $jam = $_POST['jam'];
  $sales = $_POST['sales'];
  $status = "0";
  //pembuatan syntax SQL
  $sql = "INSERT INTO pesanan (id_cust,tanggal_pengantaran,jam,sales,status_pesanan) VALUES ('$customer','$tanggal','$jam','$sales','$status')";

  //import File Koneksi Database
  require_once('Koneksi.php');

  //eksekusi query Database
  if (mysqli_query($con, $sql)) {
    echo ' Berhasil Menambahkan Pesanan';
  } else {
    echo 'Gagal Menambahkan Pesanan';

  }
  mysqli_close($con);
}
