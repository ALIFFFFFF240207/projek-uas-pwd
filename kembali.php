<?php
include('koneksi.php');

$tgl = date("Y-m-d");
$id = $_GET['id'];

mysqli_query($koneksi, "update meminjam set tgl_kembali = '$tgl',kembali = '2' where id_pinjam ='$id'");

header("location:pinjam_buku.php");
