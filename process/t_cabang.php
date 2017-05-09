<?php 
	session_start();
	include 'connect_db.php';
	// Memastikan Data Terkirim Melalui Form
	if (ISSET($_POST["cabang_klinik"])) {
		$cabang = $_POST["cabang_klinik"];
	}
	$query = "INSERT INTO tb_klinik (cabang_klinik) VALUES ('$cabang')";
	if (mysqli_query($conn, $query)) {
	    header('Location: ../mengelola_cabang.php?balasan=1');
	} else {
	    header('Location: ../mengelola_cabang.php?balasan=2');
	}
?>