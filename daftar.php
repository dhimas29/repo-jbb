<!doctype html>
<html lang="zxx">
<?php include "includes/head.php"?>
<body>  
<?php include "includes/headerlogin.php "?>
    <!-- breadcrumb start-->
    
    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Daftar Akun</h2>
                            <p>Silahkan Daftar akun Untuk mulai pembelian</p>
                           
                        </div>
                    </div>
                </div>
            
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3><br>
                                Silahkan Daftar Untuk Memulai Pembelian</h3>
                            <form class="row contact_form" action="proses_daftar.php" method="post" novalidate="novalidate" width>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value=""
                                        placeholder="nama">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email" value=""
                                        placeholder="email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="notelp" name="notelp" value=""
                                        placeholder="No Telp">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value=""
                                        placeholder="Alamat">
                                </div>
                               
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="username" name="username" value=""
                                        placeholder="username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    
                                    <button type="submit" value="submit" class="btn_3">
                                       Daftar
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
    <?php include "includes/footer.php"?>
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