<html>
  <head>
    <title>Admin Finance</title>

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
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Data</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li ><a href="persmasuk.php">Pemasukan</a></li>
            <li ><a href="perskeluar.php">Pengeluaran</a></li>
			<li ><a href="laporan.php">Laporan</a></li>
            
        </ul>

    </div> 
    
    <div class="content">
        
        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="alert alert-error">
		
           <strong>Anda Seorang Admin</strong>
			<br>
			<p>Anda bisa menginput, mengedit dan menghapus data yang di inginkan</p> 
			<form action="admin.php" method="post" enctype="multipart/form-data">
				<label for="berkas"><strong>Upload File</strong></label>
				<input type="file" name="berkas" accept="image /*"/>
				<input type="submit" value="UPLOAD"/>
			</form>
			<?php
				$file = $_FILES["berkas"];
				$nama = $file["name"];
				$pos_sementara	= $file ["tmp_name"];
				$jenis			= $file["type"];
				$ukuran			= $file["size"];
				$pos_akhir = "images/".$nama;
				if(copy($pos_sementara,$pos_akhir))
				echo "Berkas telah di upload ke ${pos_akhir}";
			else
				echo "Berkas gagal di upload";
			?>
        </div>
</div>
                    <footer>
                        <hr>
                        <p class="pull-right">1115101309 | @mahasiswastikombwi</p>
                        <p>&copy; 2018 <a href="http://www.finance.com" target="_blank">finance.com</a></p>
                    </footer>
            </div>
        </div>
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