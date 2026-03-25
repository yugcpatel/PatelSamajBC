<?php
include 'db_connect.php';

echo "=== EVENTS ===\n";
$stmt = $pdo->query('SELECT id, title, description, image FROM events');
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));

echo "\n=== SPONSORS ===\n";
$stmt = $pdo->query('SELECT id, name, details, image FROM sponsors');
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
