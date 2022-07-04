<?php
require 'koneksi.php';

session_start();

$nomer_induk = $_POST['nomer_induk'];
$password = $_POST['password'];

$sql = mysqli_query($koneksi, "select * from user where nomer_induk = '$nomer_induk' and password = '$password' ");

$cek = mysqli_num_rows($sql);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($sql);

    if ($data['level'] == "admin") {
        $_SESSION['user'] = $data['nomer_induk'];
        $_SESSION['level'] = "admin";
        header("location:index.php");
    } else if ($data['level'] == "user") {
        $_SESSION['user'] = $data['nomer_induk'];
        $_SESSION['level'] = "user";
        header("location:user/index.php");
    } else {
        header("location:login.php?alert=gagal");
    }
}
