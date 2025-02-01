<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit();
}
$user = $_SESSION['user'];

include 'koneksi.php';

$queryTahun = "SELECT DISTINCT tahun FROM kategori ORDER BY tahun DESC";
$resultTahun = mysqli_query($conn, $queryTahun);

$tahunSekarang = date('Y');
$tahunDipilih = isset($_GET['tahun']) ? $_GET['tahun'] : $tahunSekarang;

$queryTotal = "SELECT SUM(donasi.nominal) AS total_tercapai 
               FROM donasi 
               JOIN kategori ON donasi.kategori_id = Kategori.id
               WHERE kategori.tahun = $tahunDipilih";
$resultTotal = mysqli_query($conn, $queryTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);
$totalTercapai = $rowTotal['total_tercapai'] ?? 0;

$queryTarget = "SELECT SUM(target) AS total_target FROM kategori WHERE tahun = $tahunDipilih";
$resultTarget = mysqli_query($conn, $queryTarget);
$rowTarget = mysqli_fetch_assoc($resultTarget);
$totalTarget = $rowTarget['total_target'] ?? 0;

$kurangTotal = max(0, $totalTarget - $totalTercapai);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekapitulasi Donasi - Baznas Kab. Tasikmalaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="b">
    <?php include 'components/navbar.php';?>

    <!-- rekapitulasi donasi -->
    <section class="bg-white">
        <div class="container py-4 py-md-5">
            <h1 class="fw-semibold mb-3">Rekapitulasi perhitungan donasi</h1>
            <form method="GET" class="mb-3">
                <label for="tahun" class="form-label">Pilih Tahun:</label>
                <select name="tahun" id="tahun" class="form-select" onchange="this.form.submit()">
                    <?php while ($rowTahun = mysqli_fetch_assoc($resultTahun)): ?>
                    <option value="<?= $rowTahun['tahun']; ?>"
                        <?= ($rowTahun['tahun'] == $tahunDipilih) ? 'selected' : ''; ?>>
                        <?= $rowTahun['tahun']; ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </form>

            <div class="card bg-light border-0 border-3 border-bottom border-success mb-4">
                <div class="card-body">
                    <p class="card-title">Tercapai</p>
                    <h3 class="fw-bold">Rp. <?= number_format($totalTercapai, 0, ',', '.') ?>,-</h3>
                    <p class="card-title">Target : <strong>Rp.
                            <?= number_format($totalTarget, 0, ',', '.') ?>,-</strong></p>
                    <p class="card-title text-danger">Kurang : <strong>Rp.
                            <?= number_format($kurangTotal, 0, ',', '.') ?>,-</strong></p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $queryKategori = "
                    SELECT kategori.id, kategori.nama, kategori.target, 
                        COALESCE(SUM(donasi.nominal), 0) AS total_donasi
                    FROM kategori
                    LEFT JOIN donasi ON kategori.id = donasi.kategori_id
                    WHERE kategori.tahun = $tahunDipilih
                    GROUP BY kategori.id
                ";
                $resultKategori = mysqli_query($conn, $queryKategori);

                while ($row = mysqli_fetch_assoc($resultKategori)) {
                    $kurangKategori = max(0, $row['target'] - $row['total_donasi']);
                ?>
                <div class="col">
                    <div class="card bg-light border-0 border-3 border-bottom border-success">
                        <div class="card-body">
                            <p class="card-title"><?= $row['nama']; ?></p>
                            <h3 class="fw-bold">Rp. <?= number_format($row['total_donasi'], 0, ',', '.') ?>,-</h3>
                            <p class="card-title">Target : <strong>Rp.
                                    <?= number_format($row['target'], 0, ',', '.') ?>,-</strong></p>
                            <p class="card-title text-danger">Kurang : <strong>Rp.
                                    <?= number_format($kurangKategori, 0, ',', '.') ?>,-</strong></p>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>