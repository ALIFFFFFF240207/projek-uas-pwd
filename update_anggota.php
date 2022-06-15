<?php
include 'koneksi.php';

$id_anggota = $_POST['id_anggota'];
$nm_anggota = $_POST['nm_anggota'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$tgl_daftar = $_POST['tgl_daftar'];
$sts_anggota = $_POST['sts_anggota'];

mysqli_query($koneksi, "update anggota set nm_anggota='$nm_anggota',alamat='$alamat',tgl_lahir='$tgl_lahir',tgl_daftar='$tgl_daftar',sts_anggota='$sts_anggota' where id_anggota='$id_anggota'");

header("location:anggota.php");
