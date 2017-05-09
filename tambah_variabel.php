<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Mengelola Variabel</h3>
						</div>
						<div class="panel-body">			
							<form class="form-horizontal" method="post" action="">
								<fieldset>
								    <legend>Tambah Variabel</legend>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Nama</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="nama_variabel" placeholder="Diisikan menggunakan huruf" type="text" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Jenis</label>
								      	<div class="col-sm-6">
								        	<select name="cabang_klinik" class="form-control" required>
								        		<option value="" selected="selected"> -- Pilih Jenis -- </option>
								          		<option value="input">Input</option>
								          		<option value="output">Output</option>
								        	</select>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Satuan</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="satuan_variabel" placeholder="Diisikan menggunakan huruf" type="text" required>
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