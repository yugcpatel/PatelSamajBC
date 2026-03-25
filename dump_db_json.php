<?php
include 'db_connect.php';

$stmt = $pdo->query('SELECT id, title, description, image FROM events');
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query('SELECT id, name, details, image FROM sponsors');
$sponsors = $stmt->fetchAll(PDO::FETCH_ASSOC);

file_put_contents('db_dump.json', json_encode(['events' => $events, 'sponsors' => $sponsors], JSON_PRETTY_PRINT));
echo "Done";
?>
