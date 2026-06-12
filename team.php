   <!-- Main Content -->
    <div class="max-w-[1129px] mx-auto pt-12">
        
        <!-- Hero Section -->
        <section class="px-4 ">
            <div class="container  px-4 ">
                <h2 class="text-[40px] font-bold text-[#FF8B00] mb-6">Meet Our Team</h2>
                <p class="text-[14px] max-w-[360px] text-[#6E5A30] max-w-4xl  ">
                    Tim Petra Sinergi terdiri dari 7 bidang yang membantu penyelenggaraan pembinaan Mahasiswa Baru dan Astor.
                </p>
            </div>
        </section>
        <div class="w-full overflow-hidden flex justify-center items-center py-16 sm:py-20"> 
            
            <div id="circle-container" class="shrink-0 relative w-[280px] h-[280px] sm:w-[360px] sm:h-[360px] md:w-[460px] md:h-[460px] flex justify-center items-center border-2 border-dashed border-[#F59E0B]/50 rounded-full">
                </div>

        </div>

    </div>

    <script>
        // 1. Data list of objects (Deskripsi Asli Tidak Diubah)
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
        
        // --- KALKULASI GARIS MATEMATIS OTOMATIS ---
        const R_mobile = 110; 
        const R_sm = 145; 
        const R_md = 190;
        
        const sinVal = Math.sin(Math.PI / totalItems);
        const w_mobile = 2 * R_mobile * sinVal;
        const w_sm = 2 * R_sm * sinVal;
        const w_md = 2 * R_md * sinVal;
        const lineRotation = 90 + (180 / totalItems);

        const styleBlock = `
            <style>
                .dynamic-line { width: ${w_mobile}px; transform: translateY(-50%) rotate(${lineRotation}deg); }
                @media (min-width: 640px) { .dynamic-line { width: ${w_sm}px; } }
                @media (min-width: 768px) { .dynamic-line { width: ${w_md}px; } }
            </style>
        `;
        document.head.insertAdjacentHTML('beforeend', styleBlock);

        // 2. Variabel HTML terpisah (Garis & Lingkaran)
        let linesHTML = '';
        let nodesHTML = '';

        nodesData.forEach((item, index) => {
            const positionClasses = `absolute w-14 h-14 sm:w-20 sm:h-20 md:w-24 md:h-24 [transform:rotate(calc(360deg/${totalItems}*${index}-90deg))_translate(110px)] sm:[transform:rotate(calc(360deg/${totalItems}*${index}-90deg))_translate(145px)] md:[transform:rotate(calc(360deg/${totalItems}*${index}-90deg))_translate(190px)]`;

            // -- LOGIKA POPUP CERDAS UNTUK MOBILE --
            let popupAlign = "left-1/2 -translate-x-1/2"; 
            let arrowAlign = "left-1/2 -translate-x-1/2"; 

            if (index > 0 && index < totalItems / 2) {
                popupAlign = "right-[-10px] sm:right-[-20px]";
                arrowAlign = "right-[20px] sm:right-[30px]";
            } else if (index > totalItems / 2 && index < totalItems) {
                popupAlign = "left-[-10px] sm:left-[-20px]";
                arrowAlign = "left-[20px] sm:left-[30px]";
            }

            // RENDER GARIS DULU (z-0)
            linesHTML += `
            <div class="${positionClasses} pointer-events-none z-0">
                <div class="absolute top-1/2 left-1/2 h-[2px] sm:h-[3px] bg-gradient-to-r from-[#F59E0B] to-[#F59E0B]/60 origin-left dynamic-line"></div>
            </div>`;

            // RENDER LINGKARAN & POPUP (hover:z-50)
            nodesHTML += `
            <div class="${positionClasses} hover:z-50 z-10 transition-all duration-300">
                
                <div class="group relative z-10 w-full h-full rounded-full border-2 sm:border-4 border-[#F59E0B] shadow-[0_0_15px_rgba(245,158,11,0.5)] cursor-pointer [transform:rotate(calc(-360deg/${totalItems}*${index}+90deg))]">
                    
                    <div class="relative w-full h-full rounded-full overflow-hidden bg-slate-100">
                        <img src="${item.img}" alt="${item.title}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        
                        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex items-end justify-center pb-1.5 sm:pb-2 md:pb-3 pointer-events-none transition-opacity duration-300">
                            <span class="text-white font-bold text-[8px] sm:text-[10px] md:text-xs text-center px-1 leading-tight drop-shadow-md">
                                ${item.title}
                            </span>
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

        // 3. Render ke dalam DOM
        container.innerHTML = linesHTML + nodesHTML;
    </script>

</div>

        <!-- Specializations Section -->
        <section class="py-16 ">
            <div class="container mx-auto px-4">
               
                <!-- Left Column - Specializations -->
                <div class="">
                    <div class="grid grid-rows-8 md:grid-cols-12 sm:grid-cols-2 sm:grid-rows-4 md:grid-rows-9 gap-0 sm:gap-8">
                        <!-- Administration -->
                        <div class="row-span-1 md:col-span-4 md:row-span-3 bg-white rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                            <div class="flex flex-col items-center ">
                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-petra-blue/10 transition-colors duration-300">
                                    <img src="img/TPS25/icon/commain.webp" alt="Admin" class="w-full h-full object-contain">
                                </div>
                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Community Maintain</h3>
                                <p class="text-[#6E5A30] text-[14px]">
                                    Bidang Commain merupakan bidang yang memperhatikan dan menyuarakan kebutuhan komunitas, serta menjadi Quality Assurance untuk memastikan Astor mendapat support melalui semua resources TPS. <br>
                                    Bidang Community Maintain terdiri dari 2 tim, Tim Commain Astor dan Tim Commain Mentor.
                                </p>
                            </div>
                        </div>

                        <!-- Design -->
                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-5 bg-white min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                            <div class="flex flex-col items-center ">
                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-petra-blue/10 transition-colors duration-300">
                                    <img src="img/TPS25/icon/event.webp" alt="Design" class="w-16 h-16 object-contain">
                                </div>
                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Event</h3>
                                <p class="text-[#6E5A30] text-[14px]">
                                    Bidang Event merupakan bidang yang berfokus pada penyelenggaraan acara-acara untuk Astor dan Maba. Tim Event belajar menyusun secara menyeluruh mulai dari realita, pemetaan kebutuhan-kebutuhan peserta, serta menjawabnya melalui penyelenggaraan event. <br>
                                    Bidang Event terdiri dari 2 tim, Tim Kelas Besar dan Tim Festival.
                                </p>
                            </div>
                        </div>

                        <!-- Video -->
                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-9 bg-white rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                            <div class="flex flex-col items-center ">
                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-petra-blue/10 transition-colors duration-300">
                                    <img src="img/TPS25/icon/ph.webp" alt="Video" class="w-16 h-16 object-contain">
                                </div>
                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Production House</h3>
                                <p class="text-[#6E5A30] text-[14px]">
                                    Bidang PH adalah bidang yang memproduksi karya seni untuk penyampaian materi dan informasi, utuk mendukung pembinaan. PH menyusun mulai dari design, konten yang bersifat audiovisual, content writing, dan website. <br>
                                    Bidang Production House terdiri dari Tim Design, Content Writing, Content Creator, dan Website.
                                </p>
                            </div>
                        </div>

                        <!-- Event -->
                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:row-start-4 bg-white rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                            <div class="flex flex-col items-center ">
                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-petra-blue/10 transition-colors duration-300">
                                    <img src="img/TPS25/icon/office.webp" alt="Event" class="w-16 h-16 object-contain">
                                </div>
                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Office</h3>
                                <p class="text-[#6E5A30] text-[14px]">
                                    Bidang Office adalah bidang yang berlatih untuk menyediakan dan memfasilitasi keperluan rumah tangga, perlengkapan, dan keperluan data untuk mendukung kegiatan pembinaan. Bidang Office juga yang dipercaya mengelola rumah TPS / House of Petra Sinergi. <br>
                                    Bidang Office terdiri dari Front Office, Data, Logistik.
                                </p>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-5 md:row-start-4 bg-white rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                            <div class="flex flex-col items-center ">
                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-petra-blue/10 transition-colors duration-300">
                                    <img src="img/TPS25/icon/sekret.webp" alt="Social Media" class="w-16 h-16 object-contain">
                                </div>
                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Sekretariat</h3>
                                <p class="text-[#6E5A30] text-[14px]">
                                    Bidang Sekretariat adalah bidang yang mendukung kegiatan pembinaan melalui administrasi surat menyurat dan keperluan proposal, serta laporan pertanggungjawaban. Buat kamu yang menekuni bidang ini, this may be a challenging place to grow.
                                </p>
                            </div>
                        </div>

                        <!-- Content Writing -->
                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-1 md:row-start-7 bg-white rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                            <div class="flex flex-col items-center ">
                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-petra-blue/10 transition-colors duration-300">
                                    <img src="img/TPS25/icon/branding.webp" alt="Content Writing" class="w-16 h-16 object-contain">
                                </div>
                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Branding</h3>
                                <p class="text-[#6E5A30] text-[14px]">
                                    Bidang Branding adalah bidang yang membangun strategi untuk memperkenalkan Tim Petra Sinergi, supaya culture, values, dan messages pembinaan bisa tersampaikan kepada target audience.
                                </p>
                            </div>
                        </div>

                        <!-- Community Maintaining -->
                        <div class="row-span-1 md:col-span-4 md:row-span-3 md:col-start-5 md:row-start-7 bg-white rounded-xl min-h-[400px] max-w-[250px] mx-auto md:mx-0 p-6 group">
                            <div class="flex flex-col items-center ">
                                <div class="w-[70px] h-[70px] rounded-full flex items-center justify-center mb-4 group-hover:bg-petra-blue/10 transition-colors duration-300">
                                    <img src="img/TPS25/icon/eval.webp" alt="Community" class="w-16 h-16 object-contain">
                                </div>
                                <h3 class="text-[14px] text-[#6E5A30] font-semibold mb-3 text-center">Evaluator</h3>
                                <p class="text-[#6E5A30] text-[14px]">
                                    Bidang yang membuat, mengumpulkan, membaca, dan menyusun laporan analisa pada fenomena-fenomena di Maba agar kita benar-benar memiliki tolak ukur dalam merancang pembinaan untuk mendukung proses maba. <br>
                                    Bidang Evaluator terdiri dari Tim Polbangmawa dan Tim LEG.
                                </p>
                            </div>
                        </div>
                            <!-- Right Column - Image -->

                        <div class="relative my-auto row-span-1 md:col-span-4 md:row-span-6 md:col-start-9 md:row-start-4">
                            <img src="img/TPS25/icon/icon.webp" alt="Team Photo" class="max-w-full h-auto">
                            <div class="absolute inset-0 bg-petra-blue/10 rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 bg-[#FF8B00] text-white p-3 rounded-full shadow-lg hover:scale-110 transform transition-all duration-300 opacity-0 pointer-events-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <a href="#" class="fixed hidden w-10 h-10 rounded-full right-4 bottom-4 bg-[#FF8B00] text-white transition-all duration-500 hover:scale-110 transform  z-50" id="back-to-top">
        <svg  xmlns="http://www.w3.org/2000/svg" width="full" height="full"  
            fill="currentColor" viewBox="0 0 24 24" >
            <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
            <path d="M13 18V9.91l3.29 3.3 1.42-1.42L12 6.09l-5.71 5.7 1.42 1.42L11 9.91V18z"></path>
        </svg>
    </a>
</div>

    <script>
        // Back to top functionality
        const backToTopButton = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'pointer-events-none');
                backToTopButton.classList.add('opacity-100');
            } else {
                backToTopButton.classList.add('opacity-0', 'pointer-events-none');
                backToTopButton.classList.remove('opacity-100');
            }
        });
        
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

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

        // Add CSS animation
        const style = document.createElement('style');
        style.textContent = `
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
        `;
        document.head.appendChild(style);
    </script>