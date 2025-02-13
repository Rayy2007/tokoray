<?php
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Ray</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">Toko Ray</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($k = mysqli_fetch_array($kategori)) {
                        ?>
                        <a href="produk.php?kat=<?= $k['category_id'] ?>">
                            <div class="col-5">
                                <img src="img/icon-kategori.jpeg" width="50px" style="margin-bottom:5px;">
                                <p><?= $k['category_name'] ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Kategori tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk Tebaru</h3>
            <div class="box">
                <?php
                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 4");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                        ?>
                        <a href="detail-produk.php?id=<?= $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="produk/<?= $p['product_image'] ?>">
                                <p class="nama"><?= substr($p['product_name'], 0, 30) ?></p>
                                <p class="harga">Rp. <?= number_format($p['product_price']) ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Produk tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?= $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?= $a->admin_email ?></p>

            <h4>No. Hp</h4>
            <p><?= $a->admin_telp ?></p>
            <small>Copyright &copy; 2024 - Toko Ray.</small>
        </div>
    </div>
</body>

</html>