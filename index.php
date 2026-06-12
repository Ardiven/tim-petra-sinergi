<?php include 'header.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Petra Sinergi - Clone</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tps: {
                            cream: '#FFFBEB',    // Background utama
                            yellow: '#FEF3C7',   // Background section Visi
                            orange: '#F59E0B',   // Warna tombol/aksen utama
                            dark: '#1F2937',     // Warna teks
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>


    /* Wrapper utama untuk header */
    .main-wrapper {
        position: relative;
        background-color: #FFFCF0; /* Warna cream dasar */
        padding-bottom: 80px;
        /* Kita buat lengkungan menggunakan clip-path agar lebih rapi */
        clip-path: ellipse(100% 100% at 50% 0%);
        z-index: 10;
    }

    @media (max-width: 992px) {
        .main-wrapper {
            clip-path: ellipse(150% 100% at 50% 0%);
            padding-bottom: 70px;
        }

    }

    /* Responsif untuk Mobile */
    @media (max-width: 768px) {
        .main-wrapper {
            clip-path: ellipse(130% 100% at 50% 0%);
            padding-bottom: 100px;
        }

    }
    @media (max-width: 480px) {
        .main-wrapper {
            clip-path: ellipse(150% 100% at 50% 0%);
            padding-bottom: 70px;
        }

    }
</style>
    
</head>
<body class="font-sans text-tps-dark">
    <?php include 'main.php'; ?>
<section class="hero-image-section w-full md:max-h-[100%]">
    <img src="img/TPS25/astor25-1.png" class="w-full h-full object-cover">
    
    <div class="absolute bottom-0 left-0 w-full p-8 text-center text-white overlay-gradient">
        <p class="font-bold text-sm sm:text-lg md:text-2xl mb-2 bg-black/40 rounded-2xl w-fit mx-auto px-4">2 Korintus 4:1</p>
        <p class="text-xs md:text-2xl max-w-xl mx-auto bg-black/40 rounded-2xl opacity-100">
            Oleh kemurahan Allah kami telah menerima pelayanan ini. Karena itu kami tidak tawar hati.
        </p>
    </div>
</section>
    <!-- visi -->
    <section class="bg-yellow-100 py-16 px-4 relative z-10">
        <div class="max-w-7xl mx-auto grid grid-cols-2 gap-6">
            <div>
                <h3 class="text-2xl md:text-4xl font-bold text-tps-orange mb-4">Visi Besar</h3>
                <p class="text-gray-700 text-xs sm:text-base md:text-2xl">Mengajak mahasiswa baru mulai memikirkan hidup yang berhasil dan bermakna.</p>
            </div>
            <div>
                <h3 class="text-2xl md:text-4xl font-bold text-tps-orange mb-4">Fokus Tahunan</h3>
                <p class="text-gray-700 text-xs sm:text-base md:text-2xl">Astor belajar hidup berpusat pada Kristus melalui pemahaman yang benar akan Tuhan dan diri, sehingga dapat membagikan Injil di kelompok LEG dan mengembangkan diri sesuai tujuan hidup.</p>
            </div>
        </div>
    </section>
<!-- values -->
    <section class="main-wrapper bg-[#FFFCF0] pb-6 pt-16 relative overflow-hidden">
        <div class="giant-oval-bg shadow-sm"></div>

        <div class="text-center sm:mb-10 px-4 relative z-10">
            <h2 class="text-3xl md:text-5xl font-extrabold text-[#FF8B00] mb-3">Our Values</h2>
            <p class="text-[#FF8B00] font-medium max-w-2xl mx-auto">
                Kami belajar membangun hidup dalam Kristus melalui nilai-nilai<br class="hidden md:block"> yang mewakili inti spirit pelayanan Astor.
            </p>
        </div>

        <div class="max-w-7xl mx-auto px-4 flex items-center justify-center gap-2 md:gap-8 relative sm:py-6 z-10">
            
            <button id="btnPrev" class="z-30 w-10 h-10 md:w-12 md:h-12 flex-shrink-0 rounded-full bg-white shadow-lg flex items-center justify-center text-[#FF8B00] hover:bg-orange-50 transition transform hover:-translate-y-1">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div id="sliderTrack" class="flex items-center justify-center w-full relative h-[220px] sm:h-[300px] overflow-visible">
                </div>

            <button id="btnNext" class="z-30 w-10 h-10 md:w-12 md:h-12 flex-shrink-0 rounded-full bg-white shadow-lg flex items-center justify-center text-[#FF8B00] hover:bg-orange-50 transition transform hover:-translate-y-1">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div class="text-center max-w-2xl mx-auto mt-12 px-6 relative z-10">
            <p id="sliderDesc" class="text-sm md:text-base text-gray-700 font-medium leading-relaxed transition-opacity duration-500">
                </p>
            <div id="sliderDots" class="flex justify-center gap-2 mt-6">
                </div>
        </div>
        <script>
            // 1. Data Slider
            const slidesData = [
                {
                    id: 5,
                    img: "img/TPS25/values/Group 301.webp", 
                    desc: "Berproses menjadi murid, yaitu menjadi pengikut yang memiliki hubungan dan belajar dari Yesus, Guru kita, agar kita berproses menghidupi manusia baru yang mencerminkan terang Kristus."
                },
                {
                    id: 1,
                    img: "img/TPS25/values/Group 305.webp", 
                    desc: "Kristus yang telah mati bagi dosa kita, dan bangkit menjadi pembela kita, menjadi dasar hidup dari apa yang kita kejar, cintai, dan anggap paling penting."
                },
                {
                    id: 2,
                    img: "img/TPS25/values/Group 303.webp", 
                    desc: "Belajar menghidupi kabar baik yang telah dinyatakan-Nya dalam Yesus dengan menjadi kabar baik buat orang di sekitar kita, terutama mereka yang membutuhkan peran, karya, kontribusi, support, lewat semua kelimpauan yang Tuhan beri pada kita."
                },
                {
                    id: 3,
                    img: "img/TPS25/values/Group 304.webp", 
                    desc: "Hal terutama yang menyatukan kita adalah bahwa kita sama-sama orang yang ditebus dan diperdamaikan kembali dengan Allah. Setiap interaksi dan relasi adalah anugerah supaya kita bisa saling membangun, menajamkan, dan menyadari bagian apa dalam diri yang bisa dibangun dalam hidup."
                },
                {
                    id: 4,
                    img: "img/TPS25/values/Group 302.webp", 
                    desc: "Mulai dari menyadari dan menerima diri apa adanya karena kita sudah diterima dan dikasihi oleh Tuhan. Setelah itu bertumbuh dalam keinginan, cara berpikir, dan perilaku yang bukan lagi menjadi produk masa lalu, tapi terbangun dengan memberikan kekecewaan, kemarahan, dan luka kepada Tuhan supaya diproses dan terus-terusan dibentuk di dalam Tuhan."
                }
                
            ];

            let currentIndex = 1;
            const track = document.getElementById('sliderTrack');
            const descEl = document.getElementById('sliderDesc');
            const dotsContainer = document.getElementById('sliderDots');

            let slideElements = [];
            let dotElements = [];
            let autoPlayInterval; 

            // 2. Fungsi Inisialisasi
            function initSlider() {
                slidesData.forEach((slide, index) => {
                    const slideEl = document.createElement('div');
                    // Lebar dasar untuk awal render diperbesar untuk HP (260px)
                    const baseClasses = "absolute bottom-0 transition-all duration-700 ease-in-out w-[260px] sm:w-[320px] md:w-[450px] origin-bottom";
                    slideEl.className = baseClasses;
                    slideEl.innerHTML = `<img src="${slide.img}" alt="Value ${slide.id}" class="w-full h-auto object-contain">`;
                    
                    slideEl.onclick = () => {
                        if (index !== currentIndex) {
                            currentIndex = index;
                            updateSlider();
                            resetAutoPlay(); 
                        }
                    };
                    
                    track.appendChild(slideEl);
                    slideElements.push(slideEl); 

                    const dot = document.createElement('span');
                    dotsContainer.appendChild(dot);
                    dotElements.push(dot); 
                });

                updateSlider();
                startAutoPlay();
            }

            // 3. Fungsi Update Tampilan (Logika Responsif Layar < 480px ada di sini)
            function updateSlider() {
                slidesData.forEach((slide, index) => {
                    let positionClass = '';
                    let zIndex = '';
                    let opacityScale = '';

                    if (index === currentIndex) {
                        // GAMBAR TENGAH (Selalu Tampil)
                        positionClass = 'translate-x-0';
                        zIndex = 'z-20';
                        opacityScale = 'scale-100 opacity-100 drop-shadow-2xl pointer-events-auto';
                    } else if (index === (currentIndex - 1 + slidesData.length) % slidesData.length) {
                        // GAMBAR KIRI
                        positionClass = '-translate-x-[35%] md:-translate-x-[45%]';
                        zIndex = 'z-10';
                        // Jika < 480px: opacity-0 & tidak bisa diklik. Jika > 480px: opacity-60 & bisa diklik.
                        opacityScale = 'opacity-0 min-[480px]:opacity-60 scale-50 min-[480px]:scale-75 cursor-pointer hover:opacity-100 pointer-events-none min-[480px]:pointer-events-auto';
                    } else if (index === (currentIndex + 1) % slidesData.length) {
                        // GAMBAR KANAN
                        positionClass = 'translate-x-[35%] md:translate-x-[45%]';
                        zIndex = 'z-10';
                        // Logika responsif yang sama dengan gambar kiri
                        opacityScale = 'opacity-0 min-[480px]:opacity-60 scale-50 min-[480px]:scale-75 cursor-pointer hover:opacity-100 pointer-events-none min-[480px]:pointer-events-auto';
                    } else {
                        // GAMBAR LAINNYA (Tersembunyi)
                        positionClass = 'translate-x-0';
                        zIndex = '-z-10';
                        opacityScale = 'opacity-0 scale-50 pointer-events-none';
                    }

                    // Lebar di HP diubah dari 220px ke 260px agar lebih besar dan memuaskan!
                    const baseClasses = "absolute bottom-0 transition-all duration-700 ease-in-out w-[260px] sm:w-[320px] md:w-[450px] origin-bottom";
                    slideElements[index].className = `${baseClasses} ${positionClass} ${zIndex} ${opacityScale}`;

                    // Update Dots
                    dotElements[index].className = `h-2 rounded-full transition-all duration-500 ${index === currentIndex ? 'bg-[#FF8B00] w-6' : 'bg-gray-300 w-2'}`;
                });

                // Update Teks
                descEl.style.opacity = 0; 
                setTimeout(() => {
                    descEl.textContent = slidesData[currentIndex].desc;
                    descEl.style.opacity = 1; 
                }, 300); 
            }

            // 4. Mekanisme Tombol & Auto-Play
            function nextSlide() {
                currentIndex = (currentIndex + 1) % slidesData.length;
                updateSlider();
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + slidesData.length) % slidesData.length;
                updateSlider();
            }

            document.getElementById('btnNext').addEventListener('click', () => {
                nextSlide();
                resetAutoPlay();
            });

            document.getElementById('btnPrev').addEventListener('click', () => {
                prevSlide();
                resetAutoPlay();
            });

            function startAutoPlay() {
                autoPlayInterval = setInterval(nextSlide, 10000); // 3.5 detik
            }

            function resetAutoPlay() {
                clearInterval(autoPlayInterval);
                startAutoPlay();
            }

            initSlider();
        </script>  
    </section>

      
<!-- kegiatan -->
    <section id="kegiatan" class="bg-white py-16 relative overflow-hidden">
        <div class="text-center  px-4 relative z-10">
            <h2 class="text-3xl md:text-5xl font-extrabold text-[#FF8B00] mb-3">Kegiatan Pembinaan</h2>
            <p class="text-[#FF8B00] font-medium max-w-2xl mx-auto text-lg">
                Kegiatan apa saja yang dikelola oleh Tim Petra Sinergi
            </p>
        </div>

        <div class="max-w-7xl max-h-[500px] mx-auto px-4 flex items-center justify-center gap-2 md:gap-8 relative  pb-6 z-10">
            
            <button id="btnKegiatanPrev" class="z-30 w-10 h-10 md:w-12 md:h-12 flex-shrink-0 rounded-full bg-white shadow-lg flex items-center justify-center text-[#FF8B00] border border-gray-100 hover:bg-orange-50 transition transform hover:-translate-y-1">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div id="kegiatanTrack" class="flex items-center justify-center w-full relative h-[450px] md:h-[500px] overflow-visible">
                </div>

            <button id="btnKegiatanNext" class="z-30 w-10 h-10 md:w-12 md:h-12 flex-shrink-0 rounded-full bg-white shadow-lg flex items-center justify-center text-[#FF8B00] border border-gray-100 hover:bg-orange-50 transition transform hover:-translate-y-1">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div class="text-center mt-6 px-6 relative z-10">
            <div id="kegiatanDots" class="flex justify-center gap-2">
                </div>
        </div>
            <script>
                // 1. Data Kegiatan
                const kegiatanData = [
                    {
                        id: 1,
                        img: "img/TPS25/pastor.jpg", // Ganti dengan path gambarmu
                        title: "Persekutuan Astor (PASTOR)",
                        desc: "Tempat Astor berkumpul satu dengan yang lain, saling memahami problem / tantangan / kesulitan yang dihadapi, berbagi harapan, dan memaknai hidup yang dijalani dalam Tuhan untuk terus mencapai tujuan visi kita."
                    },
                    {
                        id: 2,
                        img: "img/TPS25/SL.jpg", 
                        title: "Kegiatan SL",
                        desc: "SL adalah mata kuliah umum bagi Calon Astor (Castor) untuk diperlengkapi dasar-dasar pemahaman iman dengan pembahasan yang terstruktur, kritis, berdasarkan bukti-bukti yang konkrit dalam topik-topik menarik (mengapa saya Kristen, siapa Allah sebenarnya, apa bukti Alkitab adalah Firman Allah, dsb)"
                    },
                    {
                        id: 3,
                        img: "img/TPS25/LEG.webp", 
                        title: "Life Enrichment Grace",
                        desc: "Kami menyelenggarakan program buat jadi keluarga pertama maba untuk nemenin maba yang sedang masuk fase baru dalam kuliah, untuk mulai memikirkan hidup yang berhasil dan bermakna bersama-sama kelompok yang difasilitasi / dilayani oleh Asisten Tutor (Astor)."
                    },
                    {
                        id: 4,
                        img: "img/TPS25/icamp.webp", 
                        title: "Impartation Camp (I-Camp)",
                        desc: "Sejauh ini, ini camp paling jauh! buat nemuin diri kita sebenarnya di dalam Tuhan! kata Grace, Felita, dan Ferdy, kakak Astor yang mengikuti camp ini tahun 2025. Camp ini adalah pembinaan final bagi Calon Astor sebelum bertemu Mahasiswa Baru, dimana visi Tim Petra Sinergi di-impartasikan secara menyeluruh</span> ke rekan-rekan Castor. Castor akan dibina dengan intensif untuk lebih mengenal pelayanan LEG."
                    },
                    {
                        id: 5,
                        img: "img/TPS25/ktb.webp", 
                        title: "Kelompok Tumbuh Bersama (KTB)",
                        desc: "Kelompok kecil eksklusif (tertutup) dimentori oleh Alumni PCU yang pernah melayani sebagai Astor dan sudah menjalani dunia kerja, untuk bersama-sama belajar cara membangun hidup di dalam Tuhan."
                    },
                    {
                        id: 6,
                        img: "img/TPS25/briefing.webp", 
                        title: "Briefing Life Enrichment Grace (LEG)",
                        desc: "Pembinaan untuk memberikan penjelasan materi, pedoman, dan instruksi untuk membantu persiapan Astor dalam program Life Enrichment Grace."
                    },
                    {
                        id: 7,
                        img: "img/TPS25/PERAN.webp", 
                        title: "Divisi Persiapan (PERAN) WGG",
                        desc: "Diselenggarakan di pembinaan / persiapan Divisi (Persiapan) PERAN WGG, sebagai wadah bagi Astor untuk melatih skill yang diperlukan  dalam pelayanan LEG, seperti skill penyampaian materi, dinamika kelompok, dan digging-planting."
                    }
                ];

                let currentKegiatanIndex = 1;
                const kegiatanTrack = document.getElementById('kegiatanTrack');
                const kegiatanDotsContainer = document.getElementById('kegiatanDots');

                let kegiatanElements = [];
                let kegiatanDotElements = [];
                let kegiatanAutoPlay;

                // 2. Fungsi Inisialisasi
                function initKegiatanSlider() {
                    kegiatanData.forEach((item, index) => {
                        const cardEl = document.createElement('div');
                        
                        // Base class untuk ukuran Card. Menggunakan top-1/2 -translate-y-1/2 agar presisi di tengah
                        const baseClasses = "absolute bottom-0 transition-all duration-700 ease-in-out w-[280px] sm:w-[320px] md:w-[420px] h-[350px] md:h-[450px] origin-center bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col";
                        cardEl.className = baseClasses;
                        
                        // Struktur Dalam Card (Gambar di atas, Teks di bawah)
                        cardEl.innerHTML = `
                            <div class="h-[45%] md:h-[45%] w-full bg-gray-200 relative">
                                <img src="${item.img}" alt="${item.title}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 p-5 md:p-6 flex flex-col">
                                <h3 class="font-bold text-gray-800 text-sm md:text-base mb-2">${item.title}</h3>
                                <p class="text-xs md:text-sm text-gray-500 leading-relaxed">${item.desc}</p>
                            </div>
                        `;
                        
                        // Fungsi klik untuk pindah slide
                        cardEl.onclick = () => {
                            if (index !== currentKegiatanIndex) {
                                currentKegiatanIndex = index;
                                updateKegiatanSlider();
                                resetKegiatanAutoPlay();
                            }
                        };
                        
                        kegiatanTrack.appendChild(cardEl);
                        kegiatanElements.push(cardEl);

                        // Buat Dots
                        const dot = document.createElement('span');
                        kegiatanDotsContainer.appendChild(dot);
                        kegiatanDotElements.push(dot);
                    });

                    updateKegiatanSlider();
                    startKegiatanAutoPlay();
                }

                // 3. Fungsi Update Tampilan
                function updateKegiatanSlider() {
                    kegiatanData.forEach((_, index) => {
                        let positionClass = '';
                        let zIndex = '';
                        let opacityScale = '';

                        if (index === currentKegiatanIndex) {
                            // KARTU TENGAH
                            positionClass = 'translate-x-0';
                            zIndex = 'z-20';
                            opacityScale = 'scale-100 opacity-100 pointer-events-auto';
                        } else if (index === (currentKegiatanIndex - 1 + kegiatanData.length) % kegiatanData.length) {
                            // KARTU KIRI (Sembunyi di Mobile <480px)
                            positionClass = '-translate-x-[45%] md:-translate-x-[50%]';
                            zIndex = 'z-10';
                            opacityScale = 'opacity-0 min-[480px]:opacity-50 scale-75 min-[480px]:scale-75 cursor-pointer hover:opacity-100 pointer-events-none min-[480px]:pointer-events-auto';
                        } else if (index === (currentKegiatanIndex + 1) % kegiatanData.length) {
                            // KARTU KANAN (Sembunyi di Mobile <480px)
                            positionClass = 'translate-x-[45%] md:translate-x-[50%]';
                            zIndex = 'z-10';
                            opacityScale = 'opacity-0 min-[480px]:opacity-50 scale-75 min-[480px]:scale-75 cursor-pointer hover:opacity-100 pointer-events-none min-[480px]:pointer-events-auto';
                        } else {
                            // KARTU LAINNYA
                            positionClass = 'translate-x-0';
                            zIndex = '-z-10';
                            opacityScale = 'opacity-0 scale-50 pointer-events-none';
                        }

                        // Update Class
                        const baseClasses = "absolute bottom-0 transition-all duration-700 ease-in-out w-[280px] sm:w-[320px] md:w-[420px] h-[420px] md:h-[450px] origin-center bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col border border-gray-100/50";
                        kegiatanElements[index].className = `${baseClasses} ${positionClass} ${zIndex} ${opacityScale}`;

                        // Update Dots
                        kegiatanDotElements[index].className = `h-2 rounded-full transition-all duration-500 ${index === currentKegiatanIndex ? 'bg-[#FF8B00] w-6' : 'bg-gray-300 w-2'}`;
                    });
                }

                // 4. Mekanisme Tombol & Auto Play
                function nextKegiatan() {
                    currentKegiatanIndex = (currentKegiatanIndex + 1) % kegiatanData.length;
                    updateKegiatanSlider();
                }

                function prevKegiatan() {
                    currentKegiatanIndex = (currentKegiatanIndex - 1 + kegiatanData.length) % kegiatanData.length;
                    updateKegiatanSlider();
                }

                document.getElementById('btnKegiatanNext').addEventListener('click', () => {
                    nextKegiatan();
                    resetKegiatanAutoPlay();
                });

                document.getElementById('btnKegiatanPrev').addEventListener('click', () => {
                    prevKegiatan();
                    resetKegiatanAutoPlay();
                });

                function startKegiatanAutoPlay() {
                    // Ganti 4000 menjadi durasi yang kamu inginkan (4000 = 4 detik)
                    kegiatanAutoPlay = setInterval(nextKegiatan, 10000);
                }

                function resetKegiatanAutoPlay() {
                    clearInterval(kegiatanAutoPlay);
                    startKegiatanAutoPlay();
                }

                // Jalankan program!
                initKegiatanSlider();
            </script>
    </section>
    <!-- kalender -->
    <?php if (!isset($_SESSION['username'])): ?>
    <section id="kalender" class="bg-white py-4 px-4 max-w-7xl mx-auto text-center">
        <h2 class="text-orange-500 text-2xl md:text-6xl font-bold pb-10">
            Kalender Pembinaan Castor
        </h2>

        <div class="grid grid-cols-3 gap-0 md:gap-8 max-w-5xl mx-auto">
            
            <img 
                src="img\TPS25\kalender\feb.png" 
                alt="Kalender Februari" 
                class="w-full h-auto rounded-md"
            />
            <img 
                src="img\TPS25\kalender\mar.png" 
                alt="Kalender Februari" 
                class="w-full h-auto rounded-md"
            />
                <img 
                src="img\TPS25\kalender\apr.png" 
                alt="Kalender Februari" 
                class="w-full h-auto rounded-md"
            />
                <img 
                src="img\TPS25\kalender\mei.png" 
                alt="Kalender Februari" 
                class="w-full h-auto rounded-md"
            />
                <img 
                src="img\TPS25\kalender\jun.png" 
                alt="Kalender Februari" 
                class="w-full h-auto rounded-md"
            />
                <img 
                src="img\TPS25\kalender\jul.png" 
                alt="Kalender Februari" 
                class="w-full h-auto rounded-md"
            />
        
            </div>

        <div class="mt-12">
            <a href="https://calendar.google.com/calendar/u/4?cid=YjA0MjEzYTdmMWI2NmE0NGY3NGNiMTM2MDE3M2Y4NzdlNGI3MWNlYzVmZTE5NWUzYTQwNjI3N2NmY2Q1YmFjYUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t" class="bg-orange-500 hover:bg-orange-600 text-white text-xs sm:text-base font-semibold py-2 px-5 sm:px-8 sm:py-3 rounded-lg shadow-md transition-colors inline-block">
            Get your calendar here!
            </a>
        </div>
    </section>
    <?php endif; ?>
    <!-- SOP -->
    <section id="sop" class="py-4 bg-white">
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
                /* border-bottom: 1px solid #f0f0f0; */
                display: flex;
                align-items: center;
                position: relative;
            }
            .modal-header::after{
                content: "";
                position: absolute;
                left: 40px;
                bottom: 10px;
                width: calc(100% - 100px);
                height: 3px;
                background-color: #f0f0f0;
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
                .modal-header::after{
                content: "";
                position: absolute;
                left: 20px;
                bottom: 10px;
                width: calc(100% - 60px);
                height: 3px;
                background-color: #f0f0f0;
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

        <!-- FAQ -->
        <div class="text-center mt-16 mb-12" id="faq">
            <h2 class="sop-title">Frequently Asked Questions</h2>
        </div>

        <div class="sop-container">
            <div class="sop-item" onclick="openModal('modal-faq-a')">
                <h3>A. Apa maksudnya menjadi calon Astor</h3>
                <span class="sop-arrow">›</span>
            </div>
            
            <div class="sop-item" onclick="openModal('modal-faq-b')">
                <h3>B. Apa menjadi calon Astor pasti bakal menjadi Astor?</h3>
                <span class="sop-arrow">›</span>
            </div>
            
            <div class="sop-item" onclick="openModal('modal-faq-c')">
                <h3>C. Kalau mata kuliah saya sudah dipaketkan atau ada keterbatasan SKS, bagaimana cara mengambil kelas Servant Leadership (SL)?</h3>
                <span class="sop-arrow">›</span>
            </div>
            
            <div class="sop-item" onclick="openModal('modal-faq-d')">
                <h3>D. Bagaimana jika saya tidak menjadi Frontline / mendaftar divisi lain di WGG?</h3>
                <span class="sop-arrow">›</span>
            </div>
            
        
        </div>

        

        <!-- FAQ A -->
        <div id="modal-faq-a" class="modal-overlay">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="big-letter">A.</div>
                    <div class="section-title">Apa maksudnya menjadi calon Astor</div>
                </div>
                <div class="modal-body">
                    <div class="faq-answer">
                        <p>Calon Astor (Castor) merupakan mahasiswa yang sudah mengikuti serangkaian proses pendaftaran sampai wawancara, dan dinyatakan dapat melanjutkan proses pembinaan Castor pada semester genap.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ B -->
        <div id="modal-faq-b" class="modal-overlay">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="big-letter">B.</div>
                    <div class="section-title">Apa menjadi calon Astor pasti bakal menjadi Astor?</div>
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
                    <div class="section-title">Kalau mata kuliah saya sudah dipaketkan atau ada keterbatasan SKS, bagaimana cara mengambil kelas Servant Leadership (SL)?</div>
                </div>
                <div class="modal-body">
                    <div class="faq-answer">
                        <p>Kelas SL memiliki opsi sit in, artinya mahasiswa dapat mengikuti kelas SL tanpa perlu mendaftar melalui PRS. Nantinya, nilai SL dapat diambil untuk menggantikan nilai Digital Leadership (DL) pada semester selanjutnya.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ D -->
        <div id="modal-faq-d" class="modal-overlay">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="big-letter">D.</div>
                    <div class="section-title">Bagaimana jika saya tidak menjadi Frontline / mendaftar divisi lain di WGG?</div>
                </div>
                <div class="modal-body">
                    <div class="faq-answer">
                        <p>Astor dan WGG adalah kesatuan rangkaian pembinaan Mahasiswa Baru. Jadi, Astor diarahkan untuk menjadi bagian Divisi Persiapan (PERAN) WGG. Apabila terdapat kendala, dapat menghubungi OA TPS (@kasi id line OA)</p>
                    </div>
                </div>
            </div>
        </div>
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

    </section>
    <footer class="footer py-5">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <style>
        .footer {
            width: 100%;
            background: white;
            color: #6E5A30;
            padding: 60px 0 40px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .footer-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 45px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 60px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 18px;
            color: #6E5A30;
            margin-bottom: 20px;
        }

        .footer-section p,
        .footer-section a {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.6;
            color: #6E5A30;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
        }

        .footer-section a:hover {
            color: #FF8B00;
            transition: color 0.3s ease;
        }

        .footer-section .social-footer-links {
            margin-top: 20px;
            display: flex;
            gap: 15px;
        }

        .footer-section .social-footer-links a {
            display: inline-flex;
            align-items: center;
            padding: 10px 18px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            white-space: nowrap;
            width: fit-content;
            box-sizing: border-box;
        }

        /* instagram */
        .footer-section .social-footer-links a.instagram {
            background: #FF8B00;
            color: white;
            border: none;
        }

        .footer-section .social-footer-links a.instagram:hover {
            background: #e67a00;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 139, 0, 0.3);
        }

        /* line */
        .footer-section .social-footer-links a.line {
            background: white;
            color: #FF8B00;
            border: 2px solid #FF8B00;
            padding: 8px 16px;
            min-width: 100px;
            text-align: center;
            justify-content: center;
        }

        .footer-section .social-footer-links a.line:hover {
            background: #FF8B00;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 139, 0, 0.3);
        }

        .footer-section .social-footer-links a.instagram i {
            font-size: 18px;
            margin-right: 8px;
            display: flex;
            align-items: center;
        }

        .footer-section .social-footer-links a.line .line-icon {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            object-fit: contain;
            transition: filter 0.3s ease;
            flex-shrink: 0;
        }

        .footer-section .social-footer-links a.line:hover .line-icon {
            filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);
        }

        .footer-copyright {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 400;
            font-size: 14px;
            text-align: left;
            color: #6E5A30;
        }
        .timpetrasinergi {
                order: 1;
            }
            .ourteam {
                order: 3;
            }
            .links{
                order: 2;
            }
            .social{
                order: 4;
            }

        .footer-copyright .brand {
            font-weight: 700;
        }

        /* Responsive Footer Design */
        @media (max-width: 992px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }
            .timpetrasinergi {
                order: 1;
            }
            .ourteam {
                order: 2;
            }
            .links{
                order: 3;
            }
            .social{
                order: 4;
            }
            
        }

        /* Mobile Layout - 2x2 Grid */
        @media (max-width: 768px) {
            .footer {
                padding: 40px 0 30px;
            }
            
            .footer-container {
                padding: 0 20px;
            }
            
            .footer-content {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: auto auto;
                gap: 30px 40px;
                margin-bottom: 30px;
                text-align: left;
            }
            
            /* Top Left - Tim Petra Sinergi */
            
            
            .footer-section .social-footer-links {
                justify-content: flex-start;
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .footer-section .social-footer-links a {
                flex-direction: row;
                align-items: center;
                padding: 8px 12px;
                font-size: 12px;
                min-width: auto;
            }
            
            .footer-section .social-footer-links a.instagram i {
                margin-right: 6px;
                margin-bottom: 0;
                font-size: 16px;
            }
            
            .footer-section .social-footer-links a.line .line-icon {
                margin-right: 6px;
                margin-bottom: 0;
                width: 16px;
                height: 16px;
            }
        }

        @media (max-width: 480px) {
            
            .footer-content {
                gap: 25px 30px;
            }
            
            .footer-section h3 {
                font-size: 16px;
                margin-bottom: 15px;
            }
            
            .footer-section p,
            .footer-section a {
                font-size: 13px;
                margin-bottom: 6px;
            }
            
            .footer-section .social-footer-links {
                gap: 8px;
            }
            
            .footer-section .social-footer-links a {
                padding: 6px 10px;
                font-size: 11px;
            }
        }
        </style>

        <div class="footer-container">
            <div class="footer-content">
                <!-- Section 1: Tim Petra Sinergi -->
                <div class="footer-section timpetrasinergi">
                    <h3>Tim Petra Sinergi</h3>
                    <p>Gedung S.103-104<br>
                    Universitas Kristen Petra<br>
                    Surabaya, Indonesia</p>
                    <p><strong>Email:</strong> tps@petra.ac.id</p>
                </div>
                
                <!-- Section 2: Our team -->
                
                
                <!-- Section 3: Links -->
                <div class="footer-section links">
                    <h3>Links</h3>
                    <a href="#home">Home</a>
                    <a href="#recruitment">Open Recruitment</a>
                    <a href="#kegiatan">Kegiatan</a>
                    <a href="#faq">F.A.Q</a>
                    <a href="#login">Login to TPS</a>
                </div>

                <div class="footer-section ourteam">
                    <h3>Our team</h3>
                    <a href="#" onclick="openOurStoryPopup(); return false;">Community Maintain</a>
                    <a href="#" onclick="openOurStoryPopup(); return false;">Event</a>
                    <a href="#" onclick="openOurStoryPopup(); return false;">Production House</a>
                    <a href="#" onclick="openOurStoryPopup(); return false;">Secretariat</a>
                    <a href="#" onclick="openOurStoryPopup(); return false;">Branding</a>
                    <a href="#" onclick="openOurStoryPopup(); return false;">Office</a>
                    <a href="#" onclick="openOurStoryPopup(); return false;">Evaluator</a>
                </div>
                
                <!-- Section 4: Social Media -->
                <div class="footer-section social">
                    <h3>Our social media networks</h3>
                    <p>Tetap update dengan kami lewat media sosial TPS</p>
                    <div class="social-footer-links">
                        <a href="https://instagram.com/timpetrasinergi" class="instagram" target="_blank">
                            <i class='bx bxl-instagram'></i>
                            @timpetrasinergi
                        </a>
                        <a href="https://line.me/R/ti/p/@szg5752d" class="line" target="_blank">
                            <img src="img/line1.png" alt="LINE" class="line-icon">
                            @40a54826
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="footer-copyright">
                    © 2026 <span class="brand">Tim Petra Sinergi</span>
                </p>
            </div>
        </div>
    </footer>


    
</body>
</html>