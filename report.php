<!DOCTYPE html>
<html>
<head>
	<title>Laporan Permintaan</title>
	
	<?php 
	require_once "koneksi.php";
	require "functions.php";
	check_login();
	$tampil = query("SELECT nama_lengkap,judul_buku,tgl_pinjam,tgl_kembali
		FROM
		tb_buku, tb_member, tb_pinjam
		WHERE 
		tb_member.id_member = tb_pinjam.id_member
		AND
		tb_buku.kd_buku = tb_pinjam.kd_buku");
		?>
		<title>Report</title>
		<style>
			.rounded {
				position: absolute;
				display: none;
				z-index: -1;
				left: 210px;

			}
		</style>
		<?php include "contents/headscript.php"; ?>
	</head>
	<body>
		<?php include "contents/navbar.php" ?>
		<main>
			<div class="container">
				<div class="col-sm-12">
					<h2 class="h2 mb-4">Report Peminjaman Buku</h2>
					
					<div class="col-sm-12">
						<div class="container mb-4">
							<form action="" method="post">
								<div class="form-inline">
									<input type="text" name="keyword" class="form-control" id="keyword" placeholder="Cari Buku" autofocus autocomplete="off">
									<img src="img/loader.gif" class="rounded" width="100">
								</div>
							</form>
						</div>
						<div class="container" id="container">
							<table class="table table-striped">
								<thead class="bg-dark text-light">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nama Member</th>
										<th scope="col">Judul Buku</th>
										<th scope="col">Tanggal Pinjam</th>
										<th scope="col">Tanggal Kembali</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; ?>
									<?php foreach ($tampil as $row) : ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $row['nama_lengkap'] ?></td>
											<td><?= $row['judul_buku'] ?></td>
											<td><?= $row['tgl_pinjam'] ?></td>
											<td><?= $row['tgl_kembali'] ?></td>
											<?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</main>

			<?php include "contents/footer.php" ?> 


		</body>
		</html>