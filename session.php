<?php
	class session{
		public function cekHakAkses($peran){
			session_start();
			
			if(isset($_SESSION["username"]) AND isset($_SESSION["password"])){
			
				$user = new Pengguna($_SESSION["username"],$_SESSION["password"]);
				
				if($user->login() !== $peran){
					header("Location: index.php");
				}
			}
			else{
				header("Location: index.php");
			}
		}
	}
?>