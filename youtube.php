<?php include "header.php" ?>
<title>Video Briefing LEG</title>
<script src="https://www.youtube.com/iframe_api"></script>

<style>
  .loading-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 60vh;
  }
  
  .spinner {
    border: 4px solid #f3f4f6;
    border-top: 4px solid #3b82f6;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  
  .content-container {
    display: none;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .error-container {
    display: none;
    text-align: center;
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
  }
  
  .video-header {
    text-align: center;
    margin-bottom: 30px;
    margin-top: 30px;
  }
  
  .video-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #f59e0b;
    margin-bottom: 25px;
  }
  
  .video-player-container {
    position: relative;
    width: 100%;
    max-width: 100%;
    margin: 0 auto 45px auto;
    background: #000;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    /* Aspect ratio 16:9 untuk responsive */
    aspect-ratio: 16 / 9;
    /* FORCE iframe positioning for mobile */
    isolation: isolate;
    -webkit-transform: translateZ(0);
    transform: translateZ(0);
  }
  
  #player {
    width: 100% !important;
    height: 100% !important;
  }
  
  /* FORCE iframe to stay in container */
  .video-player-container iframe {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    border: none !important;
  }
  
  .playlist-link {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: #f59e0b;
    color: white;
    text-decoration: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    max-width: 300px;
    margin: 0 auto;
  }
  
  .playlist-link:hover {
    background: #d97706;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
  }
  
  .playlist-icon {
    width: 20px;
    height: 20px;
  }
  
  /* Prevent zoom on input for mobile */
  input, textarea, select {
    font-size: 16px !important;
    transform-origin: left top;
    transform: scale(1);
  }
  
  @media (max-width: 768px) {
    .video-title {
      font-size: 2rem;
    }
    
    .content-container {
      padding: 15px;
    }
    
    .video-player-container {
      margin-bottom: 30px;
    }
    
    /* Responsive YouTube link button */
    .playlist-link {
      width: 90%;
      max-width: none;
      padding: 15px 20px;
      font-size: 1rem;
    }
  }
  
  @media (max-width: 480px) {
    .video-title {
      font-size: 1.8rem;
    }
    
    .content-container {
      padding: 10px;
    }
  }
</style>

<div class="loading-container" id="loadingContainer">
  <div class="spinner"></div>
  <p class="mt-4 text-gray-600">Memuat data video...</p>
</div>

<div class="content-container" id="contentContainer">
  <div class="video-header">
    <h1 class="video-title" id="mainTitle">Video Briefing LEG</h1>
    <div class="">
      <h3 id="videoTitle" class="text-lg font-semibold mb-2 text-gray-800"></h3>
      <p id="videoDescription" class="text-gray-600 text-sm"></p>
    </div>
  </div>
  
  <div class="video-player-container">
    <!-- Tempat player akan muncul -->
    <div id="player"></div>
  </div>
  
  <div class="text-center">
    <a href="https://youtube.com/playlist?list=PLBsqriTr7ixSrtel7ENUqDko8jAcZcoEa&feature=shared" 
       class="playlist-link" 
       target="_blank">
      <svg class="playlist-icon" fill="currentColor" viewBox="0 0 24 24">
        <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8 12.5v-9l6 4.5-6 4.5z"/>
      </svg>
      Full Playlist of Briefing LEG
    </a>
  </div>
</div>

<div class="error-container" id="errorContainer">
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
    <strong>Error!</strong> <span id="errorMessage">Gagal memuat data video.</span>
  </div>
  <button onclick="loadVideoData()" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Coba Lagi
  </button>
</div>

<script>
let player;
let startTime = 0;
let realWatchTotal = 0;
let currentVideoData = null;
let youtubeAPIReady = false;
let isPlaying = false;
let lastProgress = 0;
let sessionRealWatch = 0;

// Load YouTube API
function onYouTubeIframeAPIReady() {
  youtubeAPIReady = true;
  if (currentVideoData) {
    createPlayer();
  }
}

// MOBILE OPTIMIZATION - Set viewport dan prevent redirect
function optimizeForMobile() {
  // Set viewport meta yang optimal
  let viewport = document.querySelector('meta[name="viewport"]');
  if (viewport) {
    viewport.setAttribute('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover');
  } else {
    viewport = document.createElement('meta');
    viewport.name = 'viewport';
    viewport.content = 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover';
    document.head.appendChild(viewport);
  }
  
  // Tambahkan meta untuk iOS web app
  const webAppMeta = document.createElement('meta');
  webAppMeta.name = 'apple-mobile-web-app-capable';
  webAppMeta.content = 'yes';
  document.head.appendChild(webAppMeta);
}

// PREVENT YouTube redirect attempts
function preventYouTubeRedirect() {
  // Override window.open untuk intercept redirect
  const originalOpen = window.open;
  window.open = function(url, name, specs) {
    if (url && (url.includes('youtube.com') || url.includes('youtu.be'))) {
      console.log('Blocked YouTube redirect:', url);
      // Jangan buka tab baru, tetap di player
      return null;
    }
    return originalOpen.call(this, url, name, specs);
  };
  
  // Intercept link clicks
  document.addEventListener('click', function(e) {
    const target = e.target;
    if (target.tagName === 'A' && target.href && 
        (target.href.includes('youtube.com') || target.href.includes('youtu.be')) &&
        !target.classList.contains('playlist-link')) {
      e.preventDefault();
      console.log('Prevented YouTube link redirect');
      return false;
    }
  }, true);
}

// Load video data via AJAX
function loadVideoData() {
  document.getElementById('loadingContainer').style.display = 'flex';
  document.getElementById('contentContainer').style.display = 'none';
  document.getElementById('errorContainer').style.display = 'none';
  
  // Setup mobile optimizations
  optimizeForMobile();
  preventYouTubeRedirect();
  
  fetch('get_video_data.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      currentVideoData = data;
      
      // Update UI dengan data yang diterima
      document.getElementById('mainTitle').textContent = 'Video Briefing '+data.title;
      
      document.getElementById('loadingContainer').style.display = 'none';
      document.getElementById('contentContainer').style.display = 'block';
      
      if (youtubeAPIReady) {
        createPlayer();
        // Tambahkan mobile play trigger setelah player dibuat
        setTimeout(addMobilePlayTrigger, 1000);
      }
    } else {
      showError(data.message || 'Gagal memuat data video');
    }
  })
  .catch(error => {
    console.error('Error:', error);
    showError('Terjadi kesalahan saat memuat data');
  });
}

function showError(message) {
  document.getElementById('loadingContainer').style.display = 'none';
  document.getElementById('contentContainer').style.display = 'none';
  document.getElementById('errorContainer').style.display = 'block';
  document.getElementById('errorMessage').textContent = message;
}

// ENHANCED createPlayer dengan force web play
function createPlayer() {
  if (player) {
    player.destroy();
  }
  
  // Deteksi mobile
  const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
  const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
  const isAndroid = /Android/.test(navigator.userAgent);
  
  console.log('Creating player - Mobile:', isMobile, 'iOS:', isIOS, 'Android:', isAndroid);
  
  // Parameter khusus untuk force play di web
  const playerVars = {
    'autoplay': 0,
    'controls': 1,
    'rel': 0,
    'showinfo': 0,
    'modestbranding': 1,
    'fs': 1,  // Enable fullscreen button
    'cc_load_policy': 1,  // Show closed captions
    'iv_load_policy': 3,  // Hide video annotations
    
    // PARAMETER KUNCI untuk force web playback
    'playsinline': 1,           // Force inline play (iOS)
    'origin': window.location.origin,  // Required untuk security
    'enablejsapi': 1,           // Enable JS API
    'widget_referrer': window.location.href,
    
    // Coba force web player
    'html5': 1,                 // Force HTML5 player
    'wmode': 'opaque',         // Untuk z-index issues
    
    // Parameter eksperimental
    'disablekb': 0,            // Enable keyboard controls
    'hl': 'id',                // Set language
    'cc_lang_pref': 'id'       // Caption language
  };
  
  // KHUSUS iOS - parameter tambahan
  if (isIOS) {
    playerVars.playsinline = 1;
    // Coba parameter undocumented
    playerVars.webkit_playsinline = 1;
  }
  
  player = new YT.Player('player', {
    width: '100%',
    height: '100%',
    videoId: currentVideoData.youtube_id,
    host: 'https://www.youtube-nocookie.com', // Gunakan nocookie domain
    playerVars: playerVars,
    events: { 
      'onStateChange': onPlayerStateChange,
      'onReady': onPlayerReady,
      'onError': onPlayerError
    }
  });
}

// FORCE USER INTERACTION untuk mobile
function addMobilePlayTrigger() {
  const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
  
  if (isMobile) {
    const playerContainer = document.querySelector('.video-player-container');
    
    // Tambahkan overlay play button
    const playOverlay = document.createElement('div');
    playOverlay.id = 'mobile-play-overlay';
    playOverlay.innerHTML = `
      <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        z-index: 1000;
        border-radius: 8px;
      " onclick="forceMobilePlay()">
        <div style="
          background: rgba(255,255,255,0.9);
          border-radius: 50%;
          width: 80px;
          height: 80px;
          display: flex;
          justify-content: center;
          align-items: center;
          box-shadow: 0 4px 20px rgba(0,0,0,0.3);
          transition: all 0.3s ease;
        " onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="#333">
            <path d="M8 5v14l11-7z"/>
          </svg>
        </div>
        <div style="
          position: absolute;
          bottom: 20px;
          left: 50%;
          transform: translateX(-50%);
          color: white;
          font-size: 14px;
          text-align: center;
        ">
          Tap to play in web browser
        </div>
      </div>
    `;
    
    playerContainer.appendChild(playOverlay);
  }
}

// Function untuk force play dengan user interaction
function forceMobilePlay() {
  const overlay = document.getElementById('mobile-play-overlay');
  if (overlay) {
    overlay.style.display = 'none';
  }
  
  if (player && player.playVideo) {
    try {
      console.log('Forcing mobile play...');
      player.playVideo();
    } catch (error) {
      console.log('Force play error:', error);
      // Fallback: coba load ulang player
      setTimeout(() => {
        createPlayer();
      }, 500);
    }
  }
}

// Enhanced onReady handler
function onPlayerReady(event) {
  console.log('Player ready:', currentVideoData.title);
  
  // Remove overlay setelah player ready (delay untuk mobile)
  const overlay = document.getElementById('mobile-play-overlay');
  if (overlay) {
    setTimeout(() => {
      // Hanya hide jika bukan mobile atau sudah user interaction
      const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
      if (!isMobile) {
        overlay.style.display = 'none';
      }
    }, 1500);
  }
  
  if (currentVideoData.last_progress) {
    player.seekTo(currentVideoData.last_progress);
  }
  
  // Force focus ke player (mobile fix)
  try {
    const iframe = document.querySelector('#player iframe');
    if (iframe) {
      iframe.focus();
    }
  } catch (error) {
    console.log('Focus error:', error);
  }
}

// Enhanced error handler
function onPlayerError(event) {
  console.log('Player error:', event.data);
  
  // Error codes:
  // 2 - Invalid parameter
  // 5 - HTML5 player error
  // 100 - Video not found
  // 101, 150 - Embedding not allowed
  
  if (event.data === 101 || event.data === 150) {
    // Video tidak bisa di-embed, tapi coba force reload
    console.log('Embedding restricted, trying alternative approach...');
    
    setTimeout(() => {
      // Coba dengan parameter berbeda
      createPlayerWithAlternativeParams();
    }, 2000);
  }
}

// Alternative player parameters jika gagal
function createPlayerWithAlternativeParams() {
  if (player) {
    player.destroy();
  }
  
  console.log('Trying alternative player parameters...');
  
  player = new YT.Player('player', {
    width: '100%',
    height: '100%',
    videoId: currentVideoData.youtube_id,
    // Coba tanpa nocookie
    playerVars: {
      'autoplay': 0,
      'controls': 1,
      'playsinline': 1,
      'rel': 0,
      'modestbranding': 1,
      'origin': window.location.origin,
      'enablejsapi': 1
    },
    events: { 
      'onStateChange': onPlayerStateChange,
      'onReady': onPlayerReady,
      'onError': onPlayerError
    }
  });
}

function onPlayerStateChange(event) {
  // Remove overlay saat video mulai playing
  if (event.data === YT.PlayerState.PLAYING) {
    const overlay = document.getElementById('mobile-play-overlay');
    if (overlay) {
      overlay.style.display = 'none';
    }
    
    startTime = Date.now();
    isPlaying = true;
  }
  
  if (event.data === YT.PlayerState.PAUSED || event.data === YT.PlayerState.ENDED) {
    if (isPlaying) {
      let elapsed = (Date.now() - startTime) / 1000;
      realWatchTotal += elapsed;
      sessionRealWatch += elapsed;
      lastProgress = Math.floor(player.getCurrentTime());
      
      console.log("Durasi real:", realWatchTotal, "detik");
      console.log("Progress:", lastProgress, "detik");

      sendProgress(
        currentVideoData.materi_id, 
        player.getVideoData().video_id, 
        lastProgress, 
        realWatchTotal
      );
      realWatchTotal = 0;
      isPlaying = false;
    }
  }
}

function sendProgress(materiId, videoId, progress, realWatch) {
  fetch("save_progress.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `materi_id=${materiId}&video_id=${videoId}&progress=${progress}&real_watch=${realWatch}`
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      console.log('Progress saved successfully');
    }
  })
  .catch(error => {
    console.error('Error saving progress:', error);
  });
}

function sendFinalProgress() {
  if (!player || !currentVideoData) return;
  
  try {
    let finalRealWatch = sessionRealWatch;
    if (isPlaying && startTime > 0) {
      let elapsed = (Date.now() - startTime) / 1000;
      finalRealWatch += elapsed;
    }
    
    const finalProgress = Math.floor(player.getCurrentTime());
    
    const data = new URLSearchParams({
      materi_id: currentVideoData.materi_id,
      video_id: player.getVideoData().video_id,
      progress: finalProgress,
      real_watch: realWatchTotal,
      is_final: 1
    });
    
    if (navigator.sendBeacon) {
      navigator.sendBeacon('save_progress.php', data);
      console.log('Final progress sent via sendBeacon');
    } else {
      fetch('save_progress.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: data.toString(),
        keepalive: true
      }).catch(error => {
        console.error('Error sending final progress:', error);
      });
    }
  } catch (error) {
    console.error('Error in sendFinalProgress:', error);
  }
}

// Event listeners
window.addEventListener('beforeunload', function(event) {
  sendFinalProgress();
});

window.addEventListener('pagehide', function(event) {
  sendFinalProgress();
});

document.addEventListener('visibilitychange', function() {
  if (document.hidden) {
    if (isPlaying && player) {
      let elapsed = (Date.now() - startTime) / 1000;
      realWatchTotal += elapsed;
      sessionRealWatch += elapsed;
      lastProgress = Math.floor(player.getCurrentTime());
      
      sendProgress(
        currentVideoData.materi_id, 
        player.getVideoData().video_id, 
        lastProgress, 
        realWatchTotal
      );
      realWatchTotal = 0;
      isPlaying = false;
    }
  } else {
    if (player && player.getPlayerState() === YT.PlayerState.PLAYING) {
      startTime = Date.now();
      isPlaying = true;
    }
  }
});

// Start loading when page loads
document.addEventListener('DOMContentLoaded', function() {
  loadVideoData();
});
</script>