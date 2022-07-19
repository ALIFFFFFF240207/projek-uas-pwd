<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "delete from user where id_user='$id'");

header("location:anggota.php");
