<?php
// Assuming you have a Client class instantiated as $abc
include "Client.php";


// Check the value of 'aksi'
if ($_POST['aksi'] == 'tambah') {
    // Retrieve form data
    $data = [
        'title' => $_POST['title'],
        'imageUrl' => $_POST['imageUrl'],
        'description' => $_POST['description'],
    ];

    // Perform the insert operation using your Client class
    $abc->tambah_data_kategori($data);

    // Redirect to the listing page after adding data
    header('location:kategori.php?page=daftar-data');
} elseif ($_POST['aksi'] == 'ubah') {
    // Retrieve form data
    $data = [
        'id' => $_POST['id'],
        'title' => $_POST['judul'], // Assuming 'title' is the correct key, adjust if needed
        'imageUrl' => $_POST['imageUrl'],
        'description' => $_POST['description'],
    ];
    // Perform the update operation using your Client class
    // echo "mm";
    // print_r($data);
    $abc->ubah_data_kategori($data);

    // Redirect to the listing page after updating data
    header('location:kategori.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') {
    // echo "a";
    $data = [
        "id" => $_GET['id_kategori'],
    ];
    // print_r($data);
    $abc->hapus_data_kategori($data);
    header('location:kategori.php?page=daftar-data');
}
