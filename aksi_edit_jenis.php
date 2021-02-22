<?php
error_reporting(0); 
include 'config/koneksi.php';
  session_start();

 $idJenisSurat = $_POST['idJenisSurat'];
 $jenisSurat = $_POST['jenisSurat'];
 $keterangan = $_POST['keterangan'];
 
if (empty($jenisSurat)) {
     echo "<script> alert('Tidak ada jenis surat yang di masukkan'); window.location='jenissurat.php';</script>";
}
		else {
			$update="UPDATE jenissuratkeluar set jenisSurat='$jenisSurat', keterangan='$keterangan' where idJenisSurat='$idJenisSurat'";
		
	}
$cek = mysqli_query($koneksi, $update);

if($cek){
    
	echo "<script> alert ('data jenis surat berhasil di ubah');
	window.location = 'jenissurat.php'</script>";
	} else {
		echo "<script> alert ('data jenis surat gagal di ubah');
		window.location = 'jenissurat.php'</script>";
}
?>