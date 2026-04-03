<?php
include '../koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM lokasi");

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

echo json_encode($data);
?>