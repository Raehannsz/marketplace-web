<div class="container">
	<h3 class="mt-3 fw-bold">Checkout</h3>

	<table class="table">
		<tbody>
			<?php $total = 0; ?>
			<?php foreach ($keranjang as $k => $per_produk): ?>
				<?php $subtotal = $per_produk['jumlah'] * $per_produk['harga_produk'] ?>
				<?php $total+=$subtotal; ?>
				<tr>
					<td>
						<img src="<?php echo $this->config->item('url_produk').$per_produk['foto_produk'] ?>" width="70"> <br>
						<?php echo $per_produk['nama_produk'] ?>
					</td>
					<td>Rp<?php echo number_format($per_produk['harga_produk']) ?></td>
					<td><?php echo $per_produk['jumlah'] ?></td>
					<td>Rp<?php echo number_format($subtotal) ?></td>
					<td>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="3">Total</th>
				<th>Rp<?php echo number_format($total) ?></th>
			</tr>
		</tfoot>
	</table>

	<div class="row">
		<div class="col-md-4">
			<h4 class="fw-bold">Dikirim oleh</h4>
			<span><?php echo $member_jual["nama_member"] ?></span>
			<h6 class="fw-bold"><?php echo $member_jual["nama_distrik_member"] ?></h6>
			<span><?php echo $member_jual["alamat_member"] ?></span>
		</div>
		<div class="col-md-4">
			<h4 class="fw-bold">Diterima oleh</h4>
			<span><?php echo $member_beli["nama_member"] ?></span>
			<h6 class="fw-bold"><?php echo $member_beli["nama_distrik_member"] ?></h6>
			<span><?php echo $member_beli["alamat_member"] ?></span>
			<h6><?php echo $member_beli["wa_member"] ?></h6>
		</div>
		<div class="col-md-4">
			<h4 class="fw-bold">Pengiriman</h4>
			<form method="post">
				<select class="form-control mb-3" name="ongkir" required>
					<option value="">Pilih</option>
					<?php foreach ($biaya as $key => $value): ?>
							
					<option value="<?php echo $key ?>">
						<?php echo $value['name'] ?> 
						<?php echo $value['service'] ?> 
						<?php echo $value['description'] ?> 
						Rp<?php echo number_format($value['cost']) ?> 
						<?php echo $value['etd']?> 
					</option>
					<?php endforeach ?>	
				</select>
				<div class="text-muted text-danger"><?php echo form_error('ongkir') ?></div>
				<button class="btn btn-primary">Checkout</button>
			</form>
		</div>
	</div>

</div>