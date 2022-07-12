<?php
$host = "localhost";
$db   = "smartmet_kuesioner";
$user = "smartmet_kues";
$password = "#123Kues321";

$kon = mysqli_connect($host, $user, $password, $db);
if (!$kon) {
	die("Koneksi gagal:" . mysqli_connect_error());
}
