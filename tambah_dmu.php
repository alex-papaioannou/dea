<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-tower"></span> Mengelola DMU</h3>
						</div>
						<div class="panel-body">			
							<form class="form-horizontal" method="post" action="">
								<fieldset>
								    <legend>Tambah DMU</legend>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Nama</label>
								      	<div class="col-sm-6">
								        	<select name="nama_dmu" class="form-control" required>
								        		<option value="" selected="selected"> -- Pilih Cabang -- </option>
								          		<option value="">Kalipancur</option>
								          		<option value="">Banyumanik</option>
								          		<option value="">Manyaran</option>
								        	</select>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Dokter</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="dokter" type="number" min="0" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Perawat</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="perawat" type="number" min="0" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Staff Non Medis</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="staff_non_medis" type="number" min="0" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Pasien</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="pasien" type="number" min="0" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Laba</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="laba" type="number" min="0" required>
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