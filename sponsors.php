<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsors | Patel Samaj BC</title>
    <link rel="icon" href="img/Logo.jpg" type="image/Logo">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/sponsors.css">
</head>

<body>
    <!-- Navigation -->
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
            <li><a href="index.php">Home</a></li>
            <li><a href="board.php">Board</a></li>
            <li><a href="event.php">Events</a></li>
            <li><a href="sponsors.php" style="color:#00ffcc;">Sponsors</a></li>
            <li><a href="reachUS.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero hero-small">
        <div class="hero-content">
            <h1>Sponsors <br> Patel Samaj BC</h1>
            <h2 class="gujarati-title">પટેલ સમાજ - બ્રિટિશ કોલંબિયા</h2>
            <div class="social-boxes">
                <a class="social-instagram" href="https://www.instagram.com/patel_association_bc/" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" /> Instagram
                </a>
                <a class="social-facebook" href="https://www.facebook.com/groups/5673387866058370" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" /> Facebook
                </a>
                <a class="social-youtube" href="https://www.youtube.com/@PatelSamajBC" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube" /> YouTube
                </a>
                <a class="social-whatsapp" href="https://chat.whatsapp.com/" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" /> WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Why Sponsor Us Section -->
    <section class="why-sponsor" style="max-width: 900px; margin: 3rem auto; padding: 2rem; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; border-bottom: 4px solid var(--primary-color);">
        <h2 style="color: var(--primary-color); margin-bottom: 1rem;">Why Sponsor Patel Samaj BC?</h2>
        <p style="font-size: 1.1rem; line-height: 1.8; color: #555; margin-bottom: 1.5rem;">
            Your generous sponsorship helps us organize meaningful cultural events, support new students and immigrants, and keep the Gujarati community in British Columbia vibrant and connected. In return, your business gains visibility among thousands of our community members.
        </p>
        <a href="reachUS.php" style="display: inline-block; padding: 0.8rem 1.5rem; background: var(--primary-color); color: #fff; border-radius: 6px; text-decoration: none; font-weight: 600;">Become a Sponsor Today</a>
    </section>

    <!-- Sponsors Section -->
    <main class="sponsors-container">
        <?php
        $stmt = $pdo->query("SELECT name, details, image FROM sponsors ORDER BY id ASC");
        if ($stmt->rowCount() > 0) {
            while ($sponsor = $stmt->fetch()) {
                echo "
                <div class='thanks-banner'>
                    <h3>THANKS TO OUR 2025 DONORS</h3>
                </div>
                <div class='sponsor-card'>
                    <div class='sponsor-image'>";
                if (!empty($sponsor['image']) && file_exists("img/" . $sponsor['image'])) {
                    echo "<img src='img/" . htmlspecialchars($sponsor['image']) . "' alt='" . htmlspecialchars($sponsor['name']) . "'>";
                } else {
                    echo "<img src='img/sponsor_placeholder.png' alt='Default Sponsor' style='object-fit: cover;'>";
                }
                echo "</div>
                    <div class='sponsor-details'>
                        <h2>" . htmlspecialchars($sponsor['name']) . "</h2>
                        <p>" . nl2br(htmlspecialchars($sponsor['details'])) . "</p>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<p style='text-align:center;'>No sponsors available at the moment.</p>";
        }
        ?>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Patel Brotherhood Canada. All rights reserved.</p>
        <p>
            <a href="index.php">Home</a> |
            <a href="board.php">Board</a> |
            <a href="event.php">Events</a> |
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