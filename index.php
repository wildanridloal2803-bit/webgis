<?php include 'koneksi.php'; ?>
<?php include './pages/layout/header.php'; ?>
<?php include './pages/layout/sidebar.php'; ?>

<div class="col-md-10 p-4">

<h3>Dashboard</h3>

<div class="row">

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