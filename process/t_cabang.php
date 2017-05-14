<?php 
	session_start();
	include 'connect_db.php';
	// Memastikan Data Terkirim Melalui Form
	if (ISSET($_POST["cabang_klinik"])) {
		$cabang = $_POST["cabang_klinik"];
		// Mengecek apakah data sudah pernah terdaftar
		$query = 'SELECT COUNT(cabang_klinik) AS total FROM tb_klinik WHERE LOWER(cabang_klinik)=LOWER("'.$cabang.'")';
		if (mysqli_query($conn, $query)) {
			$query = mysqli_query($conn, $query);
			$data = mysqli_fetch_assoc($query);
			// Jika > 0 artinya sudah terdaftar
			if ($data['total'] > 0) {
		    	header('Location: ../tambah_cabang.php?balasan=1');
			} elseif ($data['total'] == 0) { // Jika == 0 artinya belum pernah terdaftar
				$query = "INSERT INTO tb_klinik (cabang_klinik) VALUES ('$cabang')";
				if (mysqli_query($conn, $query)) {
				    header('Location: ../mengelola_cabang.php?balasan=1');
				} else {
				    header('Location: ../mengelola_cabang.php?balasan=2');
				}
			}
		} else {
			header('Location: ../mengelola_cabang.php?balasan=2');
		}
	}	
?>