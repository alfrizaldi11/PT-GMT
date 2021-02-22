<?php 
include 'config/koneksi.php';
session_start();

$jenisSurat = $_POST['idJenisSurat'];
$nomorSurat = $_POST['nomorSurat'];
$tanggalKeluar = $_POST['tanggalKeluar'];
$perihal = $_POST['perihal'];
$tujuan = $_POST['tujuan'];

$lokasi_myfile = $_FILES['fileKeluar']['tmp_name'];
$nama_myfile = $_FILES['fileKeluar']['name'];
$tipe_myfile = $_FILES['fileKeluar']['type'];
$direktori1 = "filesurat/$nama_myfile";
    // Apabila ada file yang diupload

    
 $sql="SELECT * FROM suratkeluar WHERE nomorSurat ='$nomorSurat'";
 $cek= mysqli_query($koneksi, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Nomor surat $nomorSurat sudah terdaftar'); window.location='suratkeluar.php';</script>";
	} else {
 if(empty($lokasi_myfile)){
		$query = "INSERT INTO suratkeluar (idJenisSurat, nomorSurat, tanggalKeluar, perihal, tujuan) VALUES ('$jenisSurat', '$nomorSurat', '$tanggalKeluar', '$perihal', '$tujuan')";
	}
	else if (empty($nomorSurat)) {
     echo "<script> alert('Masukkan Nomor Surat'); window.location='suratkeluar.php';</script>";
     }	
	else if(!empty($lokasi_myfile)){
	if($tipe_myfile != "application/pdf" && $tipe_myfile != "application/msword" && $tipe_myfile != "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			echo "<script>alert('Proses Tambah Gagal, File Surat Harus .Pdf .Doc .Docx'); window.location='suratkeluar.php';</script>";
		} else {
     move_uploaded_file($lokasi_myfile,'filesurat/'.$nama_myfile);
     $query = "INSERT INTO suratkeluar (fileKeluar, idJenisSurat, nomorSurat, tanggalKeluar, perihal, tujuan) VALUES ('$nama_myfile', '$jenisSurat', '$nomorSurat', '$tanggalKeluar', '$perihal', '$tujuan')";
		}
	}		
 $hasil = mysqli_query($koneksi, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Surat Keluar berhasil disimpan');
  window.location = 'suratkeluar.php'</script>";
 }else{ 
 echo "<script> alert ('Data Surat Keluar Gagal disimpan');
window.location = 'suratkeluar.php'</script>";
 }}
 
 ?>  