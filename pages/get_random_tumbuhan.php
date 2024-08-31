<?php
require_once '../db.php'; // Include the database connection

// Fetch a random tumbuhan
$tumbuhan = getRandomTumbuhan();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($tumbuhan);
?>
