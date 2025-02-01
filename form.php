<?php 
$conn = new mysqli("localhost","root","","baznas");
if($conn->connect_error){
    die("Koneksi Gagal: " . $conn->connect_error);
}
 ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-light shadow-sm py-3 mb-4">
            <div class="container">
                <img src="assets/img/image/baznas.png" style="max-width:40px">
                <a class="navbar-brand fw-bold ms-2" href="#">BAZNAS Kabupaten Tasikmalaya</a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Rekapitulasi.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form.html">Divisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form.html">Transaksi</a>
                        </li>
                        <div class="class-btn ms-4">
                            <button type="submit" class="btn btn-success">Logout</button>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- history -->
    <section class="history">
        <div class="container">
            <div class="card mt-10">
                <div class="card-body bg-light shadow-sm">
                    <h2 class="fw-semibold mb-2">History Transaksi Donasi</h2>
                    <div class="mt-1">
                    
                        <a href="divisi.html" class="btn btn-success mb-4">Tambah</a>
                    </div>
                    <div class="row row-cols-2 row-cols-md-4 g-4 mb-4">
                        <div class="col">
                            <div class="card border-0">
                                <div class="card-body">
                                    <label for="exampleFormControlInput1" class="form-label">Divisi</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <option value="1">Keuangan</option>
                                        <option value="2">Pendidikan & Dakwah</option>
                                        <option value="3">Retail</option>
                                        <option value="3">Digital</option>
                                        <option value="3">Community</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0">
                                <div class="card-body">
                                    <label for="exampleFormControlInput1" class="form-label">Waktu</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <option value="1">Hari</option>
                                        <option value="2">Bulan</option>
                                        <option value="3">Tahun</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0">
                                <div class="card-body">
                                    <label for="exampleFormControlInput1" class="form-label">Penyetor</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-dark border-0">
                                        <tr>
                                            <th scope="col" class="rounded-start">No</th>
                                            <th scope="col">Divisi</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Penyetor</th>
                                            <th scope="col" class="rounded-end">Penerima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>