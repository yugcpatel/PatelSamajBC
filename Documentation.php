<?php // Documentation.php
include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation | Patel Samaj BC</title>
    <link rel="icon" href="img/Logo.jpg" type="image/Logo">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="Css/style.css">    -->
    <link rel="stylesheet" href="Css/docs.css">
</head>

<body>
    <nav id="navbar">
        <a class="logo-link" href="index.php">
            <img src="img/Logo.jpg" alt="Logo">
            <span>Patel Samaj BC</span>
        </a>
        <ul>
            <li><a href="Documentation.php" style="color:#00ffcc;">Documentation</a></li>
            <li><a href="Sources.php">Sources</a></li>
            <li><a href="admin.php">Admin</a></li>
            
        </ul>
    </nav>
    <section class="hero">
        <div class="hero-content">
            <h1>Documentation</h1>
        </div>
    </section>
    <main class="container">
        <h2>Website Overview</h2>
        <p>This website is a dynamic PHP-based platform with MySQL database integration. It includes event listings,
            sponsor showcases, and a secure contact form with both client-side and server-side validation.</p>

        <h2>Features</h2>
        <ul>
            <li>Dynamic content fetched from the database (events, sponsors)</li>
            <li>Secure contact form using prepared statements</li>
            <li>Responsive design with Flexbox and Grid</li>
            <li>Animations and transitions for better UX</li>
            <li>Accessible navigation and semantic HTML</li>
        </ul>

        <h2>How to Use</h2>
        <p>Navigate through the website using the top menu. Users can view events and sponsors, and send messages via
            the Contact page. Data is stored securely in the MySQL database.</p>

        <h2>Validation Screenshots</h2>
        <p>Add screenshots of HTML and PHP validation here:</p>
        <p>Html validation</p>
        <img src="img/html_validation1.png" alt="HTML Validation Screenshot" style="max-width:100%;">
        <p>Html validation</p>
        <img src="img/html_validation2.png" alt="HTML Validation Screenshot" style="max-width:100%;">
        <p>Html validation</p>
        <img src="img/html_validation3.png" alt="HTML Validation Screenshot" style="max-width:100%;">
        <p>Php Validation</p>
        <img src="img/php_validation1.png" alt="CSS Validation Screenshot" style="max-width:100%;">
        <p>Php Validation</p>
        <img src="img/php_validation2.png" alt="CSS Validation Screenshot" style="max-width:100%;">

        <h2>Download Database Backup</h2>
        <p>You can download the exported MySQL database used for this website below:</p>
        <a href="patel_samaj.sql" download class="btn-primary">Download Database</a>
        
        <h2>How to Import</h2>
        <ol>
            <li>Open phpMyAdmin and create a new database named <code>PatelSamajDB</code>.</li>
            <li>Click on <strong>Import</strong>, choose the downloaded SQL file, and click <strong>Go</strong>.</li>
            <li>The database will be imported and ready to use with this project.</li>
        </ol>
        
        <h2>Future Enhancements</h2>
        <ul>
            <li>Additional accessibility improvements</li>
        </ul>
    </main>
    <footer>
        <p>&copy; 2025 Patel Brotherhood Canada. All rights reserved.</p>
    </footer>

    <script>
        window.addEventListener("scroll", function () {
            const nav = document.querySelector("nav");
            if (window.scrollY > 50) {
                nav.classList.add("shrink");
            } else {
                nav.classList.remove("shrink");
            }
        });
    </script>

</body>

</html>