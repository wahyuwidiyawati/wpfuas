<?php
	session_start();
	require "koneksi.php";
	error_reporting('E_ALL');
	
	if($_POST[simpan])
	{
		mysql_query("Insert into pemasukan values('$_POST[kd_pemasukan]', '$_POST[nama_masuk]', '$_POST[tanggal_masuk]', '$_POST[jumlah_masuk]')");
		header('Location:persmasuk.php');
	}
	
		if ($_GET['delete'])
		{
			mysql_query("DELETE from pemasukan WHERE kd_pemasukan='$_GET[delete]'");
			header('Location:persmasuk.php');
		}
		
if(isset ($_GET['edit']))
	{
		$qedit = mysql_query("SELECT * FROM pemasukan WHERE kd_pemasukan = '$_GET[edit]'");
		$edit = mysql_fetch_array($qedit);
	}
	
	if (isset($_POST['update']))
	{
		$hasil=mysql_query("UPDATE pemasukan SET kd_pemasukan='$_POST[kd_pemasukan]', 
		nama_masuk='$_POST[nama_masuk]', tanggal_masuk='$_POST[tanggal_masuk]', 
		jumlah_masuk='$_POST[jumlah_masuk]' WHERE kd_pemasukan = '$_GET[edit]'");
		
		if($hasil)
		{
			echo "<script>alert('Perubahan berhasil disimpan')
			location.replace('persmasuk.php')</script>";
		}
		
		else {
			echo "<script>alert('Perubahan gagal disimpan')
			location.replace('input_masuk.php')</script>";
			}
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
		
<div class="row-fluid">                    
<div class="btn-toolbar">
<form id="tab" method="post" enctype="multipart/form-data" action="">
<input type="hidden" value="<?php echo $_POST[kd_pemasukan]?>">
							<?php
								if (empty($edit['kd_pemasukan']))
								{
							?>
								<button type="submit" name="simpan" value="simpan" class="btn btn-primary btn-large">Simpan</button>
								<?php } else { ?>
								<button type="submit" name="update" value="Update" class="btn btn-success btn-large"/>Update</button>
								<?php } ?></td>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Pemasukan </a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab" method="get" enctype="multipart/form-data" action="">
		<label>Kode Masuk</label>
		<input type="text" class="input-xlarge" name="kd_pemasukan" placeholder="Example: 0001" value="<?php echo $edit[kd_pemasukan];?>">
        <label>Nama Pers. Masuk</label>
        <input type="text" class="input-xlarge" name="nama_masuk" placeholder="Example: Persembahan Minggu" value="<?php echo $edit[nama_masuk];?>">
        <label>Tanggal</label>
		<input type="date" class="input-xlarge" name="tanggal_masuk" placeholder="Example: 2018-01-01" value="<?php echo $edit[tanggal_masuk];?>">
		<label>Jumlah</label>
        <input type="text" class="input-xlarge" name="jumlah_masuk" placeholder="Example: 1000000" value="<?php echo $edit[jumlah_masuk];?>">
    </form>
      </div>
	</div>    
</div>
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
