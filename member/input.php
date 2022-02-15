<div class="container">
	<h2 class="h2 mb-4">Form Member Baru</h2>
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>
	<form method="POST">
		<div class="form-group row">
			<label for="idm" class="col-sm-2 col-form-label">ID Member</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="idm" placeholder="Input Id Member Baru" 
				name="idm" value="<?= $idm ?>" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nama" placeholder="Input Nama Lengkap Member" 
				name="nama" value="<?= $nama ?>"autocomplete="off">
			</div>
		</div>
		<fieldset class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id="rb-pria" 
						value="Laki-Laki" <?= $gender == "Laki-Laki" ? 'checked' : '' ?> >
						<label class="form-check-label" for="rb-pria">Laki-Laki</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id="rb-wanita" 
						value="Perempuan" <?= $gender == "Perempuan" ? 'checked' : '' ?> >
						<label class="form-check-label" for="rb-wanita">Perempuan</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="alamat" placeholder="Alamat Lengkap" 
					name="alamat" autocomplete="off"><?= $alamat ?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="telp" class="col-sm-2 col-form-label">No Telp</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="telp" placeholder="Telp / Handphone" name="telp" 
					value="<?= $telp ?>"autocomplete="off">
				</div>
			</fieldset>
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
				</div>	
			</div>
		</div>
	</form>