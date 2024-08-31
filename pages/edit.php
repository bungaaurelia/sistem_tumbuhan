<?php
// Include the database connection file
require_once '../db.php';
require_once '../qrcodes/phpqrcode.php'; // Make sure this path is correct

// Get plant ID from query parameter
$id = $_GET['id'];

// Fetch existing plant details
try {
    $stmt = $pdo->prepare("SELECT * FROM tumbuhan WHERE id = ?");
    $stmt->execute([$id]);
    $tumbuhan = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tumbuhan) {
        echo "Plant not found.";
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

// Fetch existing plant details
if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM tumbuhan WHERE id = ?");
    $stmt->execute([$id]);
    $plant = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_nama_umum = $_POST['nama_umum'];
    $nama_ilmiah = $_POST['nama_ilmiah'];
    $habitat = $_POST['habitat'];
    $deskripsi = $_POST['deskripsi'];

    // Generate filenames based on new nama_umum
    $new_imageFileName = strtolower(str_replace(' ', '_', $new_nama_umum)) . '.jpg';
    $new_qrCodeFileName = strtolower(str_replace(' ', '_', $new_nama_umum)) . '_qrcode.png';

    // Handle image upload
    if ($_FILES['foto']['tmp_name']) {
        // Move uploaded image to new filename
        move_uploaded_file($_FILES['foto']['tmp_name'], "../images/$new_imageFileName");
    } else {
        // Rename the old image file to the new name if needed
        if ($plant && $new_imageFileName !== $plant['foto']) {
            if (file_exists("../images/{$plant['foto']}")) {
                rename("../images/{$plant['foto']}", "../images/$new_imageFileName");
            }
        }
    }

    // Handle QR code
    if ($new_qrCodeFileName !== $plant['qr_code']) {
        // Rename the old QR code file if it exists
        if (file_exists("../images/{$plant['qr_code']}")) {
            rename("../images/{$plant['qr_code']}", "../images/$new_qrCodeFileName");
        }

        // Generate a new QR code with the updated name
        $qrCodeData = $new_nama_umum;
        QRcode::png($qrCodeData, "../images/$new_qrCodeFileName");
    }

    // Update the database
    $stmt = $pdo->prepare("UPDATE tumbuhan SET nama_umum = ?, nama_ilmiah = ?, habitat = ?, deskripsi = ?, foto = ?, qr_code = ? WHERE id = ?");
    $stmt->execute([$new_nama_umum, $nama_ilmiah, $habitat, $deskripsi, $new_imageFileName, $new_qrCodeFileName, $id]);

    // Display success message
    echo "<script>alert('Data has been updated successfully!'); window.location.href = 'list.php';</script>";
}
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<link rel="stylesheet" href="../assets/css/style_edit.css">

<div class="main-content">
    <h1>Edit Tumbuhan</h1>

    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama_umum">Nama Umum:</label>
            <input type="text" class="form-control" name="nama_umum" id="nama_umum" value="<?= htmlspecialchars($plant['nama_umum'] ?? '') ?>" required>

            <label for="nama_ilmiah">Nama Ilmiah:</label>
            <input type="text" class="form-control" name="nama_ilmiah" id="nama_ilmiah" value="<?= htmlspecialchars($plant['nama_ilmiah'] ?? '') ?>" required>

            <label for="habitat">Habitat:</label>
            <input type="text" class="form-control" name="habitat" id="habitat" value="<?= htmlspecialchars($plant['habitat'] ?? '') ?>" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" required><?= htmlspecialchars($plant['deskripsi'] ?? '') ?></textarea>

            <label for="foto">Foto:</label>
            <input type="file" class="form-control-file" name="foto" id="foto">
            <br><br>
            <button type="submit">Update</button>
        </form>
    </div>
    <a href="list.php" class="back-button">Back</a>
</div>

<?php include '../includes/footer.php'; ?>