<?php 
	session_start();
	include 'connect_db.php';
	// Memastikan Data Terkirim Melalui Form
	if (ISSET($_POST["nama_variabel"])) {
		$nama = $_POST["nama_variabel"];
		$jenis = $_POST["jenis_variabel"];
		$satuan = $_POST["satuan_variabel"];
		
		// Mengecek apakah data sudah pernah terdaftar
		$query = 'SELECT COUNT(nama_variabel) AS total FROM tb_variabel WHERE LOWER(nama_variabel)=LOWER("'.$nama.'")';
		if (mysqli_query($conn, $query)) {
			$query = mysqli_query($conn, $query);
			$data = mysqli_fetch_assoc($query);
			// Jika username > 0 artinya sudah terdaftar
			if ($data['total'] > 0) {
		    	header('Location: ../tambah_variabel.php?balasan=1');
			} elseif ($data['total'] == 0) { // Jika == 0 artinya belum pernah terdaftar
				$query = "INSERT INTO tb_variabel (nama_variabel, jenis_variabel, satuan) VALUES ('$nama','$jenis','$satuan')";
				if (mysqli_query($conn, $query)) {
				    header('Location: ../mengelola_variabel.php?balasan=1');
				} else {
				    header('Location: ../mengelola_variabel.php?balasan=2');
				}
			}
		} else {
			header('Location: ../mengelola_variabel.php?balasan=2');
		}
	}
?>