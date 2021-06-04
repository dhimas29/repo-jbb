<?php 
include "../database/connect.php";
$no_transaksi = $_GET['no_transaksi'];
$status="menunggu pelunasan";
$sql = "Update tb_transaksi set status_transaksi='$status' where no_transaksi='$no_transaksi'";
$result = mysqli_query($mysqli,$sql);

if($result){
    echo "<script>alert('Sukses Konfirmasi');window.location.href='data_transaksi.php'</script>";
}else{
    echo "<script>alert('Gagal Konfirmasi');window.location.href='data_transaksi.php'</script>";
}