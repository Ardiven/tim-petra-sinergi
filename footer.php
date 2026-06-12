<footer class="footer">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
.footer {
    width: 100%;
    background: white;
    color: #6E5A30;
    padding: 60px 0 40px;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.footer-container {
    max-width: 1440px;
    margin: 0 auto;
    padding: 0 45px;
}

.footer-content {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 60px;
    margin-bottom: 40px;
}

.footer-section h3 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 18px;
    color: #6E5A30;
    margin-bottom: 20px;
}

.footer-section p,
.footer-section a {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 1.6;
    color: #6E5A30;
    text-decoration: none;
    display: block;
    margin-bottom: 8px;
}

.footer-section a:hover {
    color: #FF8B00;
    transition: color 0.3s ease;
}

.footer-section .social-footer-links {
    margin-top: 20px;
    display: flex;
    gap: 15px;
}

.footer-section .social-footer-links a {
    display: inline-flex;
    align-items: center;
    padding: 10px 18px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    white-space: nowrap;
    width: fit-content;
    box-sizing: border-box;
}

/* instagram */
.footer-section .social-footer-links a.instagram {
    background: #FF8B00;
    color: white;
    border: none;
}

.footer-section .social-footer-links a.instagram:hover {
    background: #e67a00;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(255, 139, 0, 0.3);
}

/* line */
.footer-section .social-footer-links a.line {
    background: white;
    color: #FF8B00;
    border: 2px solid #FF8B00;
    padding: 8px 16px;
    min-width: 100px;
    text-align: center;
    justify-content: center;
}

.footer-section .social-footer-links a.line:hover {
    background: #FF8B00;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(255, 139, 0, 0.3);
}

.footer-section .social-footer-links a.instagram i {
    font-size: 18px;
    margin-right: 8px;
    display: flex;
    align-items: center;
}

.footer-section .social-footer-links a.line .line-icon {
    width: 18px;
    height: 18px;
    margin-right: 8px;
    object-fit: contain;
    filter: brightness(50%) saturate(100%) invert(45%) sepia(77%) saturate(1945%) hue-rotate(21deg) brightness(101%) contrast(102%);
    transition: filter 0.3s ease;
    flex-shrink: 0;
}

.footer-section .social-footer-links a.line:hover .line-icon {
    filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);
}

.footer-copyright {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 400;
    font-size: 14px;
    text-align: left;
    color: #6E5A30;
}
.timpetrasinergi {
        order: 1;
    }
    .ourteam {
        order: 3;
    }
    .links{
        order: 2;
    }
    .social{
        order: 4;
    }

.footer-copyright .brand {
    font-weight: 700;
}

/* Responsive Footer Design */
@media (max-width: 992px) {
    .footer-content {
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    .timpetrasinergi {
        order: 1;
    }
    .ourteam {
        order: 2;
    }
    .links{
        order: 3;
    }
    .social{
        order: 4;
    }
    
}

/* Mobile Layout - 2x2 Grid */
@media (max-width: 768px) {
    .footer {
        padding: 40px 0 30px;
    }
    
    .footer-container {
        padding: 0 20px;
    }
    
    .footer-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto auto;
        gap: 30px 40px;
        margin-bottom: 30px;
        text-align: left;
    }
    
    /* Top Left - Tim Petra Sinergi */
    
    
    .footer-section .social-footer-links {
        justify-content: flex-start;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .footer-section .social-footer-links a {
        flex-direction: row;
        align-items: center;
        padding: 8px 12px;
        font-size: 12px;
        min-width: auto;
    }
    
    .footer-section .social-footer-links a.instagram i {
        margin-right: 6px;
        margin-bottom: 0;
        font-size: 16px;
    }
    
    .footer-section .social-footer-links a.line .line-icon {
        margin-right: 6px;
        margin-bottom: 0;
        width: 16px;
        height: 16px;
    }
}

@media (max-width: 480px) {
    
    .footer-content {
        gap: 25px 30px;
    }
    
    .footer-section h3 {
        font-size: 16px;
        margin-bottom: 15px;
    }
    
    .footer-section p,
    .footer-section a {
        font-size: 13px;
        margin-bottom: 6px;
    }
    
    .footer-section .social-footer-links {
        gap: 8px;
    }
    
    .footer-section .social-footer-links a {
        padding: 6px 10px;
        font-size: 11px;
    }
}
</style>

<div class="footer-container">
    <div class="footer-content">
        <!-- Section 1: Tim Petra Sinergi -->
        <div class="footer-section timpetrasinergi">
            <h3>Tim Petra Sinergi</h3>
            <p>Gedung S.103-104<br>
            Universitas Kristen Petra<br>
            Surabaya, Indonesia</p>
            <p><strong>Email:</strong> tps@petra.ac.id</p>
        </div>
        
        <!-- Section 2: Our team -->
        
        
        <!-- Section 3: Links -->
        <div class="footer-section links">
            <h3>Links</h3>
            <a href="#home">Home</a>
            <a href="#recruitment">Open Recruitment</a>
            <a href="#kegiatan">Kegiatan</a>
            <a href="#faq">F.A.Q</a>
            <a href="#login">Login to TPS</a>
        </div>

        <div class="footer-section ourteam">
            <h3>Our team</h3>
            <a href="ourteam.php">Community Maintain</a>
            <a href="ourteam.php">Event</a>
            <a href="ourteam.php">Production House</a>
            <a href="ourteam.php">Secretariat</a>
            <a href="ourteam.php">Branding</a>
            <a href="ourteam.php">Event Office</a>
        </div>
        
        <!-- Section 4: Social Media -->
        <div class="footer-section social">
            <h3>Our social media networks</h3>
            <p>Tetap update dengan kami lewat media sosial TPS</p>
            <div class="social-footer-links">
                <a href="https://instagram.com/timpetrasinergi" class="instagram" target="_blank">
                    <i class='bx bxl-instagram'></i>
                    @timpetrasinergi
                </a>
                <a href="https://line.me/R/ti/p/@szg5752d" class="line" target="_blank">
                    <img src="img/line1.png" alt="LINE" class="line-icon">
                    @40a54826
                </a>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p class="footer-copyright">
            © 2025 <span class="brand">Tim Petra Sinergi</span>
        </p>
    </div>
</div>
</footer>