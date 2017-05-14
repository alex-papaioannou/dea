<?php
	require_once 'connect_db.php';
	session_start();
	if (ISSET($_POST['login'])) {
		// Login Berhasil
		$username = test_input($_POST['username']);
		$password = md5($_POST['password']);
		$query = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE username='".$username."' AND password='".$password."'");
		if(mysqli_num_rows($query) > 0){
			// Username dan Password Benar
			while($data = mysqli_fetch_assoc($query)){
				$level = $data['level'];
				$id = $data['id_pengguna'];
			}
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['id'] = $id;
			$_SESSION['level'] = $level;
			// Klasifikasi Level Pengguna
			if($level=='a'){ 
				// Admin
				$_SESSION['user'] = "Admin";
				header("location: ../beranda.php");
			}else if ($level=='p'){ 
				// Pengelola
				$_SESSION['user'] = "Pengelola";
				header("location: ../beranda.php");
			}
		} else {
			// Username dan atau Password Salah
			$_SESSION['error'] = "<strong>Username</strong> atau <strong>Password</strong> salah";
			header("location: ../index.php");
		}
	} else {
		// Login Gagal
		$_SESSION['error'] = 'Login Gagal';
		header("location: ../index.php");
	}
	
	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
?>