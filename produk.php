<?php
include "Client.php";

?>

<!doctype html>
<html>

<head>
    <title>HI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a>
        <br /><br />
        <fieldset>
            <?php
            if (isset($_GET['page'])) {
                if ($_GET['page'] == 'tambah') {
            ?>
                    <legend>Tambah Data</legend>
                    <form name="form" method="POST" action="prosesproduk.php">
                        <input type="hidden" name="aksi" value="tambahproduk" />
                        <label>Detail Barang</label>
                        <input type="text" name="detail_barang" />
                        <br />
                        <label>Category</label>
                        <input type="text" name="category" />
                        <br />
                        <label>Supplier</label>
                        <input type="text" name="supplier" />
                        <br />
                        <label>Product Tag</label>
                        <input type="text" name="product_tag" />
                        <br />
                        <label>Title</label>
                        <input type="text" name="title" />
                        <br />
                        <label>Price</label>
                        <input type="text" name="price" />
                        <br />
                        <label>Stock</label>
                        <input type="text" name="stock" />
                        <br />
                        <button type="submit" name="simpan">Simpan</button>
                    </form>
                <?php
                } elseif ($_GET['page'] == 'ubah') {
                    $id = $_GET['id'];
                    $r = $abc->tampil_data_produk($id);
                ?>
                    <legend>Ubah Data</legend>
                    <form name="form" method="post" action="prosesproduk.php">
                        <input type="hidden" name="aksi" value="ubah" />
                        <input type="hidden" name="id" value="<?= $r->id ?>" />
                        <label>ID Barang</label>
                        <input type="text" value="<?= $r->id ?>" readonly>
                        <br />
                        <label>Detail Barang</label>
                        <input type="text" name="Detail Barang" value="<?= $r->detail_barang ?>">
                        <br />
                        <label>Category</label>
                        <input type="text" name="category" value="<?= $r->category ?>">
                        <br />
                        <label>supplier</label>
                        <input type="text" name="supplier" value="<?= $r->supplier ?>">
                        <br />
                        <label>Product Tag</label>
                        <input type="text" name="product_tag" value="<?= $r->product_tag ?>">
                        <br />
                        <label>title</label>
                        <input type="text" name="title" value="<?= $r->title ?>">
                        <br />
                        <label>price</label>
                        <input type="text" name="price" value="<?= $r->price ?>">
                        <br />
                        <label>stock</label>
                        <input type="text" name="stock" value="<?= $r->stock ?>">
                        <br />
                        <button type="submit" name="ubah">Ubah</button>
                    </form>
                <?php
                    unset($r);
                } elseif ($_GET['page'] == 'daftar-data') {
                ?>
                    <legend>Daftar Data Server</legend>
                    <table border="1">
                        <tr>
                            <th width="5%">No</th>
                            <th width="5%">ID produk</th>
                            <th width="10%">Detail barang</th>
                            <th width="25%">Kategory</th>
                            <th width="50%">Supplier</th>
                            <th width="50%">Product Tag</th>
                            <th width="50%">Title</th>
                            <th width="50%">Price</th>
                            <th width="50%">Stock</th>
                            <th width="50%">Deskripsi</th>
                            <th width="5%" colspan="2">Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        $data_array = $abc->tampil_semua_data_produk();
                        foreach ($data_array as $r) {
                        ?>
                            <tr>
                                <td>
                                    <?= $no ?>
                                </td>
                                <td>
                                    <?= $r->id ?>
                                </td>
                                <td>
                                    <?= $r->detail_barang ?>
                                </td>
                                <td>
                                    <?= $r->category ?>
                                </td>
                                <td>
                                    <?= $r->supplier ?>
                                </td>
                                <td>
                                    <?= $r->product_tag ?>
                                </td>
                                <td>
                                    <?= $r->title ?>
                                </td>
                                <td>
                                    <?= $r->price ?>
                                </td>
                                <td>
                                    <?= $r->stock ?>
                                </td>
                                <td>
                                    <?= $r->description ?>
                                </td>
                                <td><a href="?page=ubah&id=<?= $r->id ?>">Ubah</a></td>
                                <td><a href="prosesproduk.php?aksi=hapus&id=<?= $r->id ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
                            </tr>
                        <?php
                            $no++;
                        }
                        unset($data_array, $r, $no);
                        ?>
                    </table>
                <?php
                } else {
                ?>
                    <legend>Home</legend>
                    Aplikasi sederhana ini menggunakan RESTful dengan format XML (Extensible Markup Language)
            <?php
                }
            }
            ?>
        </fieldset>
    </div>

</body>

</html>