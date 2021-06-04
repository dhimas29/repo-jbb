<?php
session_start();
include "database/connect.php";
if ($_SESSION != null) {

    $id = $_SESSION['id_pengguna'];
    $query = "SELECT 
    *
    FROM
    tb_cart where id_pengguna='$id' AND is_order=0";
    $result = mysqli_query($mysqli, $query);
}

?>

<style>
    .main_menu .cart i:after {
        position: absolute;
        border-radius: 50%;
        background-color: #f13d80;
        width: 14px;
        height: 14px;
        right: -8px;
        top: -8px;
        content: "<?= mysqli_num_rows($result) ?>";
        text-align: center;
        line-height: 15px;
        font-size: 10px;
        color: #fff;
    }
</style>

<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"> <img src="img/favicon.png" width="50" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" style="color: black;">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="tentang.php" style="color: black;">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <?php if ($_SESSION != null) { ?>
                            <li class="nav-item dropdown">
                                <!-- <a class="nav-link" href="produk.php" style="color: black;">Produk</a> -->
                                <a class="nav-link dropdown-toggle" href="produk.php" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;">
                                    Kategori Produk
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <?php $query = "SELECT * FROM tb_jenis_produk";
                                    $result = mysqli_query($mysqli, $query);
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <a href="produk.php?q=<?= $row['id_jenis'] ?>" class="dropdown-item style=color:white"><?= $row['nama_jenis'] ?></a>
                                    <?php } ?>
                                </div>
                            </li>
                        <?php } else { ?>
                            <a class="nav-link" href="login.php" style="color: black;">Masuk/Daftar</a>
                        <?php } ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="carapesan.php" style="color: black;">Cara Pesan</a>
                        </li>



                        <?php if ($_SESSION != null) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="transsaksisaya.php" style="color: black;">Transaksi saya</a>
                            </li>
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;">
                                    <?= $_SESSION['nama'] ?>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="edit_profil.php">Edit Profil</a>
                                    <a class="dropdown-item" href="logout.php?sukses=logout">Logout</a>
                                </div>
                            </li>
                        <?php } ?>


                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <?php if ($_SESSION != null) {
                            if ($_SESSION['nama'] != null) { ?>
                                <div class="dropdown cart">
                                    <a class="" href="cart.php">
                                        <i class="fas fa-cart-plus" style="content:'4'"></i>
                                    </a>
                                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
    
                                    </div>
                                </div> -->

                                </div>
                        <?php }
                        } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div> -->
</header>