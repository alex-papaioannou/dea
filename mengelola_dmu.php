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
						  		?>
						    	<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th rowspan="2">No</th>
											<th rowspan="2">DMU</th>
											<th colspan="<?php echo $input; ?>">Input</th>
											<th colspan="<?php echo $output; ?>">Output</th>
											<th rowspan="2">Aksi</th>
										</tr>
										<tr>
											<?php echo $list_var; ?>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Kalipancur</td>
											<td>2</td>
											<td>2</td>
											<td>1</td>
											<td>100</td>
											<td>20</td><td>20</td>
											<td>
												<a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
												<a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
							        		</td>
										</tr>
									</tbody>
								</table>
								<a href="#" class="btn btn-info" type="button">Hitung Efisiensi</a>
						  	</div>
					  	</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>