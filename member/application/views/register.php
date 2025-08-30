<div class="container bg-white w-75 p-4 rounded shadow">
	<div class="row">

		<div class="col-md-6 border border-2 rounded d-flex justify-content-center align-items-center" style="overflow: hidden;">
		<div>
			<h5 id="randomText" class="fw-bold mt-2 mb-2 text-center random-text">
				Hansz Shop
			</h5>
		</div>
	</div>

		<div class="col-md-6">
			<h5 class="fs-3 fw-bold mt-2 mb-2 text-center">Registrasi Member</h5>
			<form method="post">	
				<div class="mb-3">
					<label>Email</label>
					<input type="text" name="email_member" class="form-control" value="<?php echo set_value("email_member") ?>">
					<span class="text-danger"><?php echo form_error("email_member") ?></span>
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="text" name="password_member" class="form-control" value="<?php echo set_value("password_member") ?>">
					<span class="text-danger"><?php echo form_error("password_member") ?></span>
				</div>
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_member" class="form-control" value="<?php echo set_value("nama_member") ?>">
					<span class="text-danger"><?php echo form_error("nama_member") ?></span>
				</div>
				<div class="mb-3">
					<label>Nomor WhatsApp</label>
					<input type="text" name="wa_member" class="form-control" value="<?php echo set_value("wa_member") ?>">
					<span class="text-danger"><?php echo form_error("wa_member") ?></span>
				</div>
				<div class="mb-3">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat_member"><?php echo set_value("alamat_member") ?></textarea>
					<span class="text-danger"><?php echo form_error("alamat_member") ?></span>
				</div>
				<div class="mb-3">
					<label>Cari Kelurahan Kecamatan Kabupaten</label>
					<div class="input-group">
						<input type="text" class="form-control cari">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary btn-cari">Cari</button>
						</div>
					</div>
				</div>
				
				<div class="mb-3">
					<label>Kota/Kabupaten</label>
					<select class="form-control form-select" required name="kode_distrik_member"></select>
					<span class="text-danger"><?php echo form_error("kode_distrik_member") ?></span>
				</div>
				<input type="hidden" name="nama_distrik_member" required>
				<button class="btn btn-primary">Kirim</button>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(document).on("click", ".btn-cari", function(e){
			e.preventDefault();
			var keyword = $(".cari").val();
			$.ajax({
				type: "post",
				data: "keyword="+keyword,
				url: "<?php echo base_url('register/cari_distrik') ?>",
				success: function(hasil) {
					console.log(hasil);
					$("select[name='kode_distrik_member']").html(hasil);
				}
			})
		})

		$(document).on("change", "select[name='kode_distrik_member']", function(){
			var terpilih = $("option:selected", this).html();

			$("input[name='nama_distrik_member']").val(terpilih);
		})
	}) 
</script>