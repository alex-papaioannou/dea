<?php 
	session_start();
	include 'connect_db.php';
	// Memastikan Data Terkirim Melalui Form
	if (ISSET($_POST["id_klinik"])) {
		$id_klinik = $_POST["id_klinik"];
		// Insert ke tb_dmu
		$query = "INSERT INTO tb_dmu (id_klinik) VALUES ('$id_klinik')";
		if (mysqli_query($conn, $query)) {
			$query1 = mysqli_query($conn, "SELECT * FROM tb_variabel");
			if (mysqli_num_rows($query1) > 0) {
				while ($var = mysqli_fetch_assoc($query1)) {
					$name = str_replace(' ','_',$var['nama_variabel']);
					$variabel = $_POST[$name];
					// Translate nama var -> id var
					$query2 = mysqli_query($conn, "SELECT * FROM tb_variabel WHERE nama_variabel='".$var['nama_variabel']."'");
					if (mysqli_num_rows($query2) > 0) {
						while ($idvar = mysqli_fetch_assoc($query2)) {
							$id_variabel = $idvar['id_variabel'];
						}
					} else {
						header('Location: ../mengelola_dmu.php?balasan=2');
					}
					// Insert ke tb_detail_dmu
					$query3 = mysqli_query($conn, "INSERT INTO tb_detail_dmu (id_klinik, id_variabel, nilai_variabel) VALUES ('$id_klinik','$id_variabel','$variabel')");
				}
			} else {
				header('Location: ../mengelola_dmu.php?balasan=2');
			}
		    header('Location: ../mengelola_dmu.php?balasan=1');
		} else {
			header('Location: ../mengelola_dmu.php?balasan=2');
		}
	} else {
		header('Location: ../mengelola_dmu.php?balasan=2');
	}
?>