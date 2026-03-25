<?php
session_start();
include 'db_connect.php';

//hard codded login cradancials
$admin_user = 'admin';
$admin_pass = 'password123';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if ($_POST['username'] === $admin_user && $_POST['password'] === $admin_pass) {
        $_SESSION['admin'] = true;
    } else {
        $error = "Invalid credentials!";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// --- Handle Event Update ---
if (isset($_POST['update_event'])) {
    $stmt = $pdo->prepare("UPDATE events SET title=?, date=?, time=?, venue=?, description=? WHERE id=?");
    $stmt->execute([
        $_POST['title'],
        $_POST['date'],
        $_POST['time'],
        $_POST['venue'],
        $_POST['description'],
        $_POST['event_id']
    ]);
    $msg = "Event updated successfully!";
}

// --- Handle Event Delete ---
if (isset($_GET['delete_event'])) {
    $stmt = $pdo->prepare("DELETE FROM events WHERE id=?");
    $stmt->execute([$_GET['delete_event']]);
    $msg = "Event deleted successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Patel Samaj BC</title>
    <link rel="stylesheet" href="Css/docs.css">
    <script>
        function showTab(tab) {
            document.getElementById('messagesTab').classList.add('hidden');
            document.getElementById('eventsTab').classList.add('hidden');
            document.getElementById(tab).classList.remove('hidden');
        }
    </script>
</head>

<body>
    <nav id="navbar">
        <a class="logo-link" href="index.php">
            <img src="img/Logo.jpg" alt="Logo">
            <span>Patel Samaj BC</span>
        </a>
        <ul>
            <!-- <li><a href="index.php">Back to Home</a></li> -->
            <li><a href="Documentation.php">Documentation</a></li>
            <li><a href="Sources.php">Sources</a></li>
            <?php if (isset($_SESSION['admin'])): ?>
                <li><a href="admin.php?logout=true">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <section class="hero hero-small">
        <div class="hero-content">
            <h1>Admin Panel</h1>
        </div>
    </section>

    <main class="container">
        <?php if (!isset($_SESSION['admin'])): ?>
            <h2 style="text-align:center; margin-bottom:0.5rem;">Admin Login</h2>
            <p style="text-align: center; margin-bottom: 2rem; color: #555;">Authorized personnel only. Please log in to manage events, contact messages, and board information.</p>
            <?php if (!empty($error))
                echo "<p style='color:red;'>$error</p>"; ?>
            <form method="POST" style="display:flex; flex-direction:column; max-width:300px;">
                <label>Username:</label>
                <input type="text" name="username" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <button type="submit" name="login" class="btn-primary">Login</button>
            </form>
        <?php else: ?>
            <?php if (!empty($msg))
                echo "<p style='color:green;'>$msg</p>"; ?>

            <div class="admin-tabs">
                <button onclick="showTab('messagesTab')">Contact Messages</button>
                <button onclick="showTab('eventsTab')">Manage Events</button>
            </div>

            <!-- Contact Messages Tab -->
            <div id="messagesTab">
                <h2>Contact Messages</h2>
                <?php
                $stmt = $pdo->query("SELECT *FROM contact_messages ORDER BY id DESC");
                if ($stmt->rowCount() > 0) {
                    echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        
                    </tr>";
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                        <td>{$row['id']}</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>";

                        $decryptedEmail = openssl_decrypt(
                            $row['email'],
                            'AES-256-CBC',
                            ENCRYPTION_KEY,
                            0,
                            ENCRYPTION_IV
                        );

                        echo "<td>" . htmlspecialchars($decryptedEmail) . "</td>

                        <td>" . nl2br(htmlspecialchars($row['message'])) . "</td>
                        <td>{$row['submitted_at']}</td>
                      </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No messages found.</p>";
                }
                ?>
            </div>

            <!-- Events Management Tab -->
            <div id="eventsTab" class="hidden">
                <h2>Manage Events</h2>
                <?php
                $events = $pdo->query("SELECT id, title, date, time, venue, description FROM events ORDER BY date ASC");
                if ($events->rowCount() > 0) {
                    echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Actions</th>
                    </tr>";
                    while ($event = $events->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                        <td>{$event['id']}</td>
                        <td>" . htmlspecialchars($event['title']) . "</td>
                        <td>{$event['date']}</td>
                        <td>{$event['time']}</td>
                        <td>" . htmlspecialchars($event['venue']) . "</td>
                        <td>
                            <a href='?edit_event={$event['id']}'>Edit</a> | 
                            <a href='?delete_event={$event['id']}' onclick='return confirm(\"Delete this event?\")'>Delete</a>
                        </td>
                      </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No events found.</p>";
                }

                // Event edit form
                if (isset($_GET['edit_event'])) {
                    $id = $_GET['edit_event'];
                    $stmt = $pdo->prepare("SELECT * FROM events WHERE id=?");
                    $stmt->execute([$id]);
                    $event = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($event) {
                        echo "<div class='edit-form'>
                        <h3>Edit Event</h3>
                        <form method='POST'>
                            <input type='hidden' name='event_id' value='{$event['id']}'>
                            <label>Title:</label>
                            <input type='text' name='title' value='" . htmlspecialchars($event['title']) . "' required>
                            <label>Date:</label>
                            <input type='date' name='date' value='{$event['date']}' required>
                            <label>Time:</label>
                            <input type='time' name='time' value='{$event['time']}' required>
                            <label>Venue:</label>
                            <input type='text' name='venue' value='" . htmlspecialchars($event['venue']) . "' required>
                            <label>Description:</label>
                            <textarea name='description' required>" . htmlspecialchars($event['description']) . "</textarea>
                            <button type='submit' name='update_event'>Save Changes</button>
                        </form>
                      </div>";
                    }
                }
                ?>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2025 Patel Brotherhood Canada. All rights reserved.</p>
        <p style="font-size: 0.8rem; opacity: 0.7; margin-top: 15px; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.5; text-align: center;">
            Note: This website is made by Yug Patel for project use only and is not for commercial use. It is not officially affiliated with Patel Samaj Canada, and is created so I do not get issues from Patel Samaj Canada.
        </p>
    </footer>
    <script src="animations.js"></script>
</body>

</html>