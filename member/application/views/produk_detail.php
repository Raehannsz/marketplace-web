<style>
	.col-md-6 {
		position: relative;
  		overflow: hidden;
	}

	.zoom-image {
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: transform 0.2s ease, transform-origin 0.2s ease;
		transform-origin: center center;
		cursor: zoom-in;
	}

	.zoom-image:hover {
		transform: scale(1.2); /* Perbesar gambar saat hover */
	}
</style>

<div class="container py-3">
	<div class="row">
		<div class="col-md-6">
			<img src="<?php echo $this->config->item('url_produk').$produk['foto_produk'] ?>" class="w-100 rounded zoom-image">
		</div>
		<div class="col-md-6">
			<h1><?php echo $produk['nama_produk'] ?></h1>
				<span class="badge badge-lg bg-dark"><?php echo $produk['nama_kategori'] ?></span>
					<p class="lead">Rp<?php echo number_format($produk["harga_produk"]) ?></p>
					<br>
					<p><?php echo $produk['deskripsi_produk'] ?></p>

			<?php if ($produk['id_member']!==$this->session->userdata("id_member")): ?>
				<form class="my-2" method="post">
					<div class="input-group">
						<input type="text" name="jumlah" class="form-control" min="1" value="1" required>
						<button class="btn btn-primary">Beli</button>
					</div>
				</form>
			<?php endif ?>
		</div>
	</div>
</div>

<script>
	const container = document.querySelector('.col-md-6');
	const image = container.querySelector('.zoom-image');

	container.addEventListener('mousemove', (e) => {
		const rect = container.getBoundingClientRect();
		const x = ((e.clientX - rect.left) / rect.width) * 100;
		const y = ((e.clientY - rect.top) / rect.height) * 100;

		image.style.transformOrigin = `${x}% ${y}%`;
		image.style.transform = "scale(2)";
	});

	container.addEventListener('mouseleave', () => {
		image.style.transform = "scale(1)";
		image.style.transformOrigin = "center center";
	});
</script>
