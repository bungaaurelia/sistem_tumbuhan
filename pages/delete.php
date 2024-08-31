<?php
// Include the database connection file
require_once '../db.php';

// Get the ID from the URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the record from the database
try {
    $stmt = $pdo->prepare("SELECT foto, qr_code FROM tumbuhan WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $tumbuhan = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($tumbuhan) {
        // Paths to the image and QR code
        $imageFile = "../images/" . $tumbuhan['foto'];
        $qrCodeFile = "../images/" . $tumbuhan['qr_code'];

        // Delete the image file if it exists
        if (file_exists($imageFile)) {
            unlink($imageFile);
        }

        // Delete the QR code file if it exists
        if (file_exists($qrCodeFile)) {
            unlink($qrCodeFile);
        }

        // Delete the record from the database
        $stmt = $pdo->prepare("DELETE FROM tumbuhan WHERE id = :id");
        $stmt->execute(['id' => $id]);

        // Redirect with a success message
        echo "<script>alert('Data has been deleted successfully!'); window.location.href = 'list.php';</script>";
    } else {
        // If the record doesn't exist, show an error
        echo "<script>alert('Data not found!'); window.location.href = 'list.php';</script>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
