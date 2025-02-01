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
    <title>Tambah Kategori</title>
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
                    <h2 class="fw-semibold mb-2">Kategori Divisi</h2>
                    <div class="mt-1">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Tambah</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="">
                                            <div class="mb-3">
                                                <label for="n" class="form-label">Nama Kategori</label>
                                                <input type="text" name="nama_kategori" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Tahun</label>
                                                <input type="number" name="tahun" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Target</label>
                                                <input type="number" name="target" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </form>
                                        <?php
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                $nama_kategori = $_POST['nama_kategori'];
                                $tahun = $_POST ['tahun'];
                                $target = $_POST ['target'];
                                
                                $sql = "INSERT INTO kategori (nama_kategori, target, tahun) VALUES ('$nama_kategori', '$target', '$tahun')";
                                if($conn->query($sql) == true){
                                   header("Location: " . $_SERVER['PHP_SELF']);
                                   exit();
                                } else{
                                    echo '<center><div class="alert alert-danger mt-2">Data Gagal Ditambahkan</div></center>';
                                }
                            }
                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row row-cols-2 row-cols-md-4 g-4 mb-4 mt-1">
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
                                        <option value="1">2020</option>
                                        <option value="2">2021</option>
                                        <option value="3">2022</option>
                                    </select>
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
                                            <th scope="col">Tahun</th>
                                            <th scope="col" class="rounded-end">Target</th>
                                        </tr>
                                    </thead>
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