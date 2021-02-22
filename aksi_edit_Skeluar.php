<?php 
include 'config/koneksi.php';
session_start();

$idsuratKeluar = $_POST['idsuratKeluar'];
$jenisSurat = $_POST['idJenisSurat'];
$nomorSurat = $_POST['nomorSurat'];
$tanggalKeluar = $_POST['tanggalKeluar'];
$perihal = $_POST['perihal'];
$tujuan = $_POST['tujuan'];

$lokasi_myfile = $_FILES['fileKeluar']['tmp_name'];
$nama_myfile = $_FILES['fileKeluar']['name'];
$tipe_myfile = $_FILES['fileKeluar']['type'];

 if(empty($lokasi_myfile)){
		$update = "UPDATE suratkeluar SET idJenisSurat='$jenisSurat', nomorSurat='$nomorSurat', tanggalKeluar='$tanggalKeluar', perihal='$perihal', tujuan='$tujuan' WHERE idsuratKeluar='$idsuratKeluar'";
	}
	else if (empty($nomorSurat)) {
     echo "<script> alert('Masukkan Nomor Surat'); window.location='suratkeluar.php';</script>";
     }	
	else if(!empty($lokasi_myfile)){
	if($tipe_myfile != "application/pdf" && $tipe_myfile != "application/msword" && $tipe_myfile != "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			echo "<script>alert('Proses Tambah Gagal, File Surat Harus .Pdf .Doc .Docx'); window.location='suratkeluar.php';</script>";
		} else {
     move_uploaded_file($lokasi_myfile,'filesurat/'.$nama_myfile);
     $update = "UPDATE suratkeluar SET idJenisSurat='$jenisSurat', nomorSurat='$nomorSurat', tanggalKeluar='$tanggalKeluar', perihal='$perihal', tujuan='$tujuan', fileKeluar='$nama_myfile' WHERE idsuratKeluar='$idsuratKeluar'";
		}
	}		
 $cek = mysqli_query($koneksi, $update); 
 
 if($cek){ 
  echo "<script> alert('Data Surat Keluar berhasil diubah');
  window.location = 'suratKeluar.php'</script>";
 }else{ 
 echo "<script> alert ('Data Surat Keluar Gagal diubah');
window.location = 'suratkeluar.php'</script>";
 }

 
 ?>  