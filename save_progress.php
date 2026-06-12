<?php
include "connect.php";
try {
    if ( !isset($_POST['video_id']) || !isset($_POST['progress']) || !isset($_POST['real_watch'])) {
        throw new Exception('Parameter tidak lengkap');
    }
    
    $materi_id = $_SESSION['materi_id'];
    $video_id = mysqli_real_escape_string($con, $_POST['video_id']);
    $progress = intval($_POST['progress']);
    $real_watch = intval($_POST['real_watch']);
    $user_id = $_SESSION['username']; // sesuaikan dengan sistem login Anda
    
    // Cek apakah sudah ada record progress untuk user ini
    $check_query = "SELECT id, real_watch 
                    FROM progress_briefing 
                    WHERE nrp = '$user_id' AND materi = '$materi_id'";
    
    $check_result = mysqli_query($con, $check_query);
    
    if (!$check_result) {
        throw new Exception('Error checking existing progress: ' . mysqli_error($con));
    }
    
    if (mysqli_num_rows($check_result) > 0) {
        // Update existing record
        $existing = mysqli_fetch_assoc($check_result);
        $new_total_watch = $existing['real_watch'] + $real_watch;
        
        $update_query = "UPDATE progress_briefing 
                        SET posisi_terakhir = '$progress',
                            real_watch = '$new_total_watch',
                            materi = $materi_id,
                            update_at = NOW()
                        WHERE nrp = '$user_id' AND materi = $materi_id";
        
        $update_result = mysqli_query($con, $update_query);
        
        if (!$update_result) {
            throw new Exception('Error updating progress: ' . mysqli_error($con));
        }
        
        $action = 'updated';
        $total_watch_time = $new_total_watch;
        
    } else {
        // Insert new record
        $insert_query = "INSERT INTO progress_briefing (nrp, materi, posisi_terakhir, real_watch, update_at)
                        VALUES ('$user_id', $materi_id, '$progress', '$real_watch', NOW())";
        
        $insert_result = mysqli_query($con, $insert_query);
        
        if (!$insert_result) {
            throw new Exception('Error inserting progress: ' . mysqli_error($con));
        }
        
        $action = 'inserted';
        $total_watch_time = $real_watch;
    }
    
    echo json_encode([
        'success' => true,
        'message' => 'Progress berhasil disimpan',
        'data' => [
            'timestamp' => date('Y-m-d H:i:s'),
            'user_id' => $user_id,
            'materi_id' => $materi_id,
            'video_id' => $video_id,
            'progress' => $progress,
            'real_watch' => $real_watch,
            'total_watch_time' => $total_watch_time,
            'action' => $action
        ]
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}



?>