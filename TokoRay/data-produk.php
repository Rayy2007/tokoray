<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Ray</title>
    <!-- Menggunakan satu link CSS -->
    <link rel="stylesheet" href="css/style.css?v=1.1">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Toko Ray</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php" class="active">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="tambah-produk.php" class="btn">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                        if (mysqli_num_rows($produk) > 0) {
                            while ($row = mysqli_fetch_array($produk)) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td>Rp. <?= number_format($row['product_price']) ?></td>
                                    <td><a href="produk/<?= $row['product_image'] ?>" target="_blank"><img
                                                src="produk/<?= $row['product_image'] ?>" width="50px"></a></td>
                                    <td><?= ($row['product_status'] == 0) ? 'Tidak Aktif' : 'Aktif'; ?></td>
                                    <td>
                                        <a href="edit-produk.php?id=<?= $row['product_id'] ?>" class="btn">Edit</a>
                                        <a href="proses-hapus.php?idp=<?= $row['product_id'] ?>"
                                            onclick="return confirm('Yakin ingin hapus?')" class="btn">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7" style="text-align:center;">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Toko Ray.</small>
        </div>
    </footer>
</body>

</html>