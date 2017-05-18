<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  	<div class="panel-heading">
					    	<h3 class="panel-title"><span class="glyphicon glyphicon-duplicate"></span> Mengelola Cabang</h3>
					  	</div>
					  	<div class="panel-body">			
							<form class="form-horizontal" method="post" action="process/t_cabang.php">
								<fieldset>
								    <legend>Tambah Cabang</legend>
								    <?php
								    	if (ISSET($_GET['balasan']) AND ($_GET['balasan']==1)) {
						  			  	echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Cabang</strong> sudah terdaftar. Silahkan gunakan <strong>cabang</strong> lain</div>';
						  			  	}
								    ?>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Lokasi Cabang Klinik</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="cabang_klinik" placeholder="Panjang maksimal 50 karakter" type="text" maxlength="50" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<div class="col-sm-9 col-sm-offset-3">
								        	<button type="submit" class="btn btn-default">Simpan</button>
								      	</div>
								    </div>
								</fieldset>
							</form>
						</div>
					</div> <!-- End of Panel -->
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>