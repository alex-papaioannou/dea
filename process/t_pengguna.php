<?php 
	session_start();
	include 'connect_db.php';
	// Memastikan Data Terkirim Melalui Form
	if (ISSET($_POST["nama_pengguna"])) {
		$nama = trim($_POST["nama_pengguna"]);
		$username = str_replace(" ","",$_POST["username"]);
		$password = md5(trim($_POST["password"]));
		$cabang = $_POST["cabang_klinik"];
		// Mengecek apakah data sudah pernah terdaftar
		$query = 'SELECT COUNT(username) AS total FROM tb_pengguna WHERE LOWER(username)=LOWER("'.$username.'")';
		if (mysqli_query($conn, $query)) {
			$query = mysqli_query($conn, $query);
			$data = mysqli_fetch_assoc($query);
			// Jika username > 0 artinya sudah terdaftar
			if ($data['total'] > 0) {
		    	header('Location: ../tambah_pengguna.php?balasan=1');
			} elseif ($data['total'] == 0) { // Jika == 0 artinya belum pernah terdaftar
				$query = "INSERT INTO tb_pengguna (nama, username, password, id_klinik, level) VALUES ('$nama','$username','$password','$cabang','p')";
				if (mysqli_query($conn, $query)) {
				    header('Location: ../mengelola_pengguna.php?balasan=1');
				} else {
				    header('Location: ../mengelola_pengguna.php?balasan=2');
				}
			}
		} else {
			header('Location: ../mengelola_pengguna.php?balasan=2');
		}	
	}
?>