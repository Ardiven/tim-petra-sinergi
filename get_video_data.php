<?php
header('Content-Type: application/json');
include "connect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);


try {
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['username'])) {
        throw new Exception('Session username tidak valid. Silakan login kembali.');
    }

    // Ambil data materi terbaru
    $query_materi = "SELECT * 
        FROM `jadwal_materi_eeg` 
        WHERE video_briefing IS NOT NULL 
        ORDER BY `id` DESC 
        LIMIT 1";
    
    $result_materi = mysqli_query($con, $query_materi);
    
    if (!$result_materi) {
        throw new Exception('Error query materi: ' . mysqli_error($con));
    }
    
    $materi = mysqli_fetch_array($result_materi);
    
    if (!$materi) {
        throw new Exception('Data materi tidak ditemukan');
    }
    
    // $_SESSION['id_kelompok'] = $materi['id_kelompok'];
    $materi_id = $materi['id'];
    $_SESSION['materi_id'] = $materi_id;
    $user_id = $_SESSION['username'];
    
    // Ambil progress user untuk materi ini
    $query_progress = "SELECT 
            COALESCE(posisi_terakhir, 0) as last_progress,
            COALESCE(real_watch, 0) as total_watch_time
        FROM progress_briefing 
        WHERE materi = '$materi_id' AND nrp = '$user_id'";
    
    $result_progress = mysqli_query($con, $query_progress);
    
    if (!$result_progress) {
        throw new Exception('Error query progress: ' . mysqli_error($con));
    }
    
    $progress = mysqli_fetch_array($result_progress);
    
    // Jika belum ada progress, set default 0
    $last_progress = $progress ? $progress['last_progress'] : 0;
    $total_watch_time = $progress ? $progress['total_watch_time'] : 0;
    
    // Return response
    echo json_encode([
        'success' => true,
        'materi_id' => $materi['id'],
        'title' => $materi['nama'],
        'youtube_id' => $materi['video_briefing'],
        'last_progress' => $last_progress,
        'total_watch_time' => $total_watch_time
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>