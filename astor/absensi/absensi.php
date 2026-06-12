<?php
require "../../connect.php";
include "../../header.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session if not already started
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username']) || $_SESSION['jenis'] != "astor") {
    echo "<script>alert('Session tidak valid. Silakan login kembali.'); window.location.href = 'login.php';</script>";
    exit;
}else{
    $row = mysqli_fetch_array(mysqli_query($con, "SELECT id, nrp, nama, id_kelompok FROM astor WHERE nrp = '" . $_SESSION['username'] . "'"));
    $_SESSION['id_kelompok'] = $row['id_kelompok'];
}

if (!isset($_SESSION['id_kelompok']) || $_SESSION['id_kelompok'] == 0) {
    echo "<script>alert('Session id kelompok tidak valid. Silakan login kembali.'); window.location.href = 'login.php';</script>";
    exit;
}

function getSesi($con)
{
    $output = '';
    $getSesi = mysqli_query($con, "SELECT * FROM `jadwal_materi_eeg` WHERE status > 0 ORDER BY id");
    
    if (!$getSesi) {
        return '<option value="">Error loading sessions</option>';
    }
    
    while ($row = mysqli_fetch_assoc($getSesi)) {
        $output .= "<option value='" . htmlspecialchars($row['id']) . "'>" . 
                   htmlspecialchars(strtoupper($row['nama'])) . "</option>";
    }
    return $output;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Absensi LEG</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .file-display {
            word-break: break-all;
        }
        
        /* Loading overlay styles */
        #loadingOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(2px);
        }
        
        /* Custom loading dots animation */
        .loading-dots {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .loading-dots .dot {
            width: 16px;
            height: 16px;
            background-color: white;
            border-radius: 50%;
            animation: loading-bounce 1.4s ease-in-out infinite both;
        }
        
        .loading-dots .dot:nth-child(1) { animation-delay: -0.32s; }
        .loading-dots .dot:nth-child(2) { animation-delay: -0.16s; }
        .loading-dots .dot:nth-child(3) { animation-delay: 0s; }
        
        @keyframes loading-bounce {
            0%, 80%, 100% { 
                transform: scale(0.8);
                opacity: 0.5;
            }
            40% { 
                transform: scale(1.2);
                opacity: 1;
            }
        }
        
        #loadingOverlay .loading-text {
            color: white;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            margin-top: 20px;
        }
        
        /* Main content blur effect when loading */
        #mainContent {
            transition: filter 0.3s ease-in-out, opacity 0.5s ease-in-out;
        }
        
        #mainContent.loading {
            filter: blur(4px);
            pointer-events: none;
        }
        
        #mainContent.loaded {
            filter: none;
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Loading Overlay -->
    <div id="loadingOverlay">
        <div class="loading-dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <div class="loading-text">
            <div>Memuat halaman...</div>
            <div class="text-sm mt-2 opacity-80">Mohon tunggu sebentar</div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="mainContent" class="container mx-auto my-3 px-4 sm:px-8 lg:px-12 max-w-full loading">
        <!-- Header Section -->
        <div class="mb-30 sm:mb-20 md:mb-4 pt-[28px] pb-[30px]">
            <div class="text-4xl sm:text-6xl font-bold text-[#F7AD1A] break-words">Halo!</div>
            <div class="px-2 py-[8px] text-xl sm:text-2xl lg:text-3xl lg:font-bold text-[#6E5A30] break-words">
                <?php echo isset($_SESSION['nama']) ? htmlspecialchars($_SESSION['nama']) : 'Astor'; ?>
            </div>
            <div class="max-h-[28px] pt-[28px]">
                <div class="text-[#6E5A30] px-2 break-words">
                    Kamu baru aja jalani LEG 1 - Welcoming: a Road to Success. Yuk isi penilaian keaktifan mahasiswa baru, presensi, dan assessment di bawah ini:
                </div>
            </div>
            <div class="px-2 py-6 text-xl sm:text-2xl lg:text-3xl lg:font-bold text-[#6E5A30] break-words">
                Petunjuk Penilaian Keaktifan Maba
                <div class="text-[#6E5A30] px-4 py-4">
                    <div class="flex align-center gap-8 w-full px-4">
                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="a" class="form-radio h-4 w-4 " disabled />
                                <span class="text-sm">1</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="b" class="form-radio h-4 w-4"disabled />
                            <span class="text-sm">2</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="c" class="form-radio h-4 w-4" disabled/>
                            <span class="text-sm">3</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="c" class="form-radio h-4 w-4" disabled/>
                            <span class="text-sm">4</span>
                        </label>
                    </div>

                    <div class="py-4">
                        <ul class="list-disc pl-6 space-y-2 text-[#6E5A30] text-sm font-base">
                            <li>1: Tidak memberikan respons sama sekali dari awal hingga akhir</li>
                            <li>2: Sesekali memberikan tanggapan namun jika ditanya tidak menjawab</li>
                            <li>3: Aktif memperhatikan dan melontarkan pertanyaan</li>
                            <li>4: Aktif memperhatikan, melontarkan pertanyaan, dan bisa membantu menyimpulkan dalam kelompok</li>
                        </ul>

                    </div>

                </div>
            </div>
            
        </div>
        
        <form method="POST" enctype="multipart/form-data" id="theForm">
            <!-- Session Selection -->
            <div class="text-center my-6">
                <div class="relative inline-block w-full max-w-[371px]">
                    <select name="sesi" id="sesi" class="text-[#6E5A30] appearance-none w-full h-[37px] bg-white border border-gray-300 px-4 pr-10 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline text-center" required>
                        <option value="" selected>Pilih Materi</option>
                        <?php echo getSesi($con); ?>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
                        ▼
                    </div>
                </div>
            </div>
            
            <!-- Student List Table -->
            <div class="mt-4 overflow-x-auto min-w-full flex justify-center items-center pb-8" id="tableContainer" style="display: none;">
                <table id="maba" class="min-w-max w-full lg:w-3/4 table-auto border-collapse border border-orange-300 text-sm text-left">
                    <thead>
                        <tr>
                            <!-- <th class="px-2 py-2 md:text-xl sm:text-lg text-xs border border-orange-300 bg-[#FEE17F] text-center">No</th> -->
                            <th class="px-2 py-2 md:text-xl sm:text-lg text-xs border border-orange-300 bg-[#F7AD1A] text-center">Nama</th>
                            <th class="px-2 py-2 md:text-xl sm:text-lg text-xs border border-orange-300 bg-[#FEE17F] text-center ">NRP</th>
                            <th class="px-2 py-2 md:text-xl sm:text-lg text-xs border border-orange-300 bg-[#F7AD1A] text-center">Keterangan</th>
                            <th class="px-2 py-2 md:text-xl sm:text-lg text-xs max-w-[100px] border border-orange-300 bg-[#FEE17F] text-center">Keaktifan Maba</th>
                        </tr>
                    </thead>
                    <tbody id="list"></tbody>
                </table>
            </div>

            <!-- Upload Instructions -->
            <div class="font-bold text-sm md:text-4xl py-8" id="uploadInstructions" style="display: none;">
                Upload file max. 2MB format jpg/png/pdf/rar/zip
            </div>

            <!-- Upload Sections -->
            <div id="uploadSections" style="display: none;">
                <!-- Foto Awal LEG -->
                <div class="mb-4">
                    <div class="text-gray-700 font-medium mb-2 sm:mb-0 flex-1">Foto Awal LEG <span class="text-red-600">*</span></div>
                    <div class="upload-box relative bg-[#D9D9D9] rounded p-4 min-h-[32px] max-h-[60px] flex flex-row sm:justify-between items-start sm:items-center">
                        <div class="file-display hidden mt-2 sm:mt-0 text-sm text-gray-600 px-2 max-w-[200px] sm:max-w-[900px] truncate overflow-hidden whitespace-nowrap"></div>
                        <button type="button" class="bg-[#F3F3F3] hover:scale-105 transition-transform duration-300 text-dark px-3 py-1 rounded text-sm add-file-btn ml-auto">
                            Add File
                        </button>
                        <input type="file" class="hidden file-input" name="fileToUploadStart" id="fileToUploadStart" 
                            accept=".jpg,.jpeg,.png,.pdf,.rar,.zip">
                    </div>
                </div>

                <!-- Foto Akhir LEG -->
                <div class="mb-4">
                    <div class="text-gray-700 font-medium mb-2 sm:mb-0 flex-1">Foto Akhir LEG <span class="text-red-600">*</span></div>
                    <div class="upload-box relative bg-[#D9D9D9] rounded p-4 min-h-[32px] max-h-[60px] flex flex-row sm:justify-between items-start sm:items-center">
                        <div class="file-display hidden mt-2 sm:mt-0 text-sm text-gray-600 px-2 max-w-[200px] sm:max-w-[900px] truncate overflow-hidden whitespace-nowrap"></div>
                        <button type="button" class="bg-[#F3F3F3] hover:scale-105 transition-transform duration-300 text-dark px-3 py-1 rounded text-sm add-file-btn ml-auto">
                            Add File
                        </button>
                        <input type="file" class="hidden file-input" name="fileToUploadFinish" id="fileToUploadFinish" 
                               accept=".jpg,.jpeg,.png,.pdf,.rar,.zip">
                    </div>
                </div>

                <!-- Foto Awal Susulan LEG -->
                <div class="mb-4">
                    <span class="text-gray-700 font-medium mb-2 sm:mb-0 flex-1">Foto Awal Susulan LEG (Opsional)</span>
                    <div class="upload-box relative bg-[#D9D9D9] rounded p-4 min-h-[32px] max-h-[60px] flex flex-row sm:justify-between items-start sm:items-center">
                        <div class="file-display hidden px-2 mt-2 sm:mt-0 text-sm text-gray-600 max-w-[200px] sm:max-w-[900px] truncate overflow-hidden whitespace-nowrap"></div>
                        <button type="button" class="bg-[#F3F3F3] hover:scale-105 transition-transform duration-300 text-dark px-3 py-1 rounded text-sm add-file-btn ml-auto">
                            Add File
                        </button>
                        <input type="file" class="hidden file-input" name="fileToUploadSusulanStart[]" 
                               id="fileToUploadSusulanStart" accept=".jpg,.jpeg,.png,.pdf,.rar,.zip" multiple>
                    </div>
                </div>

                <!-- Foto Akhir Susulan LEG -->
                <div class="mb-4">
                    <span class="text-gray-700 font-medium mb-2 sm:mb-0 flex-1">Foto Akhir Susulan LEG (Opsional)</span>
                    <div class="upload-box relative bg-[#D9D9D9] rounded p-4 min-h-[32px] max-h-[60px] flex flex-row sm:justify-between items-start sm:items-center">
                        <div class="file-display hidden px-2 sm:mt-0 sm:ml-4 text-sm text-gray-600 max-w-[200px] sm:max-w-[900px] truncate overflow-hidden whitespace-nowrap"></div>
                        <button type="button" class="bg-[#F3F3F3] hover:scale-105 transition-transform duration-300 text-dark px-3 py-1 rounded text-sm add-file-btn ml-auto">
                            Add File
                        </button>
                        <input type="file" class="hidden file-input" name="fileToUploadSusulanFinish[]" 
                               id="fileToUploadSusulanFinish" accept=".jpg,.jpeg,.png,.pdf,.rar,.zip" multiple>
                    </div>
                </div>
            </div>

            <div id="selfAssesment" style="display: none;">
                <div class="py-6">
                    <div class="font-bold text-xl md:text-4xl py-4">Self Assesment</div>
                    <div class="text-sm md:text-base">lorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Lorem ipsum, quia dolor sit, amet, consectetur, adipisci</div>
                </div>
                <div>
                    <div class="py-2 font-bold">
                        Bagaimana LEG mu hari ini?
                    </div>
                    <div class="text-sm md:text-base py-1">
                        <textarea 
                            name="no1" 
                            id="no1" 
                            class="w-full bg-[#D9D9D9] resize-none placeholder:text-gray-500 p-3 leading-[2rem] h-[60px] focus:outline-none rounded-xl" 
                            placeholder="Suasana diskusi di kelas & respon Maba di LEG hari ini"></textarea>
                    </div>
                    <div class="text-[#6E5A30] px-4 pt-4 py-2 flex items-center justify-between">
                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="a" class="form-radio h-6 w-6" />
                            <span class="text-sm">1</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="b" class="form-radio h-6 w-6" />
                            <span class="text-sm">2</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="c" class="form-radio h-6 w-6" />
                            <span class="text-sm">3</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="d" class="form-radio h-6 w-6" />
                            <span class="text-sm">4</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="e" class="form-radio h-6 w-6" />
                            <span class="text-sm">5</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="f" class="form-radio h-6 w-6" />
                            <span class="text-sm">6</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="g" class="form-radio h-6 w-6" />
                            <span class="text-sm">7</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="h" class="form-radio h-6 w-6" />
                            <span class="text-sm">8</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="i" class="form-radio h-6 w-6" />
                            <span class="text-sm">9</span>
                        </label>

                        <label class="inline-flex flex-col items-center gap-2">
                            <input type="radio" name="option" value="j" class="form-radio h-6 w-6" />
                            <span class="text-sm">10</span>
                        </label>
                    </div>
                    <div class="flex justify-between px-2 pb-8">
                            <div class="text-[#9F9F9F]">Sangat Kacau</div>
                            <div class="text-[#9F9F9F]">Sangat Kondusif</div>
                        </div>
                    <div class="text-sm md:text-base py-1">
                        <textarea 
                            name="no2" 
                            id="no2" 
                            class="w-full bg-[#D9D9D9] resize-none placeholder:text-gray-500 p-3 leading-[2rem] h-[60px] focus:outline-none rounded-xl" 
                            placeholder="Persiapan pribadimu sebelum LEG"></textarea>
                    </div>
                </div>
                <div>
                    <div class="py-2 font-bold">Apa ada kendala ynag kamu hadapi hari ini?</div>
                    <div class="text-[#9F9F9F] text-sm">Boleh memilih lebih dari 1</div>
                    <div class="px-3">
                        <label class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors duration-150">
                            <div class="relative">
                                <input type="checkbox" name="problems" value="ac_problem" class="w-5 h-5 text-orange-500 border-2 border-gray-300 focus:ring-orange-500 focus:ring-2">
                            </div>
                            <span class="text-gray-700 text-base">AC tidak nyala / AC panas</span>
                        </label>

                        <!-- Option 2 -->
                        <label class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors duration-150">
                            <div class="relative">
                                <input type="checkbox" name="problems" value="late_opening" class="w-5 h-5 text-orange-500 border-2 border-gray-300 focus:ring-orange-500 focus:ring-2">
                            </div>
                            <span class="text-gray-700 text-base">Kelas telat terbuka</span>
                        </label>

                        <!-- Option 3 -->
                        <label class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors duration-150">
                            <div class="relative">
                                <input type="checkbox" name="problems" value="noisy_groups" class="w-5 h-5 text-orange-500 border-2 border-gray-300 focus:ring-orange-500 focus:ring-2">
                            </div>
                            <span class="text-gray-700 text-base">Kelompok lain ramai</span>
                        </label>

                        <!-- Option 4 -->
                        <label class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors duration-150">
                            <div class="relative">
                                <input type="checkbox" name="problems" value="conflicting_schedule" class="w-5 h-5 text-orange-500 border-2 border-gray-300 focus:ring-orange-500 focus:ring-2">
                            </div>
                            <span class="text-gray-700 text-base">Ada kuliah untuk maba di jam LEG</span>
                        </label>

                        <!-- Option 5 -->
                        <label class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors duration-150">
                            <div class="relative">
                                <input type="checkbox" name="problems" value="room_interruption" class="w-5 h-5 text-orange-500 border-2 border-gray-300 focus:ring-orange-500 focus:ring-2">
                            </div>
                            <span class="text-gray-700 text-base">LEG terinterupsi karena ada orang lain yang ingin menggunakan ruangan</span>
                        </label>

                        <!-- Option 6 -->
                        <label class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors duration-150">
                            <div class="relative">
                                <input type="checkbox" name="problems" value="early_departure" class="w-5 h-5 text-orange-500 border-2 border-gray-300 focus:ring-orange-500 focus:ring-2">
                            </div>
                            <span class="text-gray-700 text-base">Maba request pulang sebelum 12.30 karena ada UKM / panitia / kelas / dsb</span>
                        </label>

                        <!-- Others option -->
                        <label class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors duration-150">
                            <div class="relative mt-0.5">
                                <input type="checkbox" name="problems" value="others" class="w-5 h-5 text-orange-500 border-2 border-gray-300 focus:ring-orange-500 focus:ring-2">
                            </div>
                            <div class="flex-1 flex flex-row">
                                <span class="text-gray-700 text-base"></span>
                                <input type="text" 
                                    placeholder="Others" 
                                    class="w-full p-2  text-sm border border-gray-300 rounded-md focus:ring-2  transition-all duration-150"
                                    id="otherInput"
                                    disabled>
                            </div>
                        </label>
                    </div>
                        <div class="py-2 font-bold">
                            Apa ada kendala ynag kamu hadapi hari ini?
                        </div>
                        <div class="text-sm md:text-base py-1">
                            <textarea 
                                name="no3" 
                                id="no3" 
                                class="w-full bg-[#D9D9D9] resize-none placeholder:text-gray-500 p-3 leading-[2rem] h-[60px] focus:outline-none rounded-xl" 
                                placeholder=""></textarea>
                        </div>
                </div>
                <div>
                    <div class="py-2 font-bold">
                        Bagaimana materi ini membantu kamu secara personal?
                    </div>
                    <div class="text-sm md:text-base py-1">
                        <textarea 
                            name="no4" 
                            id="no4" 
                            class="w-full bg-[#D9D9D9] resize-none placeholder:text-gray-500 p-3 leading-[2rem] h-[60px] focus:outline-none rounded-xl" 
                            placeholder=""></textarea>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="flex justify-center py-2" id="submitContainer" style="display: none;">
                <div class="flex flex-col justify-center py-8">
                    <div class="flex flex-row mb-[20px]">
                        <input type="checkbox" class="w-5 h-5 mr-2 text-orange-500 border-2 border-gray-300 focus:ring-orange-500 focus:ring-2" required>Apakah sudah Merapikan Ruangan LEG?
                    </div>
                    <button type="submit" name="input_data" id="input_data" 
                            class="bg-[#F7AD1A] hover:bg-[#e69c15] text-white font-semibold py-4 px-4 rounded-xl w-full max-w-[367px] text-xl sm:text-3xl transition-colors">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const othersCheckbox = document.querySelector('input[value="others"]');
        const otherInput = document.getElementById('otherInput');
        
        othersCheckbox.addEventListener('change', function() {
            if (this.checked) {
                otherInput.disabled = false;
                otherInput.focus();
            } else {
                otherInput.disabled = true;
                otherInput.value = '';
            }
        });
        const style = document.createElement('style');
        style.textContent = `
            input[type="checkbox"] {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                rounded:full;
                width: 20px;
                height: 20px;
                border: 2px solid #d1d5db;
                border-radius: 4px;
                background-color: white;
                cursor: pointer;
                position: relative;
                transition: all 0.15s ease;
            }
            
            input[type="checkbox"]:hover {
                border-color: #f97316;
            }
            
            input[type="checkbox"]:checked {
                border-color: #f97316;
                background-color: #f97316;
            }
            
            input[type="checkbox"]:checked::after {
                content: '✓';
                color: white;
                font-size: 14px;
                font-weight: bold;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                line-height: 1;
            }
            
            input[type="checkbox"]:focus {
                outline: none;
                box-shadow: 0 0 0 2px #fed7aa;
            }
        `;
        document.head.appendChild(style);
            // File upload functionality
            const uploadBoxes = document.querySelectorAll('.upload-box');
            
            uploadBoxes.forEach((box) => {
                const addFileBtn = box.querySelector('.add-file-btn');
                const fileInput = box.querySelector('.file-input');
                const fileDisplay = box.querySelector('.file-display');
                
                addFileBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    fileInput.click();
                });
                
                fileInput.addEventListener('change', function(e) {
                    const files = Array.from(e.target.files);
                    
                    if (files.length > 0) {
                        // Check file size (2MB limit)
                        const invalidFiles = files.filter(file => file.size > 2 * 1024 * 1024);
                        if (invalidFiles.length > 0) {
                            Swal.fire({
                                icon: 'error', 
                                title: 'Oops...', 
                                text: 'Beberapa file melebihi batas 2MB. Silakan pilih file yang lebih kecil.'
                            });
                            e.target.value = '';
                            fileDisplay.classList.add('hidden');
                            return;
                        }
                        
                        // Display selected files
                        if (files.length === 1) {
                            fileDisplay.textContent = `Selected: ${files[0].name}`;
                        } else {
                            fileDisplay.textContent = `Selected: ${files.length} files`;
                        }
                        fileDisplay.classList.remove('hidden');
                    } else {
                        fileDisplay.classList.add('hidden');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            initializePage();
            
            // Function to hide loading overlay and show content
            function showMainContent() {
                $('#loadingOverlay').fadeOut(500, function() {
                    $('#mainContent').removeClass('loading').addClass('loaded');
                });
            }

            // Function to handle access check
            function checkAccess() {
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: "http://127.0.0.1/tps-new/astor/absensi/upload/sheets.php",
                        method: "POST",
                        data: { username: "<?php echo $_SESSION['username']; ?>" },
                        dataType: "json",
                        timeout: 3000, // 3 second timeout
                        success: function(res) {
                            if (res.status === true) {
                                console.log("Akses diizinkan");
                                resolve(true);
                            } else {
                                // User tidak punya akses, disable dropdown
                                $("#sesi").prop("disabled", true);
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Akses Terbatas',
                                    text: 'Anda tidak memiliki akses untuk memilih opsi ini!'
                                });
                                resolve(false);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error checking access:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi kesalahan saat mengecek status. Silakan refresh halaman.'
                            });
                            reject(error);
                        }
                    });
                });
            }

            // Initialize page loading sequence
            async function initializePage() {
                try {
                    // Show loading for minimum 1.5 seconds for better UX
                    const minLoadTime = new Promise(resolve => setTimeout(resolve, 5500));
                    
                    // Check access in parallel
                    // const [, accessResult] = await Promise.all([
                    //     minLoadTime,
                    //     checkAccess()
                    // ]);
                    
                    // Show main content after loading is complete
                    showMainContent();
                    
                } catch (error) {
                    console.error('Initialization failed:', error);
                    // Still show content even if access check fails
                    showMainContent();
                }
            }

            var ajaxCall;
            
            // Form submission functions
            const submitForm = function(formData) {
                if (ajaxCall != null) ajaxCall.abort();

                ajaxCall = $.ajax({
                    url: "absensi_submit.php",
                    type: 'POST',
                    data: formData,
                    success: function(res) {
                        if (res === "Pengisian presensi berhasil!") {
                            assessmentForm(formData);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: res
                            });
                            $("#input_data").html("Submit");
                            $("#input_data").css("pointer-events", "auto");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire({'title': 'Oops...', 'text': status, 'icon': 'error', 'confirmButtonText': 'OK'});
                        $("#input_data").html("Submit");
                        $("#input_data").css("pointer-events", "auto");
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }

            const assessmentForm = function(formData) {
                if (ajaxCall != null) ajaxCall.abort();

                ajaxCall = $.ajax({
                    url: "assessment_submit.php",
                    type: 'POST',
                    data: formData,
                    success: function(res) {
                        if (res === "Berhasil") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Terima kasih Astor untuk pelayanan hari ini. God Bless You 🫶'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'http://tps.petra.ac.id/main';
                                }
                            });
                        } else {
                            console.log(res);
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Mengisi Assessment',
                                text: res
                            });
                            $("#input_data").html("Submit");
                            $("#input_data").css("pointer-events", "auto");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat mengirim data. Silakan coba lagi.');
                        $("#input_data").html("Submit");
                        $("#input_data").css("pointer-events", "auto");
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }

            // Form submit handler
            $("#theForm").submit(function(e) {
                e.preventDefault();
                
                const sesi = $("#sesi").val();
                const p1 = $("#no1").val();
                const p2 = $("#no2").val();
                const p3 = $("#no3").val();
                const p4 = $("#no4").val();
                var formData = new FormData(this);
                
                if (!sesi) {
                    Swal.fire({
                        icon: 'error', 
                        title: 'Oops...', 
                        text: "Silakan pilih materi terlebih dahulu."
                    });
                    return;
                }
                
                const startFile = $("#fileToUploadStart")[0].files[0];
                const finishFile = $("#fileToUploadFinish")[0].files[0];

                Swal.fire({
                            icon: 'question', 
                            title: 'Konfirmasi',
                            text: "Apakah data yang Anda masukkan sudah benar?",
                            showCancelButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "cekpartner.php",
                                    type: 'POST',
                                    data: {
                                        username: '<?php echo $_SESSION['username']; ?>',
                                        materi: sesi,
                                        kelompok: '<?php echo $_SESSION['id_kelompok']; ?>'
                                    },
                                    success: function(res) {
                                        console.log(res.partner, typeof res.partner);

                                        if (!res.partner) {
                                            if(!startFile || !finishFile || !p1 || !p2 || !p3 || !p4){
                                                    Swal.fire({
                                                        icon: 'error', 
                                                        title: 'Oops...', 
                                                        text:"Silakan upload foto awal dan foto akhir LEG serta isi semua Assessment."
                                                    });
                                                    return;
                                                }
                                            console.log('Not a partner');
                                            $("#input_data").html("Submitting...");
                                            $("#input_data").css("pointer-events", "none");
                                            submitForm(formData);
                                        } else {
                                            console.log('Is a partner');
                                            if (res.presensi) {
                                                if ((!p1 || !p2 || !p3 || !p4) ){ 
                                                    Swal.fire({
                                                        icon: 'error', 
                                                        title: 'Oops...', 
                                                        text:"Silakan isi semua Assessment."
                                                    });
                                                    return;
                                                }
                                                console.log('Has presensi');
                                                $("#input_data").html("Submitting...");
                                                $("#input_data").css("pointer-events", "none");
                                                assessmentForm(formData);
                                            }else{
                                                console.log('No presensi');
                                                if((!startFile || !finishFile) && (p1 && p2 && p3 && p4)){
                                                    Swal.fire({
                                                        icon: 'error', 
                                                        title: 'Oops...', 
                                                        text:"Silakan upload foto awal dan foto akhir LEG."
                                                    });
                                                    return;
                                                }else if ((!p1 || !p2 || !p3 || !p4) && (startFile && finishFile)){ 
                                                    Swal.fire({
                                                        icon: 'error', 
                                                        title: 'Oops...', 
                                                        text:"Silakan isi semua Assessment."
                                                    });
                                                    return;
                                                }else if(!startFile || !finishFile || !p1 || !p2 || !p3 || !p4){
                                                    Swal.fire({
                                                        icon: 'error', 
                                                        title: 'Oops...', 
                                                        text:"Silakan upload foto awal dan foto akhir LEG serta isi semua Assessment."
                                                    });
                                                    return;
                                                }else{
                                                    $("#input_data").html("Submitting...");
                                                    $("#input_data").css("pointer-events", "none");
                                                    submitForm(formData);
                                                }
                                            }
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error:', error);
                                        alert('Terjadi kesalahan saat mengirim data. Silakan coba lagi.');
                                        $("#input_data").html("Submit");
                                    }
                                });
                            }
                        });

            });

            // Session change handler
            $('#sesi').change(function() {
                const sesiValue = $(this).val();
                
                if (sesiValue) {
                    $('#tableContainer').show();
                    
                    const kelompok = <?= $_SESSION['id_kelompok'] ?? 0; ?>;
                    
                    // Cek presensi dulu lewat AJAX
                    $.ajax({
                        url: 'cekpresensi.php',
                        type: 'POST',
                        data: { 
                            username: "<?= $_SESSION['username']; ?>",
                            materi: sesiValue
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.presensi) {
                                $('#uploadInstructions').hide();
                                $('#uploadSections').hide();
                            } else {
                                $('#uploadInstructions').show();
                                $('#uploadSections').show();
                                $('#submitContainer').show();
                            }
                            if(res.assesment) {
                                $('#selfAssesment').hide();
                            } else {
                                $('#selfAssesment').show();
                                $('#submitContainer').show();
                            }
                        }
                    });

                    // Load daftar mahasiswa
                    $.ajax({
                        url: 'absensi_ajax.php',
                        type: 'POST',
                        data: { kelompok: kelompok, sesi: sesiValue },
                        dataType: 'json',
                        success: function(result) {
                            if (result && result.a) {
                                $('#list').html(result.a);
                            } else {
                                $('#list').html('<tr><td colspan="4" class="text-center py-4">Tidak ada data mahasiswa</td></tr>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            $('#list').html('<tr><td colspan="4" class="text-center py-4 text-red-500">Error memuat data</td></tr>');
                        }
                    });
                } else {
                    $('#tableContainer').hide();
                    $('#uploadInstructions').hide();
                    $('#uploadSections').hide();
                    $('#submitContainer').hide();
                    $('#selfAssesment').hide();
                }
            });
        });
    </script>
</body>
</html>