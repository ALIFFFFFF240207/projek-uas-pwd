<?php 
 include 'koneksi.php';

$kd_buku = $_POST['kd_buku'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$jenis_buku = $_POST['jenis_buku'];
$penerbit = $_POST['penerbit'];

mysqli_query($koneksi, "update buku set judul_buku='$judul_buku',pengarang='$pengarang',jenis_buku='$jenis_buku',penerbit='$penerbit' where kd_buku='$kd_buku'");

header("location:rak_buku.php");

?>