<?php
$conn = mysqli_connect("localhost", "root", "", "webgis");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>