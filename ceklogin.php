<?php

include 'database/connect.php';
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($mysqli, "SELECT * FROM tb_pengguna where username='$username' and password='$password'");
$fetch = mysqli_fetch_array($query);

if ($fetch != null && !empty($username) && !empty($password)) {
	if ($fetch['username'] == $username && $fetch['password'] == $password && $fetch['type_user'] == 'customer') {
		//print_r($fetch['type_user']);die;
		$_SESSION['type_user'] = $fetch['type_user'];
		$_SESSION['id_pengguna'] = $fetch['id_pengguna'];
		$_SESSION['nama'] = $fetch['username'];
		$_SESSION['status'] = "login";
		header('Location:index.php');
	} else if ($fetch['username'] == $username && $fetch['password'] == $password && $fetch['type_user'] == 'admin') {
		//print_r("coeg");print_r($fetch['type_user']);die;
		$_SESSION['type_user'] = $fetch['type_user'];
		$_SESSION['id_pengguna'] = $fetch['id_pengguna'];
		$_SESSION['nama'] = $fetch['username'];
		$_SESSION['status'] = "login";
		header('Location:admin/index.php');
	} else {
		echo "<script>alert ('username dan password yang dimasukkan salah'); window.location='login.php'</script>";
	}
} else if (empty($username)) {
	echo "<script>alert ('Username Tidak Boleh Kosong'); window.location='login.php'</script>";
} else if (empty($password)) {
	echo "<script>alert ('Password Tidak Boleh Kosong'); window.location='login.php'</script>";
}
