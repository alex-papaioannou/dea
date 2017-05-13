<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  	<div class="panel-heading">
					    	<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Mengelola Variabel</h3>
					  	</div>
					  	<div class="panel-body">
						  	<div class="col-sm-11 col-sm-offset-1">
						  		<legend>Daftar Variabel</legend>
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
											<th>Jenis</th>
											<th>Satuan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i=1;
											$query = mysqli_query($conn, "SELECT * FROM tb_variabel");
											if (mysqli_num_rows($query) > 0) {
											    // output data of each row
											    while($var = mysqli_fetch_assoc($query)) {
											    	// Query untuk mengkonversi id_klinik menjadi nama cabangnya
											    	if ($var['jenis_variabel'] == 'i') {
											    		$var['jenis_variabel'] = 'Input';
											    	} elseif ($var['jenis_variabel'] == 'o') {
											    		$var['jenis_variabel'] = 'Output';
											    	}

											        echo '
														<tr>
															<td>'.$i.'</td>
															<td>'.$var['nama_variabel'].'</td>
															<td>'.$var['jenis_variabel'].'</td>
															<td>'.$var['satuan'].'</td>
															<td>
																<a href="ubah_variabel.php?id='.$var['id_variabel'].'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
																<a href="process/hapus_variabel.php?id='.$var['id_variabel'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
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