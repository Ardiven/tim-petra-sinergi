<?php include 'header.php'; ?>
<style>
.masthead {
    height: 100vh;
    min-height: 500px;
    background-image: url('img/TPS2425/icamp2024.jpg');
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
}

.masthead:hover {
    cursor: pointer;
}

@media(max-width: 768px) {
    .masthead {
        background-image: url('img/TPS2425/icamp2024.jpg');
        background-size: cover;
    }
}

.hero-skew::before {
    content: '';
    position: absolute;
    right: -110%;
    top: 60%;
    width: 300%;
    height: 200%;
    z-index: -1;
    background-color: #FEE180;
    opacity: 0.3;
    transform: skewY(150deg);
}
</style>

<section id="hero_old" class="w-full max-h-[960px] relative overflow-hidden py-12 hero-skew">
    <div class="container mx-auto max-w-[1129px]">
        <div class="flex flex-col lg:flex-row">
            <div class="lg:w-1/2 w-full lg:flex lg:flex-col px-[20px] lg:items-stretch order-2 lg:order-1">
                <h1 class="sm:text-[36px] text-[24px] font-medium leading-tight text-[#FF8B00] font-special mb-4">
                    <span class="md:text-[128px] text-[65px] font-bold">Hello!<br></span>
                    We Are <span class="font-bold">Tim Petra Sinergi</span>
                </h1>
                <h2 class="text-[#6E5A30] mb-12 font-medium text-[13px] sm:text-[24px] max-w-[200px] sm:max-w-[600px]">
                    Program pembinaan mahasiswa UK Petra dengan visi mengajak mahasiswa baru mulai memikirkan hidup yang berhasil dan bermakna
                </h2>
                <div class="flex flex-row items-center">
                    <a href="#" onclick="openOurStoryPopup(); return false;" class="hover:scale-110 transition duration-300 text-white bg-[#FF8B00] md:px-6 px-[22px] md:py-[9px] py-[6px] text-[12px] rounded-lg items-center max-w-fit"
                       style="box-shadow: 0px 0 10px -2px rgba(0,0,0,0.3), 0 4px 6px -2px rgba(0,0,0,0.3);">
                        More About Us
                    </a>
                    <a href="https://instagram.com/timpetrasinergi" class="px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                             fill="#FF8B00" viewBox="0 0 24 24" class="mt-1 hidden sm:block hover:scale-110 transition duration-300">
                            <path d="M20.947 8.305a6.5 6.5 0 0 0-.419-2.216 4.6 4.6 0 0 0-2.633-2.633 6.6 6.6 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.6 6.6 0 0 0-2.185.42 4.6 4.6 0 0 0-2.633 2.633 6.6 6.6 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.6 4.6 0 0 0 2.634 2.632 6.6 6.6 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.6 6.6 0 0 0 2.186-.419 4.62 4.62 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709m-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246m4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078"></path>
                            <path d="M11.994 8.976a3.003 3.003 0 1 0 0 6.006 3.003 3.003 0 1 0 0-6.006"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37"
                             fill="#FF8B00" viewBox="0 0 24 24" class="mt-1 block sm:hidden hover:scale-110 transition duration-300">
                            <path d="M20.947 8.305a6.5 6.5 0 0 0-.419-2.216 4.6 4.6 0 0 0-2.633-2.633 6.6 6.6 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.6 6.6 0 0 0-2.185.42 4.6 4.6 0 0 0-2.633 2.633 6.6 6.6 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.6 4.6 0 0 0 2.634 2.632 6.6 6.6 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.6 6.6 0 0 0 2.186-.419 4.62 4.62 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709m-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246m4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078"></path>
                            <path d="M11.994 8.976a3.003 3.003 0 1 0 0 6.006 3.003 3.003 0 1 0 0-6.006"></path>
                        </svg>
                    </a>
                    <a href="https://line.me/R/ti/p/@szg5752d">
                        <img src="img/line1.png" alt="" class="h-[30px] hover:scale-110 transition duration-300 sm:h-[30px] mt-1">
                    </a>
                </div>
            </div>
            <div class="lg:w-[500px] lg:h-[500px] w-full lg:flex lg:flex-col lg:items-stretch order-1 lg:order-2 flex justify-end relative pb-10">
                <img src="assets/img/tps.png"
                     class="w-[120px] h-[120px] sm:w-[170px] sm:h-[170px] md:w-[200px] md:h-[200px] lg:w-[500px] lg:h-[500px] sm:absolute sm:top-0 sm:right-0 absolute ld:static right-0 top-0 ld:right-auto ld:top-auto"
                     alt="">
            </div>
        </div>
    </div>
</section>