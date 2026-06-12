
<!-- Values Section -->
<section id="values" class="values-section-wrapper">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .values-section-wrapper {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: white;
            padding: 50px 20px;
            width: 100%;
        }
        
        .values-section-wrapper * {
            box-sizing: border-box;
        }
        
        .values-section-wrapper .values-container {
            max-width: 1600px;
            margin: 0 auto;
        }
        
        .values-section-wrapper .values-title {
            text-align: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 36px;
            line-height: 100%;
            color: #FF8B00;
            margin: 0 0 60px 0;
        }
        
        .values-section-wrapper .values-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            align-items: start;
        }
        
        .values-section-wrapper .value-card {
            background: white;
            padding: 25px;
            border-radius: 24px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            height: fit-content;
            /* max-height: 650px; */
            display: flex;
            flex-direction: column;
        }
        
        .values-section-wrapper .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }
        
        .values-section-wrapper .value-number {
            position: absolute;
            top: 10px;
            left: 25px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2.5rem;
            font-weight: 530;
            color: #F7AD1A;
            z-index: 1;
            margin: 0;
        }
        
        .values-section-wrapper .value-icon {
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 60px 10px 20px 10px ;
            position: relative;
            z-index: 2;
        }
        
        .values-section-wrapper .value-icon img {
            width: fit-content !important;
            height: fit-content !important;
            object-fit: contain;
        }
        
        .values-section-wrapper .value-text {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.7;
            color: #333;
            text-align: left;
            position: relative;
            z-index: 2;
            height: fit-content;
            min-height: 500px;
            margin: 0;
            padding-top: 10px;
            flex-shrink: 0;
        }

        .mySwiper2 {
            display: none  !important;
        }
        .valuesDS {
            display: flex;
        }

        
        /* Responsive untuk tablet */
        @media (max-width: 1200px) {
            .mySwiper2 {
                display: block  !important;
            }
            .valuesDS {
                display: none !important;
            }
            .values-section-wrapper .value-card {
                max-height: 680px;
            }
            .values-section-wrapper .value-icon {
                margin: 60px 20px !important;
            }
        }

        @media (max-width: 480px) {
            .values-section-wrapper .value-text {
                font-size: 18px;
            }
            
        }
        
        
        /* Responsive untuk mobile */
       
    </style>
    
    <div class="values-container">
        <h1 class="values-title">Our Values</h1>
        
        <div class="values-grid valuesDS">
            <!-- Value 1 -->
            <div class="value-card">
                <div class="value-number">1</div>
                <div class="value-icon">
                    <img src="img/Visual Values/Visual Values-01.png" alt="Berpusat pada Kristus">
                </div>
                <div class="value-text">
                    Kristus yang telah mati bagi dosa kita, dan bangkit menjadi pembela kita, menjadi dasar hidup dari apa yang kita kejar, cintai, dan anggap paling penting.
                </div>
            </div>
            
            <!-- Value 2 -->
            <div class="value-card">
                <div class="value-number">2</div>
                <div class="value-icon">
                    <img src="img/Visual Values/Visual Values-02.png" alt="Dimuridkan">
                </div>
                <div class="value-text">
                    Berproses menjadi murid, yaitu menjadi pengikut yang memiliki hubungan dan belajar dari Yesus, Guru kita, agar kita berproses menghidupi manusia baru yang mencerminkan terang Kristus.
                </div>
            </div>
            
            <!-- Value 3 -->
            <div class="value-card">
                <div class="value-number">3</div>
                <div class="value-icon">
                    <img src="img/Visual Values/Visual Values-03.png" alt="Dipersatukan dalam Tuhan">
                </div>
                <div class="value-text">
                    Hal terutama yang menyatukan kita adalah bahwa kita sama-sama orang yang ditebus dan diperdamaikan kembali dengan Allah. Setiap interaksi dan relasi adalah anugerah supaya kita bisa saling membangun, menajamkan, dan menyadari bagian apa dalam diri yang bisa dibangun dalam hidup.
                </div>
            </div>
            
            <!-- Value 4 -->
            <div class="value-card">
                <div class="value-number">4</div>
                <div class="value-icon">
                    <img src="img/Visual Values/Visual Values-04.png" alt="Authentic Growth">
                </div>
                <div class="value-text">
                    Mulai dari menyadari dan menerima diri apa adanya karena kita sudah diterima dan dikasihi oleh Tuhan. Setelah itu bertumbuh dalam keinginan, cara berpikir, dan perilaku yang bukan lagi menjadi produk masa lalu, tapi terbangun dengan memberikan kekecewaan, kemarahan, dan luka kepada Tuhan supaya diproses dan terus-terusan dibentuk di dalam Tuhan.
                </div>
            </div>
            
            <!-- Value 5 -->
            <div class="value-card">
                <div class="value-number">5</div>
                <div class="value-icon">
                    <img src="img/Visual Values/Visual Values-05.png" alt="Membawa Kabar Baik">
                </div>
                <div class="value-text">
                    belajar menghidupi kabar baik yang telah dinyatakan-Nya dalam Yesus dengan menjadi kabar baik buat orang di sekitar kita, terutama mereka yang membutuhkan peran, karya, kontribusi, support, lewat semua kelimpauan yang Tuhan beri pada kita.
                </div>
            </div>
        </div>

        <!-- Swiper Container -->
    <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide my-2 px-2 max-w-2xl">
               <div class="value-card">
                <div class="value-number">1</div>
                <div class="value-icon">
                    <img src="img/Visual Values/Visual Values-01.png" alt="Berpusat pada Kristus">
                </div>
                <div class="value-text">
                    Kristus yang telah mati bagi dosa kita, dan bangkit menjadi pembela kita, menjadi dasar hidup dari apa yang kita kejar, cintai, dan anggap paling penting.
                </div>
            </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide my-2 px-2 max-w-2xl">
                <div class="value-card">
                    <div class="value-number">2</div>
                    <div class="value-icon">
                        <img src="img/Visual Values/Visual Values-02.png" alt="Dimuridkan">
                    </div>
                    <div class="value-text">
                        Berproses menjadi murid, yaitu menjadi pengikut yang memiliki hubungan dan belajar dari Yesus, Guru kita, agar kita berproses menghidupi manusia baru yang mencerminkan terang Kristus.
                    </div>
            </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide my-2 px-2 max-w-2xl">
               <div class="value-card">
                <div class="value-number">3</div>
                <div class="value-icon">
                    <img src="img/Visual Values/Visual Values-03.png" alt="Dipersatukan dalam Tuhan">
                </div>
                <div class="value-text">
                    Hal terutama yang menyatukan kita adalah bahwa kita sama-sama orang yang ditebus dan diperdamaikan kembali dengan Allah. Setiap interaksi dan relasi adalah anugerah supaya kita bisa saling membangun, menajamkan, dan menyadari bagian apa dalam diri yang bisa dibangun dalam hidup.
                </div>
            </div>
            </div>

            <div class="swiper-slide my-2 px-2 max-w-2xl">
               <div class="value-card">
                    <div class="value-number">4</div>
                    <div class="value-icon">
                        <img src="img/Visual Values/Visual Values-04.png" alt="Authentic Growth">
                    </div>
                    <div class="value-text">
                        Mulai dari menyadari dan menerima diri apa adanya karena kita sudah diterima dan dikasihi oleh Tuhan. Setelah itu bertumbuh dalam keinginan, cara berpikir, dan perilaku yang bukan lagi menjadi produk masa lalu, tapi terbangun dengan memberikan kekecewaan, kemarahan, dan luka kepada Tuhan supaya diproses dan terus-terusan dibentuk di dalam Tuhan.
                    </div>
                </div>
            </div>

            <div class="swiper-slide my-2 px-2 max-w-2xl">
               <div class="value-card">
                    <div class="value-number">5</div>
                    <div class="value-icon">
                        <img src="img/Visual Values/Visual Values-05.png" alt="Membawa Kabar Baik">
                    </div>
                    <div class="value-text">
                        belajar menghidupi kabar baik yang telah dinyatakan-Nya dalam Yesus dengan menjadi kabar baik buat orang di sekitar kita, terutama mereka yang membutuhkan peran, karya, kontribusi, support, lewat semua kelimpauan yang Tuhan beri pada kita.
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="swiper-pagination mt-8"></div>
    </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        var swiper = new Swiper(".mySwiper2", {
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
                640: {
                    slidesPerView: 2
                },
                960: {
                    slidesPerView: 3
                }
            }
        });
    }
});
</script>
    
</section>