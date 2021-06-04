<!doctype html>
<html lang="zxx">
<?php include "includes/head.php";

include 'database/connect.php';

if (isset($_POST['password_baru'])) {
    $password = md5($_POST['password_baru']);
    $id = $_POST['id'];
    $sql = "Update tb_pengguna set password='$password' where id_pengguna=$id";
    $result = mysqli_query($mysqli, $sql);
    
    if ($result) {
        echo "<script>alert('Ubah Password Sukses Silahkan Melakukan Login');window.location.href='login.php'</script>";
    }
}

?>

<body>
    <?php include "includes/headerlogin.php " ?>
    <!-- breadcrumb start-->

    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Masukkan Password Baru</h2>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Silahkan Massukan Password Baru</h3>
                            <form class="row contact_form" action="input_new_password.php?id=<?= $_GET['id'] ?>" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="hidden" class="form-control" required id="id" name="id" value="<?= $_GET['id'] ?>" placeholder="password baru">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" required id="password_baru" name="password_baru" value="" placeholder="password baru">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                    </div>
                                    <button type="submit" value="ubah" class="btn_3">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <!--::footer_part start::-->
    <?php include "includes/footer.php" ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <!-- jquery -->
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
    <script src="js/stellar.js"></script>
    <script src="js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>