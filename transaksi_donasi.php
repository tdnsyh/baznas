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
    <title>Transaksi Donasi</title>
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
                            <a class="nav-link active" aria-current="page" href="form.html">History</a>
                        </li>
                        <div class="class-btn ms-4">
                            <button type="submit" class="btn btn-success">Logout</button>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        <div class="container">
            <div class="card mt-10">
                <div class="card-body bg-light shadow-sm">
                    <h2 class="fw-semibold mb-2">Transaksi Donasi</h2>
                    <div class="mt-1"></div>
                    <form class="row g-3">
                        <div class="col-md-6 mt-4">
                            <label for="inputEmail4" class="form-label">Penyetor</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="inputEmail4" class="form-label">Penerima</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Nominal</label>
                            <input type="number" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer04" class="form-label">Divisi</label>
                            <select class="form-select" required>
                                <option selected disabled value="">Pilih . . </option>
                                <option>Keuangan</option>
                                <option>Keuangan</option>
                                <option>Keuangan</option>
                                <option>Keuangan</option>
                                <option>Keuangan</option>
                                <option>Keuangan</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="submit" class="btn btn-danger">Batal</button>
                        </div>
                    </form>

                     <?php
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                $kategori_id = $_POST['kategori_id'];
                                $nominal= $_POST ['nominal'];
                                $penyetor = $_POST ['penyetor'];
                                $penerima = $_POST ['penerima'];
                                $tgl_setor = $_POST ['tgl_setor'];
                                
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
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>