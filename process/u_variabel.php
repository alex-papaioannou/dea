<?php
	include 'connect_db.php';
	$id = $_GET['id'];
	$nama = $_POST["nama_variabel"];
	$jenis = $_POST["jenis_variabel"];
	$satuan = $_POST["satuan_variabel"];
	$query = 'UPDATE tb_variabel SET nama_variabel="'.$nama.'", jenis_variabel="'.$jenis.'", satuan="'.$satuan.'" WHERE id_variabel="'.$id.'"';
	if (mysqli_query($conn, $query)) {
	    header('Location: ../mengelola_variabel.php?balasan=5');
	} else {
	    header('Location: ../mengelola_variabel.php?balasan=6');
	}
?>