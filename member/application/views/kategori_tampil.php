<style>
	.kategori-item .kategori-img {
	transition: transform 0.3s, box-shadow 0.3s;
  }
  .kategori-item:hover .kategori-img {
    transform: scale(1.04);
    box-shadow: 0 8px 24px rgba(0,0,0,0.18);
  }
  .card {
    overflow: hidden;
    position: relative;
  }
</style>
<div class="container">
  <h5 class="fs-3 fw-bold mt-3 mb-3">Kategori Produk</h5>
  <div class="row">
    <?php foreach($kategori as $key => $value): ?>
      <div class="col-6 col-md-3 col-sm-4 mb-3">
        <a href="<?php echo base_url("kategori/detail/".$value['id_kategori']) ?>" class="text-decoration-none">
          <div class="card border-0 shadow kategori-item">
            <img src="<?php echo $this->config->item("url_kategori").$value['foto_kategori'] ?>" class="card-img-top kategori-img" alt="...">
            <div class="card-body text-center">
              <h6 class="card-title"><?php echo $value['nama_kategori'] ?></h6>
            </div>
          </div>
        </a>

      </div>
    <?php endforeach; ?>
  </div>
</div>