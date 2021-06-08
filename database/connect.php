<?php

$base_url_image = "../img/product/";
$databasehost = 'localhost';
$databasename = 'db_bangunan';
$databaseusername = 'root';
$databasepassword = '';

$mysqli = mysqli_connect($databasehost, $databaseusername, $databasepassword, $databasename);

if (!$mysqli) {
    die("gagal terhubung ke database" . mysqli_connect_error());
}
