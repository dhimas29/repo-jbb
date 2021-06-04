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
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $_SESSION['nama'] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <?php $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php if ($page == 'index.php') : ?>
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
            <?php endif; ?>
            <?php if ($page != 'index.php') : ?>
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
            <?php endif; ?>
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
            </a>

          </li>
          <?php if (($page == 'data_user.php') || ($page == 'data_product.php')) : ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
              <?php endif; ?>
              <?php if (($page != 'data_user.php') || ($page != 'data_product.php')) : ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <?php endif; ?>
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="data_user.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pengguna</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data_product.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Produk</p>
                  </a>
                </li>
              </ul>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Pemesanan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="data_pemesanan.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pemesanan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data_transaksi.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Transaksi</p>
                  </a>
                </li>

              </ul>
            <li class="nav-item">
              <a href="laporan.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Laporan

                </p>
              </a>
            <li class="nav-item">
              <a href="../proses_logout.php" class="nav-link">
                <i class="nav-icon fa fa-exit"></i>
                <p>
                  Logout

                </p>
              </a>
            </li>
            </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>