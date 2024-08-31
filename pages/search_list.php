<?php
// Include the database connection file
include '../db.php';  // Adjust the path if necessary

// Initialize the search query
$searchQuery = "";
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

// Prepare the SQL query with a search filter
try {
    if (!empty($searchQuery)) {
        $stmt = $pdo->prepare("SELECT * FROM tumbuhan WHERE nama_umum LIKE :search OR nama_ilmiah LIKE :search");
        $stmt->execute(['search' => '%' . $searchQuery . '%']);
    } else {
        $stmt = $pdo->query("SELECT * FROM tumbuhan");
    }
    $tumbuhanList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
