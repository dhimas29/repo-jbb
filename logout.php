<?php
session_start();

if(isset($_GET['sukses']) == 'logout'){
    session_destroy();
    header('Location:index.php');
}
