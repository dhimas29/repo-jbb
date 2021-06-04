<!doctype html>
<html lang="zxx">

<?php include "includes/head.php";   $noTransaksi = $_GET['no_transaksi'];?>

<body>
    <!--::header part start::-->
    <?php include "includes/header.php " ?>
    <!-- Header part end-->
    <section class="breadcrumb breadcrumb_bg">
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
    </section>
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <br>
                    
                    <div class="section_tittle text-center">
                        <h2 style="text-align: center; color: #2e6b73;">Rincian Transaksi </h2>
                        <div class="col">
                            <div class="row">
                                <p>No Transaksi : </p>
                                <p>&nbsp; <?= $noTransaksi ?></p>
                            </div>
                        </div>
                        <?php
                        include 'database/function.php';
                        $idPengguna = $_SESSION['id_pengguna'];
                      
                        $dataTransaksi = getAllDataUser("SELECT * FROM tb_transaksi,tb_cart,tb_pengguna,tb_produk WHERE
                                                                tb_transaksi.id_cart = tb_cart.id_cart AND
                                                                tb_cart.id_pengguna = tb_pengguna.id_pengguna AND 
                                                                tb_cart.id_produk = tb_produk.id_produk AND
                                                                tb_cart.id_pengguna = '$idPengguna' AND tb_transaksi.no_transaksi = '$noTransaksi'");


                        ?>



                        <div class="card">
                          
                            
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table id="example1" class="table table-hover text-nowrap">
                                    <tr>
                                        <th>No </th>
                                        
                                        <th>Nama Barang</th>
                                        <th>Harga Produk</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Jumlah Beli</th>
                                        <th>Status</th>
                                      
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($dataTransaksi as $row) {
                                            $i++; ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                           
                                                <td><?= $row['nama_produk']; ?></td>
                                                <td><?= "Rp " . number_format($row['harga'], 2, ",", "."); ?></td>
                                                <td><?= "Rp " . number_format($row['total_harga'], 2, ",", "."); ?></td>
                                                <td><?= $row['tanggal_transaksi']; ?></td>
                                                <td><?= $row['jumlah_beli']; ?></td>
                                                <td><?= $row['status_transaksi'] ?></td>

                                            </tr>
                                        <?php
                                        } ?>


                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
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
    <!-- MODAL DP  -->
    <!-- Modal -->
    <div class="modal fade" id="modal-dp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="process/add_pembayaran.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Jumlah Yang Harus Dibayar</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                </div>
                                <input type="hidden" name="no_trans" id="no_trans">
                                <input type="text" class="form-control" disabled placeholder="..." id="total" name="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Jumlah Bayar</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                </div>
                                <input type="text" class="form-control" placeholder="..." id="bayar" name="bayar" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Bukti Transfer</label>
                            <div class="input-group mb-3">
                                <input type="file" value="" class="form-control" name="bukti" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <p> Silakan Transfer Ke RK:7816130665 Atas Nama Muliajasafurniture</p>
                            </div>
                        </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL Lunas  -->
    <!-- Modal -->
    <div class="modal fade" id="modal-lunas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pembayaran Pelunasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="process/add_lunas.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Biaya Pelunasan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                </div>
                                <input type="text" class="form-control" readonly placeholder="..." id="lunas" name="total_bayar" aria-label="Username" aria-describedby="basic-addon1">
                                <input type="hidden" name="no_transaksi" id="no_transaksi">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Jumlah Bayar</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">RP</span>
                                </div>
                                <input type="text" class="form-control" placeholder="..." id="bayar" name="dibayar" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Bukti Transfer</label>
                            <div class="input-group mb-3">
                                <input type="file" value="" class="form-control" name="bukti" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <p> Silakan Transfer Ke RK:7816130665 Atas Nama Muliajasafurniture</p>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Bayar Lunas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL KONFIRMASI -->
    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="title"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tambahDP(no_transaksi, total_harga) {

            document.getElementById("no_trans").value = no_transaksi;
            document.getElementById("total").value = total_harga;
            console.log(no_transaksi);

        }

        function confirmModal(title) {
            document.getElementById("title").innerHTML = title;
        }

        function tambahLunas(no_transaksi, total_harga, status) {
            if (status == "silahkan bayar dp atau lunas") {
                document.getElementById("lunas").value = total_harga;
            } else {
                document.getElementById("lunas").value = total_harga * 0.5;
            }
            document.getElementById("no_trans").value = no_transaksi;
            // document.getElementById("jumlah_lunas").value = total_harga*0.5;
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