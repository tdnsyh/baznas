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
    <title>Kategori</title>
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

    <div class="container mt-3">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <div class="col-6">
                <div class="card bg-light border-1 shadow-sm">
                    <div class="card-body">
                        <div class="text-center fw-semibold mb-4">
                            <h3>Tambah Kategori</h3>
                        </div>
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

    <div class="container mt-5">
        <h3>Daftar Kategori</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Tahun</th>
                        <th>Target</th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <?php
                        $result = $conn->query("SELECT * FROM kategori");
                        $no = 1;
                        while ($row = $result -> fetch_assoc()){
                            echo"<tr>
                            <td>{$no}</td>
                            <td>{$nama_kategori}</td>
                            <td>{$tahun}</td>
                            <td>{$target}</td>
                            </tr>";
                            $no++;
                        }
                    ?>
                </tbody> -->
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>