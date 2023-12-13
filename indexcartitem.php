<?php
include "Client.php";
require_once('ClientLogin.php');
session_start();
if (!isset($_SESSION['token'])) {
    header('Location: signup.php'); // Redirect ke halaman login jika tidak ada token
    exit();
}

// Tombol logout ditekan
if (isset($_POST['logout'])) {
    // Hapus sesi (session) dan redirect ke halaman login
    session_unset();
    session_destroy();
    header('Location: signup.php');
    exit();
}
$token = $_SESSION['token'];

$response = $client->testToken(['token' => $token]);
$userData = json_decode($response, true);
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
                                <a href="index.php" class="js-logo-clone">Toko Buku</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul class="site-menu js-clone-nav d-none d-md-block">

                                    <ul>
                                        <li><a href="#"><span class="icon icon-person"></span></a></li>
                                        <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                        <li>
                                            <a href="indexcartitem.php?page=daftar-data" class="site-cart">
                                                <span class="icon icon-shopping_cart"></span>
                                                <span class="count">2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <form method="post">
                                                <button type="submit" name="logout"><span class="icon icon-power">Logout</span></button>
                                            </form>
                                        </li>
                                        <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                                    </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">

                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li class="has-children">
                            <a href="indexcartitem.php?page=home">Cart Item</a>
                            <ul class="dropdown">
                                <li><a href="indexcartitem.php?page=home">Home Cart Item</a></li>
                                <li><a href="indexcartitem.php?page=tambah">Tambah Data</a></li>
                                <li><a href="indexcartitem.php?page=daftar-data">Lihat Data</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
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
                                    <form name="form" method="POST" action="prosesindexcartitem.php">
                                        <?php
                                        $produks = $abc->tampil_semua_data_produk();
                                        ?>
                                        <div class="form-group">
                                            <label for="product">Product</label>
                                            <input type="hidden" name="aksi" value="tambah" />
                                            <input type="text" class="form-control" name="user" value="<?= $userData['user']['id'] ?>" readonly />
                                            <select class="form-control" name="product">
                                                <?php foreach ($produks as $product) : ?>
                                                    <option value="<?php echo $product->id; ?>"><?php echo $product->title; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">quntity</label>
                                            <input type="text" class="form-control" placeholder="Masukan Quantity Buku" name="quantity" />
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
                    $r = $abc->tampil_data_cartitem($id);
                ?>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Ubah Data</h5>
                                    <form name="form" method="post" action="prosesindexcartitem.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="ubah" />
                                            <input type="hidden" name="id" value="<?= $r->id ?>" />
                                            <label for="id">Id Barang</label>
                                            <input type="text" class="form-control" name="id" value="<?= $r->id ?>" readonly placeholder="Masukkan Id Barang">
                                            <input type="text" class="form-control" name="user" value="<?= $r->user ?>" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="product">Detail Barang</label>
                                            <input type="text" class="form-control" name="product" value="<?= $r->product ?>" placeholder="Masukan Detail Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" class="form-control" name="quantity" value="<?= $r->quantity ?>" placeholder="Masukkan Kategori Barang">
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
                                        <th>ID Cart Item</th>
                                        <th>User</th>
                                        <th>Produk</th>
                                        <th>Quantity</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data_array = $abc->tampil_semua_data_cartitem();
                                    foreach ($data_array as $r) :
                                        if ($r->user == $userData['user']['id']) :
                                    ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $r->id ?></td>
                                                <td><?= $r->user ?></td>
                                                <td><?= $r->product ?></td>
                                                <td><?= $r->quantity ?></td>
                                                <td>
                                                    <a href="?page=ubah&id=<?= $r->id ?>" class="btn btn-primary btn-sm mr-2">Ubah</a>
                                                    <a href="prosesindexcartitem.php?aksi=hapus&id=<?= $r->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                    <?php
                                        endif;
                                    endforeach;
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