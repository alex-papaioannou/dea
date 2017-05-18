<?php 
	session_start();
	include "../proses/config/koneksi.php";
	
	
	mysql_query("INSERT INTO tb_perhitungan_efisiensi(hasil_perhitungan,id_dmu,id_user) VALUES('$_POST[hasil]','$_POST[id_dmu]','$_SESSION[id_user]')");
?>