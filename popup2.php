<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story - Tim Petra Sinergi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>



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
                        
                        <p>Pembinaan yang dijalankan berupa kelompok diskusi dengan pembahasan yang dikurasi melalui Pusat Kepemimpinan Kristen.</p>
                        
                        <p>Pembinaan ini bertujuan untuk mengajak mahasiswa baru menyadari tentang makna hidup, makna diri, tujuan hidup, dan kritis berpikir tentang realitas kehidupan yang mereka jalani, supaya mereka dapat mulai membangun hidup yang berhasil dan bermakna.</p>
                    </div>
                    
                    <button class="back-btn" onclick="closePopup()">Back</button>
                </div>
                
                <!-- Right Side - 3 Stacked Horizontal Images -->
                <div class="right-images hidden lg:flex">
                    <div class="stacked-img">
                        <img src="img/tps_01.JPG" alt="TPS Activity 1">
                    </div>
                    <div class="stacked-img">
                        <img src="img/foto_tpsweb.JPG" alt="TPS Activity 2">
                    </div>
                    <div class="stacked-img last-img">
                        <img src="img/tps_whatmatters.jpg" alt="TPS Activity 3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Reset default styles */


body {
    font-family: 'Plus Jakarta Sans', sans-serif;
}

/* Wrapper untuk isolasi CSS */
.popup-our-story-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-family: 'Plus Jakarta Sans', sans-serif;
    z-index: 9999;
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
    backdrop-filter: blur(5px);
    animation: fadeIn 0.3s ease-out;
}

.popup-our-story-wrapper .popup-container {
    position: relative;
    width: 90%;
    max-width: 1920px;
    height: 95%;
    max-height: 1000px;
    background: white;
    border-radius: 15px;
    overflow: hidden;
    animation: slideUp 0.4s ease-out;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
}

.popup-our-story-wrapper .popup-content {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    height: 100%;
    gap: 0;
}

/* Left Side - Single Image */
.popup-our-story-wrapper .left-image {
    background: #2C2C2C;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    position: relative;
}

.popup-our-story-wrapper .main-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0;
}

/* Center - Our Story Content */
.popup-our-story-wrapper .center-content {
    background: white;
    padding: 60px 40px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    position: relative;
}

/* Custom scrollbar for center content */
.popup-our-story-wrapper .center-content::-webkit-scrollbar {
    width: 6px;
}

.popup-our-story-wrapper .center-content::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.popup-our-story-wrapper .center-content::-webkit-scrollbar-thumb {
    background: #FF8B00;
    border-radius: 3px;
}

.popup-our-story-wrapper .center-content::-webkit-scrollbar-thumb:hover {
    background: #e67a00;
}

.popup-our-story-wrapper .story-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 48px;
    color: #FF8B00;
    margin-bottom: 10px;
    line-height: 1.1;
}

.popup-our-story-wrapper .story-subtitle {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 600;
    font-size: 22px;
    color: #FF8B00;
    margin-bottom: 30px;
    line-height: 1.2;
}

.popup-our-story-wrapper .story-text {
    margin-bottom: 20px;
    flex-grow: 1;
}

.popup-our-story-wrapper .story-text p {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 400;
    font-size: 15px;
    line-height: 1.7;
    color: #6E5A30;
    margin-bottom: 16px;
    text-align: justify;
}

.popup-our-story-wrapper .story-text p:last-child {
    margin-bottom: 0;
}

.popup-our-story-wrapper .back-btn {
    background: #FF8B00;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 16px;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(255, 139, 0, 0.3);
    align-self: flex-start;
    margin-top: auto;
}

.popup-our-story-wrapper .back-btn:hover {
    background: #e67a00;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 139, 0, 0.4);
}

/* Right Side - 3 Stacked Images */
.popup-our-story-wrapper .right-images {
    background: #2C2C2C;
    flex-direction: column;
    padding: 0;
    gap: 0;
}

.popup-our-story-wrapper .stacked-img {
    flex: 1;
    position: relative;
    overflow: hidden;
    border-radius: 0;
}

.popup-our-story-wrapper .stacked-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.popup-our-story-wrapper .stacked-img:hover img {
    transform: scale(1.05);
}

/* Animation styles */
@keyframes fadeIn {
    from { 
        opacity: 0; 
    }
    to { 
        opacity: 1; 
    }
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
    from { 
        opacity: 1; 
    }
    to { 
        opacity: 0; 
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

/* Close button */
.popup-our-story-wrapper .close-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.6);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: white;
    font-size: 24px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    transition: all 0.3s ease;
    font-weight: normal;
    line-height: 1;
}

.popup-our-story-wrapper .close-btn:hover {
    background: rgba(0, 0, 0, 0.8);
    transform: scale(1.1);
}

/* Responsive Design */

</style>

<script>
function openOurStoryPopup() {
    const popup = document.getElementById('ourStoryPopup');
    if (popup) {
        popup.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Force reflow for animation
        popup.offsetHeight;
        popup.classList.add('showing');
    }
}

function closePopup() {
    const popup = document.getElementById('ourStoryPopup');
    if (!popup) return;
    
    const overlay = popup.querySelector('.popup-overlay');
    const container = popup.querySelector('.popup-container');
    
    // Add closing animations
    if (overlay) overlay.style.animation = 'fadeOut 0.3s ease-out';
    if (container) container.style.animation = 'slideDown 0.3s ease-out';
    
    setTimeout(() => {
        popup.style.display = 'none';
        document.body.style.overflow = 'auto';
        
        // Reset animations
        if (overlay) overlay.style.animation = '';
        if (container) container.style.animation = '';
        popup.classList.remove('showing');
    }, 300);
}

// Close popup when clicking overlay (outside the container)
document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.getElementById('popupOverlay');
    if (overlay) {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                closePopup();
            }
        });
    }
});

// Close popup with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const popup = document.getElementById('ourStoryPopup');
        if (popup && popup.style.display === 'block') {
            closePopup();
        }
    }
});
</script>

</body>
</html>