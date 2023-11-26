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
                    <form name="form" method="POST" action="prosesdetailbarang.php">
                        <input type="hidden" name="aksi" value="tambahdetailbarang" />
                        <label>Name</label>
                        <input type="text" name="name" />
                        <br />
                        <label>Image URL</label>
                        <input type="text" name="imageUrl" />
                        <br />
                        <label>Detail</label>
                        <input type="text" name="status" />
                        <br />
                        <label>Status</label>
                        <input type=" text" name="status" />
                        <br />
                        <button type="submit" name="simpan">Simpan</button>
                    </form>
                <?php
                } elseif ($_GET['page'] == 'ubah') {
                    $id = $_GET['id'];
                    $r = $abc->tampil_data_detail_produk($id);
                ?>
                    <legend>Ubah Data</legend>
                    <form name="form" method="post" action="prosesdetailbarang.php">
                        <input type="hidden" name="aksi" value="ubah" />
                        <input type="hidden" name="id" value="<?= $r->id ?>" />
                        <label>ID Detail Barang</label>
                        <input type="text" value="<?= $r->id ?>" readonly>
                        <br />
                        <label>Name</label>
                        <input type="text" name="name" value="<?= $r->name ?>">
                        <br />
                        <label>Image Url</label>
                        <input type="text" name="imageUrl" value="<?= $r->imageUrl ?>">
                        <br />
                        <label>Detail</label>
                        <input type="text" name="detail" value="<?= $r->detail ?>" />
                        <br />
                        <label>Status</label>
                        <input type="text" name="status" value="<?= $r->status ?>" />
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
                            <th width="5%">ID Barang</th>
                            <th width="10%">Name</th>
                            <th width="25%">Image</th>
                            <th width="25%">Detail</th>
                            <th width="25%">Status</th>
                            <th width="5%" colspan="2">Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        $data_array = $abc->tampil_semua_data_detail_barang();
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
                                    <?= $r->name ?>
                                </td>
                                <td>
                                    <img style="width: 100px;height: 100px;" src="<?= $r->imageUrl ?>" alt="">
                                </td>
                                <td>
                                    <?= $r->detail ?>
                                </td>
                                <td>
                                    <?= $r->status ?>
                                </td>
                                <td>
                                    <?= $r->description ?>
                                </td>
                                <td><a href="?page=ubah&id=<?= $r->id ?>">Ubah</a></td>
                                <td><a href="prosesdetailbarang.php?aksi=hapus&id=<?= $r->id ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
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