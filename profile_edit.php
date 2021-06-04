<?php
session_start();
include "database/connect.php";
$nama = $_POST['nama'];
$noTelp = $_POST['no_telp'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$id_users = $_SESSION['id_pengguna'];
$sql = "Update tb_pengguna set nama='$nama',email='$email',alamat='$alamat',no_telp ='$noTelp' where id_pengguna='$id_users'";

mysqli_query($mysqli, $sql);

echo "<script>alert('sukses ubah profile');window.location.href='edit_profil.php'</script>";
