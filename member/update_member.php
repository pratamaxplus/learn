<?php 
require_once "../koneksi.php";
require_once "../functions.php";
check_login();

$param_idm = $_GET['idm'];
$conn = buka_koneksi();

$query = "SELECT * FROM tb_member WHERE id_member = '$param_idm'";
$hasil = mysqli_query($conn, $query);
$old_data = array();
$find_data = FALSE;
if ($row = mysqli_fetch_assoc($hasil)) {
	$old_data = $row;
	$find_data = TRUE;
}
if ($find_data) {
		//null coalescing operation

	$idm = $_POST['idm'] ?? $old_data['id_member'];
	$nama = $_POST['nama'] ?? $old_data['nama_lengkap'];
	$gender = $_POST['gender'] ?? $old_data['jenis_kelamin'];
	$alamat = $_POST['alamat'] ?? $old_data['alamat'];
	$telp = $_POST['telp'] ?? $old_data['no_telp'];

	$isError = FALSE;
	$error ='';
}

if ($find_data && isset($_POST['submit'])) {
	//validasi data
	if ($idm =='') {
		$isError = TRUE;
		$error = 'ID Harap DiIsi!';
	}
	//simpan ke database
	if (!$isError) {
		$conn = buka_koneksi();

		$query = "UPDATE tb_member SET
		nama_lengkap = '$nama',
		jenis_kelamin = '$gender',
		alamat = '$alamat',
		no_telp = '$telp'
		WHERE
		id_member = '$old_data[id_member]'";
		$hasil = mysqli_query($conn, $query);
		if ($hasil) {
			redirect('member/member.php');
		}else{
			$isError = TRUE;
			$error = "Gagal Menyimpan Data : " .mysqli_error($conn);
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Member</title>
	<?php include "../contents/headscript.php"; ?>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php 
		if ($find_data) {
			include "input.php";
		}else{
			echo '<div class="alert alert-danger" role="alert">Kode Member Tidak Di Temukan</div>';
		}
		?>
	</main>


	<?php include "../contents/footer.php"; ?>

</body>
</html>