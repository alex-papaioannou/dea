<?php
	include 'connect_db.php';
	$id = $_GET['id'];
	$query = 'DELETE FROM klinik WHERE id_klinik='.$id.'';
	if (mysqli_query($conn, $query)) {
		$query = 'DELETE FROM detail_dmu WHERE id_klinik='.$id.'';
		if (mysqli_query($conn, $query)) {
			$query = 'DELETE FROM pengguna WHERE id_klinik='.$id.'';
			if (mysqli_query($conn, $query)) {
				$query = 'DELETE FROM perhitungan_efisiensi WHERE id_klinik='.$id.'';
				if (mysqli_query($conn, $query)) {
					header('Location: ../mengelola_cabang.php?balasan=3');
				} else {
					header('Location: ../mengelola_cabang.php?balasan=4');
				}
			} else {
			    header('Location: ../mengelola_cabang.php?balasan=4');
			}
		} else {
		    header('Location: ../mengelola_cabang.php?balasan=4');
		}
	} else {
	    header('Location: ../mengelola_cabang.php?balasan=4');
	}
?>