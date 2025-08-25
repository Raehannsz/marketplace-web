<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Hansz Shop</title>
  <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>
<style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container">
      <a href="" class="navbar-brand">Admin <b>Hansz Shop</b></a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="naff">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a href="<?php echo base_url("home") ?>" class="nav-link"><i class="bi bi-house-fill"></i> Home</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("artikel") ?>" class="nav-link"><i class="bi bi-newspaper"></i> Artikel</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("slider") ?>" class="nav-link"><i class="bi bi-card-image"></i> Slider</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("kategori") ?>" class="nav-link"><i class="bi bi-bookmark-fill"></i> Kategori</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("produk") ?>" class="nav-link"> <i class="bi bi-tags-fill"></i> Produk</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("member") ?>" class="nav-link"><i class="bi bi-person-vcard-fill"></i> Member</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("transaksi") ?>" class="nav-link"><i class="bi bi-coin"></i> Transaksi</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
           <li class="nav-item">
            <a href="<?php echo base_url("akun") ?>" class="nav-link"><i class="bi bi-person-badge-fill"></i>
              <?php echo $this->session->userdata("nama") ?>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("logout") ?>" class="nav-link"><i class="bi bi-box-arrow-left"></i> Logout</a>
          </li> 
        </ul>
      </div>
    </div>
  </nav>