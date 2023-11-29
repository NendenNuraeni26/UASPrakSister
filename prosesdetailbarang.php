<?php
// Assuming you have a Client class instantiated as $abc
include "Client.php";


// Check the value of 'aksi'
if ($_POST['aksi'] == 'tambah') {
    // Retrieve form data
    
    // echo "mm";
    $data = [
        'name' => $_POST['name'],
        'imageUrl' => $_POST['imageUrl'],
        'detail' => $_POST['detail'],
        'status' => $_POST['status']
    ];
    // print_r($data);
    // Perform the insert operation using your Client class
    $abc->tambah_data_detail_produk($data);

    // Redirect to the listing page after adding data
    // header('location:detailbarang.php?page=daftar-data');
} elseif ($_POST['aksi'] == 'ubah') {
    // Retrieve form data
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'], // Assuming 'title' is the correct key, adjust if needed
        'imageUrl' => $_POST['imageUrl'],
        'detail' => $_POST['detail'],
        'status' => $_POST['status']
    ];
    // Perform the update operation using your   Client class
    echo "mm";
    // print_r($data);
    $abc->ubah_data_detail_produk($data);

    // Redirect to the listing page after updating data
    // header('location:detailbarang.php?page=daftar-data');
} elseif ($_GET['aksi'] == 'hapus') {
    // echo "a";
    $data = [
        "id" => $_GET['id'],
    ];
    // print_r($data);
    $abc->hapus_data_kategori($data);
    header('location:kategori.php?page=daftar-data');
}
