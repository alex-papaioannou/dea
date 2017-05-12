<?php 
	session_start();
	include 'connect_db.php';
	// Memastikan Data Terkirim Melalui Form
	if (ISSET($_POST["nama_pengguna"])) {
		$nama = $_POST["nama_pengguna"];
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		$cabang = $_POST["cabang_klinik"];
	}
	$query = "INSERT INTO tb_pengguna (nama, username, password, id_klinik, level) VALUES ('$nama','$username','$password','$cabang','p')";
	if (mysqli_query($conn, $query)) {
	    header('Location: ../mengelola_pengguna.php?balasan=1');
	} else {
	    header('Location: ../mengelola_pengguna.php?balasan=2');
	}
?>