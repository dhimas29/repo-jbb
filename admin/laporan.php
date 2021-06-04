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
              <h1 class="m-0 text-dark">Data Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Laporan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">Data Laporan</h3>
                  <div class="card-tools">

                  </div>
                </div>

                <?php
                include '../database/function.php';
                $dataTransaksi = getAllDataUser("SELECT * from tb_transaksi,tb_pengguna,tb_produk,tb_cart WHERE
                                                  tb_transaksi.id_cart = tb_cart.id_cart AND
                                                  tb_cart.id_pengguna = tb_pengguna.id_pengguna AND
                                                  tb_cart.id_produk = tb_produk.id_produk AND tb_transaksi.status_transaksi = 'Pesanan Telah Diterima'");

                ?>

                <div class="card-body table-responsive p-0" id="table">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>No Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Beli</th>
                        <th>Harga Satuan</th>
                        <th>Harga Modal</th>
                        <th>Margin</th>
                        <th>Tanggal Transaksi</th>
                        <th>Status Transaksi</th>
                        <th>Total Bayar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $x = 1;
                      $keuntungan = 0;
                      foreach ($dataTransaksi as $row) {
                        if($row['jumlah_beli'] > 1){
                          for($i = 0 ; $i<=$row['jumlah_beli']-1;$i++){
                            $keuntungan += $row['total_harga']/$row['jumlah_beli']-($row['harga_modal']);   
                          }
                          
                        }else{
                          $keuntungan+= $row['harga']-$row['harga_modal'];
                        
                        }
                        ?>
                        <tr>
                          <td><?= $x; ?></td>
                          <td><?= $row['nama'] ?></td>
                          <td><?= $row['no_transaksi'] ?></td>
                          <td><?= $row['nama_produk'] ?></td>
                          <td><?= $row['jumlah_beli'] ?></td>
                          <td>Rp <?= number_format($row['harga'], 0, ".", ".")?></td>
                          <td>Rp <?= number_format($row['harga_modal'], 0, ".", ".") ?></td>
                          <td><?= $row['margin']  ?> %</td>
                          <td><?= $row['tanggal_transaksi'] ?></td>
                          <td><?= $row['status_transaksi'] ?></td>

                          <td>
                          Rp <?= number_format($row['total_harga'], 0, ".", ".") ?>
                          </td>

                          </td>


                        </tr>
                      <?php $x+=1;  } ?>
                    </tbody>
                    <br>
                       <tr>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Keuntungan : Rp <?= number_format($keuntungan,2) ?> </tr>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>



          <!-- /.col -->

          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <button onclick='printReady()' class="btn btn-default"><i class="fas fa-print"></i> Print</button>

            </div>
          </div>




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