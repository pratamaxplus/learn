<?php 
session_start();
define('BASE_URL', 'http://localhost/perpus2/');
function check_login(){
	if(!isset($_SESSION['username'])){
		redirect("login.php");
	}
}
function get_penerbit(){
	require_once "koneksi.php";
	$conn = buka_koneksi();

	$query = "SELECT kode, penerbit FROM tb_penerbit";
	$hasil = mysqli_query($conn, $query);

	$list = array();
	while($row = mysqli_fetch_assoc($hasil)){
		$list[$row['kode']] = $row['penerbit'];
	}
	return $list;
}
function redirect($file_url){
	$url = BASE_URL . $file_url;
	header("location: $url");
}
function get_namabuku(){
	require_once "koneksi.php";
	$conn = buka_koneksi();

	$query = "SELECT kd_buku, judul_buku FROM tb_buku";
	$hasil = mysqli_query($conn, $query);

	$list = array();
	while($row = mysqli_fetch_assoc($hasil)){
		$list[$row['kd_buku']] = $row['judul_buku'];
	}
	return $list;
}
function get_id(){
	require_once "koneksi.php";
	$conn = buka_koneksi();

	$query = "SELECT id_member FROM tb_member";
	$hasil = mysqli_query($conn, $query);

	$list = array();
	while($row = mysqli_fetch_assoc($hasil)){
		$list[$row['id_member']] = $row['id_member'];
	}
	return $list;
}
function query($query){
	require_once "koneksi.php";
	$conn = buka_koneksi();
	
	$hasil = mysqli_query($conn, $query);
	$rows =[];
	$i =1;
	while($row = mysqli_fetch_assoc($hasil)){
		$rows[] = $row;
	}
	return $rows;
}







?>