<?php
require_once "../koneksi.php"; 
require_once "../functions.php";
check_login();
$list_penerbit = get_penerbit();
$kode_buku = $_POST['kode_buku'] ?? '';
$judul = $_POST['judul'] ?? '';
$pengarang = $_POST['pengarang'] ?? '';
$jenis = $_POST['jenis'] ?? '';
$penerbit = $_POST['penerbit'] ?? '';
$rak = $_POST['rak'] ?? '';

$isError = FALSE;
$error ='';
if (isset($_POST['simpan'])) {
  //validasi data
	if ($kode_buku =='') {
		$isError = TRUE;
		$error = 'Kode Buku Harap DiIsi!';
	}
  //simpan ke database
	if (!$isError) {
		$conn = buka_koneksi();

		$query = "INSERT INTO tb_buku (kd_buku, judul_buku, pengarang, jenis_buku, kd_penerbit, kd_rak) VALUES ('$kode_buku', '$judul', '$pengarang', '$jenis', '$penerbit', '$rak')";
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
		<form method="POST">
		<table>
			<tr>
				<td>ID Buku</td>
				<td>:</td>
				<td><input type="text" id="kd_buku" name="kd_buku" value="<?= $kd_buku ?>"></td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td>:</td>
				<td><input type="text" id="judul_buku" name="judul_buku" value="<?= $judul_buku ?>"></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td>:</td>
				<td><input type="text" id="pengarang" name="pengarang" value="<?= $pengarang ?>"></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td>:</td>
				<td><input type="text" id="stok" name="stok" value="<?= $stok ?>"></td>
			</tr>
		</table>
		<button type="submit" name="simpan" value="simpan">Submit</button>
		<button type="submit"><a href="buku.php">Kembali</a></button>
	</form>
	</main>
	<?php include "../contents/footer.php"; ?>
</body>
</html>