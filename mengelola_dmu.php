<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  	<div class="panel-heading">
					    	<h3 class="panel-title"><span class="glyphicon glyphicon-tower"></span> Mengelola DMU</h3>
					  	</div>
					  	<div class="panel-body">
						  	<div class="col-sm-12">
						  		<legend>Daftar DMU</legend>
						  		<?php
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
						  			
						  			// Menghitung jumlah var input dan output
									$query = mysqli_query($conn, "SELECT * FROM tb_variabel ORDER BY jenis_variabel ASC, id_variabel ASC");
									$list_var = '';
									$input = 0;
									$output = 0;
									if (mysqli_num_rows($query) > 0) {
										// output data of each row
										while($var = mysqli_fetch_assoc($query)) {
											if ($var['jenis_variabel'] == 'i') {
												$input++;
											} else {
												$output++;
											}
											$nama = str_replace('_',' ',$var['nama_variabel']);
											$list_var .= "<th>$nama</th>";
										}
									}

									# Menampilkan Data Tabel
									$i = 1;
									$query = mysqli_query($conn, 'SELECT k.cabang_klinik, d.id_klinik FROM tb_klinik AS k, tb_detail_dmu AS d WHERE k.id_klinik=d.id_klinik AND d.id_klinik="'.$_SESSION['id_klinik'].'" GROUP BY id_klinik ORDER BY id_detail_dmu');
									if (mysqli_num_rows($query) > 0) {
										echo '
											<table class="table table-bordered table-hover">
												<thead>
													<tr>
														<th rowspan="2">No</th>
														<th rowspan="2">DMU</th>
														<th colspan="'.$input.'">Input</th>
														<th colspan="'.$output.'">Output</th>
														<th rowspan="2">Aksi</th>
													</tr>
													<tr>
														'.$list_var.'
													</tr>
												</thead>
												<tbody>
										';
										while ($cabang = mysqli_fetch_assoc($query)) {
											echo '
												<tr>
													<td>'.$i.'</td>
													<td>'.$cabang["cabang_klinik"].'</td>
											';
											$id_klinik = $cabang['id_klinik'];

											// Variabel Input
											$query_input = mysqli_query($conn, 'SELECT d.nilai_variabel FROM tb_detail_dmu AS d, tb_variabel AS v WHERE d.id_variabel=v.id_variabel AND id_klinik='.$id_klinik.' AND v.jenis_variabel="i" ORDER BY v.jenis_variabel ASC, d.id_variabel');
											$count = 0;
											if (mysqli_num_rows($query_input)) {
												while ($nilai_var = mysqli_fetch_assoc($query_input)) {
													echo '<td>'.$nilai_var["nilai_variabel"].'</td>';
													$count++;
												}
											}
											if ($count < $input) {
												for ($k=$count; $k < $input; $k++) { 
													echo '<td></td>';
												}
											}

											// Variabel Output
											$query_output = mysqli_query($conn, 'SELECT d.nilai_variabel FROM tb_detail_dmu AS d, tb_variabel AS v WHERE d.id_variabel=v.id_variabel AND id_klinik='.$id_klinik.' AND v.jenis_variabel="o" ORDER BY v.jenis_variabel ASC, d.id_variabel');
											$count = 0;
											if (mysqli_num_rows($query_output)) {
												while ($nilai_var = mysqli_fetch_assoc($query_output)) {
													echo '<td>'.$nilai_var["nilai_variabel"].'</td>';
													$count++;
												}
											}
											if ($count < $output) {
												for ($j=$count; $j < $output; $j++) { 
													echo '<td></td>';
												}
											}

											echo '
													<td>
														<a href="ubah_dmu.php?id='.$id_klinik.'" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
														<a href="process/hapus_dmu.php?id='.$id_klinik.'" onclick="return hapus()" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
											        </td>
												</tr>
											';
											$i++;
										}
										echo '
												</tbody>
											</table>
											<a href="process/simplex.php" class="btn btn-info" type="button">Hitung Efisiensi</a>
										';
									} else {
										echo '
											<div class="alert alert-dismissible alert-warning">
		  										<button type="button" class="close" data-dismiss="alert">&times;</button>
		  										<Strong>Data Masing Kosong</strong>. Silahkan Tambah Data DMU.
											</div>
										';
									}									
								?>
						  	</div>
					  	</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>