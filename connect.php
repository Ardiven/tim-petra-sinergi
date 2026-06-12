<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// koneksi ke database Laragon MySQL
$con = mysqli_connect("127.0.0.1", "root", "", "tps");

// cek koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
