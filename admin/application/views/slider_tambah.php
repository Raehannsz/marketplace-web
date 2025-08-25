<div class="container">
	<h5 class="fs-3 fw-bold mb-4">Tambah Slider</h5>
	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label class="fw-bold">Caption slider</label>
			<textarea name="caption_slider" id="editorku" class="form-control"><?php echo set_value("caption_slider"); ?></textarea>
			<span class="small text-danger">
				<?php echo form_error("caption_slider"); ?>
			</span>
		</div>
		<div class="mb-3">
			<label class="fw-bold">Foto slider</label>
			<input type="file" name="foto_slider" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>