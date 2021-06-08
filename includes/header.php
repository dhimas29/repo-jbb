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
                <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button> -->

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <div class="col-md-9">
                            <a class="navbar-brand" href="index.php"> <img src="img/favicon.png" width="50" alt="logo"> </a>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <?php if ($_SESSION != null) { ?>
                                    <a class="nav-link" href="logout.php?sukses=logout" style="color: black;">Logout</a>
                                <?php } else { ?>
                                    <a class="nav-link" href="login.php" style="color: black;"><span class="fas fa-user"></span> Masuk</a>
                                <?php } ?>
                            </li>
                        </ul>
                        <div class="hearer_icon d-flex">
                            <?php if ($_SESSION != null) {
                                if ($_SESSION['nama'] != null) { ?>
                                    <div class="dropdown cart">
                                        <a class="" href="cart.php">
                                            <i class="fas fa-cart-plus" style="content:'4'"></i>
                                        </a>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>

                </nav>
                <nav class="navbar navbar-expand-lg navbar-light fixed-bottom" style="background-color: #2e3a48;">
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <div class="col-md-11">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php" style="color: black;"><span class="fas fa-home"></span> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="tentang.php" style="color: black;"><span class="fas fa-users"></span> About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="carapesan.php" style="color: black;"><span class="fas fa-newspaper"></span> Petunjuk Order</a>
                                </li>
                                <?php if ($_SESSION == null) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="daftar.php" style="color: black;"><span class="fas fa-user-circle"></span> Daftar</a>
                                    </li>
                                <?php } ?>
                                <?php if ($_SESSION != null) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="transsaksisaya.php" style="color: black;"><span class="fas fa-list-alt"></span> Pembelian saya</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>