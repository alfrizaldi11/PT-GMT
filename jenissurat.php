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

$data_jenis = mysqli_query($koneksi,"SELECT * FROM jenissuratkeluar");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Akun</title>
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
			<li><a href="suratkeluar.php"><em class="fa fa-paper-plane">&nbsp;</em> Surat Keluar</a></li>
            <li class="active"><a href="jenissurat.php"><em class="fa fa-id-card">&nbsp;</em> Jenis Surat</a></li>
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
					<em class="fa fa-id-card"></em>
				</a></li>
				<li class="active">Jenis Surat</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Jenis Surat</h1>
			</div>
        </div><!--/.row-->

        <div class="form-actions">
          <a href="tambah_jenis.php"class="btn btn-success" role="button">Tambah Data</a>            
        </div>
        <br>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Jenis Surat</div>
					    <div class="panel-body">
                            `<div class="table-responsive dataTable_wrapper">
                                <table id="example1" class="table table-bordered table-hover datatab" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th> 
                                    <th>Jenis Surat</th> 
                                    <th>Keterangan</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($data_jenis)) {
                                ?>
                                
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td align="center">
                                        <div> 
                                        <a class="btn btn-warning" href="edit_jenis.php?id=<?php echo $data['idJenisSurat'];?>">Ubah</a> ||
                                        <a class="btn btn-danger" href="aksi_hapus_jenis.php?&id=<?php echo $data['idJenisSurat'];?>"onclick="return confirm('Yakin akan dihapus ?');">Hapus</a>
                                        </div>  
                                    </td>
                                    <td><?php echo $data['jenisSurat']; ?></td>
                                    <td><?php echo $data['keterangan']; ?></td>
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