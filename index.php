<?php include 'koneksi.php'; ?>
<?php include './pages/layout/header.php'; ?>
<?php include './pages/layout/sidebar.php'; ?>

<div class="col-md-10 p-4">

<h3>Dashboard</h3>

<div class="row">
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
include 'layouts/header.php';
include 'layouts/sidebar.php';
?>

<div class="col-md-10 p-4">

<h3>Dashboard WebGIS PT IPLand</h3>

<!-- STATISTIK -->
<div class="row mb-4">

<div class="col-md-4">
    <div class="card p-3">
        <h6 class="text-muted">Total Perumahan</h6>
        <h3><?= $total; ?></h3>
    </div>
</div>

<div class="col-md-4">
    <div class="card p-3">
        <h6 class="text-success">Tersedia</h6>
        <h3><?= $tersedia; ?></h3>
    </div>
</div>

<div class="col-md-4">
    <div class="card p-3">
        <h6 class="text-danger">Terjual</h6>
        <h3><?= $terjual; ?></h3>
    </div>
</div>

</div>

<!-- PETA -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<div id="map" style="height:400px;" class="mb-4"></div>
<div class="card p-3 mb-4">
    <h5 class="mb-3">Peta Lokasi</h5>
    <div id="map" style="height:400px;"></div>
</div>
<!-- TABEL DATA -->
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM lokasi");

    while ($row = mysqli_fetch_assoc($data)) {
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_perumahan']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['harga']; ?></td>
        <td>
            <span class="badge bg-<?= ($row['status']=='Tersedia')?'success':'danger'; ?>">
                <?= $row['status']; ?>
            </span>
        </td>
    </tr>

    <?php } ?>

    </tbody>
</table>

</div>

<?php include 'layouts/footer.php'; ?>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
var map = L.map('map').setView([-6.9, 107.6], 10);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'OpenStreetMap'
}).addTo(map);

// Marker dari database
fetch('api/data_lokasi.php')
.then(res => res.json())
.then(data => {
    data.forEach(item => {

        var warna = item.status === "Tersedia" ? "green" : "red";

        var marker = L.circleMarker([item.latitude, item.longitude], {
            color: warna,
            radius: 8
        }).addTo(map);

        marker.bindPopup(
            "<b>"+item.nama_perumahan+"</b><br>" +
            item.alamat + "<br>" +
            "Harga: " + item.harga + "<br>" +
            "Status: " + item.status
        );
    });
});
</script>
<?php
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM lokasi"))['jml'];
$tersedia = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM lokasi WHERE status='Tersedia'"))['jml'];
$terjual = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM lokasi WHERE status='Terjual'"))['jml'];
?>

<div class="col-md-4">
    <div class="card bg-primary text-white p-3">
        <h5>Total Perumahan</h5>
        <h3><?= $total; ?></h3>
    </div>
</div>

<div class="col-md-4">
    <div class="card bg-success text-white p-3">
        <h5>Tersedia</h5>
        <h3><?= $tersedia; ?></h3>
    </div>
</div>

<div class="col-md-4">
    <div class="card bg-danger text-white p-3">
        <h5>Terjual</h5>
        <h3><?= $terjual; ?></h3>
    </div>
</div>

</div>

</div>

<?php include './pages/layout/footer.php'; ?>