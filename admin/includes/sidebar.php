<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="font-size: 16px;">
        <img src="../img/favicon.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8;">
        <!-- <img src="img/logomjadmin.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">PT. Baranusa Jaya Bersama</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['nama'] ?></a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <?php $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <?php if ($page == 'index.php') {
                    ?>
                        <a href="index.php" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if (($page == 'data_user.php') || ($page == 'data_product.php') || ($page == 'data_pemesanan.php') || ($page == 'data_transaksi.php')) { ?>
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Manajemen
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                        <?php } else {
                        ?>
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Manajemen
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                            <?php } ?>
                            <li class="nav-item">
                                <?php if ($page == 'data_user.php') {
                                ?>
                                    <a href="data_user.php" class="nav-link active">
                                    <?php } else { ?>
                                        <a href="data_user.php" class="nav-link">
                                        <?php } ?>
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Manajemen Pengguna
                                        </p>
                                        </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($page == 'data_product.php') {
                                ?>
                                    <a href="data_product.php" class="nav-link active">
                                    <?php } else { ?>
                                        <a href="data_product.php" class="nav-link">
                                        <?php } ?>
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Manajemen Produk
                                        </p>
                                        </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($page == 'data_pemesanan.php') {
                                ?>
                                    <a href="data_pemesanan.php" class="nav-link active">
                                    <?php } else { ?>
                                        <a href="data_pemesanan.php" class="nav-link">
                                        <?php } ?>
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Manajemen Pemesanan
                                        </p>
                                        </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($page == 'data_transaksi.php') {
                                ?>
                                    <a href="data_transaksi.php" class="nav-link active">
                                    <?php } else { ?>
                                        <a href="data_transaksi.php" class="nav-link">
                                        <?php } ?>
                                        <i class="nav-icon far fa-circle nav-icon"></i>
                                        <p>
                                            Manajemen Transaksi
                                        </p>
                                        </a>
                            </li>
                            </ul>
                </li>
                <li class="nav-item">
                    <?php if ($page == 'laporan.php') {
                    ?>
                        <a href="laporan.php" class="nav-link active">
                        <?php } else { ?>
                            <a href="laporan.php" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Laporan
                            </p>
                            </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>