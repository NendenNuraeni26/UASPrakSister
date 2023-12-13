<?php
session_start();

require_once('ClientLogin.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Formulir telah disubmit, lakukan proses login
    $username = $_POST['username'];
    $password = $_POST['password'];

    $api_response = json_decode($client->login(['username' => $username, 'password' => $password]), true);
    echo ($api_response);

    if (isset($api_response['token'])) {
        // Token berhasil diterima, simpan di session
        $_SESSION['token'] = $api_response['token'];
        header('Location: index.php'); // Gantilah dengan halaman setelah login
        exit();
    } else {
        // Gagal login, handle sesuai kebutuhan
        $login_error = 'Login failed. Please try again.';
    }
}
?>