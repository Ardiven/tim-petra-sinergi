<?php
include "../../connect.php";

if(isset($_POST['id_ktb'])){
    $id = $_POST['id_ktb'];
    
    // Ambil nama anggota berdasarkan ID KTB
    $query = mysqli_query($con, "SELECT nama, jurusan FROM astor WHERE id_jadwal_ktb = '$id'");
    
    if(mysqli_num_rows($query) > 0){
        echo '<ul class="space-y-2">';
        while($row = mysqli_fetch_assoc($query)){
            echo '<li class="p-3 bg-gray-100 rounded flex justify-between">';
            echo '<span class="font-bold text-gray-700">'.$row['nama'].'</span>';
            echo '<span class="text-sm text-gray-500">'.$row['jurusan'].'</span>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p class="text-center text-gray-500 italic">Belum ada anggota.</p>';
    }
}
?>