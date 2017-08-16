<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  	<div class="panel-heading">
					  	<?php
					  		if ($level == 'a') {
						  		# Superadmin
						  		echo '<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Mengelola Admin Cabang</h3>';
						  	} elseif ($level == 'c') {
						  		# Admin Cabang
						  		echo '<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Mengelola Manajer Cabang</h3>';
						  	}
					  	?>
					  	</div>
					  	<div class="panel-body">
						  	<div class="col-sm-11 col-sm-offset-1">
						  	<?php 
						  		if ($level == 'a') {
						  			# Superadmin
						  			echo '<legend>Daftar Admin Cabang</legend>';
						  		} elseif ($level == 'c') {
						  			# Admin Cabang
						  			echo '<legend>Daftar Manajer Cabang</legend>';
						  			// Mendapatkan cabang klinik
								  	$q = mysqli_query($conn, 'SELECT * FROM pengguna WHERE id_pengguna="'.$id.'"');
								  	$d = mysqli_fetch_assoc($q);
								  	$cabang_klinik = $d['id_klinik'];
						  		}
						  			
						  		# Notifikasi
						  		if (ISSET($_GET['balasan']) AND ($_GET['balasan']==1)) {
						  			  echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> Data berhasil ditambahkan</div>';
						  		} elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==2)) {
						  			  echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-exclamation-sign"></span> Kesalahan telah terjadi</div>';
						  		} elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==3)) {
						  			  echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> Data berhasil dihapus</div>';
						  		} elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==4)) {
						  			  echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-exclamation-sign"></span> Gagal menghapus data</div>';
						  		} elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==5)) {
						  			  echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> Data berhasil diubah</div>';
						  		} elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==6)) {
						  			  echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-exclamation-sign"></span> Gagal mengubah data</div>';
						  		}

						  		# Menampilkan Data Tabel
								$i=1;
								if ($level == 'a') {
									# Login sebagai Superadmin
									$query = mysqli_query($conn, "SELECT * FROM pengguna AS p, klinik AS k WHERE p.id_klinik = k.id_klinik AND p.level = 'c' ORDER BY p.id_pengguna DESC");
								} else {
									# Login sebagai Admin Cabang
									$query = mysqli_query($conn, 'SELECT * FROM pengguna AS p, klinik AS k WHERE p.id_klinik = k.id_klinik AND p.level = "m" AND p.id_klinik = "'.$cabang_klinik.'" ORDER BY p.id_pengguna DESC');
								}
											
								if (mysqli_num_rows($query) > 0) {
									echo '
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
													<th>Username</th>
													<th>Cabang Klinik</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
									';
									while($pengguna = mysqli_fetch_assoc($query)) {
									// Query untuk mengkonversi id_klinik menjadi nama cabangnya
										echo '
											<tr>
												<td>'.$i.'</td>
												<td>'.$pengguna['nama'].'</td>
												<td>'.$pengguna['username'].'</td>
												<td>'.$pengguna['cabang_klinik'].'</td>
												<td>
													<a href="ubah_pengguna.php?type=ubah&id='.$pengguna['id_pengguna'].'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
													<a href="process/hapus_pengguna.php?id='.$pengguna['id_pengguna'].'" onclick="return hapus()" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
											       </td>
											</tr>
										';
										$i++;
									}
									echo '
											</tbody>
												</table>
									';
								} else {
									echo '
											<div class="alert alert-dismissible alert-warning">
		  										<button type="button" class="close" data-dismiss="alert">&times;</button>
		  										<Strong>Data masih kosong</strong>. Silahkan tambah data pengguna.
											</div>
									';
								} 
							?>
						  	</div>
					  	</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>