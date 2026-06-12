<!-- What We Do Section -->
<section id="whatwedo" class="whatwedo-section-wrapper">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
<style>
.whatwedo-section-wrapper {
    position: relative;
    width: 100%;
    min-height: 200px;
    background: #FCF9EF;
    overflow: hidden;
}

.whatwedo-container {
    position: relative;
    max-width: 1220px;
    margin: 0 auto;
}

.whatwedo-background-block {
    position: absolute;
    width: 60%;
    height: 70%;
    left: -45px;
    top: 0;
    background: #FCF9EF;
    z-index: 1;
}

.whatwedo-content {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 200px;
    z-index: 2;
}

.whatwedo-left {
    flex: 0 0 50%;
    max-width: 600px;
    padding-right: 40px;
}

.whatwedo-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 500;
    font-size: 64px;
    line-height: 1.1;
    color: #FF8B00;
    margin-left: 20px;
    margin-bottom: 40px;
    letter-spacing: 0%;
}

.whatwedo-title .subtitle {
    font-weight: 700;
    color: #FF8B00;
    display: block;
}

.whatwedo-btn {
    display: inline-block;
    width: 300px;
    height: 45px;
    background: #FF8B00;
    border-radius: 8px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-left: 20px;
}

.whatwedo-btn-text {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 20px;
    line-height: 100%;
    text-align: center;
    color: white;
    letter-spacing: 0%;
}

.whatwedo-btn:hover {
    background: #e67a00;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(255, 139, 0, 0.3);
}

.whatwedo-right {
    flex: 1;
    display: flex;
    justify-content: flex-end;
    align-items: stretch; 
    padding-left: 60px;
}

.whatwedo-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: right center;
}



/* Responsive Design */
@media (max-width: 1200px) {
    .whatwedo-right {
        padding-left: 10px;
    }
    .whatwedo-content {
        height: 400px;
    }
    .whatwedo-image {
        width: 500px;
        height: 300px;
    }
    .whatwedo-title, .whatwedo-btn{
        margin: 20px 20px;
    }
    
    .whatwedo-background-block {
        width: 700px;
    }
}

@media (max-width: 992px) {
    .whatwedo-content {
        height: 320px;
    }
    .whatwedo-left {
        padding-right: 0px;
    }
    .subtitle {
        font-size: 48px;
    }
    .whatwedo-title{
        font-size: 32px;

        margin: 10px 40px;
    }
    .whatwedo-btn-text {
        font-size: 16px;
        
    }
    .whatwedo-btn {
        width: 200px;
        height: 35px;
        border-radius: 6px;
        margin: 0px 40px;
    }
    .whatwedo-right, .whatwedo-image {
        height: 280px;
        width: 380px;
    }
    
}

@media (max-width: 768px) {
    .whatwedo-left {
        padding-right: 0px;
    }
    .subtitle {
        font-size: 32px;
    }
    .whatwedo-title{
        font-size: 24px;
        padding: 0px 20px;
        margin: 10px 0px;
    }
    .whatwedo-btn-text {
        font-size: 14px;
        
    }
    .whatwedo-btn {
        width: 180px;
        height: 30px;
        border-radius: 6px;
        margin: 0px 20px;
    }
    .whatwedo-right, .whatwedo-image {
        height: 200px;
        width: 275px;
    }
}

@media (max-width: 480px) {
    .whatwedo-left {
        padding-right: 0px;
    }
    .subtitle {
        font-size: 24px;
    }
    .whatwedo-title{
        font-size: 16px;
        padding: 0px 20px;
        margin: 10px 0px;
    }
    .whatwedo-btn-text {
        font-size: 10px;
        
    }
    .whatwedo-btn {
        width: 124px;
        height: 22px;
        border-radius: 6px;
        margin: 0px 20px;
    }
    .whatwedo-right, .whatwedo-image {
        height: 144px;
        width: 202px;
    }
}
</style>

<div class="whatwedo-container">
    <div class="whatwedo-background-block"></div>
    <div class="whatwedo-content">
        <div class="whatwedo-left">
            <h1 class="whatwedo-title">
                This is<br>
                <span class="subtitle">What We Do</span>
            </h1>
            <a href="ourteam.php" class="whatwedo-btn">
                <span class="whatwedo-btn-text">More About Our Team</span>
            </a>
        </div>
        <div class="whatwedo-right">
            <img src="img/TPS25/what we do.jpg" alt="Tim Petra Sinergi Team" class="whatwedo-image">
        </div>
    </div>
</div>
</section>

