<?php
    include '../database/function.php';
    if(isset($_POST['submit'])){
        if(prosesTransaksi($_POST) > 0){
            echo "sukses";
        }else{
            echo "gagal";
        }
    }