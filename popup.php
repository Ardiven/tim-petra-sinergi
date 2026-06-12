
<section class="popup-our-story-wrapper" id="ourStoryPopup" style="display: none;">
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-container">
            <div class="popup-content">
                <!-- Left Side - Single Large Image -->
                <div class="left-image">
                    <img src="img/tps_gedung.jpg" alt="Tim Petra Sinergi Building" class="main-img">
                </div>
                
                <!-- Center - Our Story Content -->
                <div class="center-content">
                    <h1 class="story-title">Our Story</h1>
                    <h2 class="story-subtitle">Journey to be the REAL YOU</h2>
                    
                    <div class="story-text">
                        <p>Tim Petra Sinergi adalah organisasi yang mengurus program pembinaan mahasiswa baru dan Astor. TPS dibentuk sebagai sinergi dari lembaga kemahasiswaan (diwakili BEM) - Pelma - DMU untuk menjadi keluarga pertama mahasiswa baru untuk mempersiapkan diri sebelum masuk pembinaan-pembinaan yang ada di Petra.</p>
                        
                        <p>Wujud sinergi itu adalah dengan teman-teman LK, Pelma, dan dosen-dosen DMU untuk menggarap pembinaan ini bersama-sama dengan menyambut adik-adik kelas mereka sebagai Astor, mentor, dan pembina dari Tim Petra Sinergi.</p>
                        
                        <p>Pembinaan yang dijalankan berupa kelompok diskusi dengan pembahasan yang dikurasi melalui Pusat Kepemimpinan Kristen. Pembinaan ini bertujuan untuk mengajak mahasiswa baru menyadari tentang makna hidup, makna diri, tujuan hidup, dan kritis berpikir tentang realitas kehidupan yang mereka jalani, supaya mereka dapat mulai membangun hidup yang berhasil dan bermakna.</p>
                    </div>
                    
                    <button class="back-btn" onclick="closePopup()">Back</button>
                </div>
                
                <!-- Right Side - 3 Stacked Images -->
                <div class="right-images">
                    <div class="stacked-img">
                        <img src="img/tps_01.JPG" alt="TPS Activity 1">
                    </div>
                    <div class="stacked-img">
                        <img src="img/foto_tpsweb.JPG" alt="TPS Activity 2">
                    </div>
                    <div class="stacked-img">
                        <img src="img/tps_whatmatters.jpg" alt="TPS Activity 3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
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
    /* margin-bottom: 30px; */
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
    /* margin-top: 30px; */
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

/* Animations */
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

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
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

/* MOBILE - VERY SMALL PHOTOS */
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
        padding: 20px 40px;
        overflow: visible;
        height: auto;
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
        font-size: 12px;
        line-height: 1.2;
        margin-bottom: 12px;
    }
    
    .popup-our-story-wrapper .back-btn {
        font-size: 10px;
        padding: 6px 15px;
        margin-top: 0px;
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
    
    .popup-our-story-wrapper .story-text p {
        font-size: 10px;
        margin-bottom: 12px;
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
