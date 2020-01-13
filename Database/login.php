<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	require_once('Koneksi.php');

	//Mendapatkan Nilai Variable
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	// $username = "tes";
	// $password = md5("tes");
	//Pembuatan Syntax SQL
	// $sql = mysqli_query("SELECT * FROM user WHERE username=$username and password=$password");
	// $row = mysqli_fetch_array($query);
	$sql = "SELECT * FROM user WHERE username=$username and password=$password";
	// $response = mysqli_query($con, $sql);
	// $result = array();
	// $row = mysqli_result($result);
	// $data = $row[0];
	if (!empty($sql)) {
		echo 'Berhasil Login';
	} else {
		echo 'Gagal login';
	}
	mysqli_close($con);

	// if (mysqli_num_rows($response) == 1 ) {
	//
	// 	echo json_encode($data);
	// 	mysqli_close($con);
	// }else {
	//
	// }
}
?>
