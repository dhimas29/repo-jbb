


<?php 


include "../database/connect.php";


function deleteCart($id_cart){
    global $mysqli;
    $query = "DELETE from tb_cart where id_cart = '$id_cart' ";

    $result = mysqli_query($mysqli,$query);

    return $result;
}


function deleteProduct($id_produk){
    global $mysqli;
    $query = "DELETE from tb_produk where id_produk = '$id_produk'";
    $result = mysqli_query($mysqli,$query);
    return $result;
}


