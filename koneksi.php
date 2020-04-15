<?php 

$host = "localhost";
$username = "root";
$password = "";
$db = "pelanggan";

$koneksi = mysqli_connect($host, $username, $password, $db);
if (!$koneksi) {
	echo "Koneksi Gagal!";
}

 ?>