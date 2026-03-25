<?php
$host = "localhost";
$dbname = "patel_samaj";
$user = "root"; 
$pass = "";    

//32 characters
$testKey = "82a645babc5cd41c9a2cb4d0d3ba17ad";
//16 characters
$testIV = "acf30ad32b693849";

    
define('ENCRYPTION_KEY', $testKey); // 32 chars for AES-256
define('ENCRYPTION_IV', $testIV); // 16 chars IV



try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>