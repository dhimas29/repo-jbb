<?php

include "../logic/proses_input.php";
include "../logic/proses_delete.php";


if (isset($_GET['delete'])) {
  $id_produk = $_GET['id_product'];

  if (deleteProduct($id_produk)) {
    echo "<script>alert('sukses hapus');window.location.href='data_barang.php'</script>";
  } else {
    echo "<script>alert('gagal hapus');window.location.href='data_barang.php'</script>";
  }
}



if (isset($_POST['simpan'])) {
  $nama_produk = $_POST['nama_produk'];
  $harga = $_POST['harga'];
  $ukuran = $_POST['ukuran'];
  $category = $_POST['category'];
  $image = $_FILES['image'];
  $desc = $_POST['desc'];
  $margin = $_POST['margin'];
  $harga_modal = $_POST['bahan_baku'];
  $stock = $_POST['stock'];
  if (insertProduct($nama_produk, $image, $category, $ukuran, $harga, $harga_modal, $margin, $desc, $stock)) {
    echo "<script>alert('sukses tambah');window.location.href='data_barang.php'</script>";
  } else {
    echo "<script>alert('gagal tambah');window.location.href='data_barang.php'</script>";
  }
}

?>
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
              <h1 class="m-0 text-dark">Data Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <class class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Input Data Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="post" enctype="multipart/form-data" action="data_barang.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" id="" name="nama_produk" value="">
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <?php
                      include "../database/connect.php";
                      $query = "SELECT * FROM tb_jenis_produk";
                      $result = mysqli_query($mysqli, $query);

                      ?>

                      <select class="form-control" name="category">
                        <option>----pilih----</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                          <option value="<?= $row['id_jenis'] ?>"><?= $row['nama_jenis'] ?></option>

                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Stock</label>
                      <input type="number" min="1" class="form-control" id="" name="stock" value="">
                    </div>
                    <div class="form-group">
                      <label>Ukuran</label>
                      <input type="text" class="form-control" id="" name="ukuran" value="">
                    </div>
                    <a data-target="#modal_delete" data-toggle="modal" class="btn btn-primary text-white">Tentukan Harga (Margin Price)</a>
                    <br><br>
                    <div class="form-group">
                      <label>Harga</label>
                      <input readonly type="text" class="form-control" id="harga_product" name="harga" value="">
                    </div>

                    <div class="form-group">
                      <label>Bahan Baku modal</label>
                      <input type="text" readonly class="form-control" id="bhn_baku" name="bahan_baku" value="">
                    </div>
                    <div class="form-group">
                      <label>Margin</label>
                      <input type="text" readonly class="form-control" id="mrgn" name="margin" value="">

                      <div class="form-group">
                        <label>Tentang Barang</label>
                        <textarea type="text" rows="3" class="form-control" id="desc" name="desc" value=""></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name='image' type="file" class="custom-file-input" onchange="fileSelect(event)" id="exampleInputFile">
                            <label id="filetitle" class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>

                        </div>
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name='simpan'>Simpan</button>
                    </div>
                </form>
              </div>

              <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header bg-primary">
                          <h3 class="card-title">Data Barang</h3>
                          <div class="card-tools">

                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <?php
                      include "../database/connect.php";
                      $query = "SELECT * FROM tb_produk join tb_jenis_produk ON tb_jenis_produk.id_jenis = tb_produk.jenis_produk";
                      $result = mysqli_query($mysqli, $query);

                      ?>
                      <div class="card-body table-responsive p-0">
                        <table class="table table-bordered ">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Barang</th>
                              <th>Jenis Barang</th>
                              <th>Ukuran</th>
                              <th>Stok</th>
                              <th>Harga</th>
                              <th>Harga Modal</th>
                              <th>Margin</th>
                              <th>Tentang</th>
                              <th>Gambar</th>
                              <th colspan="2" style="text-align: center;">Action</th>
                            </tr>
                          </thead>
                          <?php $i = 1;
                          while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tbody>
                              <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['nama_jenis'] ?></td>
                                <td><?= $row['ukuran'] ?></td>
                                <td><?= $row['stok'] ?></td>
                                <td>Rp <?= number_format($row['harga'], 0, ".", ".") ?></td>
                                <td>Rp <?= number_format($row['harga_modal'], 0, ".", ".") ?></td>
                                <td><?= $row['margin'] ?></td>
                                <td style="text-align: justify;"><?= substr($row['des'], 0, 40) . "..." ?></td>
                                <td><img src="<?= ('../img/product/') . $row['gambar']; ?>" width='50' height='50'></td>
                                <td>
                                  <center>
                                    <a class="btn btn-primary btn-sm" href="edit_product.php?id_product=<?= $row['id_produk'] ?>"></i>Ubah</a>
                                  </center>
                                </td>
                                <td>
                                  <center>
                                    <a class="btn btn-danger btn-sm" href="data_barang.php?delete=true&id_product=<?= $row['id_produk'] ?>" onclick="return confirm ('yakin ingin hapus data?');"><i class="fa fa-trash-o"></i>Hapus</a>
                                  </center>
                                </td </tr> <?php $i++;
                                          } ?>
                            </tbody>
                        </table>
                      </div> <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>

            </div>
          </class>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>



    <?php include "includes/footer.php"; ?>
    <?php include "includes/js.php"; ?>
    <script>
      function fileSelect(e) {
        document.getElementById('filetitle').innerHTML = e.target.files[0].name;
      }


      function marginPrice() {
        var bahan_baku = $('#bahan_baku').val();
        var margin = $('#margin').val();
        margin = margin / 100;
        var hasil = (bahan_baku * margin);

        $("#harga_jual").val(parseInt(hasil) + parseInt(bahan_baku));
        $('#harga_product').val(parseInt(hasil) + parseInt(bahan_baku));
        $('#bhn_baku').val(parseInt(bahan_baku));
        $('#mrgn').val(parseInt($('#margin').val()));


      }

      function batal() {
        $('#bahan_baku').val("");
        $('#margin').val("");
        $('#harga').val("");

      }
    </script>
  </div>
</body>

</html>






<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Margin Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Bahan baku modal</label>
          <input type="text" class="form-control" id="bahan_baku" name="bahan_baku" value="">
        </div>
        <div class="form-group">
          <label>Margin</label>
          <input type="text" class="form-control" id="margin" name="margin" value="">
        </div>
        <div class="form-group">
          <label>Harga</label>
          <input readonly type="text" class="form-control" id="harga_jual" name="harga" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="batal()" class="btn btn-secondary">Batal</button>
        <button type="button" onclick="marginPrice()" class="btn btn-primary">OKE</button>
      </div>
    </div>
  </div>
</div>