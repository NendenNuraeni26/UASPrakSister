<?php
// Assuming you have a Client class instantiated as $abc
include "Client.php";


// Check the value of 'aksi'
if ($_POST['aksi'] == 'tambah') {
    // Retrieve form data
    $data = [
        'name' => $_POST['name'],
        'detail' => $_POST['detail'],
        'staus' => $_POST['staus']
    ];

    // Perform the insert operation using your Client class
    $abc->tambah_data_supplier($data);

    // Redirect to the listing page after adding data
    header('location:supplier.php?page=daftar-data');
} elseif ($_POST['aksi'] == 'ubah') {
    // Retrieve form data
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'detail' => $_POST['detail'],
        'status' => $_POST['status']
    ];
    // Perform the update operation using your Client class
    // echo "mm";
    // print_r($data);
    $abc->ubah_data_supplier($data);

    // Redirect to the listing page after updating data
    header('location:supplier.php?page=daftar-data');
} else if ($_GET['aksi'] == 'hapus') {
    // echo "a";
    $data = [
        "id" => $_GET['id'],
    ];
    // print_r($data);
    $abc->hapus_data_supplier($data);
    header('location:supplier.php?page=daftar-data');
}
