<?php 
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "delete from buku where kd_buku='$id'");

header("location:rak_buku.php");
?>