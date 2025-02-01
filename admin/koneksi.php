<?php
$conn = new mysqli("localhost","root","","baznas");
if($conn->connect_error){
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>