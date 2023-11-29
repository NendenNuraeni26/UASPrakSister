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
                    <a class="nav-link active" href="?page=home">Home Detail Barang</a>
                    <a class="nav-link active" href="?page=tambah">Tambah Data</a>
                    <a class="nav-link active" href="?page=daftar-data">Data Server</a>
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

        <?php include "Layout/footer.php"; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>