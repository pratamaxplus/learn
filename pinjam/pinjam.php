<?php 
require_once "../koneksi.php";
require_once "../functions.php";
check_login();
$list_buku = get_namabuku();
$list_id = get_id();
$id_member = $_POST['idm'] ?? '';
$namabuku = $_POST['namabuku'] ?? '';
$tgl_pinjam = $_POST['tgl_pinjam'] ?? '';
$tgl_kembali = $_POST['tgl_kembali'] ?? '';

$isError = FALSE;
$error ='';
if (isset($_POST['proses'])) {
  //validasi data
	if ($id_member =='') {
		$isError = TRUE;
		$error = 'ID Member Harap DiIsi!';
	}
  //simpan ke database
	if (!$isError) {
		$conn = buka_koneksi();

		$query = "INSERT INTO tb_pinjam (id_member, kd_buku, tgl_pinjam, tgl_kembali) VALUES ('$id_member','$namabuku','$tgl_pinjam','$tgl_kembali')";
		$hasil = mysqli_query($conn, $query);
		if ($hasil) {
			redirect('pinjam/pinjam.php');
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
	<title>Form Pinjam Buku</title>
	<?php include "../contents/headscript.php" ?>
</head>
<body>
	<?php include "../contents/navbar.php" ?>
	<main>
		<?php include "input.php" ?>
	</main>
	<?php include "../contents/footer.php" ?>
</body>
</html>