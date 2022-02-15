<?php 
sleep(1);
require '../functions.php';

$keyword = $_GET ["keyword"];
$query = "SELECT nama_lengkap,judul_buku,tgl_pinjam,tgl_kembali
FROM
tb_buku, tb_member, tb_pinjam
WHERE 
tb_member.id_member = tb_pinjam.id_member
AND
tb_buku.kd_buku = tb_pinjam.kd_buku
AND
tb_buku.judul_buku LIKE '$keyword%'
";
$tampil = query($query);
?>
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
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	</tbody>
</table>