<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sources | Patel Samaj BC</title>
    <link rel="icon" href="img/Logo.jpg" type="image/Logo">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/docs.css">
</head>

<body>
    <nav id="navbar">
        <a class="logo-link" href="index.php">
            <img src="img/Logo.jpg" alt="Logo">
            <span>Patel Samaj BC</span>
        </a>
        <ul>
            <li><a href="Documentation.php">Documentation</a></li>
            <li><a href="Sources.php" style="color:#00ffcc;">Sources</a></li>
            <li><a href="admin.php">Admin</a></li>
           
        </ul>
    </nav>
    <section class="hero">
        <div class="hero-content">
            <h1>Sources & Attributions</h1>
        </div>
    </section>
    <main class="container">
        <h2>Images and Icons</h2>
        <ul>
            <li>Social media icons: <a href="https://www.flaticon.com/" target="_blank">Flaticon</a></li>
            <li>Hero background image: PatelSamajBC (<a href="https://patelbc.com/wp-content/uploads/2024/06/Sardar.jpg" target="_blank">link</a>)</li>
            <li>Logo image: PatelSamajBC (<a href="https://patelbc.com/wp-content/uploads/2022/10/Logo.jpg" target="_blank">link</a>)</li>
        </ul>

        <h2>Text and Other Content</h2>
        <p>All text content was written by Yug Patel or derived from public community information(website).</p>

        <h2>Code References</h2>
        <p>Custom PHP and JavaScript code created by Yug Patel. No external frameworks used (except jQuery).
        </p>
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