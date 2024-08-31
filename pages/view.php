<?php
// Include the database connection file
require_once '../db.php';  // Adjust the path if necessary

// Get the ID from the URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the record from the database
try {
    $stmt = $pdo->prepare("SELECT * FROM tumbuhan WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $tumbuhan = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<link rel="stylesheet" href="../assets/css/style_view.css">

<div class="main-content">
    
    <div class="download-container">
    <h1>Deskripsi</h1>
        <a href="download_view.php?id=<?php echo $id; ?>" class="download-button"> <i class="fas fa-download"></i></a>
    </div>
    
    <hr>

    <?php if ($tumbuhan): ?>
        <div class="tumbuhan-detail">
            <div class="plant-details">
                <h2><?php echo htmlspecialchars($tumbuhan['nama_umum']); ?></h2>
                <p><strong>Scientific Name:</strong> <?php echo htmlspecialchars($tumbuhan['nama_ilmiah']); ?></p>
                <p><strong>Habitat:</strong> <?php echo htmlspecialchars($tumbuhan['habitat']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($tumbuhan['deskripsi']); ?></p>
                <p><strong>Image:</strong></p>
                <img src="../images/<?php echo htmlspecialchars($tumbuhan['foto']); ?>" alt="Plant Image" class="plant-image">
            </div>
            <div class="qr-code">
                <p><strong>QR Code:</strong></p>
                <img src="../images/<?php echo htmlspecialchars($tumbuhan['qr_code']); ?>" alt="QR Code" class="qr-code-image">
            </div>
        </div>
    <?php else: ?>
        <p>No details found for this tumbuhan.</p>
    <?php endif; ?>


    <a href="list.php" class="back-button">Back</a>
</div>

<?php include '../includes/footer.php'; ?>