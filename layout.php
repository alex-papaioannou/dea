<?php 
	session_start();
	if ((!ISSET($_SESSION['username'])) AND (!ISSET($_SESSION['password']))) {
		// Mencegah direct access melalui url
		header('Location: index.php');
	} else {
		// Berhasil Login
		include "process/connect_db.php";
		$id = $_SESSION["id"];
		$level = $_SESSION["level"];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Klinikita Semarang</title>
		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<nav class="navbar navbar-default">
				  	<div class="container-fluid">
				  		<!-- Navbar Header -->
				    	<div class="navbar-header">
				    		<!-- Navbar Toggle -->
				      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        		<span class="sr-only">Toggle navigation</span>
				        		<span class="icon-bar"></span>
				        		<span class="icon-bar"></span>
				        		<span class="icon-bar"></span>
				      		</button>
				      		<a class="navbar-brand" href="#"><strong>Sistem Pengukuran Efisiensi Klinik</strong></a>
				    	</div>
				    	<!-- Content Inside Navbar Toggle -->
				    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      		<ul class="nav navbar-nav navbar-right">
				        		<li class="dropdown">
				          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['user']; ?> <span class="caret"></span></a>
				          			<ul class="dropdown-menu" role="menu">
				            			<li><a href="ubah_pengguna.php?type=profile&id=<?php echo $id; ?>&lvl=<?php echo $level; ?>"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
				            			<li class="nav-divider"></li>
				            			<li><a href="process/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				          			</ul>
				        		</li>
				      		</ul>
				    	</div> <!-- End of Content Inside Navbar Toggle -->
				  	</div> <!-- End of Second Container-Fluid -->
				</nav> <!-- End of Navbar -->
			</div> <!-- End of First Row -->

			<div class="row">
				<div class="col-sm-3 sidebar">
					<div class="panel panel-default">
					  	<div class="panel-body">
							<img src="assets/img/logo_klinikita.jpg" class="img-responsive">
					    	<ul class="nav nav-pills nav-stacked" id="stacked-menu">
					    		<li class="nav-divider"></li>
								<li>
									<a href="beranda.php"><span class="glyphicon glyphicon-home"></span> Beranda</a>
								</li>
					            <li>
					            	<a data-toggle="collapse" data-parent="#stacked-menu" href="#p1"><span class="glyphicon glyphicon-duplicate"></span> Mengelola Cabang <span class="caret arrow"></span></a>
					            	<ul class="nav nav-pills nav-stacked collapse" id="p1">
				            			<li><a href="tambah_cabang.php">Tambah Cabang</a></li>
							            <li><a href="mengelola_cabang.php">Daftar Cabang</a></li>
				          			</ul>
					            </li>
					            <li>
					            	<a data-toggle="collapse" data-parent="#stacked-menu" href="#p2"><span class="glyphicon glyphicon-user"></span> Mengelola Pengguna <span class="caret arrow"></span></a>
					            	<ul class="nav nav-pills nav-stacked collapse" id="p2">
				            			<li><a href="tambah_pengguna.php">Tambah Pengguna</a></li>
							            <li><a href="mengelola_pengguna.php">Daftar Pengguna</a></li>
				          			</ul>
					            </li>
					            <li>
					            	<a data-toggle="collapse" data-parent="#stacked-menu" href="#p3"><span class="glyphicon glyphicon-list-alt"></span> Mengelola Variabel <span class="caret arrow"></span></a>
					            	<ul class="nav nav-pills nav-stacked collapse" id="p3">
				            			<li><a href="tambah_variabel.php">Tambah Variabel</a></li>
							            <li><a href="mengelola_variabel.php">Daftar Variabel</a></li>
				          			</ul>
					            </li>
					            <li>
					            	<a data-toggle="collapse" data-parent="#stacked-menu" href="#p4"><span class="glyphicon glyphicon-tower"></span> Mengelola DMU <span class="caret arrow"></span></a>
					            	<ul class="nav nav-pills nav-stacked collapse" id="p4">
				            			<li><a href="tambah_dmu.php">Tambah DMU</a></li>
							            <li><a href="mengelola_dmu.php">Daftar DMU</a></li>
				          			</ul>
					            </li> 
					            <li><a href="hasil_efisiensi.php"><span class=" glyphicon glyphicon-stats"></span> Hasil Efisiensi</a></li> 
							</ul>
					  	</div>
					</div>	
				</div> <!-- End of Sidebar (First col-sm-3) -->