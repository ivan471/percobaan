<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //mendapatkan nilai varieble
  $customer = $_POST['customer'];
  $tanggal = $_POST['tanggal'];
  $jam = $_POST['jam'];
  $status = "0";
  //pembuatan syntax SQL
  $sql = "INSERT INTO pesanan (customer,tanggal,jam) VALUES ('$customer','$tanggal','$jam')";

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
