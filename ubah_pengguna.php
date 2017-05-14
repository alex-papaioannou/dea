<?php 
	include 'layout.php';
	if (ISSET($_GET['lvl'])) {
		$lvl = $_GET['lvl'];
	} else {
		$lvl = 'p';
	}
	if (ISSET($_GET['id'])) {
		$id = $_GET['id'];
	}
	if (ISSET($_GET['type'])) {
	 	$type = $_GET['type'];
	} 

	if ($lvl == 'a') {
		$query = mysqli_query($conn, 'SELECT * FROM tb_pengguna WHERE id_pengguna='.$id.' AND level="'.$lvl.'"');
		if (mysqli_num_rows($query) > 0) {
			while ($data = mysqli_fetch_assoc($query)) {
				$nama = $data['nama'];
				$username = $data['username'];
			}
		} else { $tes=mysqli_error($conn); }
	} else {
		$query = mysqli_query($conn, 'SELECT * FROM tb_pengguna JOIN tb_klinik ON tb_pengguna.id_klinik = tb_klinik.id_klinik WHERE id_pengguna='.$id.'');
		if (mysqli_num_rows($query) > 0) {
			// output data of each row
			while($pengguna = mysqli_fetch_assoc($query)) {
				$nama = $pengguna['nama'];
				$username = $pengguna['username'];
				$id_klinik = $pengguna['id_klinik'];
				$cabang_klinik = $pengguna['cabang_klinik'];
			}
		}
	}
?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Mengelola Pengguna</h3>
						</div>
						<div class="panel-body">			
							<form class="form-horizontal" method="post" action="<?php echo "process/u_pengguna.php?type=".$type."&id=".$id."&lvl=".$lvl.""; ?>">
								<fieldset>
								<?php
									if ($type == 'profile') {
										echo '<legend>Profil Pengguna</legend>';
									} else {
										echo '<legend>Ubah Pengguna</legend>';
									}
								?>
								    <?php
								    	if (ISSET($_GET['balasan']) AND ($_GET['balasan']==1)) {
						  			  	echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-remove"></span> <strong>Username</strong> sudah terdaftar. Silahkan gunakan <strong>username</strong> lain</div>';
						  			  	} elseif (ISSET($_GET['balasan']) AND ($_GET['balasan']==2)) {
						  			  		echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-remove"></span> Gagal mengubah data</div>';
						  			  }
								    ?>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Nama</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="nama_pengguna" placeholder="Panjang maksimal 50 karakter" type="text" maxlength="50" value="<?php echo $nama; ?>" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Username</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="username" placeholder="Panjang username 5-10 karakter" type="text" minlength="5" maxlength="10" value="<?php echo $username; ?>" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Password</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="password" placeholder="Panjang password 5-12 karakter" type="password" minlength="5" maxlength="12" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Cabang Klinik</label>
								      	<div class="col-sm-6">
								        	<select name="cabang_klinik" class="form-control" <?php if ($lvl == 'a') {echo 'disabled';} ?> required>
								        		<option value=""> -- Pilih Cabang -- </option>
								        		<?php
								        			$query = mysqli_query($conn, "SELECT * FROM tb_klinik");
								        			if (mysqli_num_rows($query) > 0) {
													    // output data of each row
													    while($cabang = mysqli_fetch_assoc($query)) {
													    	$id_cabang = $cabang['id_klinik'];
													    	if ($id_klinik == $id_cabang) { // Jika sesuai id yang sedang diubah
													    		echo '<option value="'.$id_cabang.'" selected>'.$cabang["cabang_klinik"].'</option>';
													    	} else { // Jika bukan id yang sedang diubah
													    		echo '<option value="'.$id_cabang.'">'.$cabang["cabang_klinik"].'</option>';
													    	}
													    }
													}
								        		?>
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