
<?php
include "../logic/proses_input.php";
session_start();
$id_pengguna = $_SESSION['id_pengguna'];
$id_produk = $_POST['id_produk'];
$result = insertCart($id_produk, $id_pengguna, $jumlah_beli);
if ($result) {
    json_encode($result);
}
?>