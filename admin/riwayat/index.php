<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../../auth/login.php");
    exit();
}
$user = $_SESSION['user'];

include '../koneksi.php';

$result = mysqli_query($conn, "SELECT donasi.*, Kategori.nama AS kategori_nama 
                              FROM donasi 
                              JOIN kategori ON donasi.kategori_id = Kategori.id");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Donasi - Baznas Kab. Tasikmalaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="b">
    <?php include '../components/navbar.php';?>

    <section class="bg-white">
        <div class="container py-4 py-md-5">
            <h1>Riwayat Donasi</h1>
            <a href="tambah.php" class="btn btn-primary mt-3">Tambah Donasi</a>
            <table class="table mt-3">
                <thead>
                    <tr class="table-dark border-0">
                        <th class="rounded-start">ID</th>
                        <th>Kategori</th>
                        <th>Nominal</th>
                        <th>Penyetor</th>
                        <th>Penerima</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th class="rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['kategori_nama']; ?></td>
                        <td><?= number_format($row['nominal'], 2, ',', '.'); ?></td>
                        <td><?= $row['penyetor']; ?></td>
                        <td><?= $row['penerima']; ?></td>
                        <td>
                            <?php if ($row['gambar']): ?>
                            <img src="uploads/<?= $row['gambar']; ?>" width="50">
                            <?php endif; ?>
                        </td>
                        <td><?= $row['tanggal']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus donasi ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>