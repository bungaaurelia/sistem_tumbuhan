<?php
// Include the database connection file
include '../db.php';  // Adjust the path if necessary

// Pagination configuration
$recordsPerPage = 10;  // Number of records per page

// Get the current page from the URL, default to 1 if not set
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($current_page - 1) * $recordsPerPage;

// Initialize the search query
$searchQuery = "";
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

// Prepare the SQL query with a search filter
try {
    // Get total number of records
    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM tumbuhan WHERE nama_umum LIKE :search OR nama_ilmiah LIKE :search");
    $countStmt->execute(['search' => '%' . $searchQuery . '%']);
    $totalRecords = $countStmt->fetchColumn();

    // Fetch records for the current page
    if (!empty($searchQuery)) {
        $stmt = $pdo->prepare("SELECT * FROM tumbuhan WHERE nama_umum LIKE :search OR nama_ilmiah LIKE :search LIMIT :start, :limit");
        $stmt->bindValue(':search', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
        $stmt->execute();
    } else {
        $stmt = $pdo->prepare("SELECT * FROM tumbuhan LIMIT :start, :limit");
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
        $stmt->execute();
    }
    $tumbuhanList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Calculate total pages
$totalPages = ceil($totalRecords / $recordsPerPage);
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<link rel="stylesheet" href="../assets/css/style_list.css">

<div class="main-content">

    <!-- Title Above the Table -->
    <h1 class="table-title">Daftar Tumbuhan</h1>

    <!-- Search Form -->
    <form method="GET" action="list.php" class="search-form">
        <input type="text" name="search" placeholder="Search by Nama Umum or Nama Ilmiah..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit">Search</button>
        <a href="list.php" class="show-all-button">Show All</a>
        <div class="download-container">
            <a href="download_list.php" class="download-button"><i class="fas fa-download"></i></a>
        </div>
    </form>


    <!-- Table -->
    <table class="tumbuhan-table">
        <thead>
            <tr>
                <th>Nama Umum</th>
                <th>Nama Ilmiah</th>
                <th>Habitat</th>
                <th>Deskripsi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($tumbuhanList)) {
                foreach ($tumbuhanList as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama_umum']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_ilmiah']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['habitat']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                    echo "<td class='actions'>
                                <a href='view.php?id=" . $row['id'] . "' class='view-button'><i class='fas fa-eye'></i></a>
                                <a href='edit.php?id=" . $row['id'] . "' class='edit-button'><i class='fas fa-pencil'></i></a>
                                <a href='delete.php?id=" . $row['id'] . "' class='delete-button' onclick='return confirm(\"Are you sure?\");'><i class='fas fa-trash'></i></a>
                              </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <a href="?page=1<?php echo !empty($searchQuery) ? '&search=' . urlencode($searchQuery) : ''; ?>" class="page-link">« First</a>
        <a href="?page=<?php echo max(1, $current_page - 1); ?><?php echo !empty($searchQuery) ? '&search=' . urlencode($searchQuery) : ''; ?>" class="page-link">‹ Prev</a>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?><?php echo !empty($searchQuery) ? '&search=' . urlencode($searchQuery) : ''; ?>" class="page-link <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        <a href="?page=<?php echo min($totalPages, $current_page + 1); ?><?php echo !empty($searchQuery) ? '&search=' . urlencode($searchQuery) : ''; ?>" class="page-link">Next ›</a>
        <a href="?page=<?php echo $totalPages; ?><?php echo !empty($searchQuery) ? '&search=' . urlencode($searchQuery) : ''; ?>" class="page-link">Last »</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>