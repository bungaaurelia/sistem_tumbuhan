<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tumbuhan_db";

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

// Function to get a random tumbuhan
function getRandomTumbuhan() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM tumbuhan ORDER BY RAND() LIMIT 1');
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
