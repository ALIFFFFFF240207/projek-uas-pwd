<?php
require 'koneksi.php';

$id_user = $_POST['id_user'];
$nomor_induk = $_POST['nomor_induk'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$password =  md5($_POST['password']);
$tgl = date("Y-m-d");
$level = 'user';
$status = 'aktif';
$error = '';

mysqli_query($koneksi, "insert into user values('$id_user','$nomor_induk','$nama_lengkap','$alamat','$password','$level','$status','$tgl')");

header("location:login.php?pesan=berhasil");
