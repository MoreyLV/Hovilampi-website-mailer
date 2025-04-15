<?php
session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die('Invalid CSRF token.');
        }

    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';

    $name = htmlspecialchars($_POST['user_name']);
    $surname = htmlspecialchars($_POST['user_surname']);
    $company = htmlspecialchars($_POST['company_name']);
    $email = htmlspecialchars($_POST['email']);
        if (empty($name) || empty($surname) || empty($email)) {
            die('Please fill in all required fields.');
        }
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hovilampirakennuskonsultti@gmail.com';
    $mail->Password = 'gxld sdkg sikl cuad';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    
    $mail->setFrom('hovilampirakennuskonsultti@gmail.com');
    $mail->addAddress(''); // <-- Write your email inside of ''
    $mail->isHTML(true);
    
    $mail->Subject = 'Uusi Palautepyyntö';
    if (empty($company)) {
        $mail->Body = "Sinulla on uusi palautepyyntö $name $surname postitse $email";
    } else {
        $mail->Body = "Sinulla on uusi palautepyyntö $name $surname yrityksestä ($company) sähköpostitse $email";
    }
    $mail->AltBody = "";
    
    if (!$mail->send()) {
        echo 'Error: ' . $mail->ErrorInfo;
    } else {
       header('location: contact.php');
    }
}
    ?>