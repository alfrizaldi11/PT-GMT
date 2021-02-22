<?php
include 'config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM suratmasuk WHERE idSuratMasuk='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Surat Masuk Berhasil');
window.location='suratmasuk.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Surat Masuk Gagal');
history.back(); </script>";
}
?>