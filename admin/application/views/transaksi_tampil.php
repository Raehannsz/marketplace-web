<div class="container">
	<h5 class="fs-3 fw-bold mb-4">Data Transaksi</h5>

	<table class="table table-bordered table-striped" id="tabelku">
		<thead class="table-primary">
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Total</th>
				<th>Status</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($transaksi as $key => $value): ?>
				
			<tr>
				<td> <?php echo $key+1; ?></td>
				<td> <?php echo $value['tanggal_transaksi']; ?></td>
				<td> Rp<?php echo number_format($value['total_transaksi']); ?></td>
				<td> <?php echo $value['status_transaksi']; ?></td>
				<td>
					<a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"]) ?>" class="btn btn-primary">Detail</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>