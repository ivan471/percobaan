<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //mendapatkan nilai varieble
  $nama_customer = $_POST['customer'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  //pembuatan syntax SQL
  $sql = "INSERT INTO customer (nama_cust,alamat,telepon) VALUES ('$nama_customer','$alamat','$telepon')";

  //import File Koneksi Database
  require_once('Koneksi.php');

  //eksekusi query Database
  if (mysqli_query($con, $sql)) {
    echo ' Berhasil Menambahkan Customer';
  } else {
    echo 'Gagal Menambahkan Customer';
  }
  mysqli_close($con);
}
