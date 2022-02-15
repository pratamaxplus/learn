<?php 
require_once "../koneksi.php";
require_once "../functions.php";
check_login();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
	<?php include "../contents/headscript.php"; ?>
	<style>
		body{
			background-color: #EEE8AA;
		}
	</style>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<div class="container">
			<div class="col-sm-12">
				<h2 class="h2 mb-4">Data Member Perpustakaan</h2>
				<a href="form_member.php" class="btn btn-primary mb-2">Tambah Member</a>
			</div>
			<div class="col-sm-12">
				<table class="table table-striped">
					<thead class="bg-dark text-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">ID Member</th>
							<th scope="col">Nama Lengkap</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">Alamat</th>
							<th scope="col">No Telp</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						require_once "../koneksi.php";
						$conn = buka_koneksi();
						$query = "SELECT* FROM tb_member";
						$hasil = mysqli_query($conn, $query);
						$i =1;
						while($row = mysqli_fetch_assoc($hasil)){
							echo "<tr>";
							echo "<td>".$i++."</td>";
							echo "<td>$row[id_member]</td>";
							echo "<td>$row[nama_lengkap]</td>";
							echo "<td>$row[jenis_kelamin]</td>";
							echo "<td>$row[alamat]</td>";
							echo "<td>$row[no_telp]</td>";
							echo "<td>
							<a class = 'btn btn-success' href='update_member.php?idm=$row[id_member]'>Ubah</a>
							<a class = 'btn btn-danger' href='member_delete.php?idm=$row[id_member]'>Hapus</a>
							</td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>  		
		</div>	
	</main>


	<?php include "../contents/footer.php"; ?>

</body>
</html>