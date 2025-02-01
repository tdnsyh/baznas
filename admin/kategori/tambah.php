<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../../auth/login.php");
    exit();
}
$user = $_SESSION['user'];

include '../koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    $target = $_POST['target'];

    $query = "INSERT INTO kategori (nama, tahun, target) VALUES ('$nama', '$tahun', '$target')";
    if (mysqli_query($conn, $query)) {
        header("Location: /admin/kategori");
    } else {
        echo "Gagal menambahkan data!";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kategori - Baznas Kab. Tasikmalaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="b">
    <?php include '../components/navbar.php';?>

    <!-- form tambah kategori -->
    <section class="bg-shit">
        <div class="container py-4 py-md-5">
            <h1>Tambah Kategori</h1>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Target</label>
                    <input type="number" name="target" class="form-control" step="0.01" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <a href="/admin/kategori" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>