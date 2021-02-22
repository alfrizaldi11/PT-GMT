<?php 

include 'config/koneksi.php';
//error_reporting(0);

$username = $_POST ['username'];
$mypassword = $_POST ['mypassword'];
$akses = $_POST ['akses'];
$kodeunik = $_POST ['kodeUnik'];


 $cekreg=mysqli_query($koneksi,"SELECT * from kodeunik where kodeUnik ='$kodeunik'");
 if(mysqli_num_rows($cekreg) > 0){
    $query = mysqli_query($koneksi,"INSERT INTO myadmin (username,mypassword,akses)
					VALUES ('$username','$mypassword','$akses')");
	} else {
 
        echo "<script>alert('Kode unik tidak di temukan'); 
        window.location='register.php';</script>";
	}
 if($query){ 
  echo "<script> alert('Data Akun berhasil disimpan');
  window.location = 'login.php'</script>";
 }else{ 
 echo "<script> alert ('Data Akun Gagal disimpan');
window.location = 'login.php'</script>";
 }
 ?>  