

<?php
include "../database/connect.php";
$no_transaksi = $_GET['no_transaksi'];
$status = "Pesanan Telah Diterima";
$sql = "Update tb_transaksi set status_transaksi='$status' where no_transaksi = '$no_transaksi'";
$result = mysqli_query($mysqli, $sql);

echo "<script>alert('sukses melakukan konfirmasi');window.location.href='../transsaksisaya.php'</script>";
