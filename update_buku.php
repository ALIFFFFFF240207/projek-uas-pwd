<?php
include 'koneksi.php';

$kd_buku = $_POST['kd_buku'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$kategori = $_POST['kategori'];
$penerbit = $_POST['penerbit'];
$rak = $_POST['rak'];


mysqli_query($koneksi, "update buku set judul_buku='$judul_buku',pengarang='$pengarang',kategori='$kategori',penerbit='$penerbit',rak='$rak' where kd_buku='$kd_buku'");

header("location:rak_buku.php?kategori=$kategori");
