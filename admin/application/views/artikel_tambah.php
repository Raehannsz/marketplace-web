<div class="container">
	<h5 class="fs-3 fw-bold mb-4">Tambah Artikel</h5>
	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label class="fw-bold">Judul artikel</label>
			<input type="text" name="judul_artikel" class="form-control" value="<?php echo set_value("judul_artikel"); ?>">
			<span class="small text-danger">
				<?php echo form_error("judul_artikel"); ?>
			</span>
		</div>
		<div class="mb-3">
			<label class="fw-bold">Isi artikel</label>
			<textarea name="isi_artikel" id="editorku" class="form-control"><?php echo set_value("isi_artikel"); ?></textarea>
			<span class="small text-danger">
				<?php echo form_error("isi_artikel"); ?>
			</span>
		</div>
		<div class="mb-3">
			<label class="fw-bold">Foto artikel</label>
			<input type="file" name="foto_artikel" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>