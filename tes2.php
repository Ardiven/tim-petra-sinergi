<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Petra Sinergi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#F58220', // Warna orange custom
                    }
                }
            }
        }
    </script>
    <style>
        /* Tetap menggunakan sedikit custom CSS untuk gambar placeholder/background agar rapi */
        .hero-bg {
            background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
        }
        .avatar-bg {
            background-image: url('img/TPS25/icon/commain.webp');
        }
    </style>
</head>
<body class="text-gray-800 antialiased bg-gray-50/50">
    <?php include 'header.php'; ?>
    <header class="w-full h-[250px] sm:h-[500px] bg-gray-300 hero-bg bg-cover bg-center"></header>

    <section class="max-w-[1440px] mx-auto px-6 pt-5 pb-10 md:py-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <h2 class=" text-[64px] lg:text-[96px] font-bold text-brand">About Us</h2>
            </div>
            <div class="md:col-span-2 space-y-6 text-gray-600 text-justify leading-relaxed text-[18px] md:text-[20px] lg:text-[24px]">
                <p><strong class="text-gray-800">Tim Petra Sinergi</strong> adalah organisasi yang mengurus program pembinaan mahasiswa baru dan Astor. TPS dibentuk sebagai sinergi dari lembaga kemahasiswaan (diwakili BEM) - Pelma - DMU untuk menjadi keluarga pertama mahasiswa baru untuk mempersiapkan diri sebelum masuk pembinaan-pembinaan yang ada di Petra.</p>
                <p>Wujud sinergi itu adalah dengan teman-teman LK, Pelma, dan dosen-dosen DMU untuk <strong class="text-gray-800">menggarap pembinaan</strong> ini bersama-sama dengan menyambut adik-adik kelas mereka <strong class="text-gray-800">sebagai Astor, mentor, dan pembina dari Tim Petra Sinergi.</strong> Pembinaan yang dijalankan berupa kelompok diskusi dengan pembahasan yang dikurasi melalui Pusat Kepemimpinan Kristen.</p>
                <p>Pembinaan ini bertujuan untuk <strong class="text-gray-800">mengajak</strong> mahasiswa baru <strong class="text-gray-800">menyadari</strong> tentang makna hidup, makna diri, tujuan hidup, dan kritis berpikir tentang realitas kehidupan yang mereka jalani, supaya mereka dapat <strong class="text-gray-800">mulai membangun hidup yang berhasil dan bermakna.</strong></p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 md:px-12 py-10">
        <h2 class="text-[64px] font-bold text-brand mb-10">Struktur<br>Organisasi</h2>
        <div class="w-full flex justify-center">
            <img src="img/TPS25/icon/struktur-organisasi.png" alt="Struktur Organisasi" class="w-full max-w-5xl rounded-lg">
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 md:px-12 py-20">
        <h2 class="text-[64px] font-bold text-brand mb-10">Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 items-start">
            
            <details class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden relative group cursor-pointer [&_summary::-webkit-details-marker]:hidden">
            <summary class="list-none outline-none block">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Team" class="w-full h-[169px] object-cover">
                <div class="p-4 pb-2 min-h-[84px] relative">
                    <div class="w-[87px] h-[87px] rounded-full absolute -top-8 right-5 border-4 border-white overflow-hidden bg-white">
                        <img src="img/TPS25/icon/commain.webp" alt="Icon" class="w-full h-full object-cover">
                    </div>
                    <div class="text-[#F58220] font-bold text-[24px] w-3/4 leading-tight mb-2">Community Maintain</div>
                    
                    <svg class="absolute right-6 top-6 transform transition-transform duration-300 group-open:-rotate-180" width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.9998 15.9155L21.1871 9.93457L22.9548 11.6434L14.9998 19.3333L7.04492 11.6434L8.81268 9.93457L14.9998 15.9155Z" fill="#FF8B00"/>
                    </svg>
                </div>
            </summary>
            
            <div class="p-6 pt-2 text-[#70654B] text-[16px] leading-relaxed border-t border-gray-50 mt-2">
                <p class="mb-4">TPS adalah organisasi yang mengurus program pembinaan mahasiswa baru dan Astor. TPS dibentuk sebagai sinergi dari</p>
                <p class="mb-6">Lembaga kemahasiswaan (diwakili BEM) - Pelma - DMU untuk menjadi keluarga pertama mahasiswa baru untuk mempersiapkan diri sebelum masuk pembinaan-pembinaan yang ada di Petra.</p>
                
                <h4 class="font-bold text-[#604F34] text-[18px] mb-2">Skill requirement</h4>
                <ul class="list-disc pl-5 mb-6 space-y-1">
                    <li>Tim Petra Sinergi terdiri</li>
                    <li>Dari 7 bagian tim besar yang</li>
                    <li>Membantu pengelolaan pembinaan Mahasiswa Baru dan Astor.</li>
                </ul>

                <h4 class="font-bold text-[#604F34] text-[18px] mb-2">Kompetensi yang diajarkan</h4>
                <ul class="list-disc pl-5 space-y-1">
                    <li>Tim Petra Sinergi terdiri</li>
                    <li>Dari 7 bagian tim besar yang</li>
                    <li>Membantu pengelolaan pembinaan Mahasiswa Baru dan Astor.</li>
                </ul>
            </div>
        </details>

            <details class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden relative group cursor-pointer [&_summary::-webkit-details-marker]:hidden">
            <summary class="list-none outline-none block">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Team" class="w-full h-[169px] object-cover">
                <div class="p-4 pb-2 min-h-[84px] relative">
                    <div class="w-[87px] h-[87px] rounded-full absolute -top-8 right-5 border-4 border-white overflow-hidden bg-white">
                        <img src="img/TPS25/icon/commain.webp" alt="Icon" class="w-full h-full object-cover">
                    </div>
                    <div class="text-[#F58220] font-bold text-[24px] w-3/4 leading-tight mb-2">Community Maintain</div>
                    
                    <svg class="absolute right-6 top-6 transform transition-transform duration-300 group-open:-rotate-180" width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.9998 15.9155L21.1871 9.93457L22.9548 11.6434L14.9998 19.3333L7.04492 11.6434L8.81268 9.93457L14.9998 15.9155Z" fill="#FF8B00"/>
                    </svg>
                </div>
            </summary>
            
            <div class="p-6 pt-2 text-[#70654B] text-[16px] leading-relaxed border-t border-gray-50 mt-2">
                <p class="mb-4">TPS adalah organisasi yang mengurus program pembinaan mahasiswa baru dan Astor. TPS dibentuk sebagai sinergi dari</p>
                <p class="mb-6">Lembaga kemahasiswaan (diwakili BEM) - Pelma - DMU untuk menjadi keluarga pertama mahasiswa baru untuk mempersiapkan diri sebelum masuk pembinaan-pembinaan yang ada di Petra.</p>
                
                <h4 class="font-bold text-[#604F34] text-[18px] mb-2">Skill requirement</h4>
                <ul class="list-disc pl-5 mb-6 space-y-1">
                    <li>Tim Petra Sinergi terdiri</li>
                    <li>Dari 7 bagian tim besar yang</li>
                    <li>Membantu pengelolaan pembinaan Mahasiswa Baru dan Astor.</li>
                </ul>

                <h4 class="font-bold text-[#604F34] text-[18px] mb-2">Kompetensi yang diajarkan</h4>
                <ul class="list-disc pl-5 space-y-1">
                    <li>Tim Petra Sinergi terdiri</li>
                    <li>Dari 7 bagian tim besar yang</li>
                    <li>Membantu pengelolaan pembinaan Mahasiswa Baru dan Astor.</li>
                </ul>
            </div>
        </details>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden relative min-h-[283px]">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Team" class="w-full h-[169px] object-cover">
                <div class="p-4 pb-2 min-h-[84px] relative">
                    <div class="w-[87px] h-[87px] rounded-full absolute -top-8 right-5 ">
                        <img src="img/TPS25/icon/commain.webp" alt="">
                    </div>
                    <div class="text-brand font-bold text-[24px] w-5/8 leading-tight">Production House</div>
                    <svg class="absolute right-6 -bottom-4"  width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9998 15.9155L21.1871 9.93457L22.9548 11.6434L14.9998 19.3333L7.04492 11.6434L8.81268 9.93457L14.9998 15.9155Z" fill="#FF8B00"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden relative min-h-[283px]">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Team" class="w-full h-[169px] object-cover">
                <div class="p-4 pb-2 min-h-[84px] relative">
                    <div class="w-[87px] h-[87px] rounded-full absolute -top-8 right-5 ">
                        <img src="img/TPS25/icon/commain.webp" alt="">
                    </div>
                    <div class="text-brand font-bold text-[24px] w-3/4  leading-tight">Office</div>
                    <svg class="absolute right-6 -bottom-4"  width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9998 15.9155L21.1871 9.93457L22.9548 11.6434L14.9998 19.3333L7.04492 11.6434L8.81268 9.93457L14.9998 15.9155Z" fill="#FF8B00"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden relative min-h-[283px]">
                <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Team" class="w-full h-[169px] object-cover">
                <div class="p-4 pb-2 min-h-[84px] relative">
                    <div class="w-[87px] h-[87px] rounded-full absolute -top-8 right-5 ">
                        <img src="img/TPS25/icon/commain.webp" alt="">
                    </div>
                    <div class="text-brand font-bold text-[24px] w-3/4  leading-tight">Sekretariat</div>
                    <svg class="absolute right-6 -bottom-4"  width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9998 15.9155L21.1871 9.93457L22.9548 11.6434L14.9998 19.3333L7.04492 11.6434L8.81268 9.93457L14.9998 15.9155Z" fill="#FF8B00"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden relative min-h-[283px]">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Team" class="w-full h-[169px] object-cover">
                <div class="p-4 pb-2 min-h-[84px] relative">
                    <div class="w-[87px] h-[87px] rounded-full absolute -top-8 right-5 ">
                        <img src="img/TPS25/icon/commain.webp" alt="">
                    </div>
                    <div class="text-brand font-bold text-[24px] w-3/4  leading-tight">Evaluator</div>
                    <svg class="absolute right-6 -bottom-4"  width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9998 15.9155L21.1871 9.93457L22.9548 11.6434L14.9998 19.3333L7.04492 11.6434L8.81268 9.93457L14.9998 15.9155Z" fill="#FF8B00"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden relative min-h-[283px]">
                <img src="https://images.unsplash.com/photo-1558403194-611308249627?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" alt="Team" class="w-full h-[169px] object-cover">
                <div class="p-4 pb-2 min-h-[84px] relative">
                    <div class="w-[87px] h-[87px] rounded-full absolute -top-8 right-5 ">
                        <img src="img/TPS25/icon/commain.webp" alt="">
                    </div>
                    <div class="text-brand font-bold text-[24px] w-3/4  leading-tight">Branding</div>
                    <svg class="absolute right-6 -bottom-4"  width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9998 15.9155L21.1871 9.93457L22.9548 11.6434L14.9998 19.3333L7.04492 11.6434L8.81268 9.93457L14.9998 15.9155Z" fill="#FF8B00"/>
                    </svg>
                </div>
            </div>

        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>
</html>