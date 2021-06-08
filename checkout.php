<!doctype html>
<html lang="zxx">

<?php include "includes/head.php" ?>

<body>
    <!--::header part start::-->
    <?php include "includes/header.php " ?>
    <!-- Header part end-->
    <!-- <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2> </h2>
                            <p> <span>-</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- banner part start-->

    <!-- banner part start-->

    <!-- feature_part start-->

    <!-- upcoming_event part start-->
    <?php

    include 'database/function.php';

    $idPengguna = $_SESSION['id_pengguna'];
    $dataCart = [];
    $dataTransaksi = [];

    $id_product = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST['id_product'] : null;
    $jml_beli = 0;
    $totalHarga = 0;
    $checkStock = getDataStock("SELECT * from tb_produk where id_produk='$id_product'");


    if (isset($_GET['iscart']) ||  $checkStock <= $_POST['stock']) {
        $dataCart = getAllDataUser("SELECT * FROM tb_cart join tb_produk ON tb_produk.id_produk = tb_cart.id_produk join tb_pengguna ON tb_pengguna.id_pengguna = tb_cart.id_pengguna where tb_cart.id_pengguna = '$idPengguna'AND tb_cart.is_order=0");
        foreach ($dataCart as $trans) {
            $totalHarga += $trans['harga'] * $trans['jumlah_beli'];
        }
    } else if ($checkStock[6] >= $_POST['quantity']) {
        $jml_beli = $_POST['quantity'];
        $query = "INSERT INTO  tb_cart VALUES (null,'$id_product','$idPengguna',$jml_beli,0)";
        mysqli_query($mysqli, $query);
        $dataCart = getAllDataUser("SELECT * FROM tb_cart join tb_produk ON tb_produk.id_produk = tb_cart.id_produk where tb_cart.is_order = 0");
        $dataTransaksi = getAllDataUser("SELECT * From tb_produk where id_produk='$id_product'");
        foreach ($dataCart as $trans) {
            $totalHarga += $trans['harga'] * $jml_beli;
        }
    } else {
        echo "<script>alert('Stock Tidak Mencukupi');window.location.href='index.php'</script>";
    }

    $dataPengguna = getAllDataUser("SELECT * FROM tb_pengguna WHERE id_pengguna = '$idPengguna'");
    // $totalHarga = getAllDataUser("SELECT SUM(total_harga) as total from tb_transaksi");


    // print_r($dataTransaksi);die;

    ?>

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2 style="text-align: center; color: #2e6b73;">Checkout </h2>
                        <section class="ftco-section">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-7 ftco-animate">
                                        <?php if (isset($_GET['iscart'])) { ?>
                                            <form action="process/add_transaksi.php" class="billing-form" method="POST">
                                            <?php } else { ?>

                                                <form action="process/add_transaksi_detail.php" class="billing-form" method="POST">
                                                <?php  } ?>
                                                <h3 class="mb-4 billing-heading">Data Diri</h3>
                                                <div class="row align-items-end">
                                                    <!-- <input type="hidden" name="user_id" value="">
                        <input type="hidden" name="id_produk" value=""> -->
                                                    <input type="hidden" name="jumlah_beli" value="">

                                                    <input type="hidden" name="total" value="<?= $totalHarga ?>">
                                                    <input type="hidden" name="dp" value="<?= $totalHarga * 0.5 ?>">

                                                    <?php foreach ($dataPengguna as $row) { ?>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="firstname">Nama Lengkap</label>
                                                                <input type="text" readonly name="fname" value="<?= $row['nama']; ?>" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Nama Belakang</label>
                                <input type="text" name="lname" value=""  class="form-control"  placeholder="">
                            </div>
                        </div> -->

                                                        <div class="w-100"></div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="streetaddress">Alamat</label>
                                                                <textarea type="text" readonly cols="1" rows="5" name="alamat" class="form-control" placeholder="Alamat Pengiriman">
                                                                <?= $row['alamat']; ?>
                                                                </textarea>
                                                            </div>
                                                        </div>

                                                        <div class="w-100"></div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="towncity">Tanggal Pemesanan</label>
                                                                <input type="date" readonly id="from" name="tgl_pemesanan" data-date="" data-date-format="DD MMMM YYYY" value="<?= date("Y-m-d"); ?>" class="form-control" placeholder="">
                                                            </div>
                                                        </div>


                                                        <div class="w-100"></div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">No Telepon</label>
                                                                <input type="text" readonly name="phone" value="<?= $row['no_telp']; ?>" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="emailaddress">Alamat Email</label>
                                                                <input type="text" readonly name="email" value="<?= $row['email'] ?>" class="form-control" placeholder="">
                                                            </div>
                                                        </div>


                                                        <div class="w-100"></div>
                                                </div>
                                            <?php } ?>
                                    </div>

                                    <div class="col-xl-5">
                                        <div class="row mt-5 pt-3">
                                            <div class="col-md-12 d-flex mb-5">
                                                <div style="border:2px solid #2e6b73; border-radius:10px;" class="cart-detail cart-total p-3 p-md-4">

                                                    <h4 class="billing-heading mb-4">Total Harga : <span style="float:right;line-height: 30px; color:#556172;font-size:14px;">Rp. <?= number_format($totalHarga, 2, ",", "."); ?></span></h4>

                                                    <hr style="border:1px solid #2e6b73;">
                                                    <div class="col-md-13" style="margin-bottom:50px;">
                                                        <?php foreach ($dataCart as $row) { ?>
                                                            <div class="cart-detail p-3 p-md-1">
                                                                <p>Nama Produk : <span style="float:right;line-height: 30px; color:#556172;font-size:14px;"><?= $row['nama_produk']; ?></span></p>
                                                                <p>Harga Produk : <span style="float:right;line-height: 30px; color:#556172;font-size:14px;">Rp.<?= number_format($row['harga'], 2, ",", "."); ?></span></p>
                                                                <p>jumlah beli : <span style="float:right;line-height: 30px; color:#556172;font-size:14px;"><?= isset($_GET['iscart']) == "true" ? $row['jumlah_beli'] : $jml_beli ?></span></p>
                                                                <input type="hidden" name="jumlah_beli" value=<?= isset($_GET['iscart']) == "true" ? $row['jumlah_beli'] : $jml_beli ?>>
                                                                <input type="hidden" value="<?= $row['id_produk'] ?>" name="id_produk">
                                                                <input type="hidden" value="<?= $row['stok'] ?>" name="stok">
                                                                <input type="hidden" value="<?= $jml_beli ?>" name="jumlah_beli">

                                                            </div>
                                                            <hr>
                                                        <?php } ?>



                                                        <div class="col-md-13" style="margin-bottom:50px;">


                                                        </div>
                                                    </div>
                                                    <form action="process/update_transaksi.php" method="post">
                                                        <div class="col-md-12" style="margin-bottom:50px;">
                                                            <div class="cart-detail p-3 p-md-1">
                                                                <p>Silahkan Transfer ke Rekening BCA 0123456 a/n PT Baranusa Jaya Bersama</p>
                                                            </div>
                                                        </div>
                                                        <center>

                                                            <div class="col-md-12">
                                                                <div class="cart-detail p-3 p-md-1">
                                                                    <?php foreach ($dataCart as $row) { ?>
                                                                        <input type="hidden" name="id_cart[]" value="<?= $row['id_cart']; ?>">
                                                                    <?php } ?>



                                                                    <button name="submit" type="submit" class="btn btn-primary py-3 px-4">Proceed</button>
                                                    </form>
                                                </div>
                                            </div>
                                            </center>
                                        </div>
                                    </div>
                                    <!-- .col-md-8 -->
                                </div>
                            </div>
                            </form>
                        </section>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- product_list part start-->

    <!-- awesome_shop start-->

    <!-- awesome_shop part start-->


    <!-- product_list part end-->


    <!--::subscribe_area part end::-->

    <!-- subscribe_area part start-->

    <!--::subscribe_area part end::-->

    <!--::footer_part start::-->
    <?php include "includes/footer.php" ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>