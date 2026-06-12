<?php
include "../../connect.php";
$_SESSION['username'] = 'c14230245';
// if (!isset($_SESSION['username'])) {
// 	header("location:../../login.php");
// } else if ($_SESSION['jenis'] != "astor") {
// 	header("location:../../login.php?illegal=0");
// }
$query_id_astor = mysqli_query($con, "SELECT id, nama, jenis_kelamin,id_jadwal_ktb FROM astor WHERE nrp='" . $_SESSION['username'] . "'");
$row_id_astor = mysqli_fetch_assoc($query_id_astor);

// (id_mentor != ) -> buat ngehide mentor pgsd :), kalo g butuh hide aja. sama-sama

if ($row_id_astor['jenis_kelamin'] == 'L') {
    // $query = mysqli_query($con, "SELECT * FROM jadwal WHERE ((tipe_ktb=1 AND filter_gender=0) OR (tipe_ktb=1 AND filter_gender=2)) AND (show_table=1) 
    //         AND ((id_mentor != 72) AND (id_mentor != 75) AND (id_mentor != 132) AND (id_mentor !=133) AND (id_mentor !=134) AND (id_mentor !=135) AND (id_mentor !=136) AND (id_mentor !=137)) 
    //         order by hari") ;
$query =  mysqli_query($con, "SELECT 
    j.id,
    j.id_mentor, 
    j.tipe_ktb, 
    j.hari, 
    j.waktu, 
    j.kapasitas, 
    j.status, 
    j.filter_gender, 
    j.catatan, 
    j.request_ruang, 
    j.show_table, 
    COALESCE(a.astor_count, 0),
    (kapasitas - COALESCE(a.astor_count, 0)) AS sisa_kapasitas,
    m.jenis_kelamin,
    m.interest,
    m.jurusan,
    m.pekerjaan,
    m.hobi
FROM 
    jadwal j 
JOIN mentor m ON j.id_mentor = m.id
LEFT JOIN 
    (SELECT id_jadwal_ktb, COUNT(*) AS astor_count FROM astor GROUP BY id_jadwal_ktb) a ON j.id = a.id_jadwal_ktb 
WHERE
   (tipe_ktb=1) AND (filter_gender=0 OR filter_gender=1) AND (j.show_table = 1)
GROUP BY j.id
ORDER BY
    j.hari ASC,
    j.waktu ASC,
    sisa_kapasitas DESC;");

} else {
    // $query = mysqli_query($con, "SELECT ij.d_mentor, j.tipe_ktb, j.hari, j.waktu, j.kapasitas, j.status, j.filter_gender, j.catatan, j.request_ruang, j.show_table, (j.kapasitas - COUNT(b.*) - COUNT(a*) FROM jadwal j JOIN booking b ON j.id = b.id_jadwal JOIN astor a ON j.id = a.id_ WHERE ((tipe_ktb=1 AND filter_gender=0) OR (tipe_ktb=1 AND filter_gender=2)) AND (show_table=1) 
    //         AND ((id_mentor != 72) AND (id_mentor != 75) AND (id_mentor != 132) AND (id_mentor !=133) AND (id_mentor !=134) AND (id_mentor !=135) AND (id_mentor !=136) AND (id_mentor !=137)) 
    //         order by hari");
    $query = mysqli_query($con, "SELECT 
    j.id,
    j.id_mentor, 
    j.tipe_ktb, 
    j.hari, 
    j.waktu, 
    j.kapasitas, 
    j.status, 
    j.filter_gender, 
    j.catatan, 
    j.request_ruang, 
    j.show_table, 
    COALESCE(a.astor_count, 0),
    (kapasitas - COALESCE(a.astor_count, 0)) AS sisa_kapasitas,
        m.jenis_kelamin,
    m.interest,
    m.jurusan,
    m.pekerjaan,
    m.hobi
FROM 
    jadwal j 
JOIN mentor m ON j.id_mentor = m.id
LEFT JOIN 
    (SELECT id_jadwal_ktb, COUNT(*) AS astor_count FROM astor GROUP BY id_jadwal_ktb) a ON j.id = a.id_jadwal_ktb 
WHERE
   (tipe_ktb=1) AND (filter_gender=0 OR filter_gender=2) AND (j.show_table = 1)
GROUP BY j.id
ORDER BY
    j.hari ASC,
    j.waktu ASC,
    sisa_kapasitas DESC;");
}   
include "../../header.php";

?>
    <style>
        body {
            background-color: #ffffff;
        }
        
        /* Warna Oranye Utama */
        .text-primary-orange { color: #FF8B00; }
        .bg-primary-orange { background-color: #FF8B00; }
        .bg-primary-orange:hover { background-color: #e68e18; }
        
       

        /* Warna Header Tabel (Krem/Kuning Muda) */
        .bg-table-header { background-color: #FFC85C85; }

        /* Custom Table Borders untuk meniru gambar */
        .custom-table th, 
        .custom-table td {
            border: 1px solid #000000; /* Border hitam tegas */
        }
        
        /* Tombol Penuh (Abu-abu) */
        .bg-disabled-gray { background-color: #9CA3AF; }
    </style>
</head>
<body>
    <div class="container mx-auto px-4 py-10 max-w-7xl">
        
        <div class="mb-8">
            <h1 class="text-8xl font-bold text-primary-orange mb-2">Halo!</h1>
            <h2 class="text-3xl font-bold text-[#6E5A30] mb-4"><?php echo isset($row_id_astor['nama']) ? $row_id_astor['nama'] : 'User'; ?></h2>
            <p class="text-[#6E5A30] max-w-4xl text-base leading-relaxed">
                Silakan pilih jadwal KTB yang tersedia di bawah ini.
            </p>
        </div>

        <div class="flex justify-end mb-4">
            <div class="relative w-full max-w-[15rem]">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
                <input type="text" placeholder="Search" class="w-full bg-gray-200 text-gray-700 border-none rounded-md py-1.5 pl-10 focus:ring-2 focus:ring-orange-400 outline-none">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border-3 border-black custom-table text-center">
                <thead>
                    <tr class="bg-table-header text-gray-800 text-xs sm:text-sm">
                        <th class="p-4 font-semibold w-24">Hari</th>
                        <th class="p-4 font-semibold w-24">Waktu</th>
                        <th class="p-4 font-semibold w-20 sm:w-40">Gender Mentor</th>
                        <th class="p-4 font-semibold w-64">Interest</th>
                        <th class="p-4 font-semibold w-32">Jurusan</th>
                        <th class="p-4 font-semibold w-40">Pekerjaan</th>
                        <th class="p-4 font-semibold w-32">Kriteria</th>
                        <th class="p-4 font-semibold w-24">Sisa</th>
                        <th class="p-4 font-semibold w-28">Anggota</th> 
                        <th class="p-4 font-semibold w-32">Action</th>
                    </tr>
                </thead>
                <tbody class="text-xs sm:text-sm text-[#6E5A30]">
                    <?php 
                    // Pastikan looping data database ada di sini
                    if (isset($query)) {
                        while($row = mysqli_fetch_assoc($query)) { 
                            $sisa_kuota = $row['sisa_kapasitas'];
                            $is_full = ($sisa_kuota <= 0);
                            $row_class = $is_full ? "bg-gray-100" : "hover:bg-gray-50";
                    ?>
                    <tr class="<?= $row_class ?>">
                        <td class="p-4"><?= $row['hari'] ?></td>
                        <td class="p-4"><?php $row['waktu'] = date('H:i', strtotime($row['waktu'])); echo $row['waktu']; ?></td>
                        <td class="p-4"><?= ($row['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan'; ?></td>
                        <td class="p-4 text-xs text-left"><?= $row['interest'] ?></td>
                        <td class="p-4"><?= $row['jurusan'] ?></td>
                        <td class="p-4"><?= $row['pekerjaan'] ?></td>
                        <td class="p-4"><?= $row['filter_gender'] == 0 ? "Semua" : ($row['filter_gender'] == 1 ? "Laki-Laki" : "Perempuan") ?></td>
                        <td class="p-4 font-bold <?= $is_full ? 'text-red-500' : 'text-green-600' ?>"><?= $sisa_kuota ?></td>

                        <td class="p-4">
                            <button type="button" data-id="<?= $row['id'] ?>" class="tombol-lihat-member bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-3 rounded text-xs font-medium transition flex items-center justify-center gap-1 mx-auto">
                                <i class="fas fa-eye"></i> Lihat
                            </button>
                        </td>

                        <td class="p-4">
                            <?php if ($is_full) { ?>
                                <button disabled class="bg-disabled-gray text-white font-bold py-2 px-6 rounded-lg cursor-not-allowed">Penuh</button>
                            <?php } else { ?>
                                <form class="form-daftar">
                                    <input type="hidden" name="id_ktb" value="<?= $row['id'] ?>">
                                    
                                    <button type="submit" class="btn-submit bg-primary-orange text-white font-bold py-2 px-6 rounded-lg shadow hover:shadow-lg transition">
                                        Daftar
                                    </button>
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="memberModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
            <div class="tutup-modal fixed inset-0 bg-white/0 backdrop-blur-sm transition-opacity cursor-pointer" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative z-10">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Daftar Anggota KTB</h3>
                        
                        <button type="button" class="tutup-modal bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none">
                            <span class="sr-only">Close</span>
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <div id="loading" class="hidden text-center py-10">
                        <i class="fas fa-circle-notch fa-spin text-4xl text-orange-500"></i>
                        <p class="mt-2 text-sm text-gray-500">Mengambil data...</p>
                    </div>

                    <div id="modalContent" class="mt-2 max-h-60 overflow-y-auto"></div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="tutup-modal w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        
        // 1. LOGIKA BUKA MODAL
        // Saat elemen dengan class 'tombol-lihat-member' diklik...
        $(document).on('click', '.tombol-lihat-member', function() {
            var idKtb = $(this).data('id'); // Ambil ID dari atribut data-id
            
            // Tampilkan Modal & Loading
            $('#memberModal').removeClass('hidden'); 
            $('#loading').removeClass('hidden');
            $('#modalContent').html('').addClass('hidden');

            // Panggil AJAX
            $.ajax({
                url: 'get_anggota.php',
                type: 'POST',
                data: { id_ktb: idKtb },
                success: function(response) {
                    $('#loading').addClass('hidden');
                    $('#modalContent').html(response).removeClass('hidden');
                },
                error: function() {
                    alert('Gagal mengambil data.');
                    $('#memberModal').addClass('hidden');
                }
            });
        });

        // 2. LOGIKA TUTUP MODAL
        // Saat elemen apapun dengan class 'tutup-modal' diklik...
        $(document).on('click', '.tutup-modal', function() {
            $('#memberModal').addClass('hidden');
        });

        // 3. LOGIKA TUTUP DENGAN TOMBOL ESC
        $(document).keydown(function(e) {
            if (e.key === "Escape") { 
                $('#memberModal').addClass('hidden');
            }
        });
        $(document).on('submit', '.form-daftar', function(e) {
            e.preventDefault(); // Mencegah form reload halaman

            var form = $(this);
            var btn = form.find('.btn-submit');
            var originalText = btn.html();

            // 1. Konfirmasi User
            swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah kamu yakin ingin mendaftar di KTB ini?',
                icon: 'question',
                showCancelButton: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Proses...');
                    // 3. Kirim AJAX
                    $.ajax({
                        url: 'ajax_daftar_ktb.php', // File tujuan
                        type: 'POST',
                        data: form.serialize(), // Mengambil data input (id_ktb) otomatis
                        success: function(response) {
                            // Asumsi: proses_daftar.php meng-echo pesan sukses/gagal
                            // Contoh response dari PHP: "Berhasil mendaftar!" atau "Kuota Penuh!"
                            
                            swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Data berhasil disimpan!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.href = "https://tps.petra.ac.id/main/index.php";
                                        }
                                    });
                            
                            // Jika ingin reload halaman agar sisa kuota terupdate:
                            
                        },
                        error: function(xhr, status, error) {
                            alert("Terjadi kesalahan sistem: " + error);
                            // Kembalikan tombol seperti semula jika error
                            btn.prop('disabled', false).html(originalText);
                        }
                    });
                }
            });
        });

    });
</script>
</body>
</html>