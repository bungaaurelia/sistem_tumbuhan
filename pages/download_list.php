<?php
require_once '../vendor/autoload.php'; // Adjust the path based on your project structure
require_once '../db.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Fetch all plants data
$stmt = $pdo->query("SELECT * FROM tumbuhan");
$plants = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create a new spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set the column headers
$sheet->setCellValue('A1', 'Nama Umum');
$sheet->setCellValue('B1', 'Nama Ilmiah');
$sheet->setCellValue('C1', 'Habitat');
$sheet->setCellValue('D1', 'Deskripsi');

// Populate the data rows
$row = 2;
foreach ($plants as $plant) {
    $sheet->setCellValue('A' . $row, $plant['nama_umum']);
    $sheet->setCellValue('B' . $row, $plant['nama_ilmiah']);
    $sheet->setCellValue('C' . $row, $plant['habitat']);
    $sheet->setCellValue('D' . $row, $plant['deskripsi']);
    $row++;
}

// Generate the Excel file
$writer = new Xlsx($spreadsheet);
$filename = 'daftar_tumbuhan.xlsx';

// Set headers to download the file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
$writer->save('php://output');
exit;
?>
