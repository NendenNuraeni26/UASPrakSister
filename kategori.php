<?php
include "Layout/header.php";
include "Client.php";
?>

<!DOCTYPE html>
<html>

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
                    <a class="nav-link active" href="?page=home">Home Kategori</a>
                    <a class="nav-link active" href="?page=tambah">Tambah Data</a>
                    <a class="nav-link active" href="?page=daftar-data">Data Server</a>
                </div>
            </div>
        </div>
    </nav>


    <br>
    <div class="container mt-4">
        <?php if (basename($_SERVER['PHP_SELF']) == 'kategori.php' && !isset($_GET['page'])) : ?>
            <div class="row">
                <div class="col-md-6">
                    <h3 style="font-family: 'Arial', sans-serif; font-weight: bold; text-align: start;">Selamat Datang di Halaman Kategori Barang</h3>
                    <img src="Assets/AddBook5.jpg" height="350">
                </div>

                <div class="col-md-6">
                    <p>"Selamat datang di Halaman Kategori Buku. Di halaman kategori ini, Anda dapat dengan mudah menambahkan data kategori dengan memasukkan judul buku, URL gambar, dan deskripsi. Selain itu, pengguna juga memiliki kemampuan untuk mengakses dan melihat data kategori yang telah mereka masukkan sebelumnya. Proses pengelolaan data kategori menjadi lebih efisien dan dapat diakses dengan nyaman melalui antarmuka yang intuitif pada halaman ini."</p>
                    <p>Navigasi yang sederhana dan antarmuka yang ramah pengguna memastikan bahwa pengguna dapat dengan cepat mengakses fitur tambah data kategori dan merinci informasi dengan judul buku, URL gambar, dan deskripsi yang relevan. Dengan adanya kemampuan untuk melihat data yang telah diinputkan sebelumnya, pengguna dapat dengan mudah memantau dan mengelola kategori buku secara efektif. Halaman ini dirancang untuk memberikan pengalaman pengguna yang optimal dalam menambahkan dan menjelajahi data kategori buku dengan mudah dan efisien.</p>
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
        <?php include "Layout/footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>