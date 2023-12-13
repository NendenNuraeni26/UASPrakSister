<?php
session_start();

require_once('ClientLogin.php');
// Periksa apakah token ada di session
if (!isset($_SESSION['token'])) {
    header('Location: signup.php'); // Redirect ke halaman login jika tidak ada token
    exit();
}

// Tombol logout ditekan
if (isset($_POST['logout'])) {
    // Hapus sesi (session) dan redirect ke halaman login
    session_unset();
    session_destroy();
    header('Location: signup.php');
    exit();
}

$token = $_SESSION['token'];
$response = $client->testToken(['token' => $token]);
$userData = json_decode($response, true);
// echo $response;
if (isset($userData['user']['is_superuser']) && $userData['user']['is_superuser'] == true) {
    // Redirect to admin.php for superusers
    // echo "hi";
    header("Location: admin.php?token" . $_GET['token']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="" class="site-block-top-search">
                                <span class="icon icon-search2"></span>
                                <input type="text" class="form-control border-0" placeholder="Search">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="index.php?token=" class="js-logo-clone">Toko Buku</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>
                                    <li><a href="#"><span class="icon icon-person"></span></a></li>
                                    <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                    <li>
                                        <a href="indexcartitem.php?page=daftar-data" class="site-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            <span class="count">2</span>
                                        </a>
                                    </li>

                                    <li>
                                        <form method="post">
                                            <button type="submit" name="logout"><span class="icon icon-power">Logout</span></button>
                                        </form>
                                    </li>
                                    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="has-children">
                            <a href="indexcartitem.php?page=home">Cart Item</a>
                            <ul class="dropdown">
                                <li><a href="indexcartitem.php?page=home">Home Cart Item</a></li>
                                <li><a href="indexcartitem.php?page=tambah">Tambah Data</a></li>
                                <li><a href="indexcartitem.php?page=daftar-data">Lihat Data</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        
        <?php require_once('ClientNews.php');
        // print_r($news);
        ?>

        <div class="container mt-5">
            <?php foreach ($news as $article) : ?>
                <div class="card mb-3">
                    <img src="<?= $article->image_url; ?>" class="card-img-top" alt="<?= $article->title; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->title; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $article->subtitle; ?></h6>
                        <p class="card-text"><?= substr($article->body, 0, 200) . '...'; ?></p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#articleModal<?= $article->id; ?>">
                            Read More
                        </button>
                        <p class="card-text"><small class="text-muted">Author: <?= $article->author; ?></small></p>
                        <img src="<?= $article->author_image_url; ?>" alt="Author Image" class="rounded-circle" width="30">
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Views: <?= $article->views; ?> | Date Created: <?= $article->date_created; ?></small>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="articleModal<?= $article->id; ?>" tabindex="-1" role="dialog" aria-labelledby="articleModalLabel<?= $article->id; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="articleModalLabel<?= $article->id; ?>"><?= $article->title; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= $article->image_url; ?>" class="img-fluid" alt="<?= $article->title; ?>">
                                <p><?= $article->body; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>