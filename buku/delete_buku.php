<?php 
	require_once "../koneksi.php";
	require_once "../functions.php";

	check_login();

	$kode_buku = $_GET['kode_buku'];

	$conn = buka_koneksi();

	$query = "DELETE FROM tb_buku WHERE kd_buku = '$kode_buku'";

	$hasil = mysqli_query($conn, $query);

	if ($hasil) {
		redirect('buku/buku.php');
	}else{
		echo "Gagal Menghapus data $kode_buku : ". mysqli_error($conn);
	}
 ?>