<?php
// Assuming you have a Client class instantiated as $abc
include "Client.php";


// Check the value of 'aksi'
if ($_POST['aksi'] == 'tambah') {
    // Retrieve form data
    $data = [
        'product' => $_POST['product'],
        'quantity' => $_POST['quantity'],
    ];

    // Perform the insert operation using your Client class
    $abc->tambah_data_cartitem($data);

    // Redirect to the listing page after adding data
    header('location:cartitem.php?page=daftar-data');
} elseif ($_POST['aksi'] == 'ubah') {
    // Retrieve form data
    $data = [
        'id' => $_POST['id'],
        'product' => $_POST['product'],
        'quantity' => $_POST['quantity'],
    ];
    // Perform the update operation using your Client class
    // echo "mm";
    // print_r($data);
    $abc->ubah_data_cartitem($data);

    // Redirect to the listing page after updating data
    header('location:cartitem.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') {
    // echo "a";
    $data = [
        "id" => $_GET['id'],
    ];
    // print_r($data);
    $abc->hapus_data_cartitem($data);
    // header('location:cartitem.php?page=daftar-data');
}
