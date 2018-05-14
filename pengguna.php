<?php
	class Pengguna{
		private $username;
		private $password;
		protected $db;
		
		public function __construct($user,$pass){
			$this->username = $user;
			$this->password = $pass;
			
			$database = new Database;
			$this->db = $database->db;
		}
		
		public function login(){
			$get = $this->db->query("SELECT * FROM pengguna WHERE username = '".$this->username."' AND password ='".$this->password."'");
									 
			if($this->db->affected_rows == 0){
				return FALSE;
			}
			else{
				$hasil = $get->fetch_assoc();
				return $hasil["username"];
			}
		}
	}
?>