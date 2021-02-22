<?php 
include 'config/koneksi.php';
session_start();

$nomorSurat = $_POST['nomorSurat'];
$tanggalSurat = $_POST['tanggalSurat'];
$tanggalMasuk = $_POST['tanggalMasuk'];
$perihal = $_POST['perihal'];
$asal = $_POST['asal'];

$lokasi_myfile = $_FILES['fileMasuk']['tmp_name'];
$nama_myfile = $_FILES['fileMasuk']['name'];
$tipe_myfile = $_FILES['fileMasuk']['type'];
$direktori1 = "filesurat/$nama_myfile";
    // Apabila ada file yang diupload

    
 $sql="SELECT * FROM suratmasuk WHERE nomorSurat ='$nomorSurat'";
 $cek= mysqli_query($koneksi, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Nomor surat $nomorSurat sudah terdaftar'); window.location='suratmasuk.php';</script>";
	} else {
 if(empty($lokasi_myfile)){
		$query = "INSERT INTO suratmasuk (nomorSurat, tanggalSurat, tanggalMasuk, perihal, asal) VALUES ('$nomorSurat', '$tanggalSurat','$tanggalMasuk', '$perihal', '$asal')";
	}
	else if (empty($nomorSurat)) {
     echo "<script> alert('Masukkan Nomor Surat'); window.location='suratmasuk.php';</script>";
     }	
	else if(!empty($lokasi_myfile)){
	if($tipe_myfile != "application/pdf" && $tipe_myfile != "application/msword" && $tipe_myfile != "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			echo "<script>alert('Proses Tambah Gagal, File Surat Harus .Pdf .Doc .Docx'); window.location='suratmasuk.php';</script>";
		} else {
     move_uploaded_file($lokasi_myfile,'filesurat/'.$nama_myfile);
     $query = "INSERT INTO suratmasuk (fileMasuk, nomorSurat, tanggalSurat, tanggalMasuk, perihal, asal) VALUES ('$nama_myfile', '$nomorSurat', '$tanggalSurat','$tanggalMasuk', '$perihal', '$asal')";
		}
	}		
 $hasil = mysqli_query($koneksi, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Surat Masuk berhasil disimpan');
  window.location = 'suratmasuk.php'</script>";
 }else{ 
 echo "<script> alert ('Data Surat Masuk Gagal disimpan');
window.location = 'suratmasuk.php'</script>";
 }}
 
 ?>  