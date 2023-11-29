<?php
include "Client.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Heaven &mdash; Colorlib e-Commerce Template</title>
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
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="" class="site-block-top-search">
                                <span class="icon icon-search2"></span>
                                <input type="text" class="form-control border-0" placeholder="Search">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="index.html" class="js-logo-clone">Book Heaven</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>
                                    <li><a href="#"><span class="icon icon-person"></span></a></li>
                                    <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                    <li>
                                        <a href="cart.html" class="site-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            <span class="count">2</span>
                                        </a>
                                    </li>
                                    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
            include "Layout/navbar.php";
            ?>
        </header>

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
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
                            <h3 class="card-title text-start mb-4">Selamat Datang Di Book Heaven</h3>
                            <img src="Assets/AddBook4.png" height="400">
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Tambah Data</h5>
                                    <form name="form" method="POST" action="proseskategori.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="tambahkategori" />
                                            <label for="title">Judul</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Judul Buku" name="title" />
                                        </div>
                                        <div class="form-group">
                                            <label for="imageUrl">Image Url</label>
                                            <input type="text" class="form-control" placeholder="Masukan Url Gambar Buku" name="imageUrl" />
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <input type="text" class="form-control" name="description" placeholder="Masukan Deskripsi Buku ">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                } elseif ($_GET['page'] == 'ubah') {
                    $id = $_GET['id_kategori'];
                    $r = $abc->tampil_data_categories($id);
                ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Ubah Data</h5>
                                    <form name="form" method="post" action="proseskategori.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="ubah" />
                                            <input type="hidden" name="id" value="<?= $r->id ?>" />
                                            <label for="id">Id Barang</label>
                                            <input type="text" class="form-control" name="id" value="<?= $r->id ?>" readonly="readonly" placeholder="Masukkan Id Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" name="judul" value="<?= $r->title ?>" placeholder="Masukan Nama Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="imageUrl">Image Url</label>
                                            <input type="text" class="form-control" name="imageUrl" value="<?= $r->imageUrl ?>" placeholder="Masukan Url Gambar Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Detail</label>
                                            <input type="text" class="form-control" name="description" value="<?= $r->description ?>" placeholder="Masukan Deskripsi Barang">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="simpan">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } elseif ($_GET['page'] == 'daftar-data') {
                ?>
                    <h2 class="text-center mb-4">Daftar Data Server</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="5%">ID Barang</th>
                                        <th width="10%">Judul</th>
                                        <th width="25%">Image Url</th>
                                        <th width="25%">Deskripsi</th>
                                        <th width="5%" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data_array = $abc->tampil_semua_data_categories();
                                    foreach ($data_array as $r) :
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $r->id ?></td>
                                            <td><?= $r->title ?></td>
                                            <td><img style="width: 100px;height: 100px;" src="<?= $r->imageUrl ?>" alt=""></td>
                                            <td><?= $r->description ?></td>
                                            <td><a href="?page=ubah&id_kategori=<?= $r->id ?>" class="btn btn-primary">Ubah</a></td>
                                            <td><a href="proseskategori.php?aksi=hapus&id_kategori=<?= $r->id ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach;
                                    unset($data_array, $r, $no);
                                    ?>
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