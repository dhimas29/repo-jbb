<!doctype html>
<html lang="zxx">
<?php
include "includes/head.php";
include "database/connect.php";


?>

<body>

    <?php include "includes/header.php ";

    if ($_SESSION == null) {
        echo "<script>alert('silahkan login terlebih dahulu');window.location.href='index.php'</script>";
    } else {
        $id = $_GET['id'];
        $query02 = "SELECT * From tb_produk WHERE id_produk = '$id'";
        $detail_Produk = mysqli_query($mysqli, $query02);
    }
    ?>

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



    <?php while ($fetch = mysqli_fetch_array($detail_Produk)) {

    ?>
        <section class="product_list section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section_tittle text-center">
                            <h2 style="text-align: center; color: #2e6b73;">Produk Detail </h2>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5 ftco-animate">
                        <a href="<?= 'img/product/' . $fetch['gambar'] ?>" class="image-popup"><img src="img/product/<?= $fetch['gambar'] ?>" class="img-fluid" style="width:500px;height:35 0px;" alt="Colorlib Template"></a>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h2><?= $fetch['nama_produk'] ?></h2>
                        <br>
                        <p class="price"><span>
                                <h3>Rp <?= number_format($fetch['harga'], 0, ".", ".") ?><h3>
                            </span></p>
                        </br>
                        <p><?= $fetch['des'] ?>
                        </p>
                        <p style="color:#2e6b73;font-Weight:bold;"><?= "Tersedia " . $fetch['stok'] . " stok" ?></p>
                        <p><?= "Ukuran : " . $fetch['ukuran']; ?></p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group d-flex">
                                    <div class="select-wrap">
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <form action="checkout.php" method="post">
                                <div class="input-group col-md-6 mb-3">
                                    <h5>Jumlah Beli</h5>
                                </div>
                                <input type="hidden" name="id_product" value="<?= $_GET['id'] ?>">
                                <input type="hidden" name="stock" value="<?= $fetch['stok'] ?>">
                                <div class="input-group col-md-6 mb-3">
                                    <button type="button" class="btn btn-primary">-</button>
                                    <input type="text" value="1" min="1" readonly id="quantity" style="margin:0px 10px 0px 10px;text-align:center;" name="quantity" class="form-control input-number" required value="" max="100">
                                    <button type="button" class="btn btn-primary">+</button>
                                </div>
                                <div class="input-group col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary pl-4 pr-4">Pesan</button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
        </section>





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