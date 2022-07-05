<?php
require 'koneksi.php';

session_start();

$nomor_induk = $_POST['nomor_induk'];
$password = md5($_POST['password']);
$sql = mysqli_query($koneksi, "select * from user where nomor_induk = '$nomor_induk'");

$cek = mysqli_num_rows($sql);
if ($cek != 0) {
    $data = mysqli_fetch_assoc($sql);
    if ($password == $data['password'] && $data['level'] == 'admin') {
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['nomor_induk'] = $data['nomor_induk'];
        header("location:index.php?pesan=berhasil");
    } else if ($password == $data['password'] && $data['level'] == 'user') {
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['nomor_induk'] = $data['nomor_induk'];
        header("location:user/index.php?pesan=berhasil");
    } else {
        header("location:login.php?pesan=gagal");
    }
} else {
    header("location:login.php?pesan=gagal");
}
