<?php 

include "../database/connect.php";

if(isset($_GET['id_product'])){

  $id_product = $_GET['id_product'];
 
  $sql = "SELECT * from tb_produk where id_produk='$id_product'";
 
  $result = mysqli_query($mysqli,$sql);
 
  $fetch = mysqli_fetch_object($result);
}
 
  if(isset($_POST['edit_btn'])){
    $nama_produk = $_POST['nama_produk'];
    $id_product = $_POST['id_product'];
    $harga = $_POST['harga'];
    $ukuran = $_POST['ukuran'];
    $category = $_POST['category'];
    $image = $_FILES['image'];
    $jenis_product = $_POST['category'];
    $harga_modal = $_POST['bahan_baku'];
    $margin = $_POST['margin'];
    $stok = $_POST['stok'];
    $desc = $_POST['desc'];

    
    $nameFile = date("s")+rand(0,9999).".".$ext = pathinfo($image['name'], PATHINFO_EXTENSION);       

    $namaSementara = $image['tmp_name'];
    

    $dirUpload = "../img/product/";
    
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$nameFile);

    $sqlEdit = "Update tb_produk set nama_produk='$nama_produk',stok='$stok',gambar='$nameFile', jenis_produk='$jenis_product',ukuran='$ukuran',harga='$harga',harga_modal= '$harga_modal',margin='$margin', des='$desc' where id_produk= '$id_product'";
  
    $result = mysqli_query($mysqli,$sqlEdit);
  
    if($result){
      echo "<script>alert('sukses ubah');window.location.href='data_product.php'</script>";
    }else{
      echo "<script>alert('gagal ubah');window.location.href='edit_product.php?id_product=$id_product'</script>";
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
                <h3 class="card-title">Edit Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" enctype="multipart/form-data" action="edit_product.php">
                <div class="card-body">
                <input type="hidden" class="form-control" id="" name="id_product" value="<?= $fetch->id_produk?>">
                  <div class="form-group">
                    <label >Nama Produk</label>
                    <input type="text" class="form-control" id="" name="nama_produk" value="<?= $fetch->nama_produk?>">
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
                    <label >Stok</label>
                    <input type="text" class="form-control" id="" name="stok" value="<?= $fetch->stok?>">
                  <div class="form-group">
                    <label >Ukuran</label>
                    <input type="text" class="form-control" id="" name="ukuran" value="<?= $fetch->ukuran?>">
                  </div>
                  <a  data-target="#modal_delete" data-toggle="modal" class="btn btn-primary text-white">Tentukan Harga (Margin Price)</a>
                  <br><br>
                  <div class="form-group">
                    <label >Harga</label>
                    <input type="text" readonly class="form-control" id="harga_product" name="harga" value="<?= $fetch->harga?>">
                  </div>
                  <div class="form-group">
          <label>Bahan baku modal</label>
          <input type="text"readonly class="form-control" id="bhn_baku" name="bahan_baku" value="<?= $fetch->harga_modal?>">
        </div>
        
        
        

        <div class="form-group">
          <label>margin</label>
          <input type="text" readonly class="form-control" id="mrgn" name="margin" value='<?= $fetch->margin?>'>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name='image'type="file" class="custom-file-input"  onchange="fileSelect(event)" id="exampleInputFile">
                        <label id="filetitle"class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>
                
                </div>
                <!-- /.card-body -->
                <div class="form-group">
                      <label>Tentang Produk</label>
                      <textarea type="text" rows="3" class="form-control" id="desc" name="desc" ><?= $fetch->des?></textarea>
                    </div>
                <div class="card-footer">
                  <button type="submit" name= "edit_btn"class="btn btn-primary" name='simpan'>Simpan</button>
                </div>
              </form>
            </div>

           <!-- Main content -->
   </div>
    <!-- /.content -->
  </div>
  </div>
    
    <script>
    function fileSelect( e){
        document.getElementById('filetitle').innerHTML =e.target.files[0].name;
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
          <label>margin</label>
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
    <?php include "includes/footer.php";?>
    <?php include "includes/js.php";?>
</div>
</body>
</html>




