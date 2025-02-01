<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../../auth/login.php");
    exit();
}
$user = $_SESSION['user'];

include '../koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM kategori WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: /admin/kategori");
} else {
    echo "Gagal menghapus data!";
}
?>