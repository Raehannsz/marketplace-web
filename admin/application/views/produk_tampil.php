<div class="container">
	<h5 class="fs-3 fw-bold mb-4">Data Produk</h5>

	<table class="table table-bordered table-striped" id="tabelku">
		<thead class="table-primary">
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Foto Produk</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($produk as $key => $value): ?>
				
			<tr>
				<td> <?php echo $key+1; ?></td>
				<td> <?php echo $value['nama_produk']; ?></td>
				<td> <?php echo number_format($value['harga_produk']); ?></td>
				<td>
					<img src="<?php echo $this->config->item("url_produk").$value["foto_produk"] ?>" width="200">
				</td>
				<td>
					<a href="" class="btn btn-primary">Detail</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>