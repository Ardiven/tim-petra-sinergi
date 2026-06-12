<?php
session_start();
include "../connect.php";
include "dash.php";

// Function untuk get data absensi
$sql = "SELECT * FROM jadwal_materi_eeg";
$result = mysqli_query($con, $sql);

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$selected_leg = isset($_GET['leg']) ? $_GET['leg'] : 'LEG 1';

if (isset($_SESSION['leg_presensi'])){
    $resp = $_SESSION['leg_presensi'];
    foreach ($resp as $r){
        array_push($incomplete_groups, $r['nama']);
    }
 
}

if(!isset($_SESSION['username']) || !isset($_SESSION['jenis'])){
    header("location:index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .orange-primary { color: #ED8116; }
        .bg-orange-primary { background-color: #ED8116; }
        .border-orange-primary { border-color: #ED8116; }
        .hover-orange-primary:hover { background-color: #d4730f; }
    </style>
</head>
<body class="bg-gray-50 h-screen overflow-hidden">
    <div class="flex h-screen">
        <!-- Fixed Sidebar -->
        <div class="w-48 bg-gray-100 h-full flex flex-col fixed left-0 top-0 z-10">
            <div class="p-4 flex-1">
                <nav class="space-y-2">
                    <a href="?page=dashboard" 
                       class="w-full flex items-center gap-3 px-3 py-2 rounded-lg transition-colors <?= $page == 'dashboard' ? 'bg-orange-100 orange-primary' : 'text-gray-600 hover:bg-gray-200' ?>">
                        <i class="fas fa-chart-bar w-4"></i>
                        Dashboard
                    </a>
                    <a href="?page=presensi" 
                       class="w-full flex items-center gap-3 px-3 py-2 rounded-lg transition-colors <?= $page == 'presensi' ? 'bg-orange-100 orange-primary' : 'text-gray-600 hover:bg-gray-200' ?>">
                        <i class="fas fa-users w-4"></i>
                        Presensi
                    </a>
                    <a href="?page=assessment" 
                       class="w-full flex items-center gap-3 px-3 py-2 rounded-lg transition-colors <?= $page == 'assessment' ? 'bg-orange-100 orange-primary' : 'text-gray-600 hover:bg-gray-200' ?>">
                        <i class="fas fa-file-text w-4"></i>
                        Assessment
                    </a>
                    <a href="?page=video" 
                       class="w-full flex items-center gap-3 px-3 py-2 rounded-lg transition-colors <?= $page == 'video' ? 'bg-orange-100 orange-primary' : 'text-gray-600 hover:bg-gray-200' ?>">
                        <i class="fas fa-video w-4"></i>
                        Video Briefing
                    </a>
                    <a href="?page=KTB" 
                       class="w-full flex items-center gap-3 px-3 py-2 rounded-lg transition-colors <?= $page == 'video' ? 'bg-orange-100 orange-primary' : 'text-gray-600 hover:bg-gray-200' ?>">
                        <i class="fas fa-file w-4"></i>
                        Data KTB
                    </a>
                </nav>
            </div>
            
            <div class="p-4 border-t border-gray-200">
                <a href="logout.php" class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-orange-primary rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <span class="orange-primary font-medium">Admin</span>
                    <i class="fas fa-sign-out-alt text-gray-400 ml-auto cursor-pointer hover:text-gray-600"></i>
                </a>
            </div>
        </div>

        <!-- Main Content Area with Left Margin -->
        <div class="flex-1 ml-48 h-full overflow-y-auto">
            <?php if ($page == 'dashboard'): ?>
                <!-- Dashboard Content -->
                <div class="p-8 bg-gray-50">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold orange-primary">Dashboard Admin</h1>
                        <p>Selamat datang di halaman dashboard admin Tim <?= $_SESSION['jenis'] ?></p>
                    </div>

                    <div class="space-y-6">
                        <!-- Presensi Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                            <h2 class="text-4xl font-bold orange-primary mb-6">Presensi</h2>
                            <div class="text-8xl font-bold orange-primary"><?= count($resp) ?></div>
                        </div>

                        <!-- Assessment Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                            <h2 class="text-4xl font-bold orange-primary mb-6">Assessment</h2>
                            <div class="text-8xl font-bold orange-primary"><?= count($respon) ?></div>
                        </div>
                    </div>
                </div>

            <?php elseif ($page == 'presensi'): ?>
                <!-- Presensi Content -->
                <div class="p-8 bg-gray-50">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold orange-primary mb-6">Presensi</h1>
                        
                        <div class="mb-6 flex justify-center">
                            <form class="relative">
                                <input type="hidden" name="page" value="presensi">
                                <select name="leg_presensi" id="leg_presensi" class="w-80 px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-400 text-center appearance-none cursor-pointer shadow-sm pr-10">
                                <option selected>
                                            Pilih Materi
                                        </option>
                                <?php foreach($result as $leg): ?>
                                        <option value="<?= $leg['id'] ?>" <?= $selected_leg == $leg ? 'selected' : '' ?>>
                                            <?= $leg['nama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                        <div id="presensi_content">
                            
                        </div>
                    
                </div>

            <?php elseif ($page == 'assessment'): ?>
                <!-- Assessment Content -->
                <div class="p-8 bg-gray-50">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold orange-primary mb-6">Assessment</h1>
                        
                       <div class="mb-6 flex justify-center">
                            <form class="relative">
                                <input type="hidden" name="page" value="assessment">
                                <select name="leg_assessment" id="leg_assessment" class="w-80 px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-400 text-center appearance-none cursor-pointer shadow-sm pr-10">
                                <option selected>
                                            Pilih Materi
                                        </option>
                                <?php foreach($result as $leg): ?>
                                        <option value="<?= $leg['id'] ?>" <?= $selected_leg == $leg ? 'selected' : '' ?>>
                                            <?= $leg['nama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                        <div id="assessment_content">
                            
                        </div>
                    
                </div>

                    

            <?php elseif ($page == 'video'): ?>
                <!-- Video Briefing -->
                <div class="p-8 bg-gray-50">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold orange-primary">Video Briefing</h1>
                    </div>
                    
                    <div class="text-center text-gray-500 mt-12">
                        <i class="fas fa-video text-4xl text-gray-300 mb-4"></i>
                        <p>Video Briefing content will be implemented here</p>
                    </div>
                </div>
            <?php elseif ($page == 'KTB'):?>
                <div class="p-8 bg-gray-50">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold orange-primary mb-6">Data KTB</h1>
                        <?php include 'C:\laragon\www\tps\astor\ktb\master.php'; ?>
                    </div>
                </div>


            <?php endif; ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#leg_presensi').on('change', function() {
                $.ajax({
                    url: 'presensi.php',
                    type: 'POST',
                    data: {
                        page: 'presensi',
                        leg_presensi: $(this).val()
                    },
                    success: function(response) {
                        $('#presensi_content').html(response);
                    }
                });
            });
            $('#leg_assessment').on('change', function() {
                $.ajax({
                    url: 'assessment.php',
                    type: 'POST',
                    data: {
                        page: 'assessment',
                        leg_assessment: $(this).val()
                    },
                    success: function(response) {
                        $('#assessment_content').html(response);
                    }
                });
            });
        });
    </script>

</body>
</html>