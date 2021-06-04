<!doctype html>
<html lang="zxx">

<?php include "includes/head.php" ?>

<body>
    <!--::header part start::-->
    <?php include "includes/header.php " ?>
    <?php
    include "database/function.php";
    $id = $_SESSION["nama"];
    $user = getAllDataUser("SELECT * from  tb_pengguna where username='$id'");

    if (isset($_POST['submit'])) {

        if (updateDataUser($_POST) > 0) {
            $_SESSION['pesan'] = "Data berhasil di ubah";
            $_SESSION['icon'] = "success";
            $_SESSION['title'] = "Success !";
            echo "<script> window.alert('Data Profile Berhasil di Ubah');
                    window.location.href='edit_profil.php';</script>";
        }
    }

    ?>
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
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2 style="text-align: center; color: #2e6b73;">EDIT PROFIL </h2>

                        <div class="col-md-6 col-lg-12 ftco-animate">
                            <div id="ubahprofil">
                                <div class="product">
                                    <form id="form" action="profile_edit.php" method="post">
                                        <div class="row align-items-end" style="margin:15px;">
                                            <div class="w-100"></div>
                                            <?php $i = 1;
                                            foreach ($user as $row) { ?>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="username">UserName</label>
                                                        <input disabled type="text" id="username" name="username" value="<?= $row['username']; ?>" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" id="email" name="email" value="<?= $row['email']; ?>" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="w-100"></div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" id="nama" name="nama" value="<?= $row['nama']; ?>" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" id="password" value="<?= $row['password']; ?>" name="password" class="form-control" readonly placeholder="">
                                                    </div>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="no_telp">Nomer Telepon</label>
                                                        <input type="text" id="no_telp" name="no_telp" value="<?= $row['no_telp']; ?>" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <input type="text" id="alamat" value="<?= $row['alamat']; ?>" name="alamat" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            <?php $i++;
                                            } ?>
                                            <div class="w-100"></div>
                                            <div class="text py-3 pb-4 px-3 text-center ">
                                                <button type="submit" id="submit" name="submit" class="btn" style="background:#2e6b73;color:white">Submit</button>
                                                <a href="index.php" class="btn" id="cancel" style="background:#FF000000;color:black; border: 2px solid #2e6b73;">Cancel</a>
                                            </div>
                                    </form>
                                </div>
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