<?php
session_start();
include_once '../../connect.php';

// ============================================================================
// INISIALISASI SESSION & VARIABEL
// ============================================================================
// Untuk development - hapus/comment saat production
$username = 'c14230072';
$username = strtoupper($username);

// Untuk production - uncomment baris di bawah
// if (!isset($_SESSION['id_kelompok'])) {
//     header("location: ../index.php?stat=3");
//     exit;
// }
// $username = $_SESSION['username'];
// $id_kelompok = $_SESSION['id_kelompok'];

// ============================================================================
// FUNGSI HELPER
// ============================================================================
function encodeNRP($nrp) {
    $secret_key = "your_secret_key";
    return base64_encode($nrp . $secret_key);
}

function nrpAstor($data, $username){
    foreach ($data as $key) {
        $key['nrp'] = strtoupper($key['nrp']);
        if($key['nrp'] == $username){
            return $key['kelompok'];
        }
    }
}

// ============================================================================
// AMBIL DATA BERDASARKAN NRP (jika ada di URL)
// ============================================================================
$nrp_mahasiswa = null;
$result_soal_jawaban = null;
$nama_mahasiswa = null;

if (isset($_GET['nrp'])) {
    $encoded_nrp = base64_decode($_GET['nrp']);
    $nrp_mahasiswa = str_replace('secret', '', $encoded_nrp);
    
    // Ambil data soal dan jawaban essay berdasarkan NRP
    $sql_soal_jawaban = "SELECT q.id, q.teks_soal, e.jawaban_essay 
                         FROM uts_leg q 
                         JOIN essay_results e ON q.id = e.id_soal 
                         WHERE e.nrp = ?";
    $stmt_soal_jawaban = $con->prepare($sql_soal_jawaban);
    $stmt_soal_jawaban->bind_param("s", $nrp_mahasiswa);
    $stmt_soal_jawaban->execute();
    $result_soal_jawaban = $stmt_soal_jawaban->get_result();
    
    // Ambil nama mahasiswa
    $sql_nama = "SELECT * FROM maba WHERE nrp = ?";
    $stmt_nama = $con->prepare($sql_nama);
    $stmt_nama->bind_param("s", $nrp_mahasiswa);
    $stmt_nama->execute();
    $result_nama = $stmt_nama->get_result();
    $nama_mahasiswa = $result_nama->fetch_assoc();
}

// ============================================================================
// AMBIL DAFTAR ASTOR BERDASARKAN KELOMPOK
// ============================================================================
$sql_daftar_astor = "SELECT id, nama, nrp,
        ROW_NUMBER() OVER (ORDER BY id) AS kelompok
    FROM astor where id_kelompok > 0 and id_kelompok <200";
$stmt_daftar_astor = $con->prepare($sql_daftar_astor);
// $stmt_daftar_maba->bind_param("i", $id_kelompok);
$stmt_daftar_astor->execute();
$result_daftar_astor = $stmt_daftar_astor->get_result();

$astor = nrpAstor($result_daftar_astor, $username);
// ============================================================================
// AMBIL DAFTAR MAHASISWA BARU BERDASARKAN KELOMPOK
// ============================================================================
$sql_daftar_maba = "
SELECT *
FROM (
    SELECT *,
           ((ROW_NUMBER() OVER (ORDER BY nrp) - 1) MOD 123) + 1 AS kelompok
    FROM maba
) AS m
WHERE m.kelompok = ".$astor."
ORDER BY m.nrp;
";
$stmt_daftar_maba = $con->prepare($sql_daftar_maba);
// $stmt_daftar_maba->bind_param("i", $id_kelompok);
$stmt_daftar_maba->execute();
$result_daftar_maba = $stmt_daftar_maba->get_result();

// ============================================================================
// PROSES PENYIMPANAN NILAI (POST)
// ============================================================================
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nilai1a'])) {
    date_default_timezone_set("Asia/Jakarta");
    $waktu_sekarang = date('Y-m-d H:i:s');
    $sql_insert_nilai = "INSERT INTO nilai_leg (nrp, id_kelompok, nama, nilai_1A, nilai_1B, nilai_1C, nilai_2A, nilai_2B, nilai_2C, nilai_3, response, nrp_penilai) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $con->prepare($sql_insert_nilai);
    $stmt_insert->bind_param("sisiiiiiiiss", 
        $nrp_mahasiswa, 
        $nama_mahasiswa['id_kelompok'], 
        $nama_mahasiswa['nama'], 
        $_POST['nilai1a'],
        $_POST['nilai1b'],
        $_POST['nilai1c'],
        $_POST['nilai2a'],
        $_POST['nilai2b'],
        $_POST['nilai2c'],
        $_POST['nilai3'], 
        $waktu_sekarang, 
        $username
    );
    $stmt_insert->execute();
    
    
    // Redirect untuk menghindari re-submission form
    header("Location: ?nrp=" . base64_encode($nrp_mahasiswa . 'secret'));
    exit;
}

// ============================================================================
// CEK NILAI YANG SUDAH ADA
// ============================================================================
$result_nilai_tersimpan = null;
if ($nrp_mahasiswa) {
    $sql_cek_nilai = "SELECT * FROM nilai_leg WHERE nrp = ?";
    $stmt_cek_nilai = $con->prepare($sql_cek_nilai);
    $stmt_cek_nilai->bind_param("s", $nrp_mahasiswa);
    $stmt_cek_nilai->execute();
    $result_nilai_tersimpan = $stmt_cek_nilai->get_result();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian LEG</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>    
        .navbar {
            padding: 15px;
            width: 100%;
        }
        
        .nav {
            padding-left: 0px;
        }
        a, .nav-link, .success {
            color: black;
        }
        
        .list-group-item a:hover {
            color: white;
        }
        .mahasiswa{
            padding: 8px 18px;
        }
        .mahasiswa:hover{
            background-color: gray;
            border-radius: 18px;
        }
    </style>
</head>
<body>
    <!-- ========================================================================== -->
    <!-- HEADER / NAVIGATION -->
    <!-- ========================================================================== -->
    <nav class="navbar navbar-light bg-white shadow-sm sticky-top">
        <div class="container-fluid">
            <!-- Kiri: Logo + Brand -->
            <a class="navbar-brand d-flex align-items-center" style="transition: transform 0.3s ease;"onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" href="http://tps.petra.ac.id/main/index.php">
                <img src="http://tps.petra.ac.id/main/assets/img/tps.png" 
                    alt="TPS Logo" 
                    width="30" 
                    height="30" 
                    class="rounded me-2">
                <span class="fw-bold">Tim Petra Sinergi</span>
            </a>
        </div>
    </nav>


    <!-- ========================================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================================== -->
    <h2 class="text-center mt-4">Penilaian UTS</h2>
    <div class="container my-4">
        <div class="row">
            <!-- ================================================================== -->
            <!-- SIDEBAR: DAFTAR MAHASISWA BARU -->
            <!-- ================================================================== -->
            <div class="col-md-4">
                <h3>Mahasiswa Baru</h3>
                <ul class="list-group">
                    <?php $i = 1; while ($mahasiswa = $result_daftar_maba->fetch_assoc()): 
                        ?>
                        <li class="list-group-item">
                            <a href="?nrp=<?php echo base64_encode($mahasiswa['nrp'] . 'secret'); ?>" 
                               class="text-decoration-none mahasiswa">
                                Mahasiswa ke-<?php echo $i; $i = $i + 1;?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <!-- ================================================================== -->
            <!-- MAIN SECTION: SOAL DAN JAWABAN -->
            <!-- ================================================================== -->
            <div class="col-md-8">
                <form id="penilaianForm" action="#" method="POST">
                    <?php if ($result_nilai_tersimpan && $result_nilai_tersimpan->num_rows >= 1): ?>
                        <!-- Tampilkan nilai yang sudah tersimpan -->
                        <div class="alert alert-success">
                            <h5>Nilai yang Sudah Tersimpan:</h5>
                            <?php while ($nilai = $result_nilai_tersimpan->fetch_assoc()): ?>
                                <p>Soal 1 A: <?php echo $nilai['nilai_1A']; ?> poin</p>
                                <p>Soal 1 B: <?php echo $nilai['nilai_1B']; ?> poin</p>
                                <p>Soal 1 C: <?php echo $nilai['nilai_1C']; ?> poin</p>
                                <p>Soal 2 A: <?php echo $nilai['nilai_2A']; ?> poin</p>
                                <p>Soal 2 B: <?php echo $nilai['nilai_2B']; ?> poin</p>
                                <p>Soal 2 C: <?php echo $nilai['nilai_2C']; ?> poin</p>
                                <p>Soal 3: <?php echo $nilai['nilai_3']; ?> poin</p>

                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <?php  
                        $sql_jawaban_essay = "SELECT jawaban_essay FROM essay_results WHERE id_soal = 1 AND nrp = ?";
                            $stmt_jawaban_essay = $con->prepare($sql_jawaban_essay);
                            $stmt_jawaban_essay->bind_param("s", $nrp_mahasiswa);
                            $stmt_jawaban_essay->execute();
                            $result_jawaban_essay = $stmt_jawaban_essay->get_result();
                            $data_jawaban_essay = $result_jawaban_essay->fetch_assoc();
                            
                            $jawaban_essay = ($result_jawaban_essay->num_rows > 0) ? $data_jawaban_essay['jawaban_essay'] : '---'; 
                            ?>
                        <section id="soal1" class="mb-4">
                                <h4>UTS No. 1</h4>
                                <p><strong>Soal:</strong> Di LEG 3, teman-teman belajar tentang konsep mendasar tentang realita hidup yang tidak dapat dipisahkan yaitu truth-goodness-beauty. Berdasarkan yang teman-teman pelajari di LEG 3,
                                <br>A. Ceritakan dengan bahasamu sendiri apa yang dimaksud dengan truth, goodness, dan beauty
                                <br>B. Berikan contoh manfaat dari mempelajari konsep truth-goodness-beauty di kehidupanmu sehari-hari
                                <br>C. Coba ceritakan satu atau dua pengalaman yang kamu punya dan bagaimana kamu mengevaluasi pengalaman tersebut setelah mempelajari tentang konsep truth-goodness-beauty dan perubahan apa yang dapat kamu terapkan di pengalaman tersebut</p>
                                <p><strong>Jawaban:</strong> <?php echo nl2br(htmlspecialchars($jawaban_essay)); ?></p>
                                <div class="mb-3">
                                    <label for="nilai1a" class="form-label">
                                        Masukkan Nilai poin A (max 30 poin):
                                    </label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="nilai1a" 
                                           name="nilai1a" 
                                           min="0" 
                                           max="30" 
                                           required>
                                </div>
                                 <div class="mb-3">
                                    <label for="nilai1b" class="form-label">
                                        Masukkan Nilai poin B (max 15 poin):
                                    </label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="nilai1b" 
                                           name="nilai1b" 
                                           min="0" 
                                           max="15" 
                                           required>
                                </div>
                                 <div class="mb-3">
                                    <label for="nilai1c" class="form-label">
                                        Masukkan Nilai poin C (max 15 poin):
                                    </label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="nilai1c" 
                                           name="nilai1c" 
                                           min="0" 
                                           max="15" 
                                           required>
                                </div>
                            </section>
                            <?php  
                        $sql_jawaban_essay = "SELECT jawaban_essay FROM essay_results WHERE id_soal = 2 AND nrp = ?";
                            $stmt_jawaban_essay = $con->prepare($sql_jawaban_essay);
                            $stmt_jawaban_essay->bind_param("s", $nrp_mahasiswa);
                            $stmt_jawaban_essay->execute();
                            $result_jawaban_essay = $stmt_jawaban_essay->get_result();
                            $data_jawaban_essay = $result_jawaban_essay->fetch_assoc();
                            
                            $jawaban_essay = ($result_jawaban_essay->num_rows > 0) ? $data_jawaban_essay['jawaban_essay'] : '---'; 
                            ?>
                        <section id="soal1" class="mb-4">
                                <h4>UTS No. 2</h4>
                                <p><strong>Soal:</strong> Di LEG 5, teman-teman belajar bahwa setiap keputusan yang kita buat dipengaruhi oleh pemikiran dan keinginan dibaliknya, atau juga disebut act-thinking-desire. Berdasarkan yang teman-teman pelajari di LEG 5
                                <br>A. Ceritakan dengan bahasamu sendiri apa yang dimaksud dengan act-thinking-desire
                                <br>B. Berikan contoh manfaat dari mempelajari konsep act-thinking-desire di kehidupanmu sehari-hari
                                <br>C. Coba ceritakan satu atau dua pengalaman yang kamu punya dan bagaimana kamu mengevaluasi pengalaman tersebut setelah mempelajari tentang konsep act-thinking-desire dan perubahan apa yang dapat kamu terapkan di pengalaman tersebut</p>
                                <p><strong>Jawaban:</strong> <?php echo nl2br(htmlspecialchars($jawaban_essay)); ?></p>
                                <div class="mb-3">
                                    <label for="nilai2a" class="form-label">
                                        Masukkan Nilai poin A (max 30 poin):
                                    </label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="nilai2a" 
                                           name="nilai2a" 
                                           min="0" 
                                           max="30" 
                                           required>
                                </div>
                                 <div class="mb-3">
                                    <label for="nilai2b" class="form-label">
                                        Masukkan Nilai Poin B (max 10 poin):
                                    </label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="nilai2b" 
                                           name="nilai2b" 
                                           min="0" 
                                           max="10" 
                                           required>
                                </div>
                                 <div class="mb-3">
                                    <label for="nilai2c" class="form-label">
                                        Masukkan Nilai Poin C (max 10 poin):
                                    </label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="nilai2c" 
                                           name="nilai2c" 
                                           min="0" 
                                           max="10" 
                                           required>
                                </div>
                            </section>
                            <?php  
                        $sql_jawaban_essay = "SELECT jawaban_essay FROM essay_results WHERE id_soal = 3 AND nrp = ?";
                            $stmt_jawaban_essay = $con->prepare($sql_jawaban_essay);
                            $stmt_jawaban_essay->bind_param("s", $nrp_mahasiswa);
                            $stmt_jawaban_essay->execute();
                            $result_jawaban_essay = $stmt_jawaban_essay->get_result();
                            $data_jawaban_essay = $result_jawaban_essay->fetch_assoc();
                            
                            $jawaban_essay = ($result_jawaban_essay->num_rows > 0) ? $data_jawaban_essay['jawaban_essay'] : '---'; 
                            ?>
                        <section id="soal1" class="mb-4">
                                <h4>UTS No. 3</h4>
                                <p><strong>Soal:</strong> Di LEG, teman-teman sudah belajar tentang berbagai kerangka berpikir (framework) dalam beberapa topik. Teman-teman dipersilahkan untuk mengkritisi 1 kerangka berpikir (misal: kerangka berpikir intertwined) yang dibahas di LEG dan memberikan  argumentasi dekonstruktif untuk framework tersebut. Lampirkan literatur yang teman-teman gunakan untuk mendukung argumen tersebut (judul buku, link website, judul journal, dkk). 
                                Jika argumentasi yang teman-teman berikan memiliki penjelasan yang jelas, terstruktur, logis, serta memiliki dasar literatur yang dapat dipertanggungjawabkan, maka teman-teman akan mendapatkan nilai tambahan.</p>
                                <p><strong>Jawaban:</strong> <?php echo nl2br(htmlspecialchars($jawaban_essay)); ?></p>
                                <div class="mb-3">
                                    <label for="nilai3" class="form-label">
                                        Masukkan Nilai (max 30 poin):
                                    </label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="nilai3" 
                                           name="nilai3" 
                                           min="0" 
                                           max="30" 
                                           required>
                                </div>
                            </section>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Simpan Semua Nilai</button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>