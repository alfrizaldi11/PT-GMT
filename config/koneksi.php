<?php 
$koneksi = mysqli_connect("localhost","root","","pt_gmt");

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>