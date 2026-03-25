<?php
include 'db_connect.php';

$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$successMsg = $errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Server-side validation
    if (empty($name)) {
        $nameErr = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and spaces allowed";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (empty($message)) {
        $messageErr = "Message cannot be empty";
    }

    // Insert if no errors
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        try {
            
            $encryptedEmail = openssl_encrypt(
                $email,
                'AES-256-CBC',
                ENCRYPTION_KEY,
                0,
                ENCRYPTION_IV
            );

            $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $encryptedEmail, $message]);
            
            $successMsg = "Thank you! Your message has been sent successfully.";
            $name = $email = $message = ""; // Clear fields
        } catch (Exception $e) {
            $errorMsg = "Something went wrong. Please try again later.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Patel Samaj BC</title>
    <link rel="icon" href="img/Logo.jpg" type="image/Logo">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/reachUS.css">
    <script>
        function validateForm() {
            let name = document.getElementById("name");
            let email = document.getElementById("email");
            let message = document.getElementById("message");

            let valid = true;

            // Clear previous errors
            document.querySelectorAll(".error").forEach(el => el.textContent = "");

            if (name.value.trim() === "" || !/^[a-zA-Z ]+$/.test(name.value.trim())) {
                document.getElementById("nameErr").textContent = "Please enter a valid name (letters only).";
                valid = false;
            }
            if (email.value.trim() === "" || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
                document.getElementById("emailErr").textContent = "Please enter a valid email.";
                valid = false;
            }
            if (message.value.trim() === "") {
                document.getElementById("messageErr").textContent = "Message cannot be empty.";
                valid = false;
            }
            return valid;
        }

        window.addEventListener("scroll", function () {
            const nav = document.querySelector("nav");
            if (window.scrollY > 50) {
                nav.classList.add("shrink");
            } else {
                nav.classList.remove("shrink");
            }
        });
    </script>

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
            <li><a href="sponsors.php">Sponsors</a></li>
            <li><a href="reachUS.php" style="color:#00ffcc;">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero hero-small">
        <div class="hero-content">
            <h1>Contact Form <br> Patel Samaj BC</h1>
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

    <!-- FAQ Section -->
    <section class="faq-section" style="max-width: 800px; margin: 3rem auto; padding: 2.5rem; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 4px solid var(--primary-color);">
        <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">Frequently Asked Questions</h2>
        <div style="margin-bottom: 1.5rem;">
            <h3 style="font-size: 1.15rem; color: #333; margin-bottom: 0.5rem;">How do I become a member?</h3>
            <p style="color: #666; font-size: 1rem; line-height: 1.6;">You can sign up online or reach out via this contact form indicating your interest in joining the Samaj.</p>
        </div>
        <div style="margin-bottom: 1.5rem;">
            <h3 style="font-size: 1.15rem; color: #333; margin-bottom: 0.5rem;">Can I volunteer at events?</h3>
            <p style="color: #666; font-size: 1rem; line-height: 1.6;">Yes absolutely! We always welcome active community members to help out with our annual events.</p>
        </div>
        <div>
            <h3 style="font-size: 1.15rem; color: #333; margin-bottom: 0.5rem;">How can I sponsor an event?</h3>
            <p style="color: #666; font-size: 1rem; line-height: 1.6;">Check out our Sponsors page or send us a message below detailing your business and sponsorship interest.</p>
        </div>
    </section>

    <!-- Contact Form -->
    <main class="contact-container">
        <h2>Get in Touch</h2>

        <?php if (!empty($successMsg))
            echo "<p class='success'>$successMsg</p>"; ?>
        <?php if (!empty($errorMsg))
            echo "<p class='error'>$errorMsg</p>"; ?>

        <form id="contactForm" name="contactForm" method="POST" onsubmit="return validateForm();" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="First Last"
                value="<?php echo htmlspecialchars($name); ?>" required>
            <span class="error"><?php echo $nameErr; ?></span>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="abc@xyz.com"
                value="<?php echo htmlspecialchars($email); ?>" required>
            <span class="error"><?php echo $emailErr; ?></span>

            <label for="message">Message:</label>
            <textarea name="message" id="message"
                placeholder="Write your message here..." required ><?php echo htmlspecialchars($message); ?></textarea>
            <span class="error"><?php echo $messageErr; ?></span>

            <button type="submit" class="btn-primary">Send Message</button>
        </form>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Patel Brotherhood Canada. All rights reserved.</p>
        <p>
            <a href="index.php">Home</a> |
            <a href="board.php">Board</a> |
            <a href="event.php">Events</a> |
            <a href="sponsors.php">Sponsors</a>
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
</body>

</html>