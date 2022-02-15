<?php
require_once "../koneksi.php"; 
require_once "../functions.php";
check_login();
$list_penerbit = get_penerbit();
$param_kode =$_GET['kode_buku'];
$conn = buka_koneksi();

$query = "SELECT * FROM tb_buku WHERE kd_buku = '$param_kode'";
$hasil = mysqli_query($conn, $query);
$old_data = array();
$find_data = FALSE;
if ($row = mysqli_fetch_assoc($hasil)) {
	$old_data = $row;
	
	$kode_buku = $_POST['kode_buku'] ?? $old_data['kd_buku'];
	$judul = $_POST['judul'] ?? $old_data['judul_buku'];
	$pengarang = $_POST['pengarang'] ?? $old_data['pengarang'];
	$jenis = $_POST['jenis'] ?? $old_data['jenis_buku'];
	$penerbit = $_POST['penerbit'] ?? $old_data['kd_penerbit'];
	$rak = $_POST['rak'] ?? $old_data['kd_rak'];

	$isError = FALSE;
	$error ='';
}

if ($find_data && isset($_POST['simpan'])) {
  //validasi data
	if ($kode_buku =='') {
		$isError = TRUE;
		$error = 'Kode Buku Harap DiIsi!';
	}
  //simpan ke database
	if (!$isError) {
		$conn = buka_koneksi();

		$query = $query = "UPDATE tb_buku SET
		judul_buku = '$judul',
		pengarang = '$pengarang',
		jenis_buku = '$jenis',
		kd_penerbit = '$penerbit',
		kd_rak = '$rak'
		WHERE
		kd_buku = '$old_data[kd_buku]'";
		$hasil = mysqli_query($conn, $query);
		if ($hasil) {
			redirect('buku/buku.php');
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
	<title>Perpustakaan</title>
	<?php include "../contents/headscript.php"; ?>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php
		if ($find_data) {
			include "form_input.php";
		}else{
			echo '<div class="alert alert-danger" role="alert">Kode Buku Tidak di Temukan!</div>';
		}  
		?>
	</main>
</main>
<?php include "../contents/footer.php"; ?>
</body>
</html>