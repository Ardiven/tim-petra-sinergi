<?php
include "../connect.php";

// Function untuk get data absensi
function getAbsensi(){
    global $con;
    $sql = "SELECT * FROM absen_leg25";
    $result = mysqli_query($con, $sql);
    return $result;
}

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$selected_leg = isset($_GET['leg']) ? $_GET['leg'] : 'LEG 1';

// mock data, nnti ini query
$presensi_count = 20;
$assessment_count = 15;
$legs = ['LEG 1', 'LEG 2', 'LEG 3', 'LEG 4', 'LEG 5'];
$incomplete_groups = [
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4',
    'COMMUNICATION 3', 'COMMUNICATION 4', 'COMMUNICATION 4'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-48 bg-gray-100 min-h-screen flex flex-col">
            <div class="p-4">
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
                </nav>
            </div>
            
            <div class="mt-auto p-4 border-t border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-orange-primary rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <span class="orange-primary font-medium">Admin</span>
                    <i class="fas fa-sign-out-alt text-gray-400 ml-auto cursor-pointer hover:text-gray-600"></i>
                </div>
            </div>
        </div>

        <div class="flex-1">
            <?php if ($page == 'dashboard'): ?>
                <!-- Dashboard Content -->
                <div class="p-8 bg-gray-50">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold orange-primary">Dashboard Admin</h1>
                    </div>

                    <div class="space-y-6">
                        <!-- Presensi Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                            <h2 class="text-4xl font-bold orange-primary mb-6">Presensi</h2>
                            <div class="text-8xl font-bold orange-primary"><?= $presensi_count ?></div>
                        </div>

                        <!-- Assessment Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                            <h2 class="text-4xl font-bold orange-primary mb-6">Assessment</h2>
                            <div class="text-8xl font-bold orange-primary"><?= $assessment_count ?></div>
                        </div>
                    </div>
                </div>

            <?php elseif ($page == 'presensi'): ?>
                <!-- Presensi Content -->
                <div class="p-8 bg-gray-50">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold orange-primary mb-6">Presensi</h1>
                        
                        <div class="mb-6 flex justify-center">
                            <form method="GET" class="relative">
                                <input type="hidden" name="page" value="presensi">
                                <select name="leg" onchange="this.form.submit()" class="w-80 px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-400 text-center appearance-none cursor-pointer shadow-sm pr-10">
                                    <?php foreach($legs as $leg): ?>
                                        <option value="<?= $leg ?>" <?= $selected_leg == $leg ? 'selected' : '' ?>>
                                            <?= $leg ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php if (count($incomplete_groups) > 0): ?>
                        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                                <?php 
                                $chunks = array_chunk($incomplete_groups, ceil(count($incomplete_groups) / 3));
                                foreach($chunks as $chunk): 
                                ?>
                                    <div class="text-center">
                                        <?php foreach($chunk as $group): ?>
                                            <div class="orange-primary font-medium text-lg mb-6 last:mb-0">
                                                <?= $group ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="text-center text-gray-500 py-8">
                            <p>Semua kelompok sudah mengisi presensi untuk <?= $selected_leg ?></p>
                        </div>
                    <?php endif; ?>
                </div>

            <?php elseif ($page == 'assessment'): ?>
                <!-- Assessment Content -->
                <div class="p-8 bg-gray-50">
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold orange-primary mb-6">Assessment</h1>
                        
                        <div class="mb-6 flex justify-center">
                            <form method="GET" class="relative">
                                <input type="hidden" name="page" value="assessment">
                                <select name="leg" onchange="this.form.submit()" class="w-80 px-4 py-3 border border-gray-300 rounded-lg bg-white text-gray-400 text-center appearance-none cursor-pointer shadow-sm pr-10">
                                    <?php foreach($legs as $leg): ?>
                                        <option value="<?= $leg ?>" <?= $selected_leg == $leg ? 'selected' : '' ?>>
                                            <?= $leg ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php if (count($incomplete_groups) > 0): ?>
                        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                                <?php 
                                $chunks = array_chunk($incomplete_groups, ceil(count($incomplete_groups) / 3));
                                foreach($chunks as $chunk): 
                                ?>
                                    <div class="text-center">
                                        <?php foreach($chunk as $group): ?>
                                            <div class="orange-primary font-medium text-lg mb-6 last:mb-0">
                                                <?= $group ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="text-center text-gray-500 py-8">
                            <i class="fas fa-file-text text-4xl text-gray-300 mb-4"></i>
                            <p>Semua kelompok sudah mengerjakan assessment untuk <?= $selected_leg ?></p>
                        </div>
                    <?php endif; ?>
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

            <?php endif; ?>
        </div>
    </div>

</body>
</html>