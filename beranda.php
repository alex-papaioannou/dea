<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<?php
						if (ISSET($_GET['balasan']) AND ($_GET['balasan']==1)) {
						  	echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> <strong>Profil</strong> berhasil diubah</div>';
						} elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==2)) {
							echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> Perhitungan efisiensi berhasil</div>';
						}
					?>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-home"></span> Beranda
						</div>
						<div class="panel-body">
							<?php 
								if ($level == 'a') {
									echo '<h1 align="center">Sistem Pengukuran Efisiensi Klinik</h1><hr />';
									echo '
										<h4 id="deskripsi">Sistem Pengukuran Efisiensi Klinik merupakan sebuah sistem yang berfungsi untuk menghitung efisiensi kinerja masing-masing cabang klinik. <em>Output</em> dari sistem ini berupa nilai efisiensi serta rekomendasi untuk dapat meningkatkan efisiensi cabang yang dinilai belum efisien. Cabang klinik yang dinilai sudah efisien akan dijadikan sebagai <em>benchmarking</em> bagi cabang klinik lain yang belum efisien melalui rekomendasi yang dihasilkan. Sistem ini dibuat guna membantu manajer dalam mengambil keputusan sebagai upaya dalam meningkatkan mutu dan kualitas pelayanan Klinikita Semarang.</h4>
										<br>
									';
								} else {
									echo '<h1 align="center">Hasil Perhitungan Efisiensi dan Rekomendasi</h1><hr />';
								}
							?>
							
							<br>
							
							<?php 
								if ($level == 'p') {
									echo '<div class="row">';
									# Menghitung Banyak DMU
									$id_dmu = $cabang_klinik = $efisiensi = array();
									$q = mysqli_query($conn, 'SELECT p.id_klinik, k.cabang_klinik, p.nilai_efisiensi FROM tb_perhitungan_efisiensi AS p, tb_klinik AS k WHERE p.id_klinik=k.id_klinik GROUP BY p.id_klinik');
									$n_dmu = mysqli_num_rows($q);
									if ($n_dmu > 0) {
										$index = 0;
										while ($d = mysqli_fetch_assoc($q)) {
										  	$cabang_klinik[$index] = $d['cabang_klinik'];
										  	$id_dmu[$index] = $d['id_klinik'];
										  	$efisiensi[$index] = round($d['nilai_efisiensi'], 3);
										  	$index++;
										}
										for ($i=0; $i < $n_dmu; $i++) { 
										  	# Menampilkan Efisiensi dan Tabel Rekomendasi
										  	$persen = $efisiensi[$i] * 100;
										  	if ($efisiensi[$i] >= 0.9) {
										  		$alert = "alert-success";
										  		$progress = "progress-bar-success";
										  	} else {
										  		$alert = "alert-danger";
										  		$progress = "progress-bar-danger";
										  	}
										  	echo '
											  		<div class="col-sm-5">
														<div class="alert alert-dismissible '.$alert.'">
																<div class="row">
																	<div class="col-sm-9 col-xs-9">
																		<h4 align="left"><strong>'.$cabang_klinik[$i].'</strong></h4>
																	</div>
																	<div class="col-sm-3 col-xs-3">
																		<h4 align="right"><strong>'.$efisiensi[$i].'</strong></h4>
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-sm-12">
																		<div class="progress">
																			<div class="progress-bar '.$progress.'" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$persen.'%">'.$persen.'%
																			</div>
																		</div>
																	</div>
																</div>
														</div>
													</div>
											';
											echo '
											  		<div class="col-sm-7">
														<table class="table table-condensed table-striped table-bordered">
															<thead>
																<tr>
															      	<th>No</th>
															      	<th>Variabel</th>
															      	<th>Nilai Awal</th>
															      	<th>Rekomendasi</th>
															      	<th>Satuan</th>
															    </tr>
															</thead>
															<tbody>
											';
											$q = mysqli_query($conn, 'SELECT * FROM tb_perhitungan_efisiensi AS p, tb_variabel AS v, tb_klinik AS k WHERE p.id_variabel=v.id_variabel AND k.id_klinik=p.id_klinik AND p.id_klinik="'.$id_dmu[$i].'" ORDER BY v.id_variabel ASC');
											if (mysqli_num_rows($q) > 0) {
											  	$j = 1;
											  	while ($data = mysqli_fetch_assoc($q)) {
											  		$klinik = $data['cabang_klinik'];
											  		$var = $data['nama_variabel'];
											  		$nilai_awal = $data['nilai_awal'];
											  		$rekomendasi = $data['rekomendasi'];
											  		$satuan = $data['satuan'];
											  		echo '
													  	<tr>
													  		<td>'.$j.'</td>
													  		<td>'.$var.'</td>
													  		<td>'.$nilai_awal.'</td>
													  		<td>'.$rekomendasi.'</td>
													  		<td>'.$satuan.'</td>
													  	</tr>
													';
													$j++;
											  	}
											}
											echo '
											  				</tbody>
											  			</table>
											  			<br>
											  			<br>
											  		</div>
											';
										}
									} else {
										echo '
										  		<div class="col-sm-12">
										  			<div class="alert alert-dismissible alert-warning">
  														<button type="button" class="close" data-dismiss="alert">&times;</button>
  														Belum dilakukan perhitungan efisiensi.
													</div>
												</div>
										';
									}
									echo '</div>'; // End of row
								} elseif (($level == 'c') OR ($level == 'm')) {
									echo '<div class="row">';
									# Menghitung Banyak DMU
									$id_klinik = $_SESSION["id_klinik"];
									$q = mysqli_query($conn, 'SELECT p.id_klinik, k.cabang_klinik, p.nilai_efisiensi FROM tb_perhitungan_efisiensi AS p, tb_klinik AS k WHERE p.id_klinik=k.id_klinik AND p.id_klinik="'.$id_klinik.'" GROUP BY p.id_klinik');
									if (mysqli_num_rows($q) > 0) {
										$d = mysqli_fetch_assoc($q);
										$cabang_klinik = $d['cabang_klinik'];
										$efisiensi = round($d['nilai_efisiensi'], 3);
										# Menampilkan Efisiensi dan Tabel Rekomendasi
										$persen = $efisiensi * 100;
										if ($efisiensi >= 0.9) {
										  		$alert = "alert-success";
										  		$progress = "progress-bar-success";
										  	} else {
										  		$alert = "alert-danger";
										  		$progress = "progress-bar-danger";
										  	}
										  	echo '
											  		<div class="col-sm-5">
														<div class="alert alert-dismissible '.$alert.'">
																<div class="row">
																	<div class="col-sm-9 col-xs-9">
																		<h4 align="left"><strong>'.$cabang_klinik.'</strong></h4>
																	</div>
																	<div class="col-sm-3 col-xs-3">
																		<h4 align="right"><strong>'.$efisiensi.'</strong></h4>
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-sm-12">
																		<div class="progress">
																			<div class="progress-bar '.$progress.'" role="progressbar" aria-valuenow="'.$persen.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$persen.'%">'.$persen.'%
																			</div>
																		</div>
																	</div>
																</div>
														</div>
													</div>
											';
										echo '
											  	<div class="col-sm-7">
													<table class="table table-condensed table-striped table-bordered">
														<thead>
															<tr>
															    <th>No</th>
															    <th>Variabel</th>
															    <th>Nilai Awal</th>
															    <th>Rekomendasi</th>
															    <th>Satuan</th>
															</tr>
														</thead>
													<tbody>
										';
										$q = mysqli_query($conn, 'SELECT * FROM tb_perhitungan_efisiensi AS p, tb_variabel AS v, tb_klinik AS k WHERE p.id_variabel=v.id_variabel AND k.id_klinik=p.id_klinik AND p.id_klinik="'.$id_klinik.'" ORDER BY p.id_variabel ASC');
										if (mysqli_num_rows($q) > 0) {
											$j = 1;
											while ($data = mysqli_fetch_assoc($q)) {
											  	$klinik = $data['cabang_klinik'];
											  	$var = $data['nama_variabel'];
											  	$nilai_awal = $data['nilai_awal'];
											  	$rekomendasi = $data['rekomendasi'];
											  	$satuan = $data['satuan'];
											  	echo '
													<tr>
													  	<td>'.$j.'</td>
													  	<td>'.$var.'</td>
													  	<td>'.$nilai_awal.'</td>
													  	<td>'.$rekomendasi.'</td>
													  	<td>'.$satuan.'</td>
													</tr>
												';
												$j++;
											}
										}
										echo '
											  			</tbody>
											  		</table>
											  		<br>
											  		<br>
											  	</div>
										';
									} else {
										echo '
										  		<div class="col-sm-12">
										  			<div class="alert alert-dismissible alert-warning">
  														<button type="button" class="close" data-dismiss="alert">&times;</button>
  														Belum dilakukan perhitungan efisiensi.
													</div>
												</div>
										';
									}
									echo '</div>'; // End of row
								}
							?>
						</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>