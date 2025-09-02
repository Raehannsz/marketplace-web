<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
</style>

<div class="container">
	<?php if (empty($keranjang)): ?>
		<div class="d-flex justify-content-center align-items-center">
			<div class="card text-center shadow p-5">
			<div class="card-body">
				<h1 class="card-title"><i class="bi bi-cart-x-fill text-danger" style="font-size: 100px;"></i></h1>
				<p class="card-text lead mb-4">Yaahh, Keranjang Belanja Masih Kosong</p>
				<a href="<?php echo base_url('produk') ?>" class="btn btn-primary btn-lg">Ayo Belanja!</a>
			</div>
			</div>
		</div>
	<?php endif; ?>
	<?php foreach ($keranjang as $key => $per_penjual): ?>
		<div class="mb-5 mt-3">
			<h3>Toko <?php echo $per_penjual['nama_member']; ?></h3>
			<table class="table table-sm table-bordered">
				<?php foreach ($per_penjual['produk'] as $k => $per_produk): ?>
					<thead class="table-light">
						<tr>
							<th>Produk</th>
							<th>Harga Satuan</th>
							<th>Qty</th>
							<th>Harga Total</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>
							<img src="<?php echo $this->config->item('url_produk') . $per_produk['foto_produk'] ?>" width="70">
							<?php echo $per_produk['nama_produk'] ?>
						</td>
						
						<td>
						Rp<span class="harga-satuan"><?php echo number_format($per_produk['harga_produk']) ?></span>
						</td>
						
						<td>
						<div class="input-group input-group-sm" style="width: 90px;">
							<button class="btn btn-danger btn-kurang" type="button">-</button>
							<input type="number" min="1" class="form-control text-center jumlah-input" value="<?php echo $per_produk['jumlah'] ?>" data-harga="<?php echo $per_produk['harga_produk'] ?>" data-id="<?php echo $per_produk['id_keranjang'] ?>">
							<button class="btn btn-primary btn-tambah" type="button">+</button>
						</div>
						</td>
						
						<td>
						<span class="fw-bold text-success">Rp<span class="total-harga">
							<?php echo number_format($per_produk['harga_produk'] * $per_produk['jumlah']) ?>
						</td>

						<td>
						<a href="<?php echo base_url("keranjang/hapus/" . $per_produk['id_keranjang']) ?>" class="btn btn-danger btn-sm">Hapus</a>
						</td>
					</tr>
					</tbody>

				<?php endforeach ?>
			</table>

			<div class="row">
				<div class="col-md-6 text-start">
					<a href="<?php echo base_url('produk') ?>" class="btn btn-secondary">Belanja lagi</a>
				</div>
				<div class="col-md-6 text-end">
					<a href="<?php echo base_url("keranjang/checkout/".$per_penjual['id_member']) ?>" class="btn btn-primary">Checkout</a>
				</div>
			</div>
			
		</div>
	<?php endforeach ?>
</div>

<script>
  document.querySelectorAll('.input-group').forEach(group => {
    const btnMinus = group.querySelector('.btn-kurang');
    const btnPlus = group.querySelector('.btn-tambah');
    const inputJumlah = group.querySelector('.jumlah-input');
    const hargaSatuan = parseInt(inputJumlah.dataset.harga);
    const idKeranjang = inputJumlah.dataset.id;
    const totalHargaEl = group.closest('tr').querySelector('.total-harga');

    function updateTotal() {
      let jumlah = parseInt(inputJumlah.value);
      if (jumlah < 1) jumlah = 1;
      const total = hargaSatuan * jumlah;
      totalHargaEl.textContent = total.toLocaleString('id-ID');

      fetch("<?php echo base_url('keranjang/update_jumlah'); ?>", {
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_keranjang=${idKeranjang}&jumlah=${jumlah}`
      })
      .then(response => response.text())
      .then(res => {
        console.log("Berhasil update jumlah:", res);
      })
      .catch(err => {
        console.error("Gagal update jumlah:", err);
      });
    }

    btnMinus.addEventListener('click', () => {
      let val = parseInt(inputJumlah.value);
      if (val > 1) {
        inputJumlah.value = val - 1;
        updateTotal();
      }
    });

    btnPlus.addEventListener('click', () => {
      inputJumlah.value = parseInt(inputJumlah.value) + 1;
      updateTotal();
    });

    inputJumlah.addEventListener('change', updateTotal);
  });
</script>
