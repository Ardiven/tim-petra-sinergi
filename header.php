<?php
include "connect.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['username'])) {
    $nama = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM astor WHERE nrp='" . $_SESSION['username'] . "'"));
    $_SESSION['nama'] = $nama['nama'];
    $_SESSION['ktb'] = $nama['id_jadwal_ktb'];
    $_SESSION['bio'] = $nama['isi_biodata'];
}

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tim Petra Sinergi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" type="image/png" href="assets/img/tps.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.3/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel='icon' href='images/logo.png' type='images/logo.png' sizes='16x16'>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" /> -->

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
</head>
<body class="bg-white font-['Plus_Jakarta_Sans']">
<nav class="sticky top-0 z-50 bg-white shadow-md">
  <div class="mx-auto h-16 max-w-8xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <!-- Kiri: Logo dan Brand -->
      <div class="flex flex-1 items-center">
        <a class="flex items-center hover:scale-105 transition-transform duration-300" href="http://tps.petra.ac.id/main/index.php">
          <img src="http://tps.petra.ac.id/main/assets/img/tps.png" height="30" width="30" class="rounded" />
          <h1 class="flex items-center pl-3 font-bold text-sm sm:block">Tim Petra Sinergi</h1>
        </a>
      </div>

      <!-- Kanan: Link navigasi desktop -->
      <div class="hidden lg:flex mx-auto">
        <div class="flex space-x-4">    
          <a href="#" class="rounded-md mr-0 px-2 py-2 text-md font-medium text-[#f68b1f] hover:bg-[#f68b1f] hover:text-white">Home</a>
          <?php if (isset($_SESSION['username'])): ?>
            <a href="astor/absensi/absensi.php" class="rounded-md mr-1 px-2 py-2 text-md font-medium text-[#f68b1f] hover:bg-[#f68b1f] hover:text-white">presensi LEG</a>
            <a href="astor/profile/"  class="rounded-md px-2 py-2 text-md font-medium text-[#f68b1f] hover:bg-[#f68b1f] hover:text-white">Biodata</a>
            <a href="<?php $a = $nama['isi_biodata'] == 0 ? 'astor/profile/index.php' : ($_SESSION['ktb'] == 0 ? 'astor/ktb/index.php'  : 'astor/ktb/lihat_ktb.php'); echo $a;?>" class="rounded-md px-2 py-2 text-md font-medium text-[#f68b1f] hover:bg-[#f68b1f] hover:text-white"><?= $_SESSION['ktb'] == 0 ? 'Daftar KTB' : 'Lihat KTB' ?></a>
            <a href="youtube.php" class="rounded-md px-2 py-2 text-md font-medium text-[#f68b1f] hover:bg-[#f68b1f] hover:text-white">Rekaman Briefing</a>
            <a href="http://tps.petra.ac.id/main/logout.php" class="rounded-md px-5 py-2 text-md font-medium bg-[#f68b1f] text-white hover:scale-105 transition-transform duration-300">Logout</a>
          <?php else: ?>
            <a href="#kegiatan" class="rounded-md px-2 py-2 text-md font-medium text-[#f68b1f] hover:bg-[#f68b1f] hover:text-white">Kegiatan</a>
            <a href="#pendaftaranAstor" class="rounded-md px-2 py-2 text-md font-medium text-[#f68b1f] hover:bg-[#f68b1f] hover:text-white">Pendaftaran</a>
            <a href="#faq" class="rounded-md px-2 py-2 text-md font-medium text-[#f68b1f] hover:bg-[#f68b1f] hover:text-white">F.A.Q</a>
            <a href="login.php" class="rounded-md px-5 py-2 text-md font-medium bg-[#f68b1f] text-white hover:scale-105 transition-transform duration-300">Login</a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Mobile Menu Button (HARUS di dalam .relative.flex) -->
      <div class="flex lg:hidden ml-auto">
        <button type="button" id="mobile-menu-button" class="relative inline-flex items-center justify-center rounded-md p-2 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-none focus:ring-inset">
          <span class="sr-only">Open main menu</span>
          <!-- Hamburger icon -->
          <svg id="hamburger-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="w-6 h-6">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <!-- Close icon -->
          <svg id="close-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="w-6 h-6 hidden">
            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>

    </div>
  </div>
</nav>

    

    <!-- Mobile Menu Modal -->
    <div id="mobile-modal" class="fixed inset-0 z-50 hidden">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/50" id="modal-backdrop"></div>
        
        <!-- Modal Content -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="relative bg-white rounded-lg shadow-xl max-w-sm w-full mx-auto transform transition-all">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <button id="close-modal" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="p-4">
                    <div class="space-y-2">
                      <?php if(isset($_SESSION['username'])):?>
                        <a href="#" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFBF40" viewBox="0 0 24 24" class="mr-3">
                                <path d="M3 13h1v7c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-7h1c.4 0 .77-.24.92-.62.16-.37.07-.8-.22-1.09l-8.99-9a.996.996 0 0 0-1.41 0l-9.01 9c-.29.29-.37.72-.22 1.09s.52.62.92.62Z"></path>
                            </svg>Home</a>
                        <a href="#" onclick="showSoon()" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors">
                          <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-3"
                            fill="#FFBF40" viewBox="0 0 24 24" >
                            <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
                            <path d="M12 2a5 5 0 1 0 0 10 5 5 0 1 0 0-10M4 22h16c.55 0 1-.45 1-1v-1c0-3.86-3.14-7-7-7h-4c-3.86 0-7 3.14-7 7v1c0 .55.45 1 1 1"></path>
                          </svg>Biodata</a>
                        <a href="#" onclick="showKTBAlert()" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors">
                          <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  class="mr-3"
                            fill="#FFBF40" viewBox="0 0 24 24" >
                            <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
                            <path d="m13.59,6L4.29,15.29c-.13.13-.22.29-.26.46l-1,4c-.09.34.01.7.26.95.19.19.45.29.71.29.08,0,.16,0,.24-.03l4-1c.18-.04.34-.13.46-.26l9.29-9.29-4.41-4.41Z"></path><path d="m21,4.59l-1.59-1.59c-.78-.78-2.05-.78-2.83,0l-1.59,1.59,4.41,4.41,1.59-1.59c.78-.78.78-2.05,0-2.83Z"></path>
                          </svg>Daftar KTB</a>
                        <a href="http://tps.petra.ac.id/main/astor/absensi/absensi.php" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors">
                          <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  class="mr-3"
                            fill="#FFBF40" viewBox="0 0 24 24" >
                            <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
                            <path d="m19,4h-2v-2h-2v2h-6v-2h-2v2h-2c-1.1,0-2,.9-2,2v1h18v-1c0-1.1-.9-2-2-2Z"></path><path d="m3,20c0,1.1.9,2,2,2h14c1.1,0,2-.9,2-2v-12H3v12Zm5.71-6.71l2.29,2.29,4.29-4.29,1.41,1.41-5.71,5.71-3.71-3.71,1.41-1.41Z"></path>
                            </svg>Presensi LEG</a>
                        <a href="http://tps.petra.ac.id/main/logout.php" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors">
                          <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  class="mr-3"
                            fill="#FFBF40" viewBox="0 0 24 24" >
                            <!--Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free-->
                            <path d="M15 11H8v2h7v4l6-5-6-5z"></path><path d="M5 21h7v-2H5V5h7V3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2"></path>
                          </svg>Log Out</a>

                      <?php else:?>
                        <a href="#" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors" style="color: #6E5A30;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFBF40" viewBox="0 0 24 24" class="mr-3">
                                <path d="M3 13h1v7c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-7h1c.4 0 .77-.24.92-.62.16-.37.07-.8-.22-1.09l-8.99-9a.996.996 0 0 0-1.41 0l-9.01 9c-.29.29-.37.72-.22 1.09s.52.62.92.62Z"></path>
                            </svg>
                            Home
                        </a>
                        
                        <a href="#kegiatan" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors" style="color: #6E5A30;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFBF40" viewBox="0 0 24 24" class="mr-3">
                                <path d="m19,2H5c-.55,0-1,.45-1,1v4h-2v2h2v2h-2v2h2v2h-2v2h2v4c0,.55.45,1,1,1h14c1.1,0,2-.9,2-2V4c0-1.1-.9-2-2-2Zm-6.5,5c1.43,0,2.5,1.07,2.5,2.5s-1.07,2.5-2.5,2.5-2.5-1.07-2.5-2.5,1.07-2.5,2.5-2.5Zm4.5,10h-9v-1c0-1.66,1.34-3,3-3h3c1.66,0,3,1.34,3,3v1Z"></path>
                            </svg>
                            Kegiatan
                        </a>
                        
                        <a href="#faq" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors" style="color: #6E5A30;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFBF40" viewBox="0 0 24 24" class="mr-3">
                                <path d="m15.5,14c.83,0,1.5-.67,1.5-1.5V3.5c0-.83-.67-1.5-1.5-1.5H3.5c-.83,0-1.5.67-1.5,1.5v9c0,.83.67,1.5,1.5,1.5h1.5v2.96c0,.42.48.65.81.39l4.19-3.35h5.5Z"></path>
                                <path d="m20.5,8h-1.5v4.5c0,1.93-1.57,3.5-3.5,3.5h-4.8l-1.51,1.21c.25.47.74.79,1.31.79h3.5l4.19,3.35c.33.26.81.03.81-.39v-2.96h1.5c.83,0,1.5-.67,1.5-1.5v-7c0-.83-.67-1.5-1.5-1.5Z"></path>
                            </svg>
                            F.A.Q
                        </a>
                        
                        <a href="http://tps.petra.ac.id/main/login.php" class="flex items-center w-full text-left px-4 py-3 text-base font-medium hover:bg-gray-100 rounded-md transition-colors" style="color: #6E5A30;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFBF40" viewBox="0 0 24 24" class="mr-3">
                                <path d="m10 17 6-5-6-5v4H3v2h7z"></path>
                                <path d="M19 3h-7v2h7v14h-7v2h7c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2"></path>
                            </svg>
                            Log In To TPS
                        </a>

                      <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      function showKTBAlert() {
    Swal.fire({
        icon: 'info',
        title: 'Info',
        text: 'Halo! Kamu sudah terdaftar di sebuah KTB'
    });
    // Tutup modal setelah SweetAlert muncul
    toggleMobileMenu();
}

function showSoon(){
    Swal.fire({
        icon: 'info',
        title: 'Soon',
        text: 'Fitur ini sedang dalam pengembangan',
    });
    // Tutup modal setelah SweetAlert muncul
    toggleMobileMenu();
}

// Check if elements exist before adding event listeners
function addEventListenerSafe(elementId, eventType, handler) {
    const element = document.getElementById(elementId);
    if (element) {
        element.addEventListener(eventType, handler);
        console.log(`Event listener added to ${elementId}`);
    } else {
        console.warn(`Element with ID '${elementId}' not found`);
    }
}

// Desktop buttons (untuk user yang sudah login)
addEventListenerSafe('btnKTB', 'click', function(event) {
    event.preventDefault();
    console.log('btnKTB clicked');
    Swal.fire({
        icon: 'info',
        title: 'Info',
        text: 'Halo, <?php echo isset($nama['nama']) ? $nama['nama'] : 'User'; ?>! Kamu sudah terdaftar di sebuah KTB',
    });
});

addEventListenerSafe('btnBiodata', 'click', function(event) {
    event.preventDefault();
    console.log('btnBiodata clicked');
    Swal.fire({
        icon: 'info',
        title: 'Soon',
        text: 'Halo, <?php echo isset($nama['nama']) ? $nama['nama'] : 'User'; ?>! Fitur ini sedang dalam pengembangan',
    });
});

// Mobile modal functionality
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileModal = document.getElementById('mobile-modal');
const closeModal = document.getElementById('close-modal');
const modalBackdrop = document.getElementById('modal-backdrop');
const hamburgerIcon = document.getElementById('hamburger-icon');
const closeIcon = document.getElementById('close-icon');

console.log('Modal elements:', {
    mobileMenuButton: !!mobileMenuButton,
    mobileModal: !!mobileModal,
    closeModal: !!closeModal,
    modalBackdrop: !!modalBackdrop,
    hamburgerIcon: !!hamburgerIcon,
    closeIcon: !!closeIcon
});

function toggleMobileMenu() {
    if (!mobileModal) {
        console.error('Mobile modal not found');
        return;
    }
    
    const isHidden = mobileModal.classList.contains('hidden');
    console.log('Toggling mobile menu, currently hidden:', isHidden);
    
    if (isHidden) {
        // Show modal
        mobileModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        if (hamburgerIcon && closeIcon) {
            hamburgerIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        }
        console.log('Modal shown');
    } else {
        // Hide modal
        mobileModal.classList.add('hidden');
        document.body.style.overflow = '';
        
        if (hamburgerIcon && closeIcon) {
            hamburgerIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
        console.log('Modal hidden');
    }
}

// Event listeners
if (mobileMenuButton) {
    mobileMenuButton.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Mobile menu button clicked');
        toggleMobileMenu();
    });
} else {
    console.error('Mobile menu button not found!');
}

if (closeModal) {
    closeModal.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Close modal button clicked');
        toggleMobileMenu();
    });
}

// Close modal when clicking backdrop
if (modalBackdrop) {
    modalBackdrop.addEventListener('click', function(e) {
        console.log('Modal backdrop clicked');
        toggleMobileMenu();
    });
}

// Alternative: Close modal when clicking the modal itself (not just backdrop)
if (mobileModal) {
    mobileModal.addEventListener('click', function(e) {
        // Only close if clicking the modal background, not the content
        if (e.target === mobileModal || e.target.classList.contains('bg-black')) {
            console.log('Modal background clicked');
            toggleMobileMenu();
        }
    });
}

// Close mobile modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && mobileModal && !mobileModal.classList.contains('hidden')) {
        console.log('ESC key pressed, closing modal');
        toggleMobileMenu();
    }
});

// Add click handlers for anchor links in mobile menu (untuk user yang belum login)
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, setting up mobile menu links');
    
    // Get all anchor links in mobile modal
    const modalLinks = document.querySelectorAll('#mobile-modal a[href^="#"]');
    
    modalLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            console.log('Modal link clicked:', this.textContent.trim());
            
            // Untuk link yang menuju ke section di halaman yang sama
            const href = this.getAttribute('href');
            if (href && href.startsWith('#') && href !== '#') {
                // Biarkan default behavior untuk scroll ke section
                // Tapi tetap tutup modal
                setTimeout(function() {
                    toggleMobileMenu();
                }, 100); // Delay sedikit untuk smooth scroll
            }
        });
    });
    
    // Khusus untuk link "Log In To TPS" jika menuju ke login.php
    const loginLinks = document.querySelectorAll('#mobile-modal a[href="http://tps.petra.ac.id/main/login.php"], #mobile-modal a[href*="login"]');
    loginLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            console.log('Login link clicked');
            // Modal akan tertutup otomatis karena navigasi ke halaman baru
        });
    });
});

// Debug function - call this in console to test
function debugModal() {
    console.log('Modal debug info:');
    console.log('Modal exists:', !!mobileModal);
    console.log('Modal is hidden:', mobileModal ? mobileModal.classList.contains('hidden') : 'N/A');
    console.log('Button exists:', !!mobileMenuButton);
    console.log('Close button exists:', !!closeModal);
    console.log('Backdrop exists:', !!modalBackdrop);
}

// Make debug function available globally
window.debugModal = debugModal;
    </script>
    