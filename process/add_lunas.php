<?php
include '../database/function.php';

if (isset($_POST['submit'])) {
    if ($_FILES['bukti']['size'] > 0) {
        $total_bayar = $_POST['total_bayar'];
        $dibayar = $_POST['dibayar'];
        if ($dibayar == $total_bayar) {
            if (add_lunas($_POST) > 0) {

                echo "<script>alert ('Pelunasan berhasil dibayarkan,silahkan tunggu konfirmasi selanjutnya'); window.location='../transsaksisaya.php'</script>";
            } else {
                echo "<script>alert ('Pelunasan gagal dibayarkan'); window.location='../transsaksisaya.php'</script>";
            }
        } else {

            echo "<script>alert ('mohon masukan nominal pelunasan yang sesuai'); window.location='../transsaksisaya.php'</script>";
        }
    } else {

        echo "<script>alert ('mohon masukan bukti pembayaran'); window.location='../transsaksisaya.php'</script>";
    }
}
