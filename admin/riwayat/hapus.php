<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../../auth/login.php");
    exit();
}
$user = $_SESSION['user'];

include '../koneksi.php';

$id = $_GET['id'];

$query = "SELECT gambar FROM donasi WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row['gambar']) {
    $gambarPath = "uploads/" . $row['gambar'];
    if (file_exists($gambarPath)) {
        unlink($gambarPath); 
    }
}

$query = "DELETE FROM donasi WHERE id = $id";
if (mysqli_query($conn, $query)) {
    header("Location: /admin/riwayat");
} else {
    echo "Gagal menghapus data!";
}
?>