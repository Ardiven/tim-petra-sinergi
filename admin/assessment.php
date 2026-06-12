<?php 
session_start();
include '../connect.php';

if (isset($_POST['page'])) {
    $page = $_POST['page'];
    $leg_presensi = intval($_POST['leg_assessment']) ? $_POST['leg_assessment']:0;

    if($leg_presensi == 0){
        exit;
    }


    if ($page == 'assessment') {
        $query = "SELECT k.nama
FROM kelompok k
LEFT JOIN astor a ON k.id = a.id_kelompok
LEFT JOIN assessment_leg al ON al.nrp = a.nrp AND al.materi = $leg_presensi
WHERE al.id IS NULL
GROUP BY k.nama;
";
        $result = mysqli_query($con, $query);
        $resp = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $incomplete_groups = [];
        foreach ($resp as $r){
            array_push($incomplete_groups, $r['nama']);
        }
        if(count($incomplete_groups) == 0){
            echo '<div class="text-center text-gray-500 py-8">
                    <p>Semua kelompok sudah mengisi presensi untuk LEG '.$leg_presensi.'</p>
                </div>';
        }
        echo '<div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">';
            $chunks = array_chunk($incomplete_groups, ceil(count($incomplete_groups) / 3));
            foreach($chunks as $chunk){            
                echo '<div class="text-center">';
                    foreach($chunk as $group){
                        echo '<div class="orange-primary font-medium text-lg mb-6 last:mb-0">
                            '.$group.'
                        </div>';
                    }
                echo '</div>';
                }
        echo '</div>
        </div>';

    }
}
?>