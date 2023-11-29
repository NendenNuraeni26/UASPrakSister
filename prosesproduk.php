<?php
// Assuming you have a Client class instantiated as $abc
include "Client.php";


// Check the value of 'aksi'
if ($_POST['aksi'] == 'tambah') {
    // Retrieve form data
    $data = [
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'detail_barang' => $_POST['detail_barang'],
        'product_tag' => $_POST['product_tag'],
        'title' => $_POST['title'],
        'price' => $_POST['price'],
        'stock' => $_POST['stock'],
        'description' => $_POST['description'],
        'supplier' => $_POST['supplier']
    ];

    // Perform the insert operation using your Client class
    $abc->tambah_data_detail_produk($data);

    // Redirect to the listing page after adding data
    header('location:produk.php?page=daftar-data');
} elseif ($_POST['aksi'] == 'ubah') {
    // Retrieve form data
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'detail_barang' => $_POST['detail_barang'],
        'product_tag' => $_POST['product_tag'],
        'title' => $_POST['title'],
        'price' => $_POST['price'],
        'stock' => $_POST['stock'],
        'description' => $_POST['description'],
        'supplier' => $_POST['supplier']
    ];
    // Perform the update operation using your Client class
    // echo "mm";
    // print_r($data);
    $abc->ubah_data_produk($data);

    // Redirect to the listing page after updating data
    header('location:produk.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') {
    // echo "a";
    $data = [
        "id" => $_GET['id_produk'],
    ];
    // print_r($data);
    $abc->hapus_data_kategori($data);
    header('location:kategori.php?page=daftar-data');
}
