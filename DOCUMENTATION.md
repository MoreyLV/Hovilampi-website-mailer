# 📘 Project Technical Documentation

## Project Name: Hovilampi Rakennuskonsultti Web Page
## Version: 1.3
## Author: Leonid Vvedenskii
## Language: HTML, CSS, JavaScript, PHP

### Dependencies:
- PHPMailer (for email sending)
- WOW.js (for animation reveal on scroll)
- jQuery (not bundled, but expected)

---

## 📁 Project Structure

SiteF/
├── index.html                    # Homepage
├── contact.php                  # Contact page with embedded form
├── references.html              # References/testimonials page
├── send_mail.php                # Handles form submission using PHPMailer
├── styles.css                   # Main styles
├── script.js                    # Desktop JS interactions
├── script_mobile.js            # Mobile-specific JS
├── script_mobile_landscape.js  # Landscape-specific JS for mobile
├── wow.min.js                  # WOW.js animation library
├── PHPMailer-master/           # Library for sending emails
│   └── composer.json           # Composer setup for PHPMailer
├── [images/*.png|.svg]         # Various UI and background assets

---

## 📄 HTML Pages

### index.html
- Landing page with scrolling sections, background images, and service info.
- Animations via WOW.js.
- Uses multiple images.

### contact.php
- Contains a form (first name, last name, email, company name).
- Action is send_mail.php.

### references.html
- Displays references.
- Common footer/nav.

---

## 📨 send_mail.php

- Uses PHPMailer to send form data.
- POST fields: `user_name`, `user_surname`, `email`, `company_name`.
- Sanitizes input via htmlspecialchars.
- Sends message to predefined address.

Security:
- CSRF protection.
- Specialchars injection protection.

---

## 🎨 styles.css
- Global styles and responsive layout.
- Mobile adjustments via media queries.

---

## ⚙️ JavaScript

### script.js
- Handles desktop behavior (menu, scroll, animations).

### script_mobile.js / script_mobile_landscape.js
- Targeted behavior for devices.

### wow.min.js
- WOW.js for animation reveal.

---

## 📦 PHPMailer

Inside PHPMailer-master/, included via composer.json.

---

## ✅ Requirements

- PHP 7.0+

