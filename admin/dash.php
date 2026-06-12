<?php 
include "../connect.php";
$q = "SELECT * FROM `jadwal_materi_eeg`  WHERE status = 1 ORDER BY `jadwal_materi_eeg`.`id` DESC LIMIT 1;";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_array($result);
$leg_presensi = $row['id'];

$query = "SELECT k.nama FROM `absen_leg25` ab RIGHT JOIN kelompok k on k.id = ab.id_kelompok and materi= $leg_presensi WHERE ab.id_kelompok is null GROUP by k.nama;";
$result = mysqli_query($con, $query);
$resp = mysqli_fetch_all($result, MYSQLI_ASSOC);

$query1 = "SELECT k.nama
FROM kelompok k
LEFT JOIN astor a ON k.id = a.id_kelompok
LEFT JOIN assessment_leg al ON al.nrp = a.nrp AND al.materi = $leg_presensi
WHERE al.id IS NULL
GROUP BY k.nama;
";
$result1 = mysqli_query($con, $query1);
$respon = mysqli_fetch_all($result1, MYSQLI_ASSOC);
?>