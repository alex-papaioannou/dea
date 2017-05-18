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
							<h1 align="center">Sistem Pengukuran Efisiensi Klinik</h1>
							<br>
							<h4 id="deskripsi">Sistem Pengukuran Efisiensi Klinik merupakan sebuah sistem yang berfungsi untuk menghitung efisiensi kinerja masing-masing cabang klinik. <em>Output</em> dari sistem ini berupa nilai efisiensi serta rekomendasi untuk dapat meningkatkan efisiensi cabang yang dinilai belum efisien. Cabang klinik yang dinilai sudah efisien akan dijadikan sebagai <em>benchmarking</em> bagi cabang klinik lain yang belum efisien melalui rekomendasi yang dihasilkan. Sistem ini dibuat guna membantu manajer dalam mengambil keputusan sebagai upaya dalam meningkatkan mutu dan kualitas pelayanan Klinikita Semarang.</h4>
							<br>
							<h2>Panduan</h2>
							<ol>
								<li><h5>Pilih menu <strong>Mengelola Cabang</strong> kemudian pilih sub menu <strong>Tambah Cabang</strong>.</h5></li>
								<li><h5>Tambahkan cabang yang dapat berupa <strong>alamat</strong> (Contoh : Jl. Gondang Barat I No 3) atau <strong>nama daerah</strong> (Contoh : Tembalang).</h5></li>
								<li><h5>Pilih menu <strong>Mengelola Variabel</strong> kemudian pilih sub menu <strong>Tambah Variabel</strong>.</h5></li>
								<li><h5>Tambahkan variabel dengan ketentuan minimal ada <strong>1 variabel jenis <em>input</em></strong> dan <strong>1 variabel jenis <em>output</em></strong>.</h5></li>
								<li><h5>Pilih menu <strong>Mengelola DMU</strong> kemudian pilih sub menu <strong>Tambah DMU</strong>.</h5></li>
								<li><h5>Tambahkan DMU (<em>Decision Making Unit</em> ) dengan memilih <strong>nama DMU</strong> berdasarkan <strong>cabang klinik</strong> dan memberikan nilai pada masing-masing <strong>variabel</strong>.</h5></li>
								<li><h5>Plih menu <strong>Mengelola DMU</strong> kemudian pilih sub menu <strong>Daftar DMU</strong> lalu klik <strong>Hitung Efisiensi</strong>.</h5></li>
								<li><h5>Hasil efisiensi dan rekomendasi bisa dilihat pada menu <strong>Hasil Efisiensi</strong>.</h5></li>
							</ol>
						</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>