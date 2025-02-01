<?php 
include '../koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM kategori");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori Donasi - Baznas Kab. Tasikmalaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="b">
    <?php include '../components/navbar.php';?>

    <!-- daftar kategori -->
    <section class="bg-white">
        <div class="container py-4 py-md-5">
            <h1 class="fw-semibold">
                Daftar Kategori
            </h1>
            <a href="tambah.php" class="btn btn-primary mt-3">Tambah Kategori</a>
            <div class="table-reponsive mt-3">
                <table class="table">
                    <thead>
                        <tr class="table-dark border-0">
                            <th class="rounded-start">ID</th>
                            <th>Nama</th>
                            <th>Tahun</th>
                            <th>Target</th>
                            <th class="rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['tahun']; ?></td>
                            <td><?= number_format($row['target'], 2, ',', '.'); ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>