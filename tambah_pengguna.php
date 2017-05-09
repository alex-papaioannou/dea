<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Mengelola Pengguna</h3>
						</div>
						<div class="panel-body">			
							<form class="form-horizontal" method="post" action="process/t_pengguna.php">
								<fieldset>
								    <legend>Tambah Pengguna</legend>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Nama</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="nama_pengguna" placeholder="Diisikan menggunakan huruf" type="text" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Username</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="username" placeholder="Diisikan menggunakan huruf" type="text" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Password</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="password" placeholder="Diisikan menggunakan huruf" type="password" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Cabang Klinik</label>
								      	<div class="col-sm-6">
								        	<select name="cabang_klinik" class="form-control" required>
								        		<option value="" selected="selected"> -- Pilih Cabang -- </option>
								          		<option value="">Kalipancur</option>
								          		<option value="">Banyumanik</option>
								          		<option value="">Manyaran</option>
								        	</select>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<div class="col-sm-6 col-sm-offset-3">
								        	<button type="submit" class="btn btn-default">Simpan</button>
								        	<button type="reset" class="btn btn-primary">Kosongkan</button>
								      	</div>
								    </div>
								</fieldset>
							</form>
						</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>