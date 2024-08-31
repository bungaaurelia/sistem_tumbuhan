<?php
require_once '../vendor/autoload.php'; // Autoload mpdf library
require_once '../db.php'; // Database connection

// Get the ID from the URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the record from the database
try {
    $stmt = $pdo->prepare("SELECT * FROM tumbuhan WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $tumbuhan = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tumbuhan) {
        throw new Exception('Plant not found');
    }

    // Create an instance of mpdf
    $mpdf = new \Mpdf\Mpdf();

    // Start building the HTML content for the PDF
    $html = '<h1>' . htmlspecialchars($tumbuhan['nama_umum']) . '</h1>';
    $html .= '<p><strong>Scientific Name:</strong> ' . htmlspecialchars($tumbuhan['nama_ilmiah']) . '</p>';
    $html .= '<p><strong>Habitat:</strong> ' . htmlspecialchars($tumbuhan['habitat']) . '</p>';
    $html .= '<p><strong>Description:</strong> ' . htmlspecialchars($tumbuhan['deskripsi']) . '</p>';
    
    // Include QR Code if available
    if (!empty($tumbuhan['qr_code'])) {
        $qrCodePath = '../images/' . htmlspecialchars($tumbuhan['qr_code']);
        $html .= '<p><strong>QR Code:</strong></p>';
        $html .= '<img src="' . $qrCodePath . '" alt="QR Code" style="width: 150px; height: 150px;">';
    }

    // Include image if available
    if (!empty($tumbuhan['foto'])) {
        $imagePath = '../images/' . htmlspecialchars($tumbuhan['foto']);
        $html .= '<p><strong>Image:</strong></p>';
        $html .= '<img src="' . $imagePath . '" alt="Plant Image" style="width: 400px; height: auto;">';
    }

    // Write the HTML content to the PDF
    $mpdf->WriteHTML($html);

    // Generate the filename using "nama_umum"
    $fileName = htmlspecialchars($tumbuhan['nama_umum']) . ' Details.pdf';

    // Output the PDF with the generated filename
    $mpdf->Output($fileName, 'D'); // 'D' forces download

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>
