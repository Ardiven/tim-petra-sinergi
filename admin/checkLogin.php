<?php
session_start(); 
if (isset($_POST['submit'])) {
    include "connect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jenis = $_POST['jenis'];
    checkLogin($username, $password, $jenis);
}

function checkLogin($username, $password, $jenis) {
    if ($jenis == "Data") {
        if ($username == "admin" && $password == "tobetherealyou") {
            $_SESSION['username'] = $username;
            $_SESSION['jenis'] = $jenis;
            header("location:index.php?jenis=$jenis");
        } else {
            header("location:login.php?wrong=1");
        }
    }
}

?>