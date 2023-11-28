<?php
include "Layout/header.php";
include "Client.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            padding-top: 56px;
        }

        @media (max-width: 767px) {
            body {
                padding-top: 0;
            }
        }

        .navbar {
            margin-bottom: 20px;
        }

        .card-title {
            margin-bottom: 1.25rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Back</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="?page=home">Home Produk</a>
                    <a class="nav-link active" href="?page=tambah">Tambah Data</a>
                    <a class="nav-link active" href="?page=daftar-data">Data Server</a>
                </div>
            </div>
        </div>
    </nav>

    <br>
    <div class="container mt-4">
        <?php if (basename($_SERVER['PHP_SELF']) == 'produk.php' && !isset($_GET['page'])) : ?>
            <div class="row">
                <div class="col-md-6">
                    <h3 style="font-family: 'Arial', sans-serif; font-weight: bold; text-align: start;">Selamat Datang di Halaman Produk Barang</h3>
                    <img src="Assets/AddBook6.png" height="400">
                </div>

                <div class="col-md-6">
                    <p>Selamat datang di Halaman Produk! Di sini, Anda memiliki kebebasan untuk mengelola produk-produk Anda dengan lebih efisien. Proses penambahan produk menjadi lebih sederhana karena Anda dapat mengisi rincian seperti Detail Buku, Kategori Buku, Supplier Buku, Product Tag, Judul, Harga, dan Stok dengan cepat dan mudah. Dengan antarmuka yang intuitif, pengguna dapat menjelajahi fitur-fitur yang tersedia untuk memastikan setiap produk terdaftar dengan lengkap dan akurat.</p>
                    <p>Lebih dari sekadar menambahkan produk, Halaman Produk juga memberikan Anda keunggulan untuk melacak stok, harga, dan detail terkait lainnya. Dengan demikian, memastikan bahwa data produk Anda tetap terorganisir dan dapat diakses dengan cepat. Dengan fitur-fitur ini, pengalaman pengelolaan produk menjadi lebih interaktif, membantu Anda mengoptimalkan efisiensi dan pemahaman terhadap setiap item dalam inventaris Anda.</p>
                </div>
            </div>


        <?php endif; ?>

        <div class="container mt-4">
            <?php
            if (isset($_GET['page'])) {
                if ($_GET['page'] == 'tambah') {
            ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-start mb-4">Selamat Datang Di Toko Buku</h3>
                            <img src="Assets/AddBook7.png" height="300">
                            <p class="card-text">Silahkan Masukkan Produk Anda. Silahkan memasukkan produk, Anda dapat memberikan informasi yang lengkap seperti Detail Buku, Kategori Buku, Supplier Buku, Product Tag, Judul, Harga, dan Stok. </p>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Tambah Data</h5>
                                    <form name="form" method="POST" action="prosesproduk.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="tambahproduk" />
                                            <label for="detail_barang">Detail Barang</label>
                                            <input type="text" class="form-control" placeholder="Masukan Detail Buku" name="category" />
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" placeholder="Masukan Kategori Buku" name="category" />
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier">Supplier</label>
                                            <input type="text" class="form-control" placeholder="Masukan Supplier Buku" name="supplier" />
                                        </div>
                                        <div class="form-group">
                                            <label for="product_tag">Product Tag</label>
                                            <input type="text" class="form-control" placeholder="Masukan Product Tag Buku" name="product_tag" />
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" placeholder="Masukan Judul Buku" name="title" />
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" placeholder="Masukan Harga Buku" name="price" />
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="text" class="form-control" placeholder="Masukan Stok Buku" name="stock" />
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } elseif ($_GET['page'] == 'ubah') {
                    $id = $_GET['id'];
                    $r = $abc->tampil_data_produk($id);
                ?>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Ubah Data</h5>
                                    <form name="form" method="post" action="prosesproduk.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="ubah" />
                                            <input type="hidden" name="id" value="<?= $r->id ?>" />
                                            <label for="id">Id Barang</label>
                                            <input type="text" class="form-control" name="id" value="<?= $r->id ?>" readonly placeholder="Masukkan Id Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="detail_barang">Detail Barang</label>
                                            <input type="text" class="form-control" name="detail_barang" value="<?= $r->detail_barang ?>" placeholder="Masukan Detail Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" name="category" value="<?= $r->category ?>" placeholder="Masukkan Kategori Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier">Supplier</label>
                                            <input type="text" class="form-control" name="supplier" value="<?= $r->supplier ?>" placeholder="Masukkan Supplier Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" value="<?= $r->title ?>" placeholder="Masukkan Judul">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" name="price" value="<?= $r->stock ?>" placeholder="Masukkan Stok">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="simpan">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php
                    unset($r);
                } elseif ($_GET['page'] == 'daftar-data') {
                ?>
                    <h2 class="text-center">Daftar Data Server</h2>
                    <div class="row justify-content-center">
                        <div class="col">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Detail Barang</th>
                                        <th>Kategori</th>
                                        <th>Supplier</th>
                                        <th>Product Tag</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data_array = $abc->tampil_semua_data_produk();
                                    foreach ($data_array as $r) :
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $r->id ?></td>
                                            <td><?= $r->detail_barang ?></td>
                                            <td><?= $r->category ?></td>
                                            <td><?= $r->supplier ?></td>
                                            <td><?= $r->product_tag ?></td>
                                            <td><?= $r->title ?></td>
                                            <td><?= $r->price ?></td>
                                            <td><?= $r->stock ?></td>
                                            <td><?= $r->description ?></td>
                                            <td>
                                                <a href="?page=ubah&id=<?= $r->id ?>" class="btn btn-primary btn-sm mr-2">Ubah</a>
                                                <a href="prosesproduk.php?aksi=hapus&id=<?= $r->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <h5 class="text-center">Home</h5>
                    <p class="lead text-center">Aplikasi sederhana ini dibangun dengan konsep arsitektur RESTful, memanfaatkan format XML (Extensible Markup Language). Melalui RESTful, aplikasi dapat dengan efisien berkomunikasi antara komponen-komponennya, sementara penggunaan XML sebagai format pertukaran data memberikan struktur yang jelas dan dapat diperluas untuk mendukung pertukaran informasi yang handal dan terstruktur antara sistem-sistem yang berbeda.</p>
            <?php
                }
            }
            ?>
        </div>
        <?php include "Layout/footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>