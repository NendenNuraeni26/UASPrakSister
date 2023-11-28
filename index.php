<?php
include "Layout/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Toko Buku</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="detailbarang.php">Detail Barang</a>
                    <a class="nav-link active" href="kategori.php">Kategori</a>
                    <a class="nav-link active" href="produk.php">Produk</a>
                </div>
            </div>
        </div>
    </nav>


</body>

</html>

<?php
include "Layout/footer.php";
?>