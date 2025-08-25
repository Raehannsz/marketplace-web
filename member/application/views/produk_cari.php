

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

<section class="bg-light py-5">
    <div class="container">
        <h4 class="text-center mb-5 fw-bold">Cari Produk</h4>
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <form method="GET" action="<?php echo base_url('produk/cari'); ?>">
                  <div class="input-group">
                    <input type="text" name="keyword" class="form-control" value="<?php echo $keyword ?>">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h4 class="text-center mt-5 mb-5 fw-bold"> Hasil Pencarian Produk</h4>
    <div class="row">
        <?php if (!empty($produk)): foreach ($produk as $value): ?>
            <div class="col-md-3 mb-4">
                <a href="<?php echo base_url("produk/detail/".$value['id_produk']) ?>" class="text-decoration-none">
                    <div class="card border-0 shadow-sm card h-100">
                        <img class="produk-img" src="<?php echo $this->config->item("url_produk").$value['foto_produk'] ?>">
                        <div class="card-body">
                            <h6 class="fw-bold"><?php echo $value['nama_produk']?></h6>
                            <p class="small text-muted"><?php echo word_limiter($value['deskripsi_produk'], 10); ?></p>
                            <span class="fs-6 text-primary fw-bold">Rp<?= number_format($value['harga_produk']) ?></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; else: ?>
        <div class="container">
            <div class="col-12 text-center">
                <div class="alert alert-warning" role="alert">
                    Tidak ada produk yang cocok dengan kata kunci "<strong><?= htmlspecialchars($_GET['keyword'] ?? '') ?></strong>"
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>