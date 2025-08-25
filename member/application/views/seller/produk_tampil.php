<div class="container">


    <?php if (empty($produk)): ?>
        <div class="text-bg-primary p-3 my-3">
            Anda belum mempunyai produk, silahkan menambahkan produk untuk memulai jualan
        </div>
    <?php endif ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="fs-4 fw-bold">Produk Jual <?php echo $this->session->userdata("nama_member") ?></h5>

            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Foto</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $key => $value): ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value['nama_produk'] ?></td>
                            <td>Rp<?php echo number_format($value['harga_produk']) ?></td>
                            <td><?php echo $value['berat_produk'] ?> Gr</td>
                            <td class="text-center">
                                <img src="<?php echo $this->config->item("url_produk").$value['foto_produk'] ?>" width="200">
                            </td>
                            <td class="text-center">
                                <a href="<?php echo base_url("seller/produk/edit/".$value["id_produk"]) ?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo base_url("seller/produk/hapus/".$value['id_produk']) ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="<?php echo base_url("seller/produk/tambah") ?>" class="btn btn-primary">Tambah</a>
        </div>
    </div>
</div>