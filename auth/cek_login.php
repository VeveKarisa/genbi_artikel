<?php

session_start();
// Memanggil koneksi
require('../koneksi.php');

// Mengambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk Login

$query = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");

if (mysqli_num_rows($query) > 0) {
	$data = mysqli_fetch_assoc($query);

	// Hiraukan, buat testing aja
	// echo '<pre>';
	// print_r($username);
	// echo '</pre>';
	// die;

	// Mengatur variable sesi nama jadi nama lengkap pengguna
	$_SESSION['user_id'] = $data['user_id'];
	$_SESSION['name'] = $data['name'];
	// $_SESSION['level'] = $data['level'];


	// Mengatur level user berdasarkan data id level
	header('Location: ../Pages/');
} else {
	echo "<script>alert('Username atau Password Anda salah. Silakan coba lagi!'); window.location='index.php?err=salah';</script>";
}
