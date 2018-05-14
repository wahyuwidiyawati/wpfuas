<?php
	include ("configs/config_db.php");
	include("classes/database.php");
	include("classes/pengguna.php");
	
	if(isset($_POST["username"]) OR isset($_POST["password"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$user = new Pengguna($username,$password);
		
		if($user->login() === FALSE){
			$pesan_error = "Username dan password tidak cocok";
		}
		else{
			// simpan session username & password
			
			session_start(); // memulai/mengulang session
			
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			
			switch(strtolower($user->login())){
				case "admin":	header("Location: admin.php"); 		break;
				

			}
		}
	}
?>