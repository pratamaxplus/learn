
<?php 
require_once "../koneksi.php";
require_once "../functions.php";
check_login();

	//null coalescing operation

$idm = $_POST['idm'] ?? '';
$nama = $_POST['nama'] ?? '';
$gender = $_POST['gender'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$telp = $_POST['telp'] ?? '';

$isError = FALSE;
$error ='';
if (isset($_POST['submit'])) {
	//validasi data
	if ($idm =='') {
		$isError = TRUE;
		$error = 'ID Harap DiIsi!';
	}
	//simpan ke database
	if (!$isError) {
		$conn = buka_koneksi();

		$query = "INSERT INTO tb_member (id_member, nama_lengkap, jenis_kelamin, alamat, no_telp) VALUES ('$idm', '$nama', '$gender', '$alamat', '$telp')";
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
		<?php include "input.php" ?>
	</main>


	<?php include "../contents/footer.php"; ?>

</body>
</html>