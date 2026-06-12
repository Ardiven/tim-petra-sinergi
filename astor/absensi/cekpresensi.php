<?php
require "../../connect.php";
header('Content-Type: application/json');

$username = $_POST['username'] ?? '';
$materi = $_POST['materi'] ?? '';

$id_kelompok = mysqli_fetch_assoc(mysqli_query($con, "SELECT id_kelompok FROM astor WHERE nrp = '$username'"))['id_kelompok'];

$query = mysqli_query($con, "SELECT COUNT(*) as total FROM absen_eeg 
    WHERE id_kelompok = $id_kelompok  AND materi = '$materi'");
$row = mysqli_fetch_assoc($query);

$q = mysqli_fetch_assoc(mysqli_query($con, "SELECT count(*) as total FROM assessment_leg WHERE nrp = '$username' AND materi = '$materi'"));

echo json_encode(['presensi' => $row['total'] > 0, 'assesment' => $q['total'] > 0]);
