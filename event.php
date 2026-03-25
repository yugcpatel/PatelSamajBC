<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | Patel Samaj BC</title>
    <link rel="icon" href="img/Logo.jpg" type="image/Logo">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/event.css">
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
            <li><a href="event.php" style="color:#00ffcc;">Events</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
            <li><a href="reachUS.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero hero-small">
        <div class="hero-content">
            <h1>Upcoming Events</h1>
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

    <!-- Why Attend Section -->
    <section class="why-attend" style="max-width: 900px; margin: 3rem auto; padding: 2.5rem; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; border-bottom: 4px solid var(--primary-color);">
        <h2 style="color: var(--primary-color); margin-bottom: 1rem;">Why Attend Our Events?</h2>
        <p style="font-size: 1.1rem; line-height: 1.8; color: #555;">
            Our events are the heart of the Patel Samaj BC community. Whether it's the joy of Navratri, the warmth of the Summer Picnic, or the networking at our Gala dinners, each event is an opportunity to celebrate our culture, make lifelong friends, and stay connected with our roots.
        </p>
    </section>

    <!-- Events Container -->
    <main class="events-container">
        <?php
        $stmt = $pdo->query("SELECT title, date, time, venue, description, image FROM events ORDER BY date ASC");
        if ($stmt->rowCount() > 0) {
            while ($event = $stmt->fetch()) {
                echo "
                <div class='event-card'>
                    <div class='event-details'>
                        <h2>" . htmlspecialchars($event['title']) . "</h2>
                        <p><strong>Date:</strong> " . htmlspecialchars($event['date']) . "</p>
                        <p><strong>Time:</strong> " . htmlspecialchars($event['time']) . "</p>
                        <p><strong>Venue:</strong> " . htmlspecialchars($event['venue']) . "</p>
                        <p>" . nl2br(htmlspecialchars($event['description'])) . "</p>
                    </div>
                    <div class='event-image'>";
                if (!empty($event['image']) && file_exists("img/" . $event['image'])) {
                    echo "<img src='img/" . htmlspecialchars($event['image']) . "' alt='" . htmlspecialchars($event['title']) . "'>";
                } else {
                    echo "<img src='img/event_placeholder.png' alt='Default Event' style='object-fit: cover;'>";
                }
                echo "</div>
                </div>
                ";
            }
        } else {
            echo "<p style='text-align:center;'>No upcoming events found.</p>";
        }
        ?>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Patel Brotherhood Canada. All rights reserved.</p>
        <p>
            <a href="index.php">Home</a> |
            <a href="board.php">Board</a> |
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