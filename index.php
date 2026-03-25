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
        <h2>Upcoming 2026 Events</h2>
        <p>Join us at our upcoming events to build and unite the Gujarati community!</p>
        <div class="events-preview-wrapper">
            <div class="event-preview">
                <h3>Annual General Meeting</h3>
                <p>January 24th, 2026 at Fleetwood Community Center. Your views and votes matter!</p>
            </div>
            <div class="event-preview">
                <h3>Shri Satyanarayan Puja</h3>
                <p>March 15th, 2026 at The Royal King Banquets Hall. Join us for this divine free event.</p>
            </div>
            <div class="event-preview">
                <h3>Menopause Seminar</h3>
                <p>Summer 2026. An empowering educational seminar on menopause and pelvic physio for all ladies.</p>
            </div>
        </div>
        <a href="event.php" style="margin-top: 2rem; display: inline-block;" class="btn-primary">View Full 2026 Calendar</a>
    </section>

    <!-- Sponsors Section -->
    <section class="sponsors">
        <div class="sponsor-text">
            <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">THANK YOU 2026 SPONSORS</h2>
            <div class="features-grid" style="margin-top: 0; margin-bottom: 2rem; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                <?php
                $stmt = $pdo->query("SELECT name FROM sponsors LIMIT 3");
                while ($row = $stmt->fetch()) {
                    echo "<div class='feature-card' style='padding: 1.5rem; transition: transform 0.3s ease;'><h3 style='margin: 0; font-size: 1.1rem;'>" . htmlspecialchars($row['name']) . "</h3></div>";
                }
                ?>
            </div>
            <a href="sponsors.php" class="btn-primary">View All Sponsors</a>
        </div>
    </section>

    <!-- Membership Section -->
    <section class="membership" style="padding: 2rem; max-width: 900px;">
        <h2 style="color: var(--primary-color); font-size: 1.5rem;">BECOME A MEMBER</h2>
        <p style="margin-bottom: 2rem; font-size: 0.95rem; color: #555;">Join today and be an integral part of our vibrant community!</p>
        
        <div class="features-grid" style="margin-top: 0; gap: 1.5rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
            <div class="feature-card" style="padding: 1.5rem;">
                <div class="feature-icon" style="font-size: 2rem; margin-bottom: 0.5rem;">👨‍👩‍👧‍👦</div>
                <h3 style="color: var(--text-dark); font-size: 1.2rem;">Family</h3>
                <h2 style="font-size: 2rem; margin: 0.5rem 0; color: var(--primary-color);">$40<span style="font-size: 0.9rem; color: #666;">/yr</span></h2>
                <p style="font-size: 0.9rem; color: #666;">Annual Family</p>
            </div>
            <div class="feature-card" style="padding: 1.5rem;">
                <div class="feature-icon" style="font-size: 2rem; margin-bottom: 0.5rem;">👤</div>
                <h3 style="color: var(--text-dark); font-size: 1.2rem;">Single</h3>
                <h2 style="font-size: 2rem; margin: 0.5rem 0; color: var(--primary-color);">$25<span style="font-size: 0.9rem; color: #666;">/yr</span></h2>
                <p style="font-size: 0.9rem; color: #666;">Annual Single</p>
            </div>
            <div class="feature-card" style="padding: 1.5rem;">
                <div class="feature-icon" style="font-size: 2rem; margin-bottom: 0.5rem;">🎓</div>
                <h3 style="color: var(--text-dark); font-size: 1.2rem;">Student</h3>
                <h2 style="font-size: 2rem; margin: 0.5rem 0; color: var(--primary-color);">$15<span style="font-size: 0.9rem; color: #666;">/yr</span></h2>
                <p style="font-size: 0.9rem; color: #666;">Annual Student (18+)</p>
            </div>
            <div class="feature-card" style="padding: 1.5rem; border: 2px solid #ffd700; position: relative;">
                <div style="position: absolute; top: -12px; left: 50%; transform: translateX(-50%); background: #ffd700; color: #000; padding: 2px 10px; border-radius: 10px; font-size: 0.75rem; font-weight: bold;">BEST VALUE</div>
                <div class="feature-icon" style="font-size: 2rem; margin-bottom: 0.5rem;">⭐</div>
                <h3 style="color: var(--text-dark); font-size: 1.2rem;">Lifetime</h3>
                <h2 style="font-size: 2rem; margin: 0.5rem 0; color: #b8860b;">$400<span style="font-size: 0.9rem; color: #666;">/life</span></h2>
                <p style="font-size: 0.9rem; color: #666;">Lifetime Family</p>
            </div>
        </div>
        <p style="margin-top: 1.5rem; color: #777;">*Annual Senior Membership (65 yrs+) is Completely Free !</p>
    </section>

    <!-- Gujarati Business Directory Section -->
    <section class="business-directory" style="background: linear-gradient(135deg, rgba(0,119,204,0.03), rgba(0,255,204,0.03)); border: 1px solid rgba(0,119,204,0.1);">
        <div class="feature-icon" style="margin-bottom: 1rem; font-size: 3.5rem;">📱</div>
        <h2 style="color: var(--primary-color); margin-bottom: 1rem;">Gujarati Business Directory</h2>
        <p style="font-size: 1.1rem; line-height: 1.8; color: #555; max-width: 750px; margin: 0 auto;">
            Patel Samaj of B.C. is actively consolidating the information of all Gujarati Businesses in B.C.
            and we are promoting their businesses for <strong style="color:red;">Free</strong> on our WhatsApp
            group alongside more than 1500 connected Gujaratis!
        </p>
        <p style="margin-top: 1rem; color: #555;">If you are a Gujarati Business Person and want to be part of this initiative, please join our WhatsApp group and request to be added.</p>
        <a href="https://chat.whatsapp.com/" target="_blank" class="btn-primary" style="margin-top: 1.5rem;">Join the WhatsApp Group</a>
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