<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<?php
						if (ISSET($_GET['balasan']) AND ($_GET['balasan']==1)) {
						  	echo '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-ok"></span> <strong>Profil</strong> berhasil diubah</div>';
						}
					?>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-home"></span> Beranda
						</div>
						<div class="panel-body">
							<h1>Sistem Pengukuran Efisiensi Klinik</h1>
							<br>
							<h4 id="deskripsi">Sistem Pengukuran Efisiensi Klinik merupakan sebuah sistem yang berfungsi untuk menghitung efisiensi kinerja masing-masing cabang klinik. <em>Output</em> dari sistem ini berupa nilai efisiensi serta rekomendasi untuk dapat meningkatkan efisiensi cabang yang dinilai belum efisien. Cabang klinik yang dinilai sudah efisien akan dijadikan sebagai <em>benchmarking</em> bagi cabang klinik lain yang belum efisien melalui rekomendasi yang dihasilkan. Sistem ini dibuat guna membantu manajer dalam mengambil keputusan sebagai upaya dalam meningkatkan mutu dan kualitas pelayanan Klinikita Semarang.</h4>
						</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>