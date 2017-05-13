<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  	<div class="panel-heading">
					    	<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Mengelola Pengguna</h3>
					  	</div>
					  	<div class="panel-body">
						  	<div class="col-sm-11 col-sm-offset-1">
						  		<legend>Daftar Pengguna</legend>
						  		<?php
						  			if (ISSET($_GET['balasan']) AND ($_GET['balasan']==1)) {
						  			  	echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> Data berhasil ditambahkan</div>';
						  			  } elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==2)) {
						  			  		echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-remove"></span> Kesalahan telah terjadi</div>';
						  			  } elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==3)) {
						  			  		echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> Data berhasil dihapus</div>';
						  			  } elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==4)) {
						  			  		echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-remove"></span> Gagal menghapus data</div>';
						  			  } elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==5)) {
						  			  		echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> Data berhasil diubah</div>';
						  			  } elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==6)) {
						  			  		echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-remove"></span> Gagal mengubah data</div>';
						  			  }
						  		?>
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
										<?php
											$i=1;
											$query = mysqli_query($conn, "SELECT * FROM tb_pengguna JOIN tb_klinik ON tb_pengguna.id_klinik = tb_klinik.id_klinik");
											if (mysqli_num_rows($query) > 0) {
											    // output data of each row
											    while($pengguna = mysqli_fetch_assoc($query)) {
											    	// Query untuk mengkonversi id_klinik menjadi nama cabangnya
											        echo '
														<tr>
															<td>'.$i.'</td>
															<td>'.$pengguna['nama'].'</td>
															<td>'.$pengguna['username'].'</td>
															<td>'.$pengguna['cabang_klinik'].'</td>
															<td>
																<a href="ubah_pengguna.php?id='.$pengguna['id_pengguna'].'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
																<a href="process/hapus_pengguna.php?id='.$pengguna['id_pengguna'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
											        		</td>
														</tr>
													';
													$i++;
											    }
											} 
										?>
									</tbody>
								</table>
						  	</div>
					  	</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>