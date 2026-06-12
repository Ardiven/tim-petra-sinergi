<?php
include "../../connect.php";
$_SESSION['username'] = 'c14230245';
// if (!isset($_SESSION['username'])) {
// 	header("location:../../login.php");
// } else if ($_SESSION['jenis'] != "astor") {
// 	header("location:../../login.php?illegal=0");
// }

$query_bio = mysqli_query($con, "select nama,isi_biodata,id,handphone,line,tanggal_lahir from astor where nrp='" . $_SESSION['username'] . "'");

$rows = mysqli_fetch_array($query_bio);
$bio = $rows[1];
include "../../header.php";
$uname = $_SESSION['username'];
$row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM astor WHERE nrp='$uname'"));
$query_jurusan = mysqli_query($con, "SELECT * FROM jurusan25");

?>



    
   <style>
        body {
            background-color: #ffffff;
        }
        .text-primary-orange { color: #FF9F1C; }
        .bg-primary-orange { background-color: #FF9F1C; }
        .bg-primary-orange:hover { background-color: #e68e18; }
        
        .bg-secondary-yellow { background-color: #FDB44B; }
        .bg-secondary-yellow:hover { background-color: #e5a342; }

        .input-box {
            background-color: #EEEEEE;
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }
        /* Style saat input aktif (bisa diedit) */
        .input-box:enabled:focus {
            outline: none;
            background-color: #ffffff;
            border-color: #FF9F1C;
            box-shadow: 0 0 0 3px rgba(255, 159, 28, 0.1);
        }
        /* Style saat input disabled (read-only) */
        .input-box:disabled {
            background-color: #f3f4f6;
            color: #6b7280;
            cursor: not-allowed;
            opacity: 0.7;
        }
    </style>
</head>
<body>

    <div class="container mx-auto px-4 py-10 max-w-7xl">
        
        <h1 class="text-4xl font-bold text-primary-orange mb-10">Yuk lengkapi data dirimu!</h1>

        <form id="profileForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Nama Lengkap</label>
                        <input type="text" id="nama" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['nama']; ?>" required disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Program Studi</label>
                        <input type="text" id="idline" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['jurusan']; ?>" required disabled>
                        <!-- <select id="jurusan" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700 appearance-none" required disabled>
                            <?php 
                            // mysqli_data_seek($query_jurusan, 0);
                            // if (is_null($row['jurusan'])) {
                            //     while ($row_jurusan = mysqli_fetch_assoc($query_jurusan)) {
                            //         echo '<option value="' . $row_jurusan['nama'] . '">' . $row_jurusan['nama'] . '</option>';
                            //     }
                            // } else {
                            //     while ($row_jurusan = mysqli_fetch_assoc($query_jurusan)) {
                            //         $selected = ($row_jurusan['nama'] == $row['jurusan']) ? 'selected' : '';
                            //         echo '<option ' . $selected . ' value="' . $row_jurusan['nama'] . '">' . $row_jurusan['nama'] . '</option>';
                            //     }
                            // } ?>
                        </select> -->
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Gender</label>
                        <select id="gender" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700 appearance-none" required disabled>
                            <?php
                            $jk = $row['jenis_kelamin'];
                            echo '<option value="L" ' . ($jk == 'L' ? 'selected' : '') . '>Laki-laki</option>';
                            echo '<option value="P" ' . ($jk == 'P' ? 'selected' : '') . '>Perempuan</option>';
                            ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">ID Line</label>
                        <input type="text" id="idline" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['line']; ?>" required disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Nomor Telepon</label>
                        <input type="number" id="phone" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['handphone']; ?>" required disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Konsumsi</label>
                        <select id="konsumsi" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700 appearance-none" required disabled>
                            <option value="1" <?= $row['status_konsumsi'] == 1 ? 'selected' : '' ?>>Normal</option>
                            <option value="2" <?= $row['status_konsumsi'] == 2 ? 'selected' : '' ?>>Vegetarian</option>
                            <option value="3" <?= $row['status_konsumsi'] == 3 ? 'selected' : '' ?>>Vegan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Pengalaman Kepanitiaan atau LK/Organisasi PCU</label>
                        <input type="text" id="organisasi" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['organisasi_lk']; ?>" disabled>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">NRP</label>
                        <input type="text" id="nrp" class="w-full input-box rounded-lg px-4 py-3 text-gray-500 cursor-not-allowed bg-gray-200" value="<?= $row['nrp']; ?>" readonly disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">IPK saat ini</label>
                        <input type="text" id="ipk" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['ipk']; ?>" placeholder="Contoh: 3.85" required disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Tempat/Tanggal Lahir</label>
                        <input type="date" id="tgllahir" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['tanggal_lahir']; ?>" required disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Email aktif di HP</label>
                        <input type="email" id="email" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['email']; ?>" required disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Hobi</label>
                        <input type="text" id="hobi" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['hobi']; ?>" required disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Alergi</label>
                        <input type="text" id="alergi" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['alergi']; ?>" required disabled>
                    </div>

                    <div>
                        <label class="block text-gray-600 text-sm font-medium mb-2">Posisi dalam Kepanitiaan atau LK/Organisasi PCU</label>
                        <input type="text" id="posisi" class="field-data w-full input-box rounded-lg px-4 py-3 text-gray-700" value="<?= $row['pos_organisasi_lk']; ?>" disabled>
                    </div>
                </div>

            </div>

            <div class="flex justify-center gap-6 mt-16 mb-10">
                <button type="button" id="editBtn" class="bg-secondary-yellow text-white text-lg font-bold py-3 px-12 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                    Edit
                </button>
                
                <button type="button" id="cancelBtn" class="hidden bg-gray-500 text-white text-lg font-bold py-3 px-12 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                    Batal
                </button>

                <button type="submit" id="save" class="hidden bg-primary-orange text-white text-lg font-bold py-3 px-12 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                    Submit
                </button>
            </div>
        </form>
        
        <div class="text-center text-gray-400 text-sm mt-4">
            Last update: <span id="lastupdate"><?= ($row['isi_biodata'] == 1) ? $row['last_update_bio'] : "-" ?></span>
        </div>

    </div>

<script>
    $(document).ready(function() {
        
        // --- 1. LOGIKA TOMBOL EDIT ---
        $("#editBtn").click(function() {
            // Aktifkan semua input yang memiliki class 'field-data'
            $(".field-data").prop("disabled", false);
            
            // Fokus ke field pertama agar user sadar sudah bisa ngetik
            $("#nama").focus();

            // Atur visibilitas tombol
            $(this).addClass("hidden"); // Sembunyikan tombol Edit
            $("#save").removeClass("hidden"); // Munculkan tombol Submit
            $("#cancelBtn").removeClass("hidden"); // Munculkan tombol Batal
        });

        // --- 2. LOGIKA TOMBOL BATAL ---
        $("#cancelBtn").click(function() {
            // Reload halaman untuk mereset data ke kondisi awal
            location.reload(); 
        });

        // --- 3. LOGIKA SUBMIT ---
        $("#save").click(function(e) {
            var form = document.getElementById('profileForm');
            if (form.checkValidity()) {
                e.preventDefault();
                var conf = Swal.fire({
                                icon: 'question', 
                                title: 'Konfirmasi',
                                text: 'Apakah Anda yakin ingin menyimpan perubahan ini? ',
                                showCancelButton: true
                            }).then((result) => {
                                 if (conf) {
                                    $.ajax({
                                        url: 'update.php',
                                        method: 'POST',
                                        data: {
                                            nama: $('#nama').val(),
                                            handphone: $('#phone').val(),
                                            idline: $('#idline').val(),
                                            nrp: $('#nrp').val(),
                                            jurusan: $('#jurusan').val(),
                                            gender: $('#gender').val(),
                                            hobi: $('#hobi').val(),
                                            email: $('#email').val(),
                                            organisasi: $('#organisasi').val(),
                                            posisi: $('#posisi').val(),
                                            tgllahir: $('#tgllahir').val(),
                                            alergi: $('#alergi').val(),
                                            konsumsi: $('#konsumsi').val(),
                                            ipk: $('#ipk').val(),
                                        },
                                        success: function(data) {
                                            // alert("Data berhasil disimpan!");
                                            swal.fire({
                                                icon: 'success',
                                                title: 'Berhasil',
                                                text: 'Data berhasil disimpan!'
                                            }).then((result) => {
                                                if (result.isConfirmed && <?= json_encode($_SESSION['bio'] == 1) ?>) {
                                                    window.location.replace("index.php");
                                                }else{
                                                    window.location.href = "http://localhost/tps/astor/ktb/index.php";
                                                }
                                            })
                                        },
                                        error: function() {
                                            // alert("Terjadi kesalahan koneksi.");
                                            swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: 'Terjadi kesalahan koneksi.'
                                            })
                                        }
                                    
                                });
                            } else {
                                form.reportValidity();
                            }
                        });
            }     
        });
    });
</script>
