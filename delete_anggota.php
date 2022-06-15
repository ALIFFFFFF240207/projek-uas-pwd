<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "delete from anggota where id_anggota='$id'");

header("location:anggota.php");
