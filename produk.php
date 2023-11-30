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
                            <h3 class="card-title text-start mb-4">Selamat Datang Di Book Heaven</h3>
                            <img src="Assets/AddBook7.png" height="300">
                            <p class="card-text">
                                Silahkan masukkan produk Anda ke dalam sistem dengan memasukkan informasi yang lengkap. Berikan detail yang komprehensif, seperti detail buku, kategori buku, supplier buku, tag produk, judul, harga, dan stok. Dengan melengkapi semua informasi ini, Anda membantu memastikan bahwa produk Anda dapat dengan mudah diidentifikasi dan ditemukan oleh pelanggan potensial. Informasi yang lengkap juga dapat meningkatkan kredibilitas dan daya tarik produk di dalam platform. </p>

                            <p class="card-text">Proses memasukkan produk tidak hanya memungkinkan untuk memperlihatkan berbagai fitur dan spesifikasi, tetapi juga memberikan peluang bagi Anda untuk menonjolkan keunikan dan keunggulan produk Anda. Pastikan untuk memberikan informasi yang akurat dan terperinci agar calon pembeli dapat membuat keputusan yang informatif. Dengan memberikan data yang lengkap, Anda tidak hanya memberikan nilai tambah pada pengalaman belanja online, tetapi juga meningkatkan peluang produk Anda untuk sukses di pasaran.</p>
                        </div>


                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Tambah Data</h5>
                                    <form name="form" method="POST" action="prosesproduk.php">
                                        <div class="form-group">
                                            <input type="hidden" name="aksi" value="tambah" />
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" placeholder="Masukan Kategori Buku" name="category" />
                                        </div>
                                        <div class="form-group">
                                            <label for="detail_barang">Detail Barang</label>
                                            <input type="text" class="form-control" placeholder="Masukan Detail Buku" name="detail_barang" />
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
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <input type="text" class="form-control" placeholder="Masukan Deskripsi Buku" name="description" />
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier">Supplier</label>
                                            <input type="text" class="form-control" placeholder="Masukan Supplier Buku" name="supplier" />
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
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" name="category" value="<?= $r->category ?>" placeholder="Masukkan Kategori Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="detail_barang">Detail Barang</label>
                                            <input type="text" class="form-control" name="detail_barang" value="<?= $r->detail_barang ?>" placeholder="Masukan Detail Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" name="price" value="<?= $r->price ?>" placeholder="Masukkan Judul">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" value="<?= $r->title ?>" placeholder="Masukkan Judul">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" name="price" value="<?= $r->stock ?>" placeholder="Masukkan Stok">
                                        </div>
                                        <div class="form-group">
                                            <label for="supplier">Supplier</label>
                                            <input type="text" class="form-control" name="supplier" value="<?= $r->supplier ?>" placeholder="Masukkan Supplier Barang">
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