<?php 
	session_start();
	include 'connect_db.php';
	// Memastikan Data Terkirim Melalui Form
	if (ISSET($_POST["nama_variabel"])) {
		$nama = $_POST["nama_variabel"];
		$jenis = $_POST["jenis_variabel"];
		$satuan = $_POST["satuan_variabel"];
	}
	$query = "INSERT INTO tb_variabel (nama_variabel, jenis_variabel, satuan) VALUES ('$nama','$jenis','$satuan')";
	if (mysqli_query($conn, $query)) {
	    header('Location: ../mengelola_variabel.php?balasan=1');
	} else {
	    header('Location: ../mengelola_variabel.php?balasan=2');
	}
?>