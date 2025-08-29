<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hansz Shop</title>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/
  BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<style>
  body {
    font-family: 'Inter', sans-serif;
    padding-top: 70px;
  }
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a href="" class="navbar-brand"><b>Hansz Shop</b></a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="naff">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a href="<?php echo base_url("") ?>" class="nav-link"><i class="bi bi-house-fill"></i> Home</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("kategori") ?>" class="nav-link"><i class="bi bi-bookmark-fill"></i> Kategori</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("produk") ?>" class="nav-link"><i class="bi bi-tags-fill"></i> Produk</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("keranjang") ?>" class="nav-link"><i class="bi bi-cart-fill"></i> Keranjang</a>
          </li>
        </ul>

        <?php if ($this->session->userdata("id_member")): ?>

          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Seller
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="<?php echo base_url("seller/produk") ?>"><i class="bi bi-box-seam-fill"></i> Produk Saya</a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo base_url("seller/produk/laporan_terjual") ?>">
                    <i class="bi bi-journal-text"></i> Laporan Produk
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo base_url("seller/transaksi") ?>"><i class="bi bi-graph-up-arrow"></i> Penjualan Saya</a>
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo base_url("transaksi") ?>"><i class="bi bi-bag-fill"></i> Pembelian Saya</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("home") ?>" class="nav-link">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("akun") ?>" class="nav-link">
                <?php echo $this->session->userdata("nama_member") ?>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("logout") ?>" class="nav-link"><i class="bi bi-box-arrow-left"></i> Logout</a>
            </li> 
          </ul>
        <?php endif ?>
        <?php if (!$this->session->userdata("id_member")): ?>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="nav-link"><i class="bi bi-door-open-fill"></i> Login</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("register") ?>" class="nav-link"><i class="bi bi-person-add"></i> Register</a>
            </li>
          </ul>
        <?php endif ?>
      </div>
    </div>
  </nav>