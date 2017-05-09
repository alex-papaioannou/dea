<?php
	include 'connect_db.php';
	$id = $_GET['id'];
	$cabang = $_POST['cabang_klinik'];
	$query = 'UPDATE tb_klinik SET cabang_klinik="'.$cabang.'" WHERE id_klinik="'.$id.'"';
	if (mysqli_query($conn, $query)) {
	    header('Location: ../mengelola_cabang.php?balasan=5');
	} else {
	    header('Location: ../mengelola_cabang.php?balasan=6');
	}
?>