<?php 
	require_once "../koneksi.php";
	require_once "../functions.php";

	check_login();

	$idm = $_GET['idm'];

	$conn = buka_koneksi();

	$query = "DELETE FROM tb_member WHERE id_member = '$idm'";

	$hasil = mysqli_query($conn, $query);

	if ($hasil) {
		redirect('member/member.php');
	}else{
		echo "Gagal Menghapus data $idm : ". mysqli_error($conn);
	}
 ?>