<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../../auth/login.php");
    exit();
}
$user = $_SESSION['user'];

include '../koneksi.php';

if (isset($_POST['submit'])) {
    $kategori_id = $_POST['kategori_id'];
    $nominal = $_POST['nominal'];
    $penyetor = $_POST['penyetor'];
    $penerima = $_POST['penerima'];
    $tanggal = $_POST['tanggal'];

    $gambar = "";
    if ($_FILES['gambar']['name']) {
        $gambar = time() . "_" . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/" . $gambar);
    }

    $query = "INSERT INTO donasi (kategori_id, nominal, penyetor, penerima, gambar, tanggal) 
              VALUES ('$kategori_id', '$nominal', '$penyetor', '$penerima', '$gambar', '$tanggal')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: /admin/riwayat");
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
    <title>Tambah Donasi - Baznas Kab. Tasikmalaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="b">
    <?php include '../components/navbar.php';?>

    <section class="bg-white">
        <div class="container py-4 py-md-5">
            <h1>Tambah Donasi</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-control">
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                        while ($row = mysqli_fetch_assoc($kategori)) {
                            echo "<option value='{$row['id']}'>{$row['nama']} ({$row['tahun']})</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nominal</label>
                    <input type="number" name="nominal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penyetor</label>
                    <input type="text" name="penyetor" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerima</label>
                    <input type="text" name="penerima" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="datetime-local" name="tanggal" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <a href="/admin/riwayat" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>