<?php
include '../koneksi.php';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$output = fopen('php://output', 'w');
//post values
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

$rows = mysqli_query($koneksi, "SELECT id_pinjam as IdPinjam, tgl_pinjam as TanggalPinjam, tgl_kembali as TanggalKembali, id_user as IdUser, kd_buku as KodeBuku from meminjam where tgl_pinjam between '" . $from_date . "' and '" . $to_date . "' && kembali='2'");

$headers = "IdPinjam, TanggalPinjam, TanggalKembali, IdUser, KodeBuku";
fputcsv($output, explode(', ', $headers));
while ($row = mysqli_fetch_assoc($rows)) {

    fputcsv($output, $row);
}
fclose($output);
mysqli_close($koneksi);
exit();
