<?php 

include "../logic/proses_input.php";
include "../logic/proses_delete.php";


  if(isset($_GET['delete'])){
    $id_produk = $_GET['id_product'];
    if(deleteProduct($id_produk)){
      
      echo "<script>alert('sukses hapus');window.location.href='data_product.php'</script>"; 
    }else{
      
      echo "<script>alert('gagal tambah');window.location.href='data_product.php'</script>";
    }
  }



 if(isset($_POST['simpan'])){
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $ukuran = $_POST['ukuran'];
    $category = $_POST['category'];
    $image = $_FILES['image'];
    
    if(insertProduct($nama_produk,$image,$category,$ukuran,$harga)){
     echo "<script>alert('sukses tambah');window.location.href='data_product.php'</script>";
    }else{
      echo "<script>alert('gagal tambah');window.location.href='data_product.php'</script>";
    }

        
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php";?>
</head>
<body class="hold-transition sidebar-mini layout-fixed"> 
<div class="wrapper">
    <?php include "includes/header.php";?>
    <?php include "includes/sidebar.php";?>

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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Produk</li>
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
                <h3 class="card-title">Input Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" action="data_product.php">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Produk</label>
                    <input type="text" class="form-control" id="" name="nama_produk">
                  </div>
                  <div class="form-group">
                  <label >Kategori</label>
                  <?php 
                  include "../database/connect.php";
                  $query = "SELECT * FROM tb_jenis_produk";
                  $result = mysqli_query($mysqli,$query);

                  ?>

                  <select class="form-control" name="category">
                  <option>----pilih----</option>
                  <?php   while( $row = mysqli_fetch_assoc($result)){?> 
                          <option value="<?= $row['id_jenis']?>"><?= $row['nama_jenis']?></option>

                  <?php }?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label >Ukuran</label>
                    <input type="text" class="form-control" id="" name="ukuran">
                  </div>
                  <button type="submit" class="btn btn-primary">Tentukan Harga (Margin Price)</button>
                  <br><br>
                  <div class="form-group">
                    <label >Harga</label>
                    <input type="text" class="form-control" id="" name="harga">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
    
    <!-- /.content -->
  </div>
    
    
    
    <?php include "includes/footer.php";?>
    <?php include "includes/js.php";?>
</div>
</body>
</html>