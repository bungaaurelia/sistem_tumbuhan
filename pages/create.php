<?php
// Include the database connection and QR code libraries
require_once '../db.php';
require_once '../qrcodes/phpqrcode.php'; // Make sure this path is correct

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_umum = $_POST['nama_umum'];
    $nama_ilmiah = $_POST['nama_ilmiah'];
    $habitat = $_POST['habitat'];
    $deskripsi = $_POST['deskripsi'];

    // Generate filenames based on nama_umum
    $imageFileName = strtolower(str_replace(' ', '_', $nama_umum)) . '.jpg';
    $qrCodeFileName = strtolower(str_replace(' ', '_', $nama_umum)) . '_qrcode.png';

    // Handle image upload
    if ($_FILES['foto']['tmp_name']) {
        // Move uploaded image to the new filename
        move_uploaded_file($_FILES['foto']['tmp_name'], "../images/$imageFileName");
    }

    // Generate QR code
    $qrCodeData = $nama_umum;
    QRcode::png($qrCodeData, "../images/$qrCodeFileName");

    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO tumbuhan (nama_umum, nama_ilmiah, habitat, deskripsi, foto, qr_code) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nama_umum, $nama_ilmiah, $habitat, $deskripsi, $imageFileName, $qrCodeFileName]);

    // Display success message
    echo "<script>alert('Data has been created successfully!'); window.location.href = 'list.php';</script>";
}
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<link rel="stylesheet" href="../assets/css/style_create.css">

<div class="main-content">
    <h1>Create New Tumbuhan</h1>

    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_umum">Nama Umum</label>
                <input type="text" class="form-control" id="nama_umum" name="nama_umum" required>
            </div>
            <div class="form-group">
                <label for="nama_ilmiah">Nama Ilmiah</label>
                <input type="text" class="form-control" id="nama_ilmiah" name="nama_ilmiah" required>
            </div>
            <div class="form-group">
                <label for="habitat">Habitat</label>
                <input type="text" class="form-control" id="habitat" name="habitat" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Image</label>
                <input type="file" class="form-control-file" id="foto" name="foto" required>
            </div><br><br>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <a href="list.php" class="back-button">Back</a>
</div>

<?php include '../includes/footer.php'; ?>