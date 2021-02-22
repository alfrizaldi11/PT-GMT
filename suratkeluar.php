<?php 
include 'config/koneksi.php';
session_start();
if (empty ($_SESSION['username']) AND empty ($_SESSION['mypassword']) ){
  echo "<script> alert('Anda harus login terlebih dahulu');
  window.location = 'login.php'</script>";
}
if($_SESSION['akses']!="admin" AND ($_SESSION['akses']!="staf")){
  die("404 Not Found");
}

if (isset($_POST['submit'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
   
    if (!empty($date1) && !empty($date2)) {
     // perintah tampil data berdasarkan range tanggal
     $q = mysqli_query($koneksi, "SELECT j.*, s.* FROM suratKeluar s LEFT JOIN jenissuratkeluar j ON j.`idJenisSurat` = s.`idJenisSurat` WHERE s.tanggalKeluar BETWEEN '$date1' and '$date2'"); 
    } else {
     // perintah tampil semua data
     $q = mysqli_query($koneksi, "SELECT j.*, s.* FROM suratKeluar s LEFT JOIN jenissuratkeluar j ON j.`idJenisSurat` = s.`idJenisSurat` order by j.jenisSurat ASC"); 
    }
   } else {
    // perintah tampil semua data
    $q = mysqli_query($koneksi, "SELECT j.*, s.* FROM suratKeluar s LEFT JOIN jenissuratkeluar j ON j.`idJenisSurat` = s.`idJenisSurat` order by j.jenisSurat ASC");
   }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Surat Keluar</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php
    include 'navbar.php';

    ?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="img/logooo.jpeg" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
            <?php
              // Cek role user
              if($_SESSION['akses'] == 'admin'){ // Jika role-nya admin
                ?>
                <div class="profile-usertitle-name">Admin</div>
                <?php
                }
                ?>

            <?php   
              // Cek role user
              if($_SESSION['akses'] == 'staf'){ // Jika role-nya admin
                ?>
                <div class="profile-usertitle-name">Staf</div>
                <?php
                }
                ?>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
            <li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Dashboard</a></li>
			<li><a href="suratmasuk.php"><em class="fa fa-envelope">&nbsp;</em> Surat Masuk</a></li>
			<li class="active"><a href="suratkeluar.php"><em class="fa fa-paper-plane">&nbsp;</em> Surat Keluar</a></li>
            <li><a href="jenissurat.php"><em class="fa fa-id-card">&nbsp;</em> Jenis Surat</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-user-circle ">&nbsp;</em> Akun <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-angle-right "></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="akun.php">
						<span class="fa fa-cog">&nbsp;</span> Kelola Akun
					</a></li>
					<li><a class="" href="kodeunik.php">
						<span class="fa fa-sort-numeric-desc ">&nbsp;</span> Kelola Kode Unik
					</a></li>
				</ul>
			</li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-paper-plane"></em>
				</a></li>
				<li class="active">Surat Keluar</li>
			</ol>
        </div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Surat Keluar</h1>
			</div>
        </div><!--/.row-->
        
        <div class="form-actions">
          <a href="tambah_Skeluar.php"class="btn btn-success" role="button">Tambah Data</a>
          <a href="tampilSkeluar.php"class="btn btn-default" role="button">Cetak Rekapitulasi Arsip <i class="fa fa-print"></i></a>               
        </div>
        <br>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Surat Keluar</div>
					    <div class="panel-body">
                            `<div class="table-responsive dataTable_wrapper">
                            <form method="POST" action="" class="form-inline mt-3">
                                <label for="date1" style="margin-right:50px;">Dari </label>
                                <input type="date" name="date1" id="date1" class="form-control mr-2" style="width:320px;margin-right:50px">
                                <label for="date2" style="margin-right:50px;"> Sampai </label>
                                <input type="date" name="date2" id="date2" class="form-control mr-2" style="width:320px;margin-right:20px">
                                <button type="submit" name="submit" class="btn btn-info" style="margin-top:10px;">Filter <i class="fa fa-filter"></i></button>
                            </form>
                            <br>
                                <table id="example1" class="table table-bordered table-hover datatab" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th> 
                                    <th>Jenis Surat</th> 
                                    <th>Nomor Surat</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Perihal</th>
                                    <th>Tujuan</th>
                                    <th>File</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($q)) {
                                ?>
                                
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td align="center">
                                        <div> 
                                        <a class="btn btn-warning" href="edit_Skeluar.php?id=<?php echo $data['idsuratKeluar'];?>">Ubah</a> ||
                                        <a class="btn btn-danger" href="aksi_hapus_Skeluar.php?&id=<?php echo $data['idsuratKeluar'];?>"onclick="return confirm('Yakin akan dihapus ?');">Hapus</a>
                                        </div>  
                                    </td>
                                    <td><?php echo $data['jenisSurat']; ?></td>
                                    <td><?php echo $data['nomorSurat']; ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($data['tanggalKeluar'])); ?></td>
                                    <td><?php echo $data['perihal']; ?></td>
                                    <td><?php echo $data['tujuan']; ?></td>
                                    <td><a href="viewKeluar.php?id=<?php echo $data['idsuratKeluar'];?>"><?php echo $data['fileKeluar']; ?></a></td>
                                </tr>
                                <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
					</div>
				</div><!-- /.panel-->
			
			</div><!-- /.col-->

		</div><!-- /.row -->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatab').DataTable();
    } );
    </script>

		
</body>
</html>