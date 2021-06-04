<?php
include '../database/function.php';
if (isset($_POST['submit'])) {
    if ($_FILES['bukti']['size'] > 0) {
        if (add_dp($_POST) > 0) {
            echo "<script>alert ('Pembayaran berhasil dibayarkan,silahkan tunggu konfirmasi selanjutnya'); window.location='../transsaksisaya.php'</script>";
        } else {
            echo "<script>alert ('Pembayaran gagal dibayarkan'); window.location='../transsaksisaya.php'</script>";
        }
    } else {
        echo "<script>alert ('mohon masukan bukti pembayaran'); window.location='../transsaksisaya.php'</script>";
    }
}
