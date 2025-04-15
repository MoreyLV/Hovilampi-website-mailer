# Hovilampi Website

Personal website commissioned by Mr. Hovilampi to showcase his professional work

## 🚀 Features

- Responsive layout for desktop and mobile
- Contact form with email delivery (via PHPMailer)
- Smooth scroll and animation effects (WOW.js)
- Modular scripts for mobile and landscape handling

## 📂 Project Structure

/
├── index.html                 # Homepage
├── contact.php               # Contact page with a form
├── references.html           # References/testimonials page
├── send_mail.php             # Sends form data via email
├── styles.css                # Core styling
├── script.js                 # JS for desktop
├── script_mobile.js         # JS for mobile
├── script_mobile_landscape.js # JS for landscape view
├── PHPMailer-master/        # PHPMailer library
└── assets/                   # Images and SVGs

## 📧 Contact Form Setup

The form (`contact.php`) sends data to `send_mail.php`, which uses PHPMailer to send the email.

## 📦 Requirements

- PHP 7.0+

## 🛠 Installation

1. Upload files to your server directory (e.g., `public_html/`)
2. Make sure PHP is enabled
3. Configure SMTP in `send_mail.php` by writing own email to "$mail->addAddress('')";
4. Test the form on the `contact.php` page

## 📄 License

This project is proprietary. No license specified.