<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

// Include required files
include_once '../../connect.php';
include 'functions.php';
include_once __DIR__ . '/upload/drive.php';

// Start session if not started
if (!isset($_SESSION)) {
    session_start();
}

// Google Drive folder IDs
$root_folder_id_bu = '1Xevk7WwV_RFNJRZsSFUU-U4HoiLnmgGe';
$root_folder_id = '1drEJF8FSFA4si4jurm6FpXZY8J9t3rx8';

// Session validation
if (!isset($_SESSION['id_kelompok']) || $_SESSION['id_kelompok'] == 0) {
    echo "Session tidak valid. Silakan login kembali.";
    exit;
}

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    echo "Username tidak valid. Silakan login kembali.";
    exit;
}

// Validate required POST data
if (!isset($_POST['sesi']) || empty($_POST['sesi'])) {
    echo "Sesi tidak dipilih. Silakan pilih materi terlebih dahulu.";
    exit;
}



// Initialize variables
$nrp = $_SESSION['username'];
$id_klmpk = $_SESSION['id_kelompok'];
$sesi = intval($_POST['sesi']);
date_default_timezone_set("Asia/Jakarta");
$waktu = date('Y-m-d H:i:s');
$result = '0';

$maba = mysqli_fetch_assoc(mysqli_query($con, "SELECT nrp FROM maba WHERE id_kelompok = $id_kelompok"));

while ($maba) {
    if (!$_POST['kh-' . $maba['nrp']]){
        echo "Data Keaktifan Maba Belum diisi.";

    }
};

// Validate file uploads
$maxFileSize = 2 * 1024 * 1024; // 2 MB

if (!isset($_FILES['fileToUploadStart']) || $_FILES['fileToUploadStart']['error'] !== UPLOAD_ERR_OK) {
    echo "File foto awal LEG wajib diupload.";
    exit;
}

if (!isset($_FILES['fileToUploadFinish']) || $_FILES['fileToUploadFinish']['error'] !== UPLOAD_ERR_OK) {
    echo "File foto akhir LEG wajib diupload.";
    exit;
}

if ($_FILES['fileToUploadStart']['size'] > $maxFileSize) {
    echo "Ukuran file foto awal LEG terlalu besar. Maksimal 2 MB.";
    exit;
}

if ($_FILES['fileToUploadFinish']['size'] > $maxFileSize) {
    echo "Ukuran file foto akhir LEG terlalu besar. Maksimal 2 MB.";
    exit;
}

// Validate susulan files if uploaded
if (isset($_FILES['fileToUploadSusulanStart']['name'][0]) && !empty($_FILES['fileToUploadSusulanStart']['name'][0])) {
    foreach ($_FILES['fileToUploadSusulanStart']['size'] as $size) {
        if ($size > $maxFileSize) {
            echo "Salah satu file susulan start terlalu besar. Maksimal 2 MB per file.";
            exit;
        }
    }
}

if (isset($_FILES['fileToUploadSusulanFinish']['name'][0]) && !empty($_FILES['fileToUploadSusulanFinish']['name'][0])) {
    foreach ($_FILES['fileToUploadSusulanFinish']['size'] as $size) {
        if ($size > $maxFileSize) {
            echo "Salah satu file susulan finish terlalu besar. Maksimal 2 MB per file.";
            exit;
        }
    }
}

// Check session status and deadline
$statusQuery = mysqli_query($con, "SELECT status, tanggal FROM jadwal_materi_eeg WHERE id = $sesi");
if (!$statusQuery) {
    echo "Error mengakses database: " . mysqli_error($con);
    exit;
}

$status = mysqli_fetch_assoc($statusQuery);
if (!$status) {
    echo "Sesi tidak ditemukan.";
    exit;
}

// Get group name
$nkQuery = mysqli_query($con, "SELECT nama FROM kelompok WHERE id = $id_klmpk");
if (!$nkQuery) {
    echo "Error mengakses data kelompok: " . mysqli_error($con);
    exit;
}

$nk = mysqli_fetch_assoc($nkQuery);
if (!$nk) {
    echo "Data kelompok tidak ditemukan.";
    exit;
}

$_SESSION['nama_kelompok'] = $nk['nama'];

// Check if submission is still allowed
$today = date('Y-m-d H:i:s');
$deadline = date('Y-m-d H:i:s', strtotime($status['tanggal']));

if ($today > $deadline || $status['status'] == 2) {
    echo "Maaf, waktu submit presensi telah habis.";
    exit;
}

// Check if already submitted
$existingQuery = mysqli_query($con, "SELECT * FROM absen_eeg WHERE id_kelompok = $id_klmpk AND materi = $sesi");
if (!$existingQuery) {
    echo "Error mengecek data existing: " . mysqli_error($con);
    exit;
}

if (mysqli_num_rows($existingQuery) > 0) {
    echo "Anda telah mengisi presensi untuk materi ini.";
    exit;
}

try {
    // Generate filenames
    $newFilenameStart = $_SESSION['nama_kelompok'] . "_Materi_" . $sesi . "_START_" . $nrp . "_";
    $newFilenameFinish = $_SESSION['nama_kelompok'] . "_Materi_" . $sesi . "_FINISH_" . $nrp . "_";
    $newFilenameSusulanStart = $_SESSION['nama_kelompok'] . "_Materi_" . $sesi . "_SUSULAN_START_";
    $newFilenameSusulanFinish = $_SESSION['nama_kelompok'] . "_Materi_" . $sesi . "_SUSULAN_FINISH_";

    // Process main files
    $fileStart = array();
    $fileStart[] = getFile($_FILES['fileToUploadStart'], $newFilenameStart);

    $fileFinish = array();
    $fileFinish[] = getFile($_FILES['fileToUploadFinish'], $newFilenameFinish);

    // Process susulan files if exists
    $fileSusulanStart = array();
    $fileSusulanFinish = array();

    if (isset($_FILES['fileToUploadSusulanStart']['name'][0]) && !empty($_FILES['fileToUploadSusulanStart']['name'][0])) {
        $fileSusulanStartTemp = reArrayFiles($_FILES['fileToUploadSusulanStart']);
        $i = 1;
        foreach ($fileSusulanStartTemp as $file) {
            $fileSusulanStart[] = getFile($file, $newFilenameSusulanStart . $i);
            $i++;
        }

        $fileSusulanFinishTemp = reArrayFiles($_FILES['fileToUploadSusulanFinish']);
        $i = 1;
        foreach ($fileSusulanFinishTemp as $file) {
            $fileSusulanFinish[] = getFile($file, $newFilenameSusulanFinish . $i);
            $i++;
        }
    }

    // Get or create Google Drive folder structure
    $kelompokQuery = mysqli_query($con, "SELECT * FROM kelompok WHERE id = $id_klmpk");
    if (!$kelompokQuery) {
        throw new Exception("Error mengakses data kelompok: " . mysqli_error($con));
    }
    
    $kelompok = mysqli_fetch_assoc($kelompokQuery);
    if (!$kelompok) {
        throw new Exception("Data kelompok tidak ditemukan.");
    }

    // Create or get folder ID
    if (empty($kelompok["gdrive_folder_kelompok"])) {
        $folder_id = getFolderId($root_folder_id, $kelompok["nama"]);
        $updateQuery = mysqli_query($con, "UPDATE `kelompok` SET `gdrive_folder_kelompok`='$folder_id' WHERE id = $id_klmpk");
        if (!$updateQuery) {
            throw new Exception("Error updating folder ID: " . mysqli_error($con));
        }
    } else {
        $folder_id = $kelompok["gdrive_folder_kelompok"];
    }

    // Create material folder
    $materi = "Materi " . $sesi;
    $folder_id = getFolderId($folder_id, $materi);

    // Upload files to Google Drive
    $fileStartID = getFilesId($fileStart, $folder_id);
    $fileFinishID = getFilesId($fileFinish, $folder_id);

    $fileSusulanStartID = array();
    $fileSusulanFinishID = array();

    if (!empty($fileSusulanStart)) {
        $susulan_folder_id = getFolderId($folder_id, "Susulan");
        $fileSusulanStartID = getFilesId($fileSusulanStart, $susulan_folder_id);
        $fileSusulanFinishID = getFilesId($fileSusulanFinish, $susulan_folder_id);
    }

    // Prepare file IDs for database
    $fileStartDBID = $fileStartID[0];
    $fileFinishDBID = $fileFinishID[0];

    $fileSusulanStartDBID = "";
    if (!empty($fileSusulanStartID)) {
        $fileSusulanStartDBID = implode(";", $fileSusulanStartID) . ";";
    }

    $fileSusulanFinishDBID = "";
    if (!empty($fileSusulanFinishID)) {
        $fileSusulanFinishDBID = implode(";", $fileSusulanFinishID) . ";";
    }

    // Get student list and insert attendance records
    $studentQuery = mysqli_query($con, "SELECT * FROM maba WHERE id_kelompok = $id_klmpk ORDER BY nrp");
    if (!$studentQuery) {
        throw new Exception("Error mengakses data mahasiswa: " . mysqli_error($con));
    }

    if (mysqli_num_rows($studentQuery) == 0) {
        throw new Exception("Tidak ada data mahasiswa untuk kelompok ini.");
    }

    // Begin transaction
    mysqli_autocommit($con, false);

    $insertSuccess = true;
    while ($row = mysqli_fetch_assoc($studentQuery)) {
        $nrp_maba = $row['nrp'];
        $kehadiran = $_POST[$nrp_maba];
        
        $insertQuery = "INSERT INTO absen_eeg(
            `id`, `materi`, `astor`, `id_kelompok`, `nrp_maba`, `status`, 
            `waktu`, `gdrive_start`, `gdrive_finish`, `gdrive_susulan_start`, `gdrive_susulan_finish`
        ) VALUES (
            DEFAULT, $sesi, '$nrp', $id_klmpk, '$nrp_maba', '$kehadiran', 
            '$waktu', '$fileStartDBID', '$fileFinishDBID', '$fileSusulanStartDBID', '$fileSusulanFinishDBID'
        )";
        
        $insertResult = mysqli_query($con, $insertQuery);
        if (!$insertResult) {
            $insertSuccess = false;
            break;
        }
    }

    if ($insertSuccess) {
        mysqli_commit($con);
        echo "Pengisian presensi berhasil!";
    } else {
        mysqli_rollback($con);
        throw new Exception("Error menyimpan data absensi: " . mysqli_error($con));
    }

} catch (Exception $e) {
    if (isset($con)) {
        mysqli_rollback($con);
    }
    echo "Terjadi kesalahan: " . $e->getMessage();
} finally {
    if (isset($con)) {
        mysqli_autocommit($con, true);
    }
}
?>