<?php include 'koneksi.php'; ?>
<?php include 'layouts/header.php'; ?>
<?php include 'layouts/sidebar.php'; ?>

<div class="col-md-10 p-4">

<h3>Data Perumahan</h3>

<a href="pages/tambah.php" class="btn btn-primary mb-3">+ Tambah Data</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
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
        <td>
            <a href="pages/edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="pages/hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>

    <?php } ?>

    </tbody>
</table>

</div>

<?php include 'layouts/footer.php'; ?>