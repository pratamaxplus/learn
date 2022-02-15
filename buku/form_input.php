<div class= "container">
	<h2 class="h2 mb-4">Form Tambah Buku</h2>
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>
	<form method="POST">
		<div class="form-group row">
			<label for="kode_buku" class="col-sm-2 col-form-label">Kode Buku</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kode_buku" placeholder="Input Kode Buku" name="kode_buku" value="<?= $kode_buku ?>" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label for="judul" class="col-sm-2 col-form-label">Judul</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="judul" placeholder="Input Judul Buku" name="judul" value="<?= $judul ?>" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="pengarang" placeholder="Input Nama Pengarang" name="pengarang" value="<?= $pengarang ?>" autocomplete="off">
			</div>
		</div>
		<fieldset class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-2 pt-0">Jenis Buku</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="rb-bp" value="Buku Pelajaran"<?= $jenis == "Buku Pelajaran" ? 'checked' : '' ?> >
						<label class="form-check-label" for="rb-bp">Buku Pelajaran</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="rb-bf" value="Buku Fiksi"<?= $jenis == "Buku Fiksi" ? 'checked' : '' ?> >
						<label class="form-check-label" for="rb-bf">Buku Fiksi</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="rb-ki" value="Karya Ilmiah"<?= $jenis == "Karya Ilmiah" ? 'checked' : '' ?>>
						<label class="form-check-label" for="rb-ki">Karya Ilmiah</label>
					</div>
				</div>
			</div>
		</fieldset>
		<div class="form-group row">
			<label for="rak" class="col-sm-2 col-form-label">Penerbit</label>
			<div class="col-sm-10">
				<select class="form-control" id="penerbit" name="penerbit">
					<option>Nama Penerbit</option>
					<?php 
					if (count($list_penerbit) > 0) {
						foreach ($list_penerbit as $kode => $nama) {
							$pilih = '';
							if ($penerbit == $kode) {
								$pilih = 'selected';
							}
							echo "<option value='$kode' $pilih> $nama </option>";
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="rak" class="col-sm-2 col-form-label">Lokasi Rak</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="rak" placeholder="Input No Rak" name="rak" value="<?= $rak ?>" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
			</div>
		</div>
	</form>
</div>