<?php
include 'koneksi.php';

$kd_buku = $_POST['kd_buku'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$jenis_buku = $_POST['jenis_buku'];
$penerbit = $_POST['penerbit'];
$kategori = $_POST['kategori'];
$rak = $_POST['rak'];

mysqli_query($koneksi, "insert into buku values('$kd_buku','$judul_buku','$pengarang','$kategori','$penerbit','$rak')");

header("location:rak_buku.php");
