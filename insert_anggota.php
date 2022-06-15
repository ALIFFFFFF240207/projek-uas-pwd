<?php
include 'koneksi.php';

$id_anggota = $_POST['id_anggota'];
$nm_anggota = $_POST['nm_anggota'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$tgl_daftar = $_POST['tgl_daftar'];
$sts_anggota = $_POST['sts_anggota'];

mysqli_query($koneksi, "insert into anggota values('$id_anggota','$nm_anggota','$alamat','$tgl_lahir','$tgl_daftar','$sts_anggota')");

header("location:anggota.php");
