<?php 
include "../../connect.php";
header("Content-type: application/json");

mysqli_query($con,"UPDATE astor set nama='".$_POST['nama']."', jurusan='".$_POST['jurusan']."', jenis_kelamin='".$_POST['gender']."', line='".$_POST['idline']."', handphone='".$_POST['handphone']."', email='".$_POST['email']."', organisasi_lk='".$_POST['organisasi']."', pos_organisasi_lk='".$_POST['posisi']."', hobi='".$_POST['hobi']."', ipk='".$_POST['ipk']."', status_konsumsi=".$_POST['konsumsi'].", alergi='".$_POST['alergi']."', tanggal_lahir='".$_POST['tgllahir']."', isi_biodata=1, last_update_bio=CURRENT_TIMESTAMP  WHERE nrp='".$_POST['nrp']."'");
$a = "Data Berhasil Diupdate";
$b = date("Y-m-d H:i:s");;

$hasil = json_encode(array("a" => $a, "b" => $b));
echo $hasil;
?>