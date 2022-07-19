<?php
include 'koneksi.php';
$filename = 'laporan peminjaman_' . time() . '.csv';

//post values
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

//select query 
if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
    $query = "SELECT * FROM meminjam where tgl_pinjam between '" . $from_date . "' and '" . $to_date . "' && kembali='2'";
}

$result = mysqli_query($koneksi, $query);
$laporan_arr = array();

//file creation
$file = fopen($filename, "w");

//Header Row
$laporan_arr = array("Id Pinjam", "Tanggal Pinjam", "Tanggal Kembali", "Peminjam", "Buku");

while ($row = mysqli_fetch_assoc($result)) {
    $id_pinjam = $row['id_pinjam'];
    $tgl_pinjam = $row['tgl_pinjam'];
    $tgl_kembali = $row['tgl_kembali'];
    $id_user = $row['id_user'];
    $kd_buku = $row['kd_buku'];
    //write to file
    $laporan_arr = array($id_pinjam, $tgl_pinjam, $tgl_kembali, $id_user, $kd_buku);
    fputcsv($file, $laporan_arr);
}

fclose($file);

//download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv;");

readfile($filename);

//deleting file
unlink($filename);
exit();
