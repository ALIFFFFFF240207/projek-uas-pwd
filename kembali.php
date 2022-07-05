<?php
include('koneksi.php');

$tgl_kembali = $_POST['tgl_kembali'];
$id_pinjam = $_POST['id_pinjam'];
$kd_buku = $_POST['kd_buku'];

mysqli_query($koneksi, "update meminjam set tgl_kembali = '$tgl_kembali',kembali = '2' where id_pinjam ='$id_pinjam'");
mysqli_query($koneksi, "update buku set status_buku = '2'where kd_buku ='$kd_buku'");
header("location:pinjam_buku.php");
