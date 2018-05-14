<?php
	error_reporting("E_ALL");
	session_start();
	require "koneksi.php";
	
	if ($_GET['delete'])
	{
		mysql_query("DELETE from pemasukan WHERE kd_pemasukan='$_GET[delete]'");
		header('Location:persmasuk.php');
	}
?>
<html>
  <head>
    <title>pers.Masuk</title>

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
	
	<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>
  </head>
  <body class=""> 
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> Widiyawati
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a href="index.php" onClick="return confirm ('Yakin?')">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
						<a class="brand" span class="first"></span> <span class="second">Finance Company of GKJW Purwosari</span></a>
        </div>
    </div>
    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li ><a href="persmasuk.php">Pemasukan</a></li>
            <li ><a href="perskeluar.php">Pengeluaran</a></li>
			<li ><a href="laporan.php">Laporan</a></li>
            
    </div>
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">PERSEMBAHAN MASUK</h1>
        </div>

		<div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i><a href="input_masuk.php"> Tambah Pemasukan </a></button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>Kode Masuk</th>
          <th>Nama Pers. Masuk</th>
          <th>Tanggal</th>
          <th>Jumlah</th>
		  <th>Task</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
		<?php
			$result = mysql_query("select * from pemasukan order by kd_pemasukan asc");
			while ($data = mysql_fetch_array($result))
			{
		?>
          <td><?php echo $data[kd_pemasukan] ?></td>
          <td><?php echo $data[nama_masuk] ?></td>
          <td><?php echo $data[tanggal_masuk] ?></td>
          <td><?php echo "Rp. " . number_format($data[jumlah_masuk]) ?></td>
          <td>
              <a href="input_masuk.php?edit=<?php echo $data[kd_pemasukan] ?>"><i class="icon-pencil"></i></a>
              <a href="persmasuk.php?delete=<?php echo $data[kd_pemasukan] ?>"><i class="icon-remove"></i></a>
          </td>
        </tr>		
	  <?php } ?>
	  <tr>
		<th>
		<?php $jumlahkan = "SELECT SUM(jumlah_masuk) AS total_jumlah_pemasukan FROM pemasukan"; //perintah untuk menjumlahkan
		$hasil =@mysql_query($jumlahkan) or die (mysql_error());//melakukan query dengan varibel $jumlahkan
		$t = mysql_fetch_array($hasil); //menyimpan hasil query ke variabel $t
		echo "<b> Total Jumlah " . "Rp. ". number_format($t['total_jumlah_pemasukan']) . " </b>";//menampilkaan hasil penjumlahan
		?>
		</th>
	  </tr>
      </tbody>
    </table>
</div>	

         <footer>
            <hr>
            <p class="pull-right">1115101309 | @mahasiswastikombwi</p>
            <p>&copy; 2018 <a href="http://www.finance.com" target="_blank">finance.com</a></p>
         </footer>            
        </div>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
  </body>
</html>
