<style>
  .kategori-item .kategori-img {
    transition: transform 0.3s, box-shadow 0.3s;
  }
  .kategori-item:hover .kategori-img {
    transform: scale(1.08);
    box-shadow: 0 8px 24px rgba(0,0,0,0.18);
  }
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
  .artikel-item:hover .artikel-img {
    transform: scale(1.04);
    box-shadow: 0 8px 24px rgba(0,0,0,0.18);
  }
  .carousel-item::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 40%;
  height: 100%;
  background: linear-gradient(to right, rgba(0, 0, 0, 0.6), transparent);
  z-index: 1;
}
.carousel-caption {
  z-index: 2;
  position: absolute;
}

.tilt-image {
  transition: transform 0.1s ease;
  transform-style: preserve-3d;
  box-shadow: 0 20px 40px rgba(0,0,0,0.2);
  will-change: transform;
}

.image-container:hover .tilt-image {
  transform: scale(1.05) rotateY(15deg) rotateX(10deg);
}

</style>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <?php foreach ($slider as $key => $value): ?>

      <div class="carousel-item <?php echo $key==0 ? "active" : "" ?>" data-bs-interval="4000">
        <img src="<?php echo $this->config->item("url_slider").$value['foto_slider'] ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-start" style="left: 5%; top: 40%; right: auto;">
          <span class="fw-bold" style="font-size: 3rem; color: white;">
            <?php echo str_replace(' ', '<br>', $value['caption_slider']); ?>
          </span>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon d-none" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon d-none" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<section class="bg-white py-5">
  <div class="container">
    <h4 class="text-center mb-5 fw-bold">Kategori Produk</h4>
    <div class="row">
      <?php foreach ($kategori as $key => $value): ?>
        <div class="col-md-4 text-center kategori-item mb-3" data-aos="fade-down">
          <a href="<?php echo base_url("kategori/detail/".$value['id_kategori']) ?>" class="text-decoration-none">
            <img src="<?php echo $this->config->item('url_kategori').$value['foto_kategori'] ?>" class="w-50 rounded-circle shadow kategori-img">
            <h5 class="mt-3 text-dark"><?php echo $value['nama_kategori'] ?></h5>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="bg-white py-5">
  <div class="container">
    <h4 class="text-center fw-bold">Cari Produk</h4>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form method="GET" action="<?php echo base_url('produk/cari'); ?>">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari Produk...">
              <button type="submit" class="btn btn-primary">Cari</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="bg-light py-5">
  <div class="container">
    <h4 class="text-center mb-5 fw-bold">Produk Terbaru</h4>
    <div class="row">
      <?php foreach ($produk as $key => $value): ?>
        <div class="col-md-3" data-aos="fade-up">
          <a href="<?php echo base_url("produk/detail/".$value["id_produk"]) ?>" class="text-decoration-none">
            <div class="card mb-3 border-0 shadow">
              <img src="<?php echo $this->config->item('url_produk').$value['foto_produk'] ?>" class="rounded-top produk-img">
              <div class="card-body text-center">
                <h6><?php echo $value['nama_produk'] ?></h6>
                <span>Rp<?php echo number_format($value['harga_produk']) ?></span>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="bg-white py-5">
  <div class="container image-container">
    <h4 class="text-center mb-5 fw-bold">Artikel Terbaru</h4>
    <div class="row">
      <?php foreach ($artikel as $key => $value): ?>
        <div class="col-md-4 text-center artikel-item" data-aos="fade-up">
          <img src="<?php echo $this->config->item('url_artikel').$value['foto_artikel'] ?>" class="w-75 rounded shadow tilt-image">
          <h6 class="mt-3 fst-italic"><?php echo $value['judul_artikel'] ?></h6>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>



