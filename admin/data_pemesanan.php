<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "includes/head.php"; ?>
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
              <h1 class="m-0 text-dark">Data pemesanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data pemesanan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
      include '../database/function.php';
      $data_pemesansan = getAllDataUser("SELECT * FROM tb_transaksi,tb_cart,tb_pengguna,tb_produk WHERE
      tb_transaksi.id_cart = tb_cart.id_cart AND
      tb_cart.id_pengguna = tb_pengguna.id_pengguna AND 
      tb_cart.id_produk = tb_produk.id_produk AND status_transaksi= 'Di Terima' Group by tb_transaksi.no_transaksi
     ");

      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">Data pemesanan</h3>
                  <div class="card-tools">

                  </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Total Harga</th>
                        <th>Status Transaksi</th>
                        <th>Konfirmasi</th>
                        <th>Batal</th>
                        <th>Rincian</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $i = 1;
                      foreach ($data_pemesansan as $row) {
                        $i++; ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $row['nama']; ?></td>
                          <td><?= $row['nama_produk'] ?></td>
                          <td><?= $row['jumlah_beli'] ?></td>
                          <td><?= $row['tanggal_transaksi'] ?></td>
                          <td><?= "Rp" . number_format($row['total_harga'], 2, ",", "."); ?></td>
                          <td><?= $row['status_transaksi'] ?></td>
                          <td>
                            <center>
                              <a href='accept_transaksi.php?no_trans=<?= $row['no_transaksi'] ?>' class="btn btn-primary"><i class="fa fa-check"></i></a>
                            </center>
                          </td>
                          <td>
                            <center>
                              <a href="<?= "reject_order.php?no_transaksi=" . $row['no_transaksi'] ?>" onclick="confirm('Apakah Anda Yakin ingin membantalkan pesanan ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </center>
                          </td>
                          <td>
                            <a href="rincian_page.php?no_transaksi=<?= $row['no_transaksi'] ?>" class="btn btn-primary">Rincian</a>
                          </td>
                        </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
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