<?php
include "../../connect.php";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

// butuh ID astor yang sedang login skrg wkwkwk
$query_id_astor = mysqli_query($con, "SELECT id FROM astor WHERE nrp='" . $_SESSION['username'] . "'");
$row_id_astor = mysqli_fetch_assoc($query_id_astor);
$query = mysqli_query($con, "UPDATE astor set id_jadwal_ktb=" . $_POST['id_ktb'] . " WHERE nrp='" . $_SESSION['username'] . "'");
$hasil = json_encode(array("status" => true));
echo $hasil;