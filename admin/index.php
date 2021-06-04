<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "includes/head.php";
  include '../database/connect.php';
  $query = "SELECT * FROM tb_pengguna";
  $result = mysqli_query($mysqli, $query);

  $query1 = "SELECT * FROM tb_transaksi where status_transaksi='Pesanan Telah Diterima'";
  $result1 = mysqli_query($mysqli, $query1);

  $query2 = "SELECT * FROM tb_produk";
  $result2 = mysqli_query($mysqli, $query2);


  $total_keuntungan = 0;

  while ($row = mysqli_fetch_assoc($result1)) {
    $total_keuntungan += $row['total_harga'];
  }
  $jumlah_product = $result2->num_rows;
  $pengguna = $result->num_rows;
  $jumlah_transaksi = $result1->num_rows;

  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include "includes/header.php"; ?>
    <?php include "includes/sidebar.php"; ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $pengguna ?></h3>

                  <p>Jumlah Pengguna</p>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= "Rp " . number_format($total_keuntungan, 2, ",", ".");?> </sup></h3>

                  <p>Pendapatan</p>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?= $jumlah_transaksi ?></h3>

                  <p>Jumlah Transaksi</p>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= $jumlah_product ?></h3>

                  <p>Jumlah Produk</p>
                </div>

              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>



    <?php include "includes/footer.php"; ?>
    <?php include "includes/js.php"; ?>
  </div>
</body>

</html>