<?php
include 'config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM jenissuratkeluar WHERE idJenisSurat='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Jenis Surat Berhasil');
window.location='jenissurat.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Jenis Surat Gagal');
history.back(); </script>";
}
?>