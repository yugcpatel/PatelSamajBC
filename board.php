<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board Members | Patel Samaj BC</title>
    <link rel="icon" href="img/Logo.jpg" type="image/Logo">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/board.css">
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
            <li><a href="board.php" style="color:#00ffcc;">Board</a></li>
            <li><a href="event.php">Events</a></li>
            <li><a href="sponsors.php">Sponsors</a></li>
            <li><a href="reachUS.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Board Members <br> Patel Samaj BC</h1>
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

    <!-- Board Members Section -->
    <section class="board-section">
        <!-- Trustees -->
        <h2>Trustees</h2>
        <table class="board-table">
            <tr>
                <th>Position</th>
                <th>Name</th>
                <th>Contact</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("SELECT position, name, contact FROM board_members WHERE section = 'trustees'");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['position']) . "</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['contact']) . "</td>
                      </tr>";
            }
            ?>
        </table>

        <!-- Executive Team -->
        <h2>Executive Team</h2>
        <table class="board-table">
            <tr>
                <th>Position</th>
                <th>Name</th>
                <th>Contact</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("SELECT position, name, contact FROM board_members WHERE section = 'executive'");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['position']) . "</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['contact']) . "</td>
                      </tr>";
            }
            ?>
        </table>

        <!-- Directors -->
        <h2>Directors</h2>
        <table class="board-table">
            <tr>
                <th>Position</th>
                <th>Name</th>
                <th>Contact</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("SELECT position, name, contact FROM board_members WHERE section = 'directors'");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['position']) . "</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['contact']) . "</td>
                      </tr>";
            }
            ?>
        </table>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Patel Brotherhood Canada. All rights reserved.</p>
        <p>
            <a href="index.php">Home</a> 
            <a href="event.php">Events</a>
            <a href="sponsors.php">Sponsors</a> 
            <a href="PicnicGallery.php">Gallery</a>
        </p>
        <p>
            <a href="https://www.instagram.com/patel_association_bc/" target="_blank">Instagram</a> 
            <a href="https://www.facebook.com/groups/5673387866058370" target="_blank">Facebook</a> 
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