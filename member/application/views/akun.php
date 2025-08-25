  <div class="container mt-3">
    <div class="card p-4 mb-4 shadow bg-primary text-white">
      <h5 class="fs-2 fw-bold mb-2 text-center">Ubah Akun</h5>
    </div>
    <div class="card shadow p-4">
      <div class="card-body">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <form method="post">
          <div class="mb-3">
            <label class="fw-bold">Email Anda</label>
            <input type="text" name="email_member" class="form-control" value="<?php echo set_value("email_member", $this->session->userdata("email_member") )?>">
            <span class="text-danger small">
              <?php echo form_error("email_member"); ?>
            </span>
          </div>
          <div class="mb-3">
            <label class="fw-bold">Password</label>
            <input type="text" name="password_member" class="form-control">
            <p class="text-muted">Kosongkan jika password tidak diubah</p>
          </div>
          <div class="mb-3">
            <label class="fw-bold">Nama Lengkap</label>
            <input type="text" name="nama_member" class="form-control" value="<?php echo set_value("nama_member", $this->session->userdata("nama_member") )?>">
            <span class="text-danger small">
              <?php echo form_error("nama_member"); ?>
            </span>
          </div>
          
          <div class="mb-3">
            <label class="fw-bold">Nomor WA</label>
            <input type="text" name="wa_member" class="form-control" value="<?php echo set_value("wa_member", $this->session->userdata("wa_member") )?>">
            <span class="text-danger small">
              <?php echo form_error("wa_member"); ?>
            </span>
          </div>
          <div class="mb-3">
            <label class="fw-bold">Alamat Lengkap</label>
            <input type="text" name="alamat_member" class="form-control" value="<?php echo set_value("alamat_member", $this->session->userdata("alamat_member") )?>">
            <span class="text-danger small">
              <?php echo form_error("alamat_member"); ?>
            </span>
          </div>
          <div class="mb-3">
            <label class="fw-bold">Cari Kelurahan Kecamatan Kabupaten</label>
            <div class="input-group">
              <input type="text" class="form-control cari">
              <div class="input-group-btn">
                <button type="button" class="btn btn-primary btn-cari">Cari</button>
              </div>
            </div>
          </div>
          
          <div class="mb-3">
            <label class="fw-bold">Kota/Kabupaten</label>
            <select class="form-control form-select" required name="kode_distrik_member">
              <option value="<?php echo $this->session->userdata("kode_distrik_member") ?>">
                <?php echo $this->session->userdata("nama_distrik_member") ?>
              </option>
            </select>
            <span class="text-danger"><?php echo form_error("kode_distrik_member") ?></span>
          </div>
          <input type="hidden" name="nama_distrik_member" value="<?php echo $this->session->userdata("nama_distrik_member") ?>" required>
          <button class="btn btn-primary">Ubah Akun</button>
          <a href="<?php echo base_url('home'); ?>" class="btn btn-secondary ms-2">Kembali ke Home</a>
        </form>
      </div>
    </div>
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