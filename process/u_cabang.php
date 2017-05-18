<?php
	include 'connect_db.php';
	if ((ISSET($_GET['id'])) AND (ISSET($_POST['cabang_klinik']))) {
		$id = $_GET['id'];
		$cabang = trim($_POST['cabang_klinik']);

		// Mengecek apakah data sudah pernah terdaftar
		$query = 'SELECT COUNT(cabang_klinik) AS total FROM tb_klinik WHERE LOWER(cabang_klinik)=LOWER("'.$cabang.'")';
		if (mysqli_query($conn, $query)) {
			$query = mysqli_query($conn, $query);
			$data = mysqli_fetch_assoc($query);
			// Jika > 0 artinya sudah terdaftar
			if ($data['total'] > 0) {
				// Ditemukan bahwa data telah terdaftar
				// Tapi dalam kondisi khusus jika batal ubah (data belum disentuh) tapi tetap klik simpan
				$query = 'SELECT COUNT(*) AS total FROM tb_klinik WHERE LOWER(cabang_klinik)=LOWER("'.$cabang.'") AND id_klinik="'.$id.'"';
				$query = mysqli_query($conn, $query);
				$d = mysqli_fetch_assoc($query);
				if ($d['total'] > 0) {
					// Maka tidak ada notifikasi karna data tidak berubah sama sekali
					header('Location: ../mengelola_cabang.php');
				} else {
					// Jika cabang a diubah menjadi cabang b, sedangkan cabang b sudah terdaftar
					header('Location: ../ubah_cabang.php?id='.$id.'&balasan=1');
				}
			} elseif ($data['total'] == 0) { // Jika == 0 artinya belum pernah terdaftar
				$query = 'UPDATE tb_klinik SET cabang_klinik="'.$cabang.'" WHERE id_klinik="'.$id.'"';
				if (mysqli_query($conn, $query)) {
				    header('Location: ../mengelola_cabang.php?balasan=5');
				} else {
				    header('Location: ../mengelola_cabang.php?balasan=6');
				}
			}
		} else {
			header('Location: ../mengelola_cabang.php?balasan=6');
		}
	}
?>