<?php include("../../header.php");
$hari = [1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu', 7 => 'Minggu'];
$jadwal = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM astor join jadwal on astor.id_jadwal_ktb=jadwal.id WHERE nrp='" . $_SESSION['username'] . "'"));
?>

    <main class="flex-grow flex flex-col items-center pt-12 px-4 relative bg-[#FFFBEB]/70">
        
        <div class="text-center z-10">
            <p class="text-[#6E5A30] text-lg mb-1">Halo, <?= $nama['nama']; ?></p>
            <h2 class="text-[#FF8B00] font-medium text-xl mb-2">Jadwal KTB</h2>
            <h1 class="text-[#FF8B00] font-bold text-4xl md:text-6xl tracking-wide">
                <?php echo $hari[$jadwal['hari']]; ?> <span class="text-brand-yellow">|</span> <?php $jam = new DateTime($jadwal['waktu']); echo $jam->format('H:i'); ?> WIB
            </h1>
        </div>

        <div class="w-full max-w-5xl mt-8 flex justify-center relative">
            <div class="w-full h-[500px] flex items-center justify-center bg-transparent rounded-lg relative">
                <img 
                    src="../../img/TPS25/assetktb.png" 
                    alt="Ilustrasi Jadwal KTB" 
                    class="object-contain w-full h-full z-10"
                    
                />
            </div>
        </div>

    </main>
    <style>
        main {
            /* background-color: #FFFBEB; */
            background-image: url("../../img/TPS25/bg_lihat_ktb.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</body>
</html>