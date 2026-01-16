<?php
$servername = "localhost";
$username = "root";  // Change for production
$password = "";      // Change for production
$dbname = "sweaters_raincoats";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
