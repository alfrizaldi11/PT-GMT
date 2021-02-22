<?php 
include 'config/koneksi.php';
session_start();

$idSuratMasuk = $_POST['idSuratMasuk'];
$nomorSurat = $_POST['nomorSurat'];
$tanggalSurat = $_POST['tanggalSurat'];
$tanggalMasuk = $_POST['tanggalMasuk'];
$perihal = $_POST['perihal'];
$asal = $_POST['asal'];

$lokasi_myfile = $_FILES['fileMasuk']['tmp_name'];
$nama_myfile = $_FILES['fileMasuk']['name'];
$tipe_myfile = $_FILES['fileMasuk']['type'];

 if(empty($lokasi_myfile)){
		$update = "UPDATE suratmasuk SET nomorSurat='$nomorSurat', tanggalSurat='$tanggalSurat', tanggalMasuk='$tanggalMasuk', perihal='$perihal', asal='$asal' WHERE idSuratMasuk='$idSuratMasuk'";
	}
	else if (empty($nomorSurat)) {
     echo "<script> alert('Masukkan Nomor Surat'); window.location='suratmasuk.php';</script>";
     }	
	else if(!empty($lokasi_myfile)){
	if($tipe_myfile != "application/pdf" && $tipe_myfile != "application/msword" && $tipe_myfile != "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			echo "<script>alert('Proses Tambah Gagal, File Surat Harus .Pdf .Doc .Docx'); window.location='suratmasuk.php';</script>";
		} else {
     move_uploaded_file($lokasi_myfile,'filesurat/'.$nama_myfile);
     $update = "UPDATE suratmasuk SET nomorSurat='$nomorSurat', tanggalSurat='$tanggalSurat', tanggalMasuk='$tanggalMasuk', perihal='$perihal', asal='$asal', fileMasuk='$nama_myfile' WHERE idSuratMasuk='$idSuratMasuk'";
		}
	}		
 $cek = mysqli_query($koneksi, $update); 
 
 if($cek){ 
  echo "<script> alert('Data Surat Masuk berhasil diubah');
  window.location = 'suratmasuk.php'</script>";
 }else{ 
 echo "<script> alert ('Data Surat Masuk Gagal diubah');
window.location = 'suratmasuk.php'</script>";
 }

 
 ?>  