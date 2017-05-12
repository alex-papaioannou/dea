<?php
	include 'connect_db.php';
	$id = $_GET['id'];
	$nama = $_POST['nama_pengguna'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$id_klinik = $_POST['cabang_klinik'];
	$query = 'UPDATE tb_pengguna SET nama="'.$nama.'", username="'.$username.'", password="'.$password.'", id_klinik="'.$id_klinik.'", level="p" WHERE id_pengguna="'.$id.'"';
	if (mysqli_query($conn, $query)) {
	    header('Location: ../mengelola_pengguna.php?balasan=5');
	} else {
	    header('Location: ../mengelola_pengguna.php?balasan=6');
	}
?>