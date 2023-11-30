<?php
include "Client.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko Buku &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <?php
            include "Layout/navbar.php";
            ?>
        </header>

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
                </div>
            </div>
        </div>


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
                                    <form name="form" method="POST" action="prosessupplier.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="tambah" />
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" placeholder="Masukan Detail Buku" name="name" />
                                        </div>
                                        <div class="form-group">
                                            <label for="detail">Detail</label>
                                            <input type="text" class="form-control" placeholder="Masukan Kategori Buku" name="detail" />
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" placeholder="Masukan status Buku" name="status" />
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
                    $r = $abc->tampil_data_supplier($id);
                ?>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Ubah Data</h5>
                                    <form name="form" method="post" action="prosessupplier.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="ubah" />
                                            <input type="hidden" name="id" value="<?= $r->id ?>" />
                                            <label for="id">Id Supplier</label>
                                            <input type="text" class="form-control" name="id" value="<?= $r->id ?>" readonly placeholder="Masukkan Id Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $r->name ?>" placeholder="Masukkan Supplier Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="detail">Detail</label>
                                            <input type="text" class="form-control" name="detail" value="<?= $r->detail ?>" placeholder="Masukkan Judul">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" name="status" value="<?= $r->status ?>" placeholder="Masukkan Stok">
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
                                        <th>ID Supplier</th>
                                        <th>name</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data_array = $abc->tampil_semua_data_supplier();
                                    foreach ($data_array as $r) :
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $r->id ?></td>
                                            <td><?= $r->name ?></td>
                                            <td><?= $r->detail ?></td>
                                            <td><?= $r->status ?></td>
                                            <td>
                                                <a href="?page=ubah&id=<?= $r->id ?>" class="btn btn-primary btn-sm mr-2">Ubah</a>
                                                <a href="prosessupplier.php?aksi=hapus&id=<?= $r->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a>
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
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>