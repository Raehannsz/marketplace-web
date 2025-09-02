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
  #carouselExampleCaptions {
    max-width: 1200px;       
    height: 450px;          
    margin: auto;           
    border-radius: 10px;    
    overflow: hidden;
    margin-bottom: 38px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
  }
  #carouselExampleCaptions img {
    height: 100%;
    object-fit: cover;
    width: 100%;
  }
  .carousel-caption span {
    font-size: 2rem !important; /* Ukuran teks caption */
  }
  .scroll-wrapper {
      width: 100%;
      overflow: hidden;
      white-space: nowrap;
      box-sizing: border-box;
      background: #111;
      padding: 20px 0;
    }

    .scroll-content {
      display: inline-block;
      white-space: nowrap;
      animation: scroll 20s linear infinite;
    }

    .scroll-content span {
      display: inline-block;
      font-size: 40px;
      font-weight: bold;
      margin-right: 50px;
    }

    @keyframes scroll {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
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

<div class="scroll-wrapper bg-primary text-white">
    <div class="scroll-content" id="scrollContent">
      <!-- Diisi lewat JS atau manual (lihat JS di bawah) -->
    </div>
  </div>

<section class="bg-white py-5">
  <div class="container">
    <h4 class="text-center mb-5 fw-bold">Kategori Produk</h4>
    <div class="row justify-content-center">
      <?php foreach ($kategori as $key => $value): ?>
        <div class="col-6 col-md-4 col-sm-3 text-center kategori-item mb-3" data-aos="fade-down">
          <a href="<?php echo base_url("kategori/detail/".$value['id_kategori']) ?>" class="text-decoration-none">
            <img src="<?php echo $this->config->item('url_kategori').$value['foto_kategori'] ?>" class="foto-kategori w-25 rounded-circle shadow kategori-img">
            <h5 class="mt-3 text-dark"><?php echo $value['nama_kategori'] ?></h5>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<div id="cari-produk"></div>
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
    <div class="row justify-content-center">
      <?php foreach ($produk as $key => $value): ?>
        <div class="col-6 col-md-2 col-sm-3 d-flex justify-content-center" data-aos="fade-up">
          <a href="<?php echo base_url("produk/detail/".$value["id_produk"]) ?>" class="text-decoration-none w-100">
            <div class="card mb-3 border-0 shadow h-100 d-flex flex-column">
              <img src="<?php echo $this->config->item('url_produk').$value['foto_produk'] ?>" class="rounded-top produk-img">
              <div class="card-body text-center d-flex flex-column">
                <h6 class="mb-2"><?php echo $value['nama_produk'] ?></h6>
                <span class="mt-auto">Rp<?php echo number_format($value['harga_produk']) ?></span>
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
          <img src="<?php echo $this->config->item('url_artikel').$value['foto_artikel'] ?>" class="w-75 rounded shadow-lg tilt-image">
          <h6 class="mt-3 fst-italic"><?php echo $value['judul_artikel'] ?></h6>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<script>
  const texts = ["Hansz Shop", "Terpercaya", "Termurah", "Teraman"];
  const repeatCount = 20;
  const scrollContent = document.getElementById("scrollContent");

  for (let i = 0; i < repeatCount; i++) {
    const span = document.createElement("span");
    span.textContent = texts[i % texts.length];
    scrollContent.appendChild(span);
  }

  scrollContent.innerHTML += scrollContent.innerHTML;

</script>

