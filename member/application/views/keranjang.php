<div class="container">
	<?php if (empty($keranjang)): ?>
		<div class="text-bg-light p-3 my-3 lead rounded d-flex justify-content-between align-items-center">
			<span>
				<i class="bi bi-cart-x-fill"></i> Yaahh, Keranjang Belanja Masih Kosong
			</span>
			<a href="<?php echo base_url('produk') ?>" class="btn btn-primary">Ayo Belanja!</a>
		</div>	
	<?php endif; ?>
	<?php foreach ($keranjang as $key => $per_penjual): ?>
		<div class="mb-5 mt-3">
			<h3>Toko <?php echo $per_penjual['nama_member']; ?></h3>
			<table class="table table-sm table-bordered">
				<?php foreach ($per_penjual['produk'] as $k => $per_produk): ?>
					<thead>
						<tr>
							<th>Produk</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<img src="<?php echo $this->config->item('url_produk').$per_produk['foto_produk'] ?>" width="70"> <br>
								<?php echo $per_produk['nama_produk'] ?>
							</td>
							<td>Rp<?php echo number_format($per_produk['harga_produk']) ?></td>
							<td><?php echo $per_produk['jumlah'] ?></td>
							<td>
								<a href="<?php echo base_url("keranjang/hapus/".$per_produk['id_keranjang']) ?>" class="btn btn-danger btn-sm">Hapus</a>
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