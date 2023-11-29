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
                                <a href="index.html" class="js-logo-clone">Toko Buku</a>
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
    </div>
    </nav>


    <br>
    <div class="container mt-4">
        <?php if (basename($_SERVER['PHP_SELF']) == 'detailbarang.php' && !isset($_GET['page'])) : ?>
            <div class="row">
                <div class="col-md-7">
                    <h3 style="font-family: 'Arial', sans-serif; font-weight: bold; text-align: start;">Selamat Datang di Halaman Detail Barang</h3>
                    <img src="Assets/AddBook3.jpg" height="350">
                </div>

                <div class="col-md-5">
                    <br>
                    <p>"Selamat datang di Halaman Detail Barang. Di sini, Anda memiliki kemampuan untuk menambahkan data dengan mudah. Anda hanya perlu memasukkan informasi seperti nama, URL gambar, detail, dan status. Tidak hanya itu, Anda juga dapat melihat data yang telah Anda masukkan di bagian Data Server. Dengan demikian, pengalaman pengguna menjadi lebih interaktif dan informatif, memungkinkan Anda untuk mengelola dan melihat data secara efektif."</p>
                    <p>Dengan penyajian data yang jelas dan terstruktur, pengguna dapat dengan mudah mengelola dan melihat informasi terkait barang. Hal ini menjadikan Halaman Detail Barang sebagai pusat kontrol yang efektif, memastikan bahwa pengguna dapat berinteraksi dengan data mereka tanpa kesulitan.</p>
                </div>
            </div>



        <?php endif; ?>


        <div class="container mt-4">
            <?php if (isset($_GET['page'])) : ?>
                <?php if ($_GET['page'] == 'tambah') : ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-start mb-4">Selamat Datang Di Toko Buku</h3>
                            <img src="Assets/AddBook2.png" height="300">
                            <p class="card-text">Ini adalah halaman tambah detail barang. Di sini, Anda dapat menambahkan detail baru untuk barang. Isi formulir di sebelah kanan untuk memasukkan informasi barang, sementara di sebelah kiri, Anda akan menemukan informasi tambahan yang mungkin berguna dalam proses penambahan data.</p>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Tambah Data</h5>
                                    <form name="form" method="post" action="prosesdetailbarang.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="tambah" />
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Buku">
                                        </div>
                                        <div class="form-group">
                                            <label for="imageUrl">Image Url</label>
                                            <input type="text" class="form-control" name="imageUrl" placeholder="Masukan Url Gambar Buku   ">
                                        </div>
                                        <div class="form-group">
                                            <label for="detail">Detail</label>
                                            <input type="text" class="form-control" name="detail" placeholder="Masukan Detail Buku ">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" name="status" placeholder="Masukan Status Buku ">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($_GET['page'] == 'ubah') :
                    $id = $_GET['id'];
                    $r = $abc->tampil_data_detail_produk($id);
                ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Ubah Data</h5>
                                    <form name="form" method="post" action="prosesdetailbarang.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="ubah" />
                                            <input type="hidden" name="id" value="<?= $r->id ?>" />
                                            <label for="name">Id Detail Barang</label>
                                            <input type="text" class="form-control" name="id" value="<?= $r->id ?>" readonly placeholder="Masukkan Id Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $r->name ?>" placeholder="Masukan Nama Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="imageUrl">Image Url</label>
                                            <input type="text" class="form-control" name="imageUrl" value="<?= $r->imageUrl ?>" placeholder="Masukan Url Gambar Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="detail">Detail</label>
                                            <input type="text" class="form-control" name="detail" value="<?= $r->detail ?>" placeholder="Masukan Detail Barang ">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" name="status" value="<?= $r->status ?>" placeholder="Masukan Status Barang">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($_GET['page'] == 'daftar-data') : ?>
                    <h2 class="text-center mb-4">Daftar Data</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="5%">ID Barang</th>
                                        <th width="10%">Name</th>
                                        <th width="25%">Image</th>
                                        <th width="25%">Detail</th>
                                        <th width="25%">Status</th>
                                        <th width="5%" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data_array = $abc->tampil_semua_data_detail_barang();
                                    foreach ($data_array as $r) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r->id ?></td>
                                            <td><?= $r->name ?></td>
                                            <td><img style="width: 100px; height: 100px;" src="<?= $r->imageUrl ?>" alt=""></td>
                                            <td><?= $r->detail ?></td>
                                            <td><?= $r->status ?></td>
                                            <td><a href="?page=ubah&id=<?= $r->id ?>" class="btn btn-primary">Ubah</a></td>
                                            <td><a href="prosesdetailbarang.php?aksi=hapus&id=<?= $r->id ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else : ?>
                    <h5 class="text-center">Home</h5>
                    <p class="lead text-center">Aplikasi sederhana ini dibangun dengan konsep arsitektur RESTful, memanfaatkan format XML (Extensible Markup Language). Melalui RESTful, aplikasi dapat dengan efisien berkomunikasi antara komponen-komponennya, sementara penggunaan XML sebagai format pertukaran data memberikan struktur yang jelas dan dapat diperluas untuk mendukung pertukaran informasi yang handal dan terstruktur antara sistem-sistem yang berbeda.</p>
                <?php endif; ?>
            <?php endif; ?>
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