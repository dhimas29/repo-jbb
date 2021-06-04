


<?php
include "../database/connect.php";

    

function insertProduct($nama_product, $gambar, $jenis_produk, $ukuran, $harga,$harga_modal,$margin,$des,$stock)
{
    global $mysqli;

    $nameFile = date("s") + rand(0, 9999) . "." . $ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);

    $namaSementara = $gambar['tmp_name'];


    $dirUpload = "../img/product/";

    $terupload = move_uploaded_file($namaSementara, $dirUpload . $nameFile);


    $query = "INSERT INTO tb_produk VALUES(null,'$nama_product','$nameFile','$jenis_produk','$ukuran','$harga','$stock','$harga_modal','$margin','$des')";
    $result = mysqli_query($mysqli, $query);

    return $result;
}


function insertCart($id_product, $id_pengguna, $jumlah_beli)
{
    global $mysqli;
    $query = "INSERT INTO  tb_cart VALUES (null,'$id_product','$id_pengguna',$jumlah_beli,0)";
    mysqli_query($mysqli, $query);
    $last_id = mysqli_insert_id($mysqli);
    return $last_id;
}


function insertTransaction($id_cart, $total_harga, $jumlah_beli)
{
    global $mysqli;
    $query = "INSERT INTO tb_transaksi VALUES(null,$id_cart,'$jumlah_beli','$total_harga')";
    $result = mysqli_query($mysqli, $query);
    return $result;
}



?>