<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script>
        setTimeout(() => {
        const cssLink = document.querySelector("link[href*='styles.css']");
        if (cssLink) {
            cssLink.href = cssLink.href.split("?")[0] + "?v=" + new Date().getTime();
        }
        }, 500);

        function loadScript(src) {
        const script = document.createElement("script");
        script.src = src;
        script.type = "text/javascript";
        script.async = true;
        document.head.appendChild(script);
    }

    function checkDevice() {
        if (window.matchMedia("(max-width: 767px)").matches) {
            loadScript("script_mobile.js");
        } else {
            loadScript("script.js");
        }
    }
    document.addEventListener("DOMContentLoaded", checkDevice);
    window.addEventListener("resize", checkDevice);
    </script>
</head>
<body class="column">
    <div class="sidemenu column">
        <a href="index.html">Main page</a>
        <a href="references.html">References</a>
        <a href="contact.php" class="current">Information</a>
        <button class="backbtn"><img src="arrowb.svg"></button>
    </div>
    <div class="CThead">
        <h1>Contact</h1>
        <div class="integrator">
                    <div class="octagon">
                        <div class="octagondubler"></div>
                        <img src="bars-solid.png">
                    </div>
            </div>
    </div>
    <div class="CTdata row">
        <div class="CTname animate__animated animate__fadeInLeft wow">
            <h1>M. Hovilampi Consulting Oy</h1>
        </div>
        <div class="CTinfo column animate__animated animate__fadeInRight wow">
            <h3>
                Tuokkostie 2<br> 02710 Espoo<br>
                +358503871655<br>
                3460437-1
            </h3>
            <button class="postsend animate__animated wow">Ota Yhteyttä</button>
        </div>
    </div>
    <div class="quote CTQadjusted">
        <h2>“Kohde valmistui aikataulussa”</h2>
    </div>
    <div class="contact-form column animated">    
        <form id="contactForm" class="form column">
            <h1>Contact Form</h1>
            <a id="close" class="close"><img src="cross.png"></a>
            <div class="row between">
                <input id="name" name="user_name" placeholder="Name" required>
                <div class="form-devider"></div>
                <input id="surname" name="user_surname" placeholder="Surname" required>
            </div>
            <input class="input-com" id="company-name" name="company_name" placeholder="Company Name (optional)">
            <input id="email" name="email" placeholder="Email" required>
            <button type="subbmit" id="sendButton" class="form-button">Send</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
</body>
</html>