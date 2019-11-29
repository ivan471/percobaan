<?php

//mendefinisikan konstanta
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','skripsi');

//membuat koneksi dengan SQLiteDatabase
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>
