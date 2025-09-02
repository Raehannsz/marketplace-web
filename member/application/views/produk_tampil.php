<style>
	.produk-img {
    transition: transform 0.3s, box-shadow 0.3s;
    transform-origin: center center;
  }
  .card:hover .produk-img {
    transform: scale(1.04);
    box-shadow: 0 8px 24px rgba(0,0,0,0.18);
    z-index: 1;
  }
  .card {
    overflow: hidden;
    position: relative;
  }
</style>
<div class="container">
	<h5 class="fs-3 fw-bold mt-3">Produk Terbaru</h5>
	<div class="row">
		<?php foreach ($produk as $key => $value): ?>
			<div class="col-6 col-md-3 col-sm-4">
				<a href="<?php echo base_url("produk/detail/".$value['id_produk']) ?>" class="text-decoration-none">
					<div class="card border-0 shadow-sm mt-3">
						<img class="produk-img" src="<?php echo $this->config->item("url_produk").$value['foto_produk'] ?>">
						<div class="card-body">
							<h6 class="fw-bold"><?php echo $value['nama_produk']?></h6>
							<p class="lead">Rp<?php echo number_format($value['harga_produk']) ?></p>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>