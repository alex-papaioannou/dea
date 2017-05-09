<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  	<div class="panel-heading">
					    	<h3 class="panel-title"><span class="glyphicon glyphicon-tower"></span> Mengelola DMU</h3>
					  	</div>
					  	<div class="panel-body">
						  	<div class="col-sm-11 col-sm-offset-1">
						  		<legend>Daftar DMU</legend>
						    	<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th rowspan="2">No</th>
											<th rowspan="2">DMU</th>
											<th colspan="3">Input</th>
											<th colspan="2">Output</th>
											<th rowspan="2">Aksi</th>
										</tr>
										<tr>
											<th>Dokter</th>
											<th>Perawat</th>
											<th>Staff Non Medis</th>
											<th>Pasien</th>
											<th>Laba</th>
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
											<td>20</td>
											<td>
												<a href="#" class="btn btn-default btn-sm">Ubah</a>
												<a href="#" class="btn btn-primary btn-sm">Hapus</a>
							        		</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Banyumanik</td>
											<td>1</td>
											<td>2</td>
											<td>1</td>
											<td>150</td>
											<td>25</td>
											<td>
												<a href="#" class="btn btn-default btn-sm">Ubah</a>
												<a href="#" class="btn btn-primary btn-sm">Hapus</a>
							        		</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Tembalang</td>
											<td>2</td>
											<td>1</td>
											<td>0</td>
											<td>200</td>
											<td>40</td>
											<td>
												<a href="#" class="btn btn-default btn-sm">Ubah</a>
												<a href="#" class="btn btn-primary btn-sm">Hapus</a>
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