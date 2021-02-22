<?php 

include 'config/koneksi.php';
//error_reporting(0);

$jenisSurat = $_POST ['jenisSurat'];
$keterangan = $_POST ['keterangan'];


 $cekreg=mysqli_query($koneksi,"SELECT * from jenissuratkeluar where jenisSurat ='$jenisSurat'");
 if(mysqli_num_rows($cekreg) > 0){
	echo "<script>alert('$jenisSurat sudah terdaftar'); 
	window.location='jenissurat.php';</script>";
	} else {
 
$query = mysqli_query($koneksi,"INSERT INTO jenissuratkeluar (jenisSurat,keterangan)
					VALUES ('$jenisSurat','$keterangan')");
	}
 if($query){ 
  echo "<script> alert('Data Jenis Surat berhasil disimpan');
  window.location = 'jenissurat.php'</script>";
 }else{ 
 echo "<script> alert ('Data Jenis Surat Gagal disimpan');
window.location = 'jenissurat.php'</script>";
 }
 ?> 