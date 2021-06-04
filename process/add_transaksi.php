<?php
include '../database/function.php';
include '../database/connect.php';
$id_cart = $_POST['id_cart'];
$total = $_POST['total'];
$noTrans = uniqid() . date('ymd');
$stock = $_POST['stok'] - $_POST['jumlah_beli'];

$id_product = $_POST['id_produk'];
if (isset($_POST['submit'])) {
    $len = count($_POST['id_cart']);

    for ($i = 0; $i < $len; $i++) {
        addTransaksi($id_cart[$i], $total, $noTrans);
        editCart($id_cart[$i]);
    }

    // die;
    echo "<script>alert('Terimakasih Telah Order');window.location.href='../transsaksisaya.php'</script>";
}
