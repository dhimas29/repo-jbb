<?php 

include "../database/connect.php";
$no_transaksi = $_GET['no_transaksi'];
$sql = "Delete from tb_transaksi where no_transaksi='$no_transaksi'";

$result = mysqli_query($mysqli,$sql);

if($result){
    echo "<script>alert('sukses batalkan pesanan');window.location.href='data_pemesanan.php'</script>";
}