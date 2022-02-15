<div class="container">
	<h2 class="h2 mb-4">Form Peminjaman Buku</h2>
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>
	<form method="POST">
		<div class="form-group row">
			<label for="buku" class="col-sm-2 col-form-label">ID Member</label>
			<div class="col-sm-10">
				<select class="form-control" id="idm" name="idm">
					<option>ID Member</option>
					<?php 
					if (count($list_id)>0) {
						foreach ($list_id as $kd => $nama) {
							$pilih = '';
							if ($id_member == $kd) {
								$pilih = 'selected';
							}
							echo "<option value='$kd' $pilih>$nama</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="buku" class="col-sm-2 col-form-label">Buku</label>
			<div class="col-sm-10">
				<select class="form-control" id="namabuku" name="namabuku">
					<option>Daftar Buku</option>
					<?php 
					if (count($list_buku)>0) {
						foreach ($list_buku as $kd => $nama) {
							$pilih = '';
							if ($judul_buku == $kd) {
								$pilih = 'selected';
							}
							echo "<option value='$kd' $pilih>$nama</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="tgl1" class="col-sm-2 col-form-label">Tgl Peminjaman</label>
			<div class="col-sm-10">
				<input class="form-control" type="date" name="tgl_pinjam" id="tgl-pinjam" value="<?= $tgl_pinjam ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="tgl2" class="col-sm-2 col-form-label">Estimasi Tgl Kembali</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $tgl_kembali ?>">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary" name="proses">Proses</button>
			</div>
		</div>
	</form>
</div>