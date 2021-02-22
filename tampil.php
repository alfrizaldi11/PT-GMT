<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Surat Masuk</title>
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
 
	<center>
		<h2 class="header">Data Rekapitulasi Arsip Surat Masuk</h2>
		<h3 class="page-header">SIAS PT.GLOBAL MAKARA TEKNIK</h3>
	</center>
 
	<?php 
    include 'config/koneksi.php';   
	?>
 
	<table border="1" style="width: 100%">
        <thead align="center">
		<tr>
            <th style="background:#30a5ff;font-weight:bold;" width="1%">No.</th>
            <th style="background:#30a5ff;font-weight:bold;">Nomor Surat</th>
            <th style="background:#30a5ff;font-weight:bold;">Tanggal Surat</th>
            <th style="background:#30a5ff;font-weight:bold;">Tanggal Masuk</th>
            <th style="background:#30a5ff;font-weight:bold;">Perihal</th>
            <th style="background:#30a5ff;font-weight:bold;">Asal</th>
            <th style="background:#30a5ff;font-weight:bold;" width="5%">File</th>
		</tr>
        </thead>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"SELECT * FROM suratmasuk");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
            <td align="center"><?php echo $no++; ?></td>
            <td align="center"><?php echo $data['nomorSurat']; ?></td>
            <td align="center"><?php echo date('d-M-Y', strtotime($data['tanggalSurat'])); ?></td>
            <td align="center"><?php echo date('d-M-Y', strtotime($data['tanggalMasuk'])); ?></td>
            <td align="center"><?php echo $data['perihal']; ?></td>
            <td align="center"><?php echo $data['asal']; ?></td>
            <td align="center"><?php echo $data['fileMasuk']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>

    <script src="js/jquery-1.11.1.min.js"></script> 
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
 
</body>
</html>