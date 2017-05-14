<?php
	include 'connect_db.php';
	if ((ISSET($_GET['id'])) AND ($_POST['username'])) {
		$id = $_GET['id'];
		$nama = $_POST['nama_pengguna'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$id_klinik = $_POST['cabang_klinik'];

		// Mengecek apakah data sudah pernah terdaftar
		$query = 'SELECT COUNT(username) AS total FROM tb_pengguna WHERE LOWER(username)=LOWER("'.$username.'")';
		if (mysqli_query($conn, $query)) {
			$query = mysqli_query($conn, $query);
			$data = mysqli_fetch_assoc($query);
			// Jika > 0 artinya sudah terdaftar
			if ($data['total'] > 0) {
				// Ditemukan bahwa data telah terdaftar
				// Tapi dalam kondisi khusus jika batal ubah (data belum disentuh) tapi tetap klik simpan
				$query = 'SELECT COUNT(*) AS total FROM tb_pengguna WHERE LOWER(username)=LOWER("'.$username.'") AND id_pengguna="'.$id.'"';
				$query = mysqli_query($conn, $query);
				$d = mysqli_fetch_assoc($query);
				if ($d['total'] > 0) {
					// Maka tidak ada notifikasi karna data tidak berubah sama sekali
					header('Location: ../mengelola_pengguna.php');
				} else {
					// Jika cabang a diubah menjadi cabang b, sedangkan cabang b sudah terdaftar
					header('Location: ../ubah_pengguna.php?id='.$id.'&balasan=1');
				}
			} elseif ($data['total'] == 0) { // Jika == 0 artinya belum pernah terdaftar
				$query = 'UPDATE tb_pengguna SET nama="'.$nama.'", username="'.$username.'", password="'.$password.'", id_klinik="'.$id_klinik.'", level="p" WHERE id_pengguna="'.$id.'"';
				if (mysqli_query($conn, $query)) {
				    header('Location: ../mengelola_pengguna.php?balasan=5');
				} else {
				    header('Location: ../mengelola_pengguna.php?balasan=6');
				}
			}
		} else {
			header('Location: ../mengelola_cabang.php?balasan=6');
		}
	}
?>