<?php
	session_start();
	session_destroy(); // hapus semua session yang tersimpan
	header("Location: index.php");
?>