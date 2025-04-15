<?php
// Start the session to use session variables
session_start();

// If the CSRF token doesn't exist in the session, generate a new one
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Basic meta tags for compatibility and responsiveness -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- jQuery library for DOM manipulation and AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="styles.css">

    <!-- Animation library (Animate.css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- WOW.js for scroll animations -->
    <script src="wow.min.js"></script>
    <script>
        // Initialize WOW.js animation
        new WOW().init();
    </script>

    <script>
        // Variable to track if the CSS has been reloaded
        let updated = 0;
        let scriptLoaded = "0";

        // Reload CSS after 500ms to prevent caching (only if a specific script isn't loaded)
        setTimeout(() => {
            const cssLink = document.querySelector("link[href*='styles.css']");
            if (cssLink && updated == 0 && scriptLoaded != "script_mobile_landscape.js" ) {
                cssLink.href = cssLink.href.split("?")[0] + "?v=" + new Date().getTime(); // Append timestamp
                updated = 1
            } else {}
        }, 500);

        // Function to load an external JS file dynamically
        function loadScript(src) {
            const script = document.createElement("script");
            script.src = src;
            script.type = "text/javascript";
            script.async = true;
            document.head.appendChild(script);
        }

        // Detect device type and orientation, load corresponding script and adjust menu
        function checkDevice() {
            if (window.matchMedia("(max-width: 767px) and (orientation: portrait)").matches) {
                loadScript("script_mobile.js");
                $(".sidemenu").css({
                    transform: "translateX(100%)",
                    transition: "transform 0.8s"
                });
            } else if (window.matchMedia("(max-width: 1024px) and (orientation: landscape)").matches) {
                loadScript("script_mobile_landscape.js");
                scriptLoaded = "script_mobile_landscape.js"
                $(".sidemenu").css({
                    transform: "translateX(333.5%)",
                    transition: "transform 0.8s"
                });
            } else if (window.matchMedia("(min-width: 1025px) and (max-width: 1426px) and (orientation: landscape)").matches) {
                loadScript("script_mobile_landscape.js");
                $(".sidemenu").css({
                    transform: "translateX(333.5%)",
                    transition: "transform 0.8s"
                });
            } else if (window.matchMedia("(min-width: 768px) and (max-width: 1426px) and (orientation: portrait)").matches) {
                loadScript("script_mobile.js");
                $(".sidemenu").css({
                    transform: "translateX(100%)",
                    transition: "transform 0.8s"
                });
            } else {
                loadScript("script.js"); // Default desktop script
            }
        }

        // Run device detection when the DOM is loaded
        document.addEventListener("DOMContentLoaded", checkDevice);

        // Also re-check on window resize
        window.addEventListener("resize", checkDevice);

        // Form submit handler
        $(document).ready(function() {
            $("#sendButton").click(function(event) {
                event.preventDefault(); // Prevent form's default submit behavior

                // Gather form data into an object
                var formData = {
                    user_name: $("#name").val(),
                    user_surname: $("#surname").val(),
                    company_name: $("#company-name").val(),
                    email: $("#email").val(),
                    csrf_token: $("input[name='csrf_token']").val()
                };

                // Send the form via AJAX to the backend
                $.ajax({
                    type: "POST",
                    url: "send_mail.php",
                    data: formData,
                    success: function(response) {
                        alert("Message sent successfully!");
                        window.location.href = "contact.php"; // Redirect after success
                    },
                    error: function(xhr, status, error) {
                        alert("Error sending message. Please try again.");
                    }
                });
            })
        });

        // Reload page on orientation change (to reinitialize layout)
        function checkOrientation() {
            if (window.matchMedia("(orientation: portrait)").matches) {
                console.log("Portrait mode");
            } else {
                console.log("Landscape mode");
            }
            window.location.reload(); // Force reload
        }

        window.addEventListener("resize", checkOrientation);
    </script>
</head>

<body class="column">
    <!-- Sidebar menu with navigation -->
    <div class="sidemenu column">
        <a href="index.html">Main page</a>
        <a href="references.html">References</a>
        <a href="contact.php" class="current">Information</a>
        <button class="backbtn"><img src="arrowb.svg"></button>
    </div>

    <!-- Page header -->
    <div class="CThead">
        <h1>Contact</h1>
        <div class="integrator">
            <div class="octagon">
                <div class="octagondubler"></div>
                <img src="bars-solid.png">
            </div>
        </div>
    </div>

    <!-- Contact information section -->
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

    <!-- Empty quote area (probably decorative or dynamic) -->
    <div class="quote CTQadjusted">
    </div>

    <!-- Contact form -->
    <div class="contact-form column animated">    
        <form id="contactForm" class="form column">
            <h1>Contact Form</h1>
            <a id="close" class="close"><img src="cross.png"></a>
            
            <!-- Input fields for name and surname -->
            <div class="row between">
                <input id="name" name="user_name" placeholder="Name" required>
                <div class="form-devider"></div>
                <input id="surname" name="user_surname" placeholder="Surname" required>
            </div>

            <!-- Optional company name field -->
            <input class="input-com" id="company-name" name="company_name" placeholder="Company Name (optional)">

            <!-- Email input -->
            <input id="email" name="email" placeholder="Email" required>

            <!-- Submit button -->
            <button type="subbmit" id="sendButton" class="form-button">Send</button>

            <!-- Hidden CSRF token field -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
</body>
</html>
