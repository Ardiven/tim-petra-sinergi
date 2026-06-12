<?php
require "../../connect.php";

  // CEK KELOMPOK WGG
if(!isset($_SESSION['id_kelompok'])){
	header("location:http://tps.petra.ac.id/login.php");
}
else if($_SESSION['id_kelompok'] == 0) {
	header("location:http://tps.petra.ac.id/login.php");
}

if (!isset($_SESSION['username'])) {	
	header("location:http://tps.petra.ac.id/login.php");		
}
else if ($_SESSION['jenis'] != "astor") {
	header("location:http://tps.petra.ac.id/login.php?illegal=0");
}

if ($_SESSION['username'] == '') {	
	header("location:http://tps.petra.ac.id/login.php");		
}
date_default_timezone_set("Asia/Jakarta");

$nrp = $_SESSION['username'];
$id_klmpk= $_SESSION['id_kelompok'];
// $comment = $_POST['comment'];
$sesi = $_POST['sesi'];
$waktu = date('Y-m-d H:i:s');
// $berita = $_POST['berita_acara'];

$p1 = $_POST['no1'];
$p2 = $_POST['no2'];
$p3 = $_POST['no3'];
$p4 = $_POST['no4'];

//tmbhn
$result='0';
$status=mysqli_fetch_assoc(mysqli_query($con,"SELECT status FROM jadwal_materi_eeg WHERE id = ".$_POST['sesi']));
$today=date('Y-m-d H-i-s');
$daydb=mysqli_fetch_assoc(mysqli_query($con,"SELECT tanggal FROM jadwal_materi_eeg WHERE id = ".$_POST['sesi']));
 
$date = date('Y-m-d H-i-s', strtotime("+0 day", strtotime($daydb['tanggal'])));


if($today>$date || $status['status'] == 3)
{
	$result='1';
}


// $check = mysqli_fetch_assoc(mysqli_query($con2,"SELECT sesi FROM comment"));
$query = mysqli_query($con, "SELECT * FROM maba WHERE id_kelompok = $id_klmpk");
$qry = mysqli_query($con,"SELECT * FROM absen_eeg WHERE id_kelompok = $id_klmpk AND materi = ".$_POST['sesi']);
if($result=='0' && $nrp != ''){
	mysqli_query($con,"INSERT INTO `assessment_leg`
   (`id`, `nrp`, `materi`, `suasana_diskusi`, `persiapan_pribadi`, `kendala`, `manfaat_materi`) 
   VALUES (DEFAULT,'$nrp',$sesi, '$p1', '$p2', '$p3', '$p4')");
   if (mysqli_affected_rows($con) > 0) {
    echo "Berhasil";
	} else {
		echo "Gagal Input Data";
	}
}else{
	echo "Maaf Assessment Sudah Tidak Bisa Di Input";
}

?>