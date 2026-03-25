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
        <p>We are a registered Samaj in British Columbia since 1977</p>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h3>Community Connection</h3>
                <p>Connecting the Patel and Gujarati Community across British Columbia through active socialization and vibrant cultural events.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎓</div>
                <h3>Student Support</h3>
                <p>Providing dedicated guidance, resources, and essential support for newly arrived students and immigrants settling in BC.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💼</div>
                <h3>Business Network</h3>
                <p>Actively promoting Gujarati businesses and uniting community members with valuable employment and networking opportunities.</p>
            </div>
        </div>
    </section>

    <!-- Events Highlight Section -->
    <section class="events-highlight">
        <h2>Upcoming & Recent Activities</h2>
        <p>Join us at our next gathering to celebrate our vibrant culture and community spirit.</p>
        <div class="events-preview-wrapper">
            <div class="event-preview">
                <h3>Annual Summer Picnic</h3>
                <p>A fun-filled day with traditional food, games, and networking for the whole family to enjoy together.</p>
            </div>
            <div class="event-preview">
                <h3>Navratri Mahotsav</h3>
                <p>Celebrate the auspicious festival of nine nights with authentic Garba, Dandiya, and live music.</p>
            </div>
            <div class="event-preview">
                <h3>Diwali Gala Dinner</h3>
                <p>Come together to celebrate the festival of lights with an exquisite dinner and cultural performances.</p>
            </div>
        </div>
        <a href="event.php" style="margin-top: 2rem; display: inline-block;" class="btn-primary">View All Events</a>
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
        <p style="font-size: 0.8rem; opacity: 0.7; margin-top: 15px; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.5;">
            Note: This website is made by Yug Patel for project use only and is not for commercial use. It is not officially affiliated with Patel Samaj Canada, and is created so I do not get issues from Patel Samaj Canada.
        </p>
    </footer>
    <script src="animations.js"></script>
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