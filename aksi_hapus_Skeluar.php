<?php
include 'config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM suratkeluar WHERE idsuratKeluar='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Surat Keluar Berhasil');
window.location='suratkeluar.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Surat Keluar Gagal');
history.back(); </script>";
}
?>