<?php session_start(); ?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->




  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <!-- <a class="nav-link" data-toggle="dropdown" href="#"> -->
      <a class="navbar-brand" data-toggle="dropdown" href="#">
        <img src="dist/img/user.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="30">
        <span class="brand-text font-weight-light"><?= ucwords($_SESSION['nama']); ?></span>
      </a>
      <!-- </a> -->
      <div class="dropdown-menu">
        <!-- <a href="#" class="dropdown-item">
          Pengaturan Akun
        </a> -->
        <!-- <div class="dropdown-divider"></div> -->
        <a href="../proses_logout.php" class="dropdown-item">
          Logout
        </a>
      </div>
    </li>

  </ul>
</nav>