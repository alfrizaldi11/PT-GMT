<?php
error_reporting(0); 
include 'config/koneksi.php';
  session_start();

 $kodeUnik = $_POST['kodeUnik'];
 
if (empty($kodeUnik)) {
     echo "<script> alert('Tidak ada kode yang di masukkan'); window.location='kodeunik.php';</script>";
}
		else {
			$update="UPDATE kodeunik set kodeUnik='$kodeUnik'";
		
	}
$cek = mysqli_query($koneksi, $update);

if($cek){
    
	echo "<script> alert ('kode unik berhasil di ubah');
	window.location = 'kodeunik.php'</script>";
	} else {
		echo "<script> alert ('kode unik gagal di ubah');
		window.location = 'kodeunik.php'</script>";
}
?>