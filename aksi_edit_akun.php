<?php
error_reporting(0); 
include 'config/koneksi.php';
  session_start();

 $idAdmin = $_POST['idAdmin'];
 $username = $_POST['username'];
 $mypassword = $_POST['mypassword'];
 
if (empty($username)) {
     echo "<script> alert('Tidak ada username yang di masukkan'); window.location='akun.php';</script>";
}
		else {
			$update="UPDATE myadmin set username='$username', mypassword='$mypassword' where idAdmin='$idAdmin'";
		
	}
$cek = mysqli_query($koneksi, $update);

if($cek){
    
	echo "<script> alert ('data akun berhasil di ubah');
	window.location = 'akun.php'</script>";
	} else {
		echo "<script> alert ('data akun gagal di ubah');
		window.location = 'akun.php'</script>";
}
?>