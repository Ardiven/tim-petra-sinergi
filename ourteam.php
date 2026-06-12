<section class="popup-our-story-wrapper" id="ourStoryPopup" style="display: none;">
        <div class="popup-overlay" id="popupOverlay">
            <div class="popup-container">
                <div class="popup-content">
                    <div class="left-image">
                        <img src="img/tps_gedung.webp" alt="Tim Petra Sinergi Building" class="main-img">
                    </div>
                    
                    <div class="center-content">
                        <div class="scrollable-content">
                            <h1 class="story-title">Our Story</h1>
                            <h2 class="story-subtitle">Journey to be the REAL YOU</h2>
                            
                            <div class="story-text">
                                <p>Tim Petra Sinergi adalah organisasi yang mengurus program pembinaan mahasiswa baru dan Astor. TPS dibentuk sebagai sinergi dari lembaga kemahasiswaan (diwakili BEM) - Pelma - DMU untuk menjadi keluarga pertama mahasiswa baru untuk mempersiapkan diri sebelum masuk pembinaan-pembinaan yang ada di Petra.</p>
                                
                                <p>Wujud sinergi itu adalah dengan teman-teman LK, Pelma, dan dosen-dosen DMU untuk menggarap pembinaan ini bersama-sama dengan menyambut adik-adik kelas mereka sebagai Astor, mentor, dan pembina dari Tim Petra Sinergi.</p>
                                
                                <p>Pembinaan yang dijalankan berupa kelompok diskusi dengan pembahasan yang dikurasi melalui Pusat Kepemimpinan Kristen. Pembinaan ini bertujuan untuk mengajak mahasiswa baru menyadari tentang makna hidup, makna diri, tujuan hidup, dan kritis berpikir tentang realitas kehidupan yang mereka jalani, supaya mereka dapat mulai membangun hidup yang berhasil dan bermakna.</p>
                            </div>

                            <div class="w-full pt-8 pb-4">
                                <h2 class="text-3xl sm:text-[40px] font-bold text-[#FF8B00] mb-4">Meet Our Team</h2>
                                <p class="text-[14px] text-[#6E5A30] mb-2">
                                    Tim Petra Sinergi terdiri dari 7 bidang yang membantu penyelenggaraan pembinaan Mahasiswa Baru dan Astor.
                                </p>
                                
                                <div class="w-full overflow-visible mt-28 mb-12 flex justify-center"> 
                                    
                                    <div id="circle-container" class="shrink-0 relative flex justify-center items-center border-2 border-dashed border-[#F59E0B]/50 rounded-full mx-auto" style="width: var(--c-size, 280px); height: var(--c-size, 280px); min-width: var(--c-size, 280px); min-height: var(--c-size, 280px);">
                                        </div>

                                </div>
                            </div>

                            <script>
    const nodesData = [
        { id: 0, img: "https://picsum.photos/100?random=1", title: "Ketua", desc: "Keindahan alam pegunungan di pagi hari." },
        { id: 1, img: "https://picsum.photos/100?random=2", title: "Sekum", desc: "Hiruk pikuk pusat perkotaan di malam hari." },
        { id: 2, img: "img/TPS25/icon/sekret.webp", title: "Sekretariat", desc: "Bidang Sekretariat adalah bidang yang mendukung kegiatan pembinaan melalui administrasi surat menyurat dan keperluan proposal, serta laporan pertanggungjawaban. Buat kamu yang menekuni bidang ini, this may be a challenging place to grow." },
        { id: 3, img: "img/TPS25/icon/ph.webp", title: "PH", desc: "Bidang PH adalah bidang yang memproduksi karya seni untuk penyampaian materi dan informasi, utuk mendukung pembinaan. PH menyusun mulai dari design, konten yang bersifat audiovisual, content writing, dan website. <br>Bidang Production House terdiri dari Tim Design, Content Writing, Content Creator, dan Website." },
        { id: 4, img: "img/TPS25/icon/event.webp", title: "Event", desc: "Bidang Event merupakan bidang yang berfokus pada penyelenggaraan acara-acara untuk Astor dan Maba. Tim Event belajar menyusun secara menyeluruh mulai dari realita, pemetaan kebutuhan-kebutuhan peserta, serta menjawabnya melalui penyelenggaraan event. <br>Bidang Event terdiri dari 2 tim, Tim Kelas Besar dan Tim Festival." },
        { id: 5, img: "img/TPS25/icon/commain.webp", title: "Commain", desc: "Bidang Commain merupakan bidang yang memperhatikan dan menyuarakan kebutuhan komunitas, serta menjadi Quality Assurance untuk memastikan Astor mendapat support melalui semua resources TPS. <br>Bidang Community Maintain terdiri dari 2 tim, Tim Commain Astor dan Tim Commain Mentor." },
        { id: 6, img: "img/TPS25/icon/office.webp", title: "Office", desc: "Bidang Office adalah bidang yang berlatih untuk menyediakan dan memfasilitasi keperluan rumah tangga, perlengkapan, dan keperluan data untuk mendukung kegiatan pembinaan. Bidang Office juga yang dipercaya mengelola rumah TPS / House of Petra Sinergi. <br>Bidang Office terdiri dari Front Office, Data, Logistik." },
        { id: 7, img: "img/TPS25/icon/eval.webp", title: "Evaluator", desc: "Bidang yang membuat, mengumpulkan, membaca, dan menyusun laporan analisa pada fenomena-fenomena di Maba agar kita benar-benar memiliki tolak ukur dalam merancang pembinaan untuk mendukung proses maba. <br>Bidang Evaluator terdiri dari Tim Polbangmawa dan Tim LEG." },
        { id: 8, img: "img/TPS25/icon/branding.webp", title: "Branding", desc: "Bidang Branding adalah bidang yang membangun strategi untuk memperkenalkan Tim Petra Sinergi, supaya culture, values, dan messages pembinaan bisa tersampaikan kepada target audience." },
        { id: 9, img: "https://picsum.photos/100?random=7", title: "Bendahara", desc: "Gugusan bintang dan galaksi yang memukau." }
    ];

    const container = document.getElementById('circle-container');
    const totalItems = nodesData.length;
    
    // --- KALKULASI TRIGONOMETRI ---
    const R_mobile = 110; 
    const R_sm = 145; 
    const R_md = 190;
    
    // Hitung panjang garis (chord) dan sudut rotasi agar saling menyambung pas
    const sinVal = Math.sin(Math.PI / totalItems);
    const w_mobile = 2 * R_mobile * sinVal;
    const w_sm = 2 * R_sm * sinVal;
    const w_md = 2 * R_md * sinVal;
    const lineRotation = 90 + (180 / totalItems);

    // Bikin Variabel Master ke CSS agar ukuran Circle Responsif Otomatis
    const styleBlock = `
        <style>
            :root { 
                --c-size: 280px; 
                --r-radius: 110px;
                --line-w: ${w_mobile.toFixed(2)}px;
            }
            @media (min-width: 640px) { 
                :root { 
                    --c-size: 360px; 
                    --r-radius: 145px;
                    --line-w: ${w_sm.toFixed(2)}px;
                } 
            }
            @media (min-width: 768px) { 
                :root { 
                    --c-size: 460px; 
                    --r-radius: 190px;
                    --line-w: ${w_md.toFixed(2)}px;
                } 
            }
            .custom-node-pos {
                top: calc(50% + var(--dy));
                left: calc(50% + var(--dx));
                transform: translate(-50%, -50%);
            }
        </style>
    `;
    document.head.insertAdjacentHTML('beforeend', styleBlock);

    let linesHTML = '';
    let nodesHTML = '';

    nodesData.forEach((item, index) => {
        // Matematika posisi
        const deg = (360 / totalItems) * index - 90;
        const rad = deg * (Math.PI / 180);

        // Ambil nilai Cos & Sin
        const cosVal = Math.cos(rad).toFixed(5);
        const sinV = Math.sin(rad).toFixed(5);

        // Suntik CSS Variables secara spesifik per lingkaran
        const inlineVars = `--dx: calc(var(--r-radius) * ${cosVal}); --dy: calc(var(--r-radius) * ${sinV});`;
        const baseSizeClass = "w-14 h-14 sm:w-20 sm:h-20 md:w-24 md:h-24";

        let popupAlign = "left-1/2 -translate-x-1/2"; 
        let arrowAlign = "left-1/2 -translate-x-1/2"; 

        if (index > 0 && index < totalItems / 2) {
            popupAlign = "right-[-10px] sm:right-[-20px]";
            arrowAlign = "right-[20px] sm:right-[30px]";
        } else if (index > totalItems / 2 && index < totalItems) {
            popupAlign = "left-[-10px] sm:left-[-20px]";
            arrowAlign = "left-[20px] sm:left-[30px]";
        }

        // --- RENDER GARIS ---
        // Menggunakan 1 tag div murni dengan kalkulasi matrix langsung
        linesHTML += `
        <div class="absolute top-1/2 left-1/2 -mt-[1px] sm:-mt-[1.5px] h-[2px] sm:h-[3px] bg-gradient-to-r from-[#F59E0B] to-[#F59E0B]/60 origin-left pointer-events-none z-0" 
             style="width: var(--line-w); transform: rotate(${deg}deg) translate(var(--r-radius)) rotate(${lineRotation}deg);">
        </div>`;

        // --- RENDER LINGKARAN & POPUP ---
        nodesHTML += `
        <div class="absolute custom-node-pos hover:z-50 z-10 transition-all duration-300 ${baseSizeClass}" style="${inlineVars}">
            <div class="group relative z-10 w-full h-full rounded-full border-2 sm:border-4 border-[#F59E0B] shadow-[0_0_15px_rgba(245,158,11,0.5)] cursor-pointer bg-slate-100">
                <div class="relative w-full h-full rounded-full overflow-hidden">
                    <img src="${item.img}" alt="${item.title}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex items-end justify-center pb-1.5 sm:pb-2 md:pb-3 pointer-events-none transition-opacity duration-300">
                        <span class="text-white font-bold text-[8px] sm:text-[10px] md:text-xs text-center px-1 leading-tight drop-shadow-md">${item.title}</span>
                    </div>
                </div>
                <div class="absolute bottom-full ${popupAlign} mb-4 w-[220px] sm:w-max sm:max-w-[280px] md:max-w-[320px] p-3 sm:p-4 bg-white/95 backdrop-blur-md border border-[#F59E0B] rounded-xl text-center opacity-0 invisible transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:mb-6 sm:group-hover:mb-8 shadow-2xl z-50 pointer-events-none">
                    <h4 class="text-[#F59E0B] font-bold text-sm sm:text-base mb-1.5">${item.title}</h4>
                    <p class="text-slate-800 text-[10px] sm:text-xs leading-relaxed whitespace-normal">${item.desc}</p>
                    <div class="absolute -bottom-1.5 ${arrowAlign} w-3 h-3 bg-white border-b border-r border-[#F59E0B] transform rotate-45"></div>
                </div>
            </div>
        </div>`;
    });

    container.innerHTML = linesHTML + nodesHTML;
</script>

                            <section class="py-12">
                                <div class="w-full">
                                    <div class="grid grid-rows-8 md:grid-cols-12 sm:grid-cols-2 sm:grid-rows-4 md:grid-rows-9 gap-4 sm:gap-8">
                                        <div class="row-span-1 md:col-span-4 md:row-span-3 bg-white border border-gray-100 shadow-sm rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                                            <div class="flex flex-col items-center ">
                                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-50 transition-colors duration-300">
                                                    <img src="img/TPS25/icon/commain.webp" alt="Admin" class="w-full h-full object-contain">
                                                </div>
                                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Community Maintain</h3>
                                                <p class="text-[#6E5A30] text-[13px] text-center leading-relaxed">
                                                    Bidang Commain merupakan bidang yang memperhatikan dan menyuarakan kebutuhan komunitas, serta menjadi Quality Assurance untuk memastikan Astor mendapat support melalui semua resources TPS. <br>
                                                    Bidang Community Maintain terdiri dari 2 tim, Tim Commain Astor dan Tim Commain Mentor.
                                                </p>
                                                <div class="">
                                                    <p>Skill requirement</p>
                                                    <ul>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-5 bg-white border border-gray-100 shadow-sm rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                                            <div class="flex flex-col items-center ">
                                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-50 transition-colors duration-300">
                                                    <img src="img/TPS25/icon/event.webp" alt="Design" class="w-16 h-16 object-contain">
                                                </div>
                                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Event</h3>
                                                <p class="text-[#6E5A30] text-[13px] text-center leading-relaxed">
                                                    Bidang Event merupakan bidang yang berfokus pada penyelenggaraan acara-acara untuk Astor dan Maba. Tim Event belajar menyusun secara menyeluruh mulai dari realita, pemetaan kebutuhan-kebutuhan peserta, serta menjawabnya melalui penyelenggaraan event. <br>
                                                    Bidang Event terdiri dari 2 tim, Tim Kelas Besar dan Tim Festival.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-9 bg-white border border-gray-100 shadow-sm rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                                            <div class="flex flex-col items-center ">
                                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-50 transition-colors duration-300">
                                                    <img src="img/TPS25/icon/ph.webp" alt="Video" class="w-16 h-16 object-contain">
                                                </div>
                                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Production House</h3>
                                                <p class="text-[#6E5A30] text-[13px] text-center leading-relaxed">
                                                    Bidang PH adalah bidang yang memproduksi karya seni untuk penyampaian materi dan informasi, utuk mendukung pembinaan. PH menyusun mulai dari design, konten yang bersifat audiovisual, content writing, dan website. <br>
                                                    Bidang Production House terdiri dari Tim Design, Content Writing, Content Creator, dan Website.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:row-start-4 bg-white border border-gray-100 shadow-sm rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                                            <div class="flex flex-col items-center ">
                                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-50 transition-colors duration-300">
                                                    <img src="img/TPS25/icon/office.webp" alt="Event" class="w-16 h-16 object-contain">
                                                </div>
                                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Office</h3>
                                                <p class="text-[#6E5A30] text-[13px] text-center leading-relaxed">
                                                    Bidang Office adalah bidang yang berlatih untuk menyediakan dan memfasilitasi keperluan rumah tangga, perlengkapan, dan keperluan data untuk mendukung kegiatan pembinaan. Bidang Office juga yang dipercaya mengelola rumah TPS / House of Petra Sinergi. <br>
                                                    Bidang Office terdiri dari Front Office, Data, Logistik.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-5 md:row-start-4 bg-white border border-gray-100 shadow-sm rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                                            <div class="flex flex-col items-center ">
                                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-50 transition-colors duration-300">
                                                    <img src="img/TPS25/icon/sekret.webp" alt="Social Media" class="w-16 h-16 object-contain">
                                                </div>
                                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Sekretariat</h3>
                                                <p class="text-[#6E5A30] text-[13px] text-center leading-relaxed">
                                                    Bidang Sekretariat adalah bidang yang mendukung kegiatan pembinaan melalui administrasi surat menyurat dan keperluan proposal, serta laporan pertanggungjawaban. Buat kamu yang menekuni bidang ini, this may be a challenging place to grow.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-1 md:row-start-7 bg-white border border-gray-100 shadow-sm rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                                            <div class="flex flex-col items-center ">
                                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-50 transition-colors duration-300">
                                                    <img src="img/TPS25/icon/branding.webp" alt="Content Writing" class="w-16 h-16 object-contain">
                                                </div>
                                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Branding</h3>
                                                <p class="text-[#6E5A30] text-[13px] text-center leading-relaxed">
                                                    Bidang Branding adalah bidang yang membangun strategi untuk memperkenalkan Tim Petra Sinergi, supaya culture, values, dan messages pembinaan bisa tersampaikan kepada target audience.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-5 md:row-start-7 bg-white border border-gray-100 shadow-sm rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                                            <div class="flex flex-col items-center ">
                                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-50 transition-colors duration-300">
                                                    <img src="img/TPS25/icon/eval.webp" alt="Community" class="w-16 h-16 object-contain">
                                                </div>
                                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Evaluator</h3>
                                                <p class="text-[#6E5A30] text-[13px] text-center leading-relaxed">
                                                    Bidang yang membuat, mengumpulkan, membaca, dan menyusun laporan analisa pada fenomena-fenomena di Maba agar kita benar-benar memiliki tolak ukur dalam merancang pembinaan untuk mendukung proses maba. <br>
                                                    Bidang Evaluator terdiri dari Tim Polbangmawa dan Tim LEG.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="relative my-auto row-span-1 md:col-span-4 md:row-span-6 md:col-start-9 md:row-start-4 rounded-2xl overflow-hidden">
                                            <img src="img/TPS25/icon/icon.webp" alt="Team Photo" class="max-w-full h-auto relative z-10">
                                            <div class="absolute inset-0 bg-orange-100/30 rounded-2xl z-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <script>
                                // Add loading animation to cards
                                const cards = document.querySelectorAll('.group');
                                const observer = new IntersectionObserver((entries) => {
                                    entries.forEach((entry) => {
                                        if (entry.isIntersecting) {
                                            entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                                        }
                                    });
                                }, { threshold: 0.1 });
                        
                                cards.forEach((card) => {
                                    observer.observe(card);
                                });
                            </script>

                        </div>
                        <button class="back-btn" onclick="closePopup()">Back</button>
                    </div>
                    
                    <div class="right-images">
                        <div class="stacked-img">
                            <img src="img/tps_01.webp" alt="TPS Activity 1">
                        </div>
                        <div class="stacked-img">
                            <img src="img/foto_tpsweb.jpeg" alt="TPS Activity 2">
                        </div>
                        <div class="stacked-img">
                            <img src="img/tps_whatmatters.webp" alt="TPS Activity 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <style>
        .popup-our-story-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
        }
    
        .popup-our-story-wrapper * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    
        .popup-our-story-wrapper .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease-out;
        }
    
        .popup-our-story-wrapper .popup-container {
            position: relative;
            width: 100%;
            max-width: 1400px;
            height: 90%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            animation: slideUp 0.4s ease-out;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
        }
    
        .popup-our-story-wrapper .popup-content {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            height: 100%;
            gap: 0;
        }
    
        .popup-our-story-wrapper .left-image {
            background: #2C2C2C;
            display: flex;
            align-items: stretch;
            justify-content: center;
        }
    
        .popup-our-story-wrapper .main-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    
        .popup-our-story-wrapper .center-content {
            background: white;
            padding: 30px; 
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
            overflow: hidden;
        }

        .popup-our-story-wrapper .scrollable-content {
            flex: 1;
            overflow-y: auto;
            padding-right: 15px; 
            scrollbar-width: thin;
            scrollbar-color: #FF8B00 #f0f0f0;
        }

        .popup-our-story-wrapper .back-btn {
            margin-top: 20px; 
            flex-shrink: 0;  
            align-self: flex-start; 
        }
    
        .popup-our-story-wrapper .story-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 56px;
            color: #FF8B00;
            margin-bottom: 10px;
            line-height: 1.1;
        }
    
        .popup-our-story-wrapper .story-subtitle {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            font-size: 24px;
            color: #FF8B00;
            margin-bottom: 40px;
            line-height: 1.2;
        }
    
        .popup-our-story-wrapper .story-text {
            flex-grow: 1;
        }
    
        .popup-our-story-wrapper .story-text p {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 1.7;
            color: #6E5A30;
            margin-bottom: 20px;
            text-align: justify;
        }
    
        .popup-our-story-wrapper .back-btn {
            background: #FF8B00;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 18px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 139, 0, 0.3);
            align-self: flex-start;
        }
    
        .popup-our-story-wrapper .back-btn:hover {
            background: #e67a00;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 139, 0, 0.4);
        }
    
        .popup-our-story-wrapper .right-images {
            background: #2C2C2C;
            display: flex;
            flex-direction: column;
            gap: 0;
        }
    
        .popup-our-story-wrapper .stacked-img {
            flex: 1;
            overflow: hidden;
        }
    
        .popup-our-story-wrapper .stacked-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    
        @keyframes slideDown {
            from { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
            to { 
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    
        @media (max-width: 768px) {
            .popup-our-story-wrapper .popup-container {
                width: 95%;
                max-height: 90%;
            }
            .popup-our-story-wrapper .popup-content {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 0.2fr 1fr;
            }
            .popup-our-story-wrapper .left-image {
                max-height: 250px !important;
                grid-row: 1;
                grid-column: 1;
            }
            .popup-our-story-wrapper .right-images {
                grid-row: 1;
                grid-column: 2;
                flex-direction: column;
                max-height: 250px !important;
            }
            .popup-our-story-wrapper .center-content {
                grid-row: 2;
                grid-column: 1 / -1;
                height: 100%;     
                max-height: 100%;
            }
            .popup-our-story-wrapper .scrollable-content {
                overflow-y: auto; 
            }
            .popup-our-story-wrapper .story-title {
                font-size: 20px;
                margin-bottom: 5px;
            }
            .popup-our-story-wrapper .story-subtitle {
                font-size: 16px;
                margin-bottom: 8px;
            }
            .popup-our-story-wrapper .story-text p {
                font-size: 13px;
                line-height: 1.2;
                margin-bottom: 12px;
            }
            .popup-our-story-wrapper .back-btn {
                font-size: 13px;
                padding: 6px 15px;
                margin-top: 10px;
            }
        }
    
        @media (max-width: 480px) {
            .popup-our-story-wrapper .popup-container {
                width: 95%;
                max-height: 85%;
            }
            .popup-our-story-wrapper .popup-content {
                grid-template-rows: 0.15fr 1fr;
            }
        }
        </style>
    
        <script>
        function openOurStoryPopup() {
            document.getElementById('ourStoryPopup').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
    
        function closePopup() {
            const popup = document.getElementById('ourStoryPopup');
            const overlay = popup.querySelector('.popup-overlay');
            const container = popup.querySelector('.popup-container');
            
            overlay.style.animation = 'fadeOut 0.3s ease-out';
            container.style.animation = 'slideDown 0.3s ease-out';
            
            setTimeout(() => {
                popup.style.display = 'none';
                document.body.style.overflow = 'auto';
                overlay.style.animation = '';
                container.style.animation = '';
            }, 300);
        }
    
        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('popupOverlay');
            if (overlay) {
                overlay.addEventListener('click', function(e) {
                    if (e.target === this) closePopup();
                });
            }
        });
    
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const popup = document.getElementById('ourStoryPopup');
                if (popup && popup.style.display === 'block') {
                    closePopup();
                }
            }
        });
        </script>
    </section>