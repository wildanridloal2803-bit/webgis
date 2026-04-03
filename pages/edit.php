<?php
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM lokasi WHERE id=$id"));

if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE lokasi SET
        nama_perumahan='$_POST[nama]',
        alamat='$_POST[alamat]',
        harga='$_POST[harga]',
        status='$_POST[status]',
        latitude='$_POST[latitude]',
        longitude='$_POST[longitude]'
        WHERE id=$id
    ");

    header("Location: ../index.php");
}
?>

<form method="POST">
    Nama: <input type="text" name="nama" value="<?= $data['nama_perumahan']; ?>"><br>
    Alamat: <input type="text" name="alamat" value="<?= $data['alamat']; ?>"><br>
    Harga: <input type="text" name="harga" value="<?= $data['harga']; ?>"><br>
    
    Status:
    <select name="status">
        <option <?= ($data['status']=='Tersedia')?'selected':''; ?>>Tersedia</option>
        <option <?= ($data['status']=='Terjual')?'selected':''; ?>>Terjual</option>
    </select><br>

    Latitude: <input type="text" name="latitude" value="<?= $data['latitude']; ?>"><br>
    Longitude: <input type="text" name="longitude" value="<?= $data['longitude']; ?>"><br>

    <button name="update">Update</button>
</form>