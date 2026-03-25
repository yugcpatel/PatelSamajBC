<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Patel Samaj of BC</title>
    <link rel="icon" href="img/Logo.jpg" type="image/Logo">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/index.css">
</head>

<body>
    <!-- Navbar -->
    <nav id="navbar">
        <a class="logo-link" href="index.php">
            <img src="img/Logo.jpg" alt="Logo">
            <span>Patel Samaj BC</span>
        </a>
        <input type="checkbox" id="menu-toggle" />
        <label for="menu-toggle" class="menu-toggle">
            <span></span><span></span><span></span>
        </label>
        <ul>
            <li><a href="index.php" style="color: #00ffcc;">Home</a></li>
            <li><a href="board.php">Board</a></li>
            <li><a href="event.php">Events</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
            <li><a href="reachUS.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to PATEL Samaj of BC</h1>
            <h2 class="gujarati-title">પટેલ સમાજ - બ્રિટિશ કોલંબિયા</h2>
            <div class="social-boxes">
                <a class="social-whatsapp" href="https://chat.whatsapp.com/" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" /> WhatsApp
                </a>
                <a class="social-instagram" href="https://www.instagram.com/patel_association_bc/" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" /> Instagram
                </a>
                <a class="social-facebook" href="https://www.facebook.com/groups/5673387866058370" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" /> Facebook
                </a>
                <a class="social-youtube" href="https://www.youtube.com/@PatelSamajBC" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube" /> YouTube
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <h2>Let's Socially Connect with Patel Samaj</h2>
        <!-- <p class="gujarati-text">ચાલો સામાજિક રીતે જોડાઇએ પટેલ સમાજ</p> -->
        <p>We are registered Samaj in British Columbia since 1977<br>
            <!-- <span class="gujarati-text">અમે બ્રિટિશ કોલંબિયામાં 1977 થી સમાજ નોંધાયેલ છે…</span> -->
        </p>

        <ol class="about-list">
            <li><strong>Socialization of Patel / Gujarati Community in British Columbia</strong><br>
                <!-- <span class="gujarati-text">બ્રિટિશ કોલંબિયામાં પટેલ/ગુજરાતી સમુદાયનું સામાજિકરણ</span> -->
            </li>
            <li><strong>Supporting Students and New Immigrants</strong><br>
                <!-- <span class="gujarati-text">વિદ્યાર્થીઓ અને નવા ઇમિગ્રન્ટ્સને સહાય</span> -->
            </li>
            <li><strong>Promoting Gujarati Businesses and Supporting Community with employment
                    opportunities</strong><br>
                <!-- <span class="gujarati-text">ગુજરાતી વ્યવસાયોને પ્રોત્સાહન અને રોજગારની તકો સાથે સમાજને સહાય</span> -->
            </li>
        </ol>
    </section>

    <!-- Sponsors Section -->
    <section class="sponsors">
        <div class="sponsor-text">
            <h2>THANK YOU 2024 SPONSORS</h2>
            <?php
            $stmt = $pdo->query("SELECT name FROM sponsors LIMIT 3");
            while ($row = $stmt->fetch()) {
                echo "<p>" . htmlspecialchars($row['name']) . "</p>";
            }
            ?>
            <a href="sponsors.php">
                <button class="btn-primary">PATEL SAMAJ SPONSOR</button>
            </a>
        </div>
    </section>

    <!-- Membership Section -->
    <section class="membership">
        <h2>BECOME A MEMBER</h2>
        <p>JOIN TODAY!</p>
        <ul>
            <li>Annual Family Membership - $40</li>
            <li>Annual Single Membership - $25</li>
            <li>Annual Student Membership (18 yrs+) - $15</li>
            <li>Annual Senior Membership (65 yrs+) - Free</li>
        </ul>
        <p><strong>Lifetime* Membership:</strong><br> Family Membership - $400</p>
    </section>

    <!-- Gujarati Business Directory Section -->
    <section class="business-directory">
        <p>
            Patel Samaj of B.C. is actively consolidating the information of all Gujarati Businesses in B.C.
            and we are also promoting their businesses for <strong style="color:red;">Free</strong> on our WhatsApp
            group with more than 1500 Gujaratis connected. If you are a Gujarati Business Person and want to be part of
            this
            initiative, please join our WhatsApp group and request to be added. One of our admins will help you!!
        </p>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Patel Brotherhood Canada. All rights reserved.</p>
        <p>
            <a href="index.php">Home</a> |
            <a href="event.php">Events</a> |
            <a href="sponsors.php">Sponsors</a> |
            <a href="PicnicGallery.php">Gallery</a>
        </p>
        <p>
            <a href="https://www.instagram.com/patel_association_bc/" target="_blank">Instagram</a> |
            <a href="https://www.facebook.com/groups/5673387866058370" target="_blank">Facebook</a> |
            <a href="https://www.youtube.com/@PatelSamajBC" target="_blank">YouTube</a>
        </p>
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