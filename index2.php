<?php 
session_start();

include 'header.php'; ?>



<section id="hero">
    <div>
        <div class=" mt-2">
            <div class="max-w-[1219px] mx-auto px-[20px]">
                <img class="hidden md:flex" src="assets/img/newkaldk.png" alt="">
                <img class="md:hidden" src="assets/img/newkalmb.png" alt="">
            </div>
        </div>
    </div>
    <div class="text-center pt-4">
        <a href="https://calendar.google.com/calendar/u/2?cid=ZmZhYTkzM2Y2YzEzYTg4ZTg5OTEwZmEzNjBkMjY5OTg4M2RjMjlkZmEyYTk3ZTJiYmM4YmUyYWI4MmYxOTg5Y0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t" target="_blank" class="bg-[#ff8b00] border border-gray-300 rounded-lg text-xs md:text-sm py-1 px-2 sm:px-3 sm:py-2 text-white inline-block">
            Get the calendar here
        </a>
    </div>
    <div class="px-3">
        <h1 class=" text-md sm:text-2xl lg:text-3xl text-[#ff8b00] font-bold mt-6">Upcoming Events</h1>
        <div class="flex justify-center">
            <img class="w-full h-full py-2" src="assets/img/UE.png" alt="">
        </div>
    </div>
</section><!-- End Hero -->

<section id="about">
    <!-- gambar astor dan ayat -->
    <div class="flex flex-col justify-end py-4 sm:py-12 text-center w-auto mx-auto 
            h-[250px] sm:h-[400px] md:h-[500px] lg:h-[750px]" 
     style="background-image: url('assets/img/FA.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="mx-auto sm:w-1/2">
            <h1 class="font-semibold text-xl md:text-2xl mb-2 text-white">2 Korintus 4:1</h1>
            <p class="text-xs sm:text-md lg:text-lg text-white">Oleh kemurahan Allah kami telah menerima pelayanan ini.</p>
            <p class="text-xs sm:text-md lg:text-lg text-white">Karena itu kami tidak tawar hati</p>
        </div>
    </div>

    <div class="px-3 bg-[#ff8b00] text-white h-[179px] sm:h-[200px] md:h-[290px] py-6">
        <div class="max-w-[1219px] mx-auto">
            <div class="flex justify-center px-[20px] gap-6">
                <div class="max-w-1/2 pr-2">
                    <h1 class="text-white text-[16px] md:text-[36px] font-semibold mb-4">Visi Besar</h1>
                    <p class=" text-[10px] sm:text-[12px] md:text-[20px] lg:text-[24px]">Mengajak mahasiswa baru mulai memikirkan hidup yang berhasil dan bermakna</p>
                </div>
                <div class="max-w-1/2 pl-2">
                    <h1 class="text-white text-[16px] md:text-[36px] font-semibold mb-4">Visi Tahunan</h1>
                    <p class=" text-[10px] sm:text-[12px] md:text-[20px] lg:text-[24px]">ASTOR belajar hidup berpusat pada Kristus melalui pemahaman yang benarkan Tuhan dan diri, sehingga dapat membagikan injil di kelompok LEG dan mengembangkan diri sesuai tujuan hidup</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SOP Astor, Kode Etik & FAQ Section -->
<section id="sop" class="py-16 bg-white">
    <style>
        .sop-title {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 700;
            font-size: 36px;
            line-height: 100%;
            color: #FF8B00;
        }
        
        .sop-container {
            max-width: 1219px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .sop-item {
            background: #FFEEAE;
            border-radius: 12px;
            height: 56.58px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px 0 25px;
            margin-bottom: 15px;
        }
        
        .sop-item:hover {
            background: #FFE89A;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 139, 0, 0.2);
        }
        
        .sop-item h3 {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 600;
            font-size: 16px;
            color: #333;
            margin: 0;
        }
        
        .sop-arrow {
            font-size: 18px;
            color: #FF8B00;
            font-weight: bold;
            transition: transform 0.3s ease;
        }
        
        /* modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            animation: fadeIn 0.3s ease;
        }
        
        .modal-overlay.show {
            display: flex !important;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .modal-content {
            background: white;
            border-radius: 20px;
            max-width: 800px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: slideIn 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            z-index: 10000;
        }
        
        .modal-header {
            padding: 40px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .big-letter {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 700;
            font-size: 64px;
            line-height: 100%;
            color: #FF8B00;
            margin-right: 20px;
        }
        
        .section-title {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 600;
            font-size: 32px;
            color: #333;
            margin: 0;
        }
        
        .modal-body {
            padding: 40px;
        }
        
        /* sop list */
        .sop-list {
            list-style: none;
            counter-reset: sop-counter;
            margin: 0;
            padding: 0;
        }
        
        .sop-list li {
            counter-increment: sop-counter;
            margin-bottom: 25px;
            position: relative;
            padding-left: 60px;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 600;
            font-size: 14px;
            line-height: 1.5;
            color: #6E5A30;
        }
        
        .sop-list li::before {
            content: counter(sop-counter) ".";
            position: absolute;
            left: 0;
            top: 0;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: #6E5A30; 
            width: 40px;
        }
        
        .sop-list li:not(:last-child)::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -12px;
            width: calc(100% - 20px);
            height: 1px;
            background: rgba(255, 139, 0, 0.3);
        }
        
        .italic-text {
            font-style: italic;
            color: #666;
        }
        
        /* contoh */
        .contoh-section {
            margin: 30px 0 30px -40px;
            padding: 15px 0;
            font-size: 14px;
            line-height: 1.4;
        }
        
        .contoh-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: #6E5A30;
        }
        
        .contoh-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .contoh-list li {
            margin-bottom: 12px;
            padding-left: 0;
            counter-increment: none;
            font-weight: 400; 
            color: #6E5A30; 
        }
        
        .contoh-list li::before {
            content: none;
        }
        
        .contoh-list li::after {
            content: none !important;
        }

        /* tips */
        .tips-section {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 139, 0, 0.3);
        }
        
        .tips-title {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 600;
            font-size: 16px;
            color: #6E5A30;
            margin-bottom: 15px;
        }
        
        .tips-list {
            list-style: none;
            counter-reset: tips-counter;
            margin: 0;
            padding: 0;
        }
        
        .tips-list li {
            counter-increment: tips-counter;
            margin-bottom: 15px;
            position: relative;
            padding-left: 30px;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 600;
            font-size: 14px;
            line-height: 1.5;
            color: #6E5A30;
        }
        
        .tips-list li::before {
            content: counter(tips-counter) ".";
            position: absolute;
            left: 0;
            top: 0;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 700;
            font-size: 16px;
            color: #6E5A30;
            width: 20px;
        }

        /* FAQ */
        .faq-answer {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.6;
            color: #6E5A30;
        }

        .faq-answer p {
            margin: 0;
            text-align: justify;
        }

        /* mobile */
        @media (max-width: 768px) {
            .sop-title {
                font-size: 28px;
            }
            
            .sop-item h3 {
                font-size: 14px;
            }
            
            .modal-overlay {
                padding: 15px; 
            }
            
            .modal-content {
                margin: 0;
                max-height: 95vh;
                border-radius: 15px;
            }
            
            .modal-header, .modal-body {
                padding: 25px 20px;
            }
            
            .big-letter {
                font-size: 48px;
                margin-right: 15px;
            }
            
            .section-title {
                font-size: 22px;
            }
            
            .sop-list li {
                padding-left: 45px;
                font-size: 13px;
            }
            
            .sop-list li::before {
                font-size: 20px;
                width: 35px;
            }
            
            .sop-list li:not(:last-child)::after {
                width: calc(100% - 15px);
            }
            
            .contoh-section {
                margin: 25px 0 25px -30px;
                padding: 12px 0;
            }
            
            .tips-list li {
                padding-left: 25px;
                font-size: 13px;
            }
            
            .tips-title {
                font-size: 14px;
            }

            .faq-answer {
                font-size: 13px;
                line-height: 1.5;
            }
        }

        @media (max-width: 480px) {
            .sop-title {
                font-size: 24px;
            }
            
            .sop-item {
                height: auto;
                min-height: 50px;
                padding: 15px 30px 15px 20px;
            }
            
            .sop-item h3 {
                font-size: 13px;
                line-height: 1.3;
            }
            
            .modal-overlay {
                padding: 10px;
            }
            
            .modal-content {
                border-radius: 12px;
                max-height: 92vh;
            }
            
            .modal-header, .modal-body {
                padding: 20px 15px;
            }
            
            .big-letter {
                font-size: 40px;
                margin-right: 10px;
            }
            
            .section-title {
                font-size: 20px;
                line-height: 1.2;
            }
            
            .sop-list li {
                padding-left: 40px;
                font-size: 12px;
                line-height: 1.4;
            }
            
            .sop-list li::before {
                font-size: 18px;
                width: 30px;
            }
            
            .contoh-section {
                margin: 20px 0 20px -20px;
                padding: 10px 0;
            }
            
            .tips-list li {
                padding-left: 22px;
                font-size: 12px;
            }
            
            .tips-list li::before {
                font-size: 14px;
                width: 18px;
            }
            
            .tips-title {
                font-size: 13px;
            }

            .faq-answer {
                font-size: 12px;
                line-height: 1.4;
            }
        }
    </style>
    
    <!-- SOP ASTOR -->
    <div class="text-center mb-12">
        <h2 class="sop-title">SOP ASTOR</h2>
    </div>
    
    <div class="sop-container">
        <div class="sop-item" onclick="openModal('modal-persiapan')">
            <h3>A. Persiapan</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-pembukaan')">
            <h3>B. Pembukaan</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-penyampaian')">
            <h3>C. Penyampaian</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-penutupan')">
            <h3>D. Penutupan</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-personal')">
            <h3>E. Personal dan Relational</h3>
            <span class="sop-arrow">›</span>
        </div>
    </div>
    
    <!-- KODE ETIK -->
    <div class="text-center mt-16 mb-12">
        <h2 class="sop-title">Kode Etik ASTOR</h2>
    </div>
    
    <div class="sop-container">
        <div class="sop-item" onclick="openModal('modal-pelaksanaan')">
            <h3>A. Pelaksanaan LIFE ENRICHMENT GRACE</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-kewajiban')">
            <h3>B. Kewajiban ASTOR</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-prosedur')">
            <h3>C. Prosedur Teknis Pelaksanaan</h3>
            <span class="sop-arrow">›</span>
        </div>
    </div>

    <!-- FAQ -->
    <div class="text-center mt-16 mb-12" id="faq">
        <h2 class="sop-title">Frequently Asked Questions</h2>
    </div>

    <div class="sop-container">
        <div class="sop-item" onclick="openModal('modal-faq-a')">
            <h3>A. Apa maksudnya menjadi calon ASTOR</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-faq-b')">
            <h3>B. Apa menjadi calon ASTOR pasti bakal menjadi ASTOR?</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-faq-c')">
            <h3>C. Kalau kuliah saya dipaketkan atau ada keterbatasan SKS bagaimana bisa mengambil kelas Servant Leader (SL)</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-faq-d')">
            <h3>D. Kalau saya tidak menjadi Frontline bagaimana?</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-faq-e')">
            <h3>E. Kalau saya mau ikut WGG tapi di divisi lain apa boleh?</h3>
            <span class="sop-arrow">›</span>
        </div>
        
        <div class="sop-item" onclick="openModal('modal-faq-f')">
            <h3>F. Kalau saya sudah ada KTB Life apa tetap perlu ikut KTB untuk ASTOR?</h3>
            <span class="sop-arrow">›</span>
        </div>
    </div>

    <!-- SOP -->
    
    <!-- A. Persiapan -->
    <div id="modal-persiapan" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">A.</div>
                <div class="section-title">Persiapan</div>
            </div>
            <div class="modal-body">
                <ol class="sop-list">
                    <li>Mempersiapkan diri. Baik fisik, mental, dan memahami materi yang akan disampaikan</li>
                    <li>Membuat kerangka materi berdasarkan modul</li>
                    <li>Membuat script yang terorganisir boleh berupa poin / main map / dll. Lebih ringkas lebih baik, agar jadi pengingat saat <span class="italic-text">nge-blank</span></li>
                    <li>Mencari pengalaman / contoh / ilustrasi yang tepat dan relevan dengan mahasiswa baru</li>
                    <li>Membuat <span class="italic-text">bridging</span> antar topik materi agar berkesinambungan</li>
                    <li>Mengerti esensi dan tujuan dari setiap diskusi dan aktivitas</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- B. Pembukaan -->
    <div id="modal-pembukaan" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">B.</div>
                <div class="section-title">Pembukaan</div>
            </div>
            <div class="modal-body">
                <ol class="sop-list">
                    <li>Memperhatikan suasana kelompok dan kondisi mahasiswa baru</li>
                    <li>Mencari tempat yang nyaman dan mengatur agar dapat melakukan eye-contact dengan semua anggota kelompok</li>
                    <li>Memperhatikan manajemen waktu pada saat penyampaian materi sehingga tidak tergesa-gesa ketika menyampaikan dan justru melewatkan kesempatan untuk mahasiswa baru menghayati materi yang disampaikan</li>
                    <li>Membuka pertemuan kelompok dengan pancingan pembicaraan dengan pertanyaan yang berhubungan dengan topik materi</li>
                    <li>Membuat <span class="italic-text">bridging</span> antar topik materi agar berkesinambungan</li>
                    <li>Mengerti esensi dan tujuan dari setiap diskusi dan aktivitas</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- C. Penyampaian -->
    <div id="modal-penyampaian" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">C.</div>
                <div class="section-title">Penyampaian</div>
            </div>
            <div class="modal-body">
                <ol class="sop-list">
                    <li>Menyesuaikan kedalaman materi sesuai dengan kondisi kelompok</li>
                    <li>Berbicara dengan intonasi yang sesuai penggunaan, artikulasi yang jelas, serta menggunakan bahasa yang mudah dipahami</li>
                    <li>Jika terjadi distraksi / kejadian tak terduga, tetap tenang dan tidak panik, lihat kerangka materi yang sudah dipersiapkan lalu fokus pada penekanan poin-poin utama / penting</li>
                    <li>Komunikasikan materi dengan tidak kaku dan menggunakan candaan yang relevan</li>
                    <li>Banyak lakukan interaksi dan diskusi, dan batasi dialog 1 arah</li>
                    <li>Pahami dan tanggapi pendapat mahasiswa baru dengan rasa ingin tahu tinggi. Usahakan untuk menyambungkan pendapat peserta satu dan yang lainnya agar terasa kebersamaan</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- D. Penutupan -->
    <div id="modal-penutupan" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">D.</div>
                <div class="section-title">Penutupan</div>
            </div>
            <div class="modal-body">
                <ol class="sop-list">
                    <li>Mengenal setiap mahasiswa baru secara personal di dalam dan di luar pertemuan</li>
                    <li>Memberikan kesimpulan pada akhir pertemuan serta memberi rangkuman poin-poin utama</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- E. Personal dan Relational -->
    <div id="modal-personal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">E.</div>
                <div class="section-title">Personal dan Relational</div>
            </div>
            <div class="modal-body">
                <ol class="sop-list">
                    <li>Mengenal setiap mahasiswa baru secara personal di dalam dan di luar pertemuan</li>
                    <li>Perlu diingat Astor bukan pengajar mahasiswa baru, melainkan merupakan teman berproses dan bertumbuh bersama</li>
                    <li>Pentingnya ekspresi wajah, gestur, body language, dan eye contact pada saat berkomunikasi sehingga dapat membangun respect melalui kepedulian dan relasi</li>
                </ol>
                
                <div class="tips-section">
                    <div class="tips-title">Berikut beberapa tips untuk mengurangi gugup:</div>
                    <ol class="tips-list">
                        <li>Latih nafas dengan baik. Coba untuk tarik napas dalam dalam dan buang napas secara perlahan. Ulangi 2-3 kali sampai merasa lebih tenang</li>
                        <li>Bergeraklah. Coba untuk menyalurkan ketakutan/ gugup lewat gerakan seperti menggunakan tangan saat berbicara</li>
                        <li>Tersenyum! Sadar atau tidak, tersenyum dapat memberi aura positif saat orang lain melihatnya dan dapat membantu menaikkan kepercayaan diri kamu</li>
                        <li>Dapatkan perhatian mahasiswa baru. Tunggulah sampai suasana tenang sebelum memulai pertemuan Life Enrichment Grace</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- KODE ETIK -->
    
    <!-- A. Pelaksanaan LIFE ENRICHMENT GRACE -->
    <div id="modal-pelaksanaan" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">A.</div>
                <div class="section-title">Pelaksanaan LIFE ENRICHMENT GRACE</div>
            </div>
            <div class="modal-body">
                <ol class="sop-list">
                    <li>Life Enrichment Grace merupakan responsi dari mata kuliah Agama dan Hidup Bermakna (4 sks) sehingga bersifat akademis dari segala aspek kegiatan. Pertemuan berupa kelompok kecil yang terdiri dari Astor/Pendamping dan Mahasiswa Baru.</li>
                    <li>Life Enrichment Grace bertujuan untuk mengajak mahasiswa baru mulai memikirkan hidup yang berhasil dan bermakna yang terbagi menjadi 4 fase (11 pertemuan).</li>
                    <li>Kelompok LEG adalah eksklusif milik Maba dan Astor untuk berdiskusi topik yang relate dengan LEG, tidak untuk mempromosikan PO, acara seminar/ kegiatan/ kepanitiaan di luar LEG</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- B. Kewajiban ASTOR -->
    <div id="modal-kewajiban" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">B.</div>
                <div class="section-title">Kewajiban ASTOR</div>
            </div>
            <div class="modal-body">
                <ol class="sop-list">
                    <li>Memahami peta konsep materi Life Enrichment Grace, spirit dan tujuan tiap pertemuan, serta dapat menghubungkan setiap prosedur/aktivitas dengan tujuan pertemuan tersebut.</li>
                    <li>Mengusahakan agar penyelenggaran Life Enrichment Grace dapat berjalan dengan baik sesuai dengan sifat akademis dalam hal ini antara lain program, tujuan dan jadwal pelaksanaan kegiatan.</li>
                    <li>Mencegah timbulnya penyimpangan dan atau pelanggaran terhadap kode etik ASTOR, peserta maupun pihak lain yang bertujuan mengganggu kelancaran jalannya Life Enrichment Grace.
                        <div class="contoh-section">
                            <div class="contoh-title">Contoh:</div>
                            <ul class="contoh-list">
                                <li>i. Mengajak pihak lain diluar kelompok yang tidak berkaitan dengan kepentingan kelompok</li>
                                <li>ii. Memiliki relasi khusus dengan MABA yang bertujuan selain bertumbuh bersama dalam program LEG (Contoh: Pacaran, dsb)</li>
                                <li>iii. Menyalahgunakan tanggung jawab yang diberikan untuk memenuhi agenda pribadi (Contoh: melakukan tindakan ancaman ke MABA)</li>
                            </ul>
                        </div>
                    </li>
                    <li>Menjalankan tugas dan pelaksanaan Life Enrichment Grace hanya di dalam lingkup UK Petra yang telah diprogramkan dan disetujui.</li>
                </ol>
            </div>
        </div>
    </div>
<!-- . Prosedur Teknis Pelaksanaan -->
<div id="modal-prosedur" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">C.</div>
                <div class="section-title">Prosedur Teknis Pelaksanaan</div>
            </div>
            <div class="modal-body">
                <ol class="sop-list">
                    <li>Hadir pada waktu yang telah ditentukan (Jumat, 10.30-12.30)</li>
                    <li>Menggunakan pakaian bebas dan rapi sesuai standar universitas</li>
                    <li>Dilarang membawa dan menggunakan barang-barang atau mengundang orang lain di luar kebutuhan kegiatan Life Enrichment Grace</li>
                    <li>Menjaga dan memelihara inventaris UK Petra dan merapikan kembali ruangan kelas yang digunakan serta menjaga kebersihan.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- FAQ POP UP -->

    <!-- FAQ A -->
    <div id="modal-faq-a" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">A.</div>
                <div class="section-title">Apa maksudnya menjadi calon ASTOR</div>
            </div>
            <div class="modal-body">
                <div class="faq-answer">
                    <p>Calon Astor adalah mahasiswa yang sudah mengisi tes tulis online, mengikuti wawancara, dan dinyatakan lanjut proses pembekalan calon Astor.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ B -->
    <div id="modal-faq-b" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">B.</div>
                <div class="section-title">Apa menjadi calon ASTOR pasti bakal menjadi ASTOR?</div>
            </div>
            <div class="modal-body">
                <div class="faq-answer">
                    <p>Dalam 1 semester ke depan, calon Astor akan didampingi dalam pembinaan agar berproses dan bertumbuh bersama. Setelah itu calon Astor akan diajak menggumulkan dan memutuskan bersama apakah siap melayani sebagai Astor.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ C -->
    <div id="modal-faq-c" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">C.</div>
                <div class="section-title">Kalau kuliah saya dipaketkan atau ada keterbatasan SKS bagaimana bisa mengambil kelas Servant Leader (SL)</div>
            </div>
            <div class="modal-body">
                <div class="faq-answer">
                    <p>Tersedia opsi untuk sit in, yaitu mahasiswa dapat mengikuti kelas SL tanpa perlu mendaftar melalui PRS. Nantinya, nilai yang diperoleh dapat diambil jika mahasiswa mendaftar kelas SL melalui PRS di semester genap berikutnya.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ D -->
    <div id="modal-faq-d" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">D.</div>
                <div class="section-title">Kalau saya tidak menjadi Frontline bagaimana?</div>
            </div>
            <div class="modal-body">
                <div class="faq-answer">
                    <p>Astor dan WGG adalah sebuah kesatuan rangkaian pelayanan. Jadi, Astor dianjurkan menjadi bagian dari Divisi Persiapan (PERAN) WGG. Apabila benar-benar berhalangan, segera hubungi OA TPS.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ E -->
    <div id="modal-faq-e" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">E.</div>
                <div class="section-title">Kalau saya mau ikut WGG tapi di divisi lain apa boleh?</div>
            </div>
            <div class="modal-body">
                <div class="faq-answer">
                    <p>Astor dan WGG ada sebuah kesatuan rangkaian pelayanan. Jadi, Astor dianjurkan menjadi bagian Divisi Persiapan (PERAN) WGG. Jika bisa mengikuti WGG maka Calon Astor akan diarahkan untuk mendaftar di Divisi PERAN.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ F -->
    <div id="modal-faq-f" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="big-letter">F.</div>
                <div class="section-title">Kalau saya sudah ada KTB Life apa tetap perlu ikut KTB untuk ASTOR?</div>
            </div>
            <div class="modal-body">
                <div class="faq-answer">
                    <p>Yes, KTB Life dan KTB untuk Astor memiliki jadwal, mentor, dan pembahasan yang berbeda.</p>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include 'index2.php'; ?>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

<script>
window.openModal = function(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
};

window.closeModal = function(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('show');
        document.body.style.overflow = 'auto';
    }
};

document.addEventListener('DOMContentLoaded', function() {
    // tutup dengan ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            var openModals = document.querySelectorAll('.modal-overlay.show');
            for (var i = 0; i < openModals.length; i++) {
                openModals[i].classList.remove('show');
            }
            document.body.style.overflow = 'auto';
        }
    });
    
    // click diluar modal
    var overlays = document.querySelectorAll('.modal-overlay');
    for (var i = 0; i < overlays.length; i++) {
        overlays[i].addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        });
    }
});
</script>

<!-- swiper-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            grabCursor: true,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                }
            }
        });
    }
});
</script>

</body>
</html>