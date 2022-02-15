<?php 
function buka_koneksi(){

$host = "localhost";
$user = "root";
$pass = "";
$dbname ="perpus";
$koneksi = mysqli_connect($host, $user, $pass, $dbname);
if (mysqli_connect_errno()) {
	die("Gagal Masuk Ke database". mysqli_connect_error());
}
return $koneksi;
}
 ?>