<?php
include "connect.php";


function getAllDataUser($query)
{
    global $mysqli;
    $result = mysqli_query($mysqli, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getDataStock($query)
{
    global $mysqli;
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_row($result);
      
    return $row;
}

function updateDataUser($data)
{
    global $mysqli;
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);
    $passwordMd5 = md5($password);
    $no_telp = htmlspecialchars($data['no_telp']);
    $alamat = htmlspecialchars($data['alamat']);

    $checkData = "SELECT * from tb_pengguna WHERE username = '$username'";
    $dataUser = getAllDataUser($checkData);

    $checkPassword = $dataUser[0]["password"];
    if ($checkPassword == $password) {

        $query = "UPDATE tb_pengguna set nama = '$nama', email = '$email',  no_telp = '$no_telp', alamat = '$alamat' where  username = '$username'";
    } else {
        $query = "UPDATE tb_pengguna set nama = '$nama', email = '$email', password = '$passwordMd5', no_telp = '$no_telp', alamat = '$alamat' where  username = '$username'";
    }
    mysqli_query($mysqli, $query);
    return mysqli_affected_rows($mysqli);
}

function insertDataProduct($data)
{
    global $conn;
    var_dump($data);
    die;
}

function editCart($id_cart)
{
    global $mysqli;
    $sql = "UPDATE tb_cart set is_order=1 where id_cart='$id_cart'";   
    mysqli_query($mysqli, $sql);
}

function addTransaksi($id_cart, $total_harga, $noTrans)
{
    global $mysqli;
    // $idPengguna = $_SESSION['id_pengguna'];
    $idCart = $id_cart;
    $total_harga = $total_harga;
    $date = date("Y-m-d");
    $sql = "INSERT INTO tb_transaksi VALUES (null,'$idCart','$noTrans','$total_harga','$date','Di Terima','')";
    // $sqlDeleteCart = "DELETE FROM tb_cart WHERE id_pengguna = '$idPengguna'";

    $result =  mysqli_query($mysqli, $sql);
    return $result;
}

function prosesTransaksi($data)
{
    var_dump($data);
    die;
}

function add_dp($data)
{
    global $mysqli;
    $id_transaksi = $data['no_trans'];
    $jumlah_bayar = $data['bayar'];
    $status_transaksi = "di proses";
    $dir = "../img/bukti/";
    $gambar = _uploadImage("bukti", $dir);

    if ($jumlah_bayar != null) {
        $sql_update_pembayaran = "UPDATE tb_transaksi set status_transaksi = '$status_transaksi',bukti_pembayaran = '$gambar'
                                        WHERE no_transaksi = '$id_transaksi'";
        mysqli_query($mysqli, $sql_update_pembayaran);
        return mysqli_affected_rows($mysqli);
    } else {
        return false;
    }
}

function _uploadImage($name, $dir)
{
    $target_dir = $dir;
    $nameFile = date("s") + rand(0, 9999);
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    //print_r($target_file);die;
    $uploadOk = 1;
    if (file_exists($target_dir)) {
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $newName = $nameFile . "." . $imageFileType;
        $destionation = $target_dir . $newName;
        if ($imageFileType == "jpg" || $imageFileType == "png") {
            if (move_uploaded_file($_FILES[$name]["tmp_name"], $destionation)) {
                return $newName;
            } else {

                return null;
            }
        } else {
            return null;
        }
    } else {
        mkdir($target_dir, 0744);
        return null;
    }
}

function add_lunas($data)
{
    global $mysqli;
    $id_transaksi = $data['no_trans'];
    $jumlah_bayar = $data['dibayar'];
    $status_transaksi = "di proses";

    $dir = "../img/bukti/";
    $gambar = _uploadImage("bukti", $dir);
    if ($jumlah_bayar != null) {
        $sql_update_pembayaran = "UPDATE tb_transaksi SET bukti_lunas='$gambar' , status_transaksi = '$status_transaksi' 
                                        WHERE no_transaksi = '$id_transaksi'";
        mysqli_query($mysqli, $sql_update_pembayaran);
        return mysqli_affected_rows($mysqli);
    } else {
        return false;
    }
}

function deleteCart($id)
{
    global $mysqli;
    $sql = "DELETE FROM tb_cart WHERE id_cart = '$id'";
    $result = mysqli_query($mysqli, $sql);
    return $result;
}
