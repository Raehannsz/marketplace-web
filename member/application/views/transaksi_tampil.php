<div class="container">
	<h5 class="fs-4 fw-bold">Data Transaksi Beli <?php echo $this->session->userdata("nama_member") ?></h5>

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
				<td> <?php echo date('d M Y H:i', strtotime($value['tanggal_transaksi'])); ?></td>
				<td>Rp<?php echo number_format($value['total_transaksi']); ?></td>
				<td>
					<span class="badge bg-success">
					<?php echo $value['status_transaksi']; ?>
					</span>
					<h6>Resi: <?php echo $value['resi_ekspedisi'] ?></h6>
				</td>
				<td>
					<a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"]) ?>" class="btn btn-primary text-white">Detail</a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>