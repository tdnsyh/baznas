<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../../auth/login.php");
    exit();
}
$user = $_SESSION['user'];

include '../koneksi.php';

$id = $_GET['id'];

$query = "SELECT * FROM donasi WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    $kategori_id = $_POST['kategori_id'];
    $nominal = $_POST['nominal'];
    $penyetor = $_POST['penyetor'];
    $penerima = $_POST['penerima'];
    $tanggal = $_POST['tanggal'];
    $gambarLama = $row['gambar'];

    if ($_FILES['gambar']['name']) {
        $gambarBaru = time() . "_" . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/" . $gambarBaru);

        if ($gambarLama && file_exists("uploads/" . $gambarLama)) {
            unlink("uploads/" . $gambarLama);
        }
    } else {
        $gambarBaru = $gambarLama;
    }

    $query = "UPDATE donasi SET 
                kategori_id='$kategori_id', 
                nominal='$nominal', 
                penyetor='$penyetor', 
                penerima='$penerima', 
                gambar='$gambarBaru', 
                tanggal='$tanggal' 
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: /admin/riwayat");
    } else {
        echo "Gagal mengedit data!";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekapitulasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="b">
    <?php include '../components/navbar.php';?>

    <!-- form edit donasi -->
    <section class="bbg-white">
        <div class="container py-4 py-md-5">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-control">
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                        while ($kat = mysqli_fetch_assoc($kategori)) {
                            $selected = ($kat['id'] == $row['kategori_id']) ? "selected" : "";
                            echo "<option value='{$kat['id']}' $selected>{$kat['nama']} ({$kat['tahun']})</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nominal</label>
                    <input type="number" name="nominal" class="form-control" value="<?= $row['nominal']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penyetor</label>
                    <input type="text" name="penyetor" class="form-control" value="<?= $row['penyetor']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerima</label>
                    <input type="text" name="penerima" class="form-control" value="<?= $row['penerima']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar</label><br>
                    <?php if ($row['gambar']): ?>
                    <img src="uploads/<?= $row['gambar']; ?>" width="100"><br>
                    <?php endif; ?>
                    <input type="file" name="gambar" class="form-control mt-2">
                    <small>Kosongkan jika tidak ingin mengubah gambar.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="datetime-local" name="tanggal" class="form-control"
                        value="<?= date('Y-m-d\TH:i', strtotime($row['tanggal'])); ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="/admin/riwayat" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>