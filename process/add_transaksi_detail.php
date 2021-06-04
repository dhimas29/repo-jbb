<?php
include "../logic/proses_input.php";
include '../database/function.php';
session_start();
$stock = $_POST['stok'] - $_POST['jumlah_beli'];
$id_product = $_POST['id_produk'];
$id_pengguna = $_SESSION['id_pengguna'];
$id_produk = $_POST['id_produk'];
$jml_beli = $_POST['jumlah_beli'];
$total = $_POST['total'];
$noTrans = uniqid() . date('ymd');
$id_cart = $_POST['id_cart'][0];
addTransaksi($id_cart, $total, $noTrans);
editCart($id_cart);
$sql = "UPDATE tb_produk  set stok = '$stock' where id_produk='$id_product' ";
mysqli_query($mysqli, $sql);
echo "<script>alert('Terimakasih Telah Order');window.location.href='../transsaksisaya.php'</script>";
