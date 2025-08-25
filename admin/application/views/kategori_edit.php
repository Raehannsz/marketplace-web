<div class="container">
	<h5 class="fs-3 fw-bold mb-4">Edit kategori</h5>

	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label class="fw-bold">Nama kategori</label>
			<input type="text" name="nama_kategori" class="form-control" value="<?php echo set_value("nama_kategori", $kategori["nama_kategori"]); ?>">
			<span class="text-danger small">
				<?php echo form_error("nama_kategori"); ?>
			</span>
		</div>
		<div class="mb-3">
			<label class="fw-bold">Foto lama</label><br>
			<img src="<?php echo $this->config->item("url_kategori").$kategori["foto_kategori"] ?>" width="300">
		</div>
		<div class="mb-3">
			<label class="fw-bold">Ganti foto kategori</label>
			<input type="file" name="foto_kategori" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>