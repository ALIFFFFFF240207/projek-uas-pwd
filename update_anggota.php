<?php
include 'koneksi.php';

$id_user = $_POST['id_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$tgl_daftar = $_POST['tgl_daftar'];
$status = $_POST['status'];

mysqli_query($koneksi, "update user set nama_lengkap='$nama_lengkap',alamat='$alamat',tgl_daftar='$tgl_daftar',status='$status' where id_user='$id_user'");

header("location:anggota.php");