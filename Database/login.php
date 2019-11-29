<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('Koneksi.php');

		//Mendapatkan Nilai Variable
		$username = $_POST['username'];
		$password = $_POST['password'];
		// $username = 'tes';
		// $password = 'tes';
		//Pembuatan Syntax SQL
		$sql = "SELECT * FROM user WHERE username=$username and password=$password";

		// $query = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");

		// $row = mysql_fetch_array($query);

	  //eksekusi query Database
		if (!empty($sql)) {
	    echo 'Berhasil Login';
	  } else {
	    echo 'Gagal login';
	  }
	  mysqli_close($con);
	}
?>
