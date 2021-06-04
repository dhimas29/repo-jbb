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
              <h1 class="m-0 text-dark">Data Transaksi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data transaksi</li>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">Data transaksi</h3>
                  <div class="card-tools">

                  </div>
                </div>
                <!-- /.card-header -->
                <?php
                include '../database/function.php';
                $dataTransaksi = getAllDataUser("SELECT * from tb_transaksi,tb_pengguna,tb_produk,tb_cart WHERE
                                                  tb_transaksi.id_cart = tb_cart.id_cart AND
                                                  tb_cart.id_pengguna = tb_pengguna.id_pengguna AND
                                                  tb_cart.id_produk = tb_produk.id_produk AND status_transaksi!='di terima' Group By tb_transaksi.no_transaksi");

                ?>

                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>

                        <th>Nama Pemesan</th>
                        <th>Nama Barang</th>
                        <th>Total Bayar</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Konfirmasi</th>
                        <th>rincian</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $i = 1;
                      foreach ($dataTransaksi as $row) {
                        $i++; ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $row['no_transaksi'] ?></td>
                          <td><?= $row['nama'] ?></td>
                          <td><?= $row['nama_produk'] ?></td>
                          <td>Rp <?= number_format($row['total_harga'], 0, ".", ".") ?></td>
                          <td><?= $row['tanggal_transaksi'] ?></td>

                          <td><img src="http://localhost/muliajasafurniture/img/bukti/<?= $row['bukti_pembayaran'] ?>" width="100" alt=""></td>
                          <td><?= $row['status_transaksi'] ?></td>
                          <td>
                            <?php if ($row['status_transaksi'] == 'di proses') { ?>
                              <a href="<?= "accept_lunas.php?no_transaksi=" . $row['no_transaksi'] ?>" class="btn btn-primary">Konfirmasi Pembayaran</a>
                            <?php } ?>
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