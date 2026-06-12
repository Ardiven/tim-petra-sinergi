<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="Tim Petra Sinergi" content="">
  <link rel='icon' href='images/logo.png' type='images/logo.png' sizes='16x16'>

  <title>HOPES</title>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins');
    @import url('https://fonts.googleapis.com/css?family=Raleway');

    /* BASIC */
    html {
      background: rgb(77, 77, 77);
      background: linear-gradient(180deg, rgba(77, 77, 77, 1) 0%, rgba(87, 186, 237, 1) 100%);
    }
    body {
      font-family: 'Raleway', sans-serif;
      height: 100vh;
      background: rgb(77, 77, 77);
      background: linear-gradient(180deg, rgba(77, 77, 77, 1) 0%, rgba(87, 186, 237, 1) 100%);
    }
    .container {
      background: rgb(77, 77, 77);
      background: linear-gradient(180deg, rgba(77, 77, 77, 1) 0%, rgba(87, 186, 237, 1) 100%);
    }
    a {
      color: #92badd;
      display: inline-block;
      text-decoration: none;
      font-weight: 400;
    }
    h2 {
      text-align: center;
      font-size: 16px;
      font-weight: 600;
      text-transform: uppercase;
      display: inline-block;
      margin: 40px 8px 10px 8px;
      color: #cccccc;
    }

    /* STRUCTURE */
    .wrapper {
      display: flex;
      align-items: center;
      flex-direction: column;
      justify-content: center;
      width: 100%;
      min-height: 100%;
      padding: 20px;
    }
    #formContent {
      -webkit-border-radius: 10px 10px 10px 10px;
      border-radius: 10px 10px 10px 10px;
      background: #fff;
      padding: 30px;
      width: 90%;
      max-width: 450px;
      position: relative;
      padding: 0px;
      -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
      box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
      text-align: center;
      /*backdrop-filter:blur(25px);*/
    }
    #formFooter {
      background-color: #f6f6f6;
      border-top: 1px solid #dce8f1;
      padding: 25px;
      text-align: center;
      -webkit-border-radius: 0 0 10px 10px;
      border-radius: 0 0 10px 10px;
    }

    /* TABS */
    h2.inactive {
      color: #cccccc;
    }
    h2.active {
      color: #0d0d0d;
      border-bottom: 2px solid #5fbae9;
    }

    /* FORM TYPOGRAPHY*/
    .backtohome {
      background-color: #56baed;
      border: none;
      color: white;
      padding: 5px 10px;
      width: 50%;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      text-transform: uppercase;
      font-size: 9px;
      -webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
      box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
      -webkit-border-radius: 5px 5px 5px 5px;
      border-radius: 5px 5px 5px 5px;
      margin: 5px 20px 40px 20px;
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }
    input[type=button],
    input[type=submit],
    input[type=reset] {
      background-color: #56baed;
      border: none;
      color: white;
      padding: 15px 80px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      text-transform: uppercase;
      font-size: 13px;
      -webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
      box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
      -webkit-border-radius: 5px 5px 5px 5px;
      border-radius: 5px 5px 5px 5px;
      margin: 5px 20px 40px 20px;
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }
    input[type=button]:hover,
    input[type=submit]:hover,
    input[type=reset]:hover {
      background-color: #39ace7;
    }
    input[type=button]:active,
    input[type=submit]:active,
    input[type=reset]:active {
      -moz-transform: scale(0.95);
      -webkit-transform: scale(0.95);
      -o-transform: scale(0.95);
      -ms-transform: scale(0.95);
      transform: scale(0.95);
    }
    input[type=text] {
      background-color: #f6f6f6;
      border: none;
      color: #0d0d0d;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 5px;
      width: 85%;
      border: 2px solid #f6f6f6;
      -webkit-transition: all 0.5s ease-in-out;
      -moz-transition: all 0.5s ease-in-out;
      -ms-transition: all 0.5s ease-in-out;
      -o-transition: all 0.5s ease-in-out;
      transition: all 0.5s ease-in-out;
      -webkit-border-radius: 5px 5px 5px 5px;
      border-radius: 5px 5px 5px 5px;
    }
    input[type=password] {
      background-color: #f6f6f6;
      border: none;
      color: #0d0d0d;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 5px;
      width: 85%;
      border: 2px solid #f6f6f6;
      -webkit-transition: all 0.5s ease-in-out;
      -moz-transition: all 0.5s ease-in-out;
      -ms-transition: all 0.5s ease-in-out;
      -o-transition: all 0.5s ease-in-out;
      transition: all 0.5s ease-in-out;
      -webkit-border-radius: 5px 5px 5px 5px;
      border-radius: 5px 5px 5px 5px;
    }
    #jenis {
      background-color: #f6f6f6;
      /*border: none;*/
      color: #0d0d0d;
      /*padding: 15px 32px;*/
      text-align: center;
      text-align-last: center;
      /*text-decoration: none;*/
      display: inline-block;
      font-size: 14px;
      margin: 3px;
      width: 85%;
      border: 1px solid #f6f6f6;
      -webkit-transition: all 0.5s ease-in-out;
      -moz-transition: all 0.5s ease-in-out;
      -ms-transition: all 0.5s ease-in-out;
      -o-transition: all 0.5s ease-in-out;
      transition: all 0.5s ease-in-out;
      -webkit-border-radius: 5px 5px 5px 5px;
      border-radius: 5px 5px 5px 5px;
    }
    .form-control {
      text-align: center;
    }
    input[type=text]:focus {
      background-color: #fff;
      border-bottom: 2px solid #5fbae9;
    }
    input[type=text]:placeholder {
      color: #cccccc;
    }

    /* ANIMATIONS */
    .fadeInDown {   /*Simple CSS3 Fade-in-down Animation*/
      -webkit-animation-name: fadeInDown;
      animation-name: fadeInDown;
      -webkit-animation-duration: 1s;
      animation-duration: 1s;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;
    }
    @-webkit-keyframes fadeInDown {
      0% {
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0);
      }
      100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none;
      }
    }
    @keyframes fadeInDown {
      0% {
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0);
      }
      100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none;
      }
    }

    /* Simple CSS3 Fade-in Animation */
    @-webkit-keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @-moz-keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .fadeIn {
      opacity: 0;
      -webkit-animation: fadeIn ease-in 1;
      -moz-animation: fadeIn ease-in 1;
      animation: fadeIn ease-in 1;

      -webkit-animation-fill-mode: forwards;
      -moz-animation-fill-mode: forwards;
      animation-fill-mode: forwards;

      -webkit-animation-duration: 1s;
      -moz-animation-duration: 1s;
      animation-duration: 1s;
    }
    .fadeIn.first {
      -webkit-animation-delay: 0.4s;
      -moz-animation-delay: 0.4s;
      animation-delay: 0.4s;
    }
    .fadeIn.second {
      -webkit-animation-delay: 0.6s;
      -moz-animation-delay: 0.6s;
      animation-delay: 0.6s;
    }
    .fadeIn.third {
      -webkit-animation-delay: 0.8s;
      -moz-animation-delay: 0.8s;
      animation-delay: 0.8s;
    }
    .fadeIn.fourth {
      -webkit-animation-delay: 1s;
      -moz-animation-delay: 1s;
      animation-delay: 1s;
    }

    .underlineHover:after {     /*Simple CSS3 Fade-in Animation*/
      display: block;
      left: 0;
      bottom: -10px;
      width: 0;
      height: 2px;
      background-color: #56baed;
      content: "";
      transition: width 0.2s;
    }
    .underlineHover:hover {
      color: #0d0d0d;
    }
    .underlineHover:hover:after {
      width: 100%;
    }

    /* OTHERS */
    *:focus {
      outline: none;
    }
    #icon {
      width: 60%;
    }
    * {
      box-sizing: border-box;
    }
  </style>
</head>

<body class="container">
  <div class="wrapper fadeInDown">
    <div id="formContent">

      <!-- Title -->
      <h1 class="active"> WELCOME </h1>

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="assets/img/tps.png" style="width:100px;height:100px;" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="checkLogin.php" method="POST">
        <select name="jenis" class='form-control' id="jenis">

          <option value='Data' selected>Data</option>
   
        </select>
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Masukkan NRP">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Masukkan Password SIM">
        <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
      </form>
   <div id="alertBox" class="alert alert-success alerttop" style="display: none;">
    <strong>Castor 2025 bisa login dan melakukan pendaftaran KTB mulai tanggal 21 Februari 2025</strong>
    </div>
    
    <script>
    document.getElementById("jenis").addEventListener("change", function() {
        let jenis = this.value;
        let alertBox = document.getElementById("alertBox");
    
        if (jenis === "astor") {
            alertBox.style.display = "block"; // Tampilkan alert
        } else {
            alertBox.style.display = "none";  // Sembunyikan alert
        }
    });
    </script>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <?php
        if (isset($_GET['wrong'])) {
          if ($_GET['wrong'] == 1) {
            echo '<p style="color:#db4040;">Password/username yang anda masukkan salah</p>';
          } else {
            $jenis = $_GET['jenis'];
            echo '<p style="color:#db4040;">Anda tidak terdaftar sebagai ' . $jenis . '</p>';
          }
        }
        if (isset($_GET['illegal'])) {
          echo 'Tim Petra Sinergi';
        }
        if (!isset($_GET['illegal']) && !isset($_GET['wrong'])) {
          echo '<a href="http://tps.petra.ac.id/main" style="text-decoration: none; color:black;">Tim Petra Sinergi</a>';
        }
        ?>
        <br>
      </div>
    </div>
  </div>
</body>

<script>
</script>

</html>