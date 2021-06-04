<?php

include 'database/connect.php';


if (isset($_POST['add_cart'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $id_product = $_POST['id_produk'];
    $jumlah_beli = $_POST['jumlah'];

    $query = "INSERT INTO  tb_cart VALUES (null,'$id_product','$id_pengguna','$jumlah_beli',0)";
    $result = mysqli_query($mysqli, $query);
    if ($result) {
        echo "<script>alert('tambah cart sukses');window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('tambah cart gagal');window.location.href='index.php'</script>";
    }
}

?>
<!doctype html>
<html lang="zxx">

<?php include "includes/head.php" ?>

<body>
    <!--::header part start::-->
    <?php include "includes/header.php " ?>
    <!-- Header part end-->
    <section class="breadcrumb breadcrumb_bg">
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
    </section>
    <!-- banner part start-->

    <!-- banner part start-->

    <!-- feature_part start-->

    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Beberapa Produk kita </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <?php

                                $sql = "SELECT * from tb_produk join tb_jenis_produk on tb_jenis_produk.id_jenis = tb_produk.jenis_produk LIMIT 4";
                                $result = mysqli_query($mysqli, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single_product_item">
                                                <img style="width:270px;height:150px;" src="<?= ('img/product/') . $row['gambar'] ?>" alt="">
                                                <div class="single_product_text">
                                                    <h4><?= $row['nama_produk'] ?></h4>
                                                    <h3>Rp <?= number_format($row['harga'], 2) ?></h3>

                                                    <a onclick="getValue('<?= $row['id_produk'] ?>','<?= $_SESSION['id_pengguna'] ?>')" data-target="#modal_delete" data-toggle="modal" href="index.php?add_cart=true&id_produk=<?= $row['id_produk'] ?>&id_pengguna=<?= $_SESSION['id_pengguna'] ?>" id="add_cart" class="btn add_cart"><i class="fa fa-cart-plus"></i> </a>

                                                    <a href="singgel_produk.php?id=<?= $row['id_produk'] ?>" class="btn">
                                                        <center>
                                                            <img src="img/icon1-menu.png" style="width:25px;height:30px;" />
                                                        </center>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
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

    <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jumlah Beli</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="firstname">Jumlah Beli</label>
                            <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="">
                            <input type="hidden" id="id_produk" name="id_produk" class="form-control" placeholder="">
                            <input type="hidden" id="id_pengguna" name="id_pengguna" class="form-control" placeholder="">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add_cart" class="btn btn-primary">Simpan</i> </a>
                            <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <script>
        function getValue(id_produk, id_pengguna) {
            document.getElementById('id_produk').value = id_produk;
            document.getElementById('id_pengguna').value = id_pengguna;
        }
    </script>

</body>

</html>