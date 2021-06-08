<!doctype html>
<html lang="zxx">

<?php include "includes/head.php";

include "database/connect.php";
?>


<body>
  <!--::header part start::-->
  <?php include "includes/header.php " ?>
  <!-- Header part end-->
  <!-- <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-start">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2> </h2>
              <p> <span>-</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <?php
  include 'database/function.php';
  $idUser = $_SESSION['id_pengguna'];
  $queryCart = "SELECT * from tb_cart,tb_pengguna,tb_produk WHERE 
    tb_cart.id_produk = tb_produk.id_produk AND
    tb_cart.id_pengguna = tb_pengguna.id_pengguna AND
    tb_cart.id_pengguna = '$idUser' AND  is_order=0";


  $result = mysqli_query($mysqli, $queryCart);




  ?>
  <section class="product_list section_padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2 style="text-align: center; color: #2e6b73;">Keranjang Saya </h2>



            <div class="card">
              <div class="card-header  bg-primary">
                <h3 style="color:white;" class="card-title">Data Keranjang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-hover text-nowrap">
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Beli</th>
                    <th>Foto</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $i++;
                    ?>
                      <form action="process/add_transaksi.php" method="post">
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $row['nama_produk']; ?></td>
                          <td><?= $row['jumlah_beli'] ?> </td>
                          <td><img src="<?= ('img/product/') . $row['gambar']; ?>" width='50' height='50'></td>
                          <td>
                            <button type="button" onClick="deleteCart('<?= $row['id_cart']; ?>')" data-target="#modal_delete" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                          </td>
                          <input id="id_transaksi" type="hidden" name="id_transaksi">
                          <input type="hidden" name="id_cart[]" value="<?= $row['id_cart']; ?>">
                          <input id="harga_semua" type="hidden" name="total_harga[]" value="<?= $row['harga'] * $row['jumlah_beli'] ?>">
                        </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>

              <!-- /.card-body -->
            </div>
            <a href='checkout.php?iscart=true' style="float:right;margin-top:16px;" class="btn btn-primary text-white">Checkout</a>
            </form>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  </section>
  <!-- /.content -->
  </div>

  </div>
  </div>
  </div>

  </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Cart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p> Anda Yakin ingin menghapus Data tersebut?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <a id="link_delete" href=""> <button type="button" class="btn btn-primary">Hapus</button></a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function deleteCart(id) {
      document.getElementById("link_delete").href = "hapus_cart.php?id=" + id;

    }
  </script>
  <!--::footer_part start::-->
  <?php include "includes/footer.php" ?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/swiper.min.js"></script>
  <!-- swiper js -->
  <script src="js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>



</body>

</html>