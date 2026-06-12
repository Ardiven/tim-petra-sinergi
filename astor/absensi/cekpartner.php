<?php
require "../../connect.php";
header('Content-Type: application/json');

$username = $_POST['username'] ?? '';
$materi = $_POST['materi'] ?? '';
$kelompok = $_POST['kelompok'] ?? '';

$partner = mysqli_fetch_assoc(mysqli_query($con, "SELECT count(*) as total FROM astor WHERE id_kelompok = '$kelompok'"));

$row = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM absen_eeg WHERE id_kelompok = '$kelompok' AND materi = '$materi'"));

echo json_encode(['partner' => $partner['total'] > 1, 'presensi' => $row['total'] > 0]);
?>