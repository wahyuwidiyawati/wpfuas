<?php
	class laporan{
	
	private $db;
	private $kd_pemasukan;
	private $kd_pengeluaran;
	
	public function __construct($kd_pemasukan = null)
	{
		$this->kd_pemasukan = $kd_pemasukan;
		
		$database = new database;
		$this->db = $database->db;
	}
	
	public function AmbilData()
	{
		return $lapor = $this->db->query("SELECT pemasukan.kd_pemasukan, pemasukan.nama_masuk AS nama_masuk, 
			pemasukan.tanggal_masuk AS tanggal_masuk, pemasukan.jumlah_masuk AS jumlah_masuk,  
			'' AS kd_pengeluaran,  '' AS nama_keluar,  '' AS tanggal_keluar,  '' AS jumlah_keluar FROM pemasukan
			UNION SELECT  '' AS kd_pemasukan,  '' AS nama_masuk,  '' AS tanggal_masuk,  '' AS jumlah_masuk, 
			pengeluaran.kd_pengeluaran, pengeluaran.nama_keluar AS nama_keluar, pengeluaran.tanggal_keluar 
			AS tanggal_keluar, pengeluaran.jumlah_keluar AS jumlah_keluar FROM pengeluaran");
	}
	
	}




?>