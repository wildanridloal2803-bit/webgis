<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $lat = $_POST['latitude'];
    $lng = $_POST['longitude'];

    mysqli_query($conn, "INSERT INTO lokasi 
    (nama_perumahan, alamat, harga, status, latitude, longitude)
    VALUES ('$nama','$alamat','$harga','$status','$lat','$lng')");

    header("Location: ../index.php");
}
?>

<form method="POST">
    Nama: <input type="text" name="nama"><br>
    Alamat: <input type="text" name="alamat"><br>
    Harga: <input type="text" name="harga"><br>
    Status: 
    <select name="status">
        <option>Tersedia</option>
        <option>Terjual</option>
    </select><br>
    Latitude: <input type="text" name="latitude"><br>
    Longitude: <input type="text" name="longitude"><br>
    <button name="submit">Simpan</button>
</form>

<?php include '../koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Lokasi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <style>
        #map {
            height: 400px;
        }
    </style>
</head>
<body>

<div class="container mt-4">

<h3>Tambah Lokasi Perumahan</h3>

<form method="POST">

    <div class="mb-2">
        Nama:
        <input type="text" name="nama" class="form-control">
    </div>

    <div class="mb-2">
        Alamat:
        <input type="text" name="alamat" class="form-control">
    </div>

    <div class="mb-2">
        Harga:
        <input type="text" name="harga" class="form-control">
    </div>

    <div class="mb-2">
        Status:
        <select name="status" class="form-control">
            <option>Tersedia</option>
            <option>Terjual</option>
        </select>
    </div>

    <div class="mb-2">
        Latitude:
        <input type="text" id="lat" name="latitude" class="form-control" readonly>
    </div>

    <div class="mb-2">
        Longitude:
        <input type="text" id="lng" name="longitude" class="form-control" readonly>
    </div>

    <button name="submit" class="btn btn-primary">Simpan</button>
</form>

<hr>

<h5>Klik Peta untuk Ambil Koordinat</h5>
<div id="map"></div>

</div>


<!-- Leaflet JS -->


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>



<script>
// Inisialisasi map
var map = L.map('map').setView([-6.9, 107.6], 10);

// Tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'OpenStreetMap'
}).addTo(map);

var marker;

// Event klik peta
map.on('click', function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;

    // Tampilkan marker
    if (marker) {
        map.removeLayer(marker);
    }

    marker = L.marker([lat, lng]).addTo(map);

    // Isi ke input form
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
});
</script>


</body>
</html>