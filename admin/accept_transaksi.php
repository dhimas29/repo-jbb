<?php
include "../database/connect.php";


$no_transaksi = $_GET['no_trans'];
$sql = "UPDATE tb_transaksi set status_transaksi='silahkan lakukan pembayaran' where no_transaksi='$no_transaksi'";
$result = mysqli_query($mysqli, $sql);
if ($result) {
    echo "<script>alert('Sukses Menerima Pesanan');window.location.href='../admin/data_pemesanan.php'</script>";
} else {
    echo "<script>alert('Gagal Menerima Pesanan');window.location.href='../admin/data_pemesanan.php'</script>";
}
