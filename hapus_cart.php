<?php
include 'database/function.php';
$id = $_GET['id'];
if (deleteCart($id)) {

    echo "<script> window.alert('Data Cart berhasil dihapus');window.location.href='cart.php';</script>";
} else {
    echo "<script> window.alert('Data Cart gagal dihapus');window.location.href='cart.php';</script>";
}
