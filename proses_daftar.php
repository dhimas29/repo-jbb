<?php 
include "database/connect.php";

$username = $_POST['username'];

$password= md5($_POST['password']);

$name = $_POST['name'];

$email = $_POST['email'];

$notelp = $_POST['notelp'];

$alamat = $_POST['alamat'];


if(!empty($username) && !empty($password)&& !empty($name) && !empty($email) && !empty($notelp)){
    $query = "INSERT INTO tb_pengguna (nama,username,email,password,no_telp,type_user,alamat)VALUES ('$name','$username','$email','$password','$notelp','customer','$alamat')";

    $result = mysqli_query($mysqli,$query);
    
    if($result ){
        echo "<script>alert('Sukses Daftar');window.location.href='login.php'</script>";
    }
}else{
    echo "<script>alert('lengkapi data pendaftaran);window.location.href='daftar.php'</script>";
}