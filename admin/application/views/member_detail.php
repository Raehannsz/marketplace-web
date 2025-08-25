<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5 class="fs-3 fw-bold mb-4">Detail Member</h5>
            <table class="table table-bordered table-striped-columns">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center table-success">Data Member</th>
                    </tr>
                </thead>
                    <tbody>
                    <tr>
                        <td>Email Member</td>
                        <td><?php echo $member['email_member'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Member</td>
                        <td><?php echo $member['nama_member'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Member</td>
                        <td><?php echo $member['alamat_member'] ?></td>
                    </tr>
                    <tr>
                        <td>WhatsApp Member</td>
                        <td><?php echo $member['wa_member'] ?></td>
                    </tr>
                    <tr>
                        <td>Kode Distrik Member</td>
                        <td><?php echo $member['kode_distrik_member'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Distrik Member</td>
                        <td><?php echo $member['nama_distrik_member'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-8">
            <h5 class="fs-3 fw-bold mb-4">Transaksi Jual</h5>
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

                        <?php foreach ($jual as $key => $value): ?>
                            
                        <tr>
                            <td> <?php echo $key+1; ?></td>
                            <td> <?php echo $value['tanggal_transaksi']; ?></td>
                            <td> <?php echo $value['total_transaksi']; ?></td>
                            <td> <?php echo $value['status_transaksi']; ?></td>
                            <td>
                                <a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"]) ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            <h5 class="fs-3 fw-bold mb-4">Transaksi Beli</h5>
                <table class="table table-bordered table-striped" id="tabelku">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($beli as $key => $value): ?>
                        
                    <tr>
                        <td> <?php echo $key+1; ?></td>
                        <td> <?php echo $value['tanggal_transaksi']; ?></td>
                        <td> <?php echo $value['total_transaksi']; ?></td>
                        <td> <?php echo $value['status_transaksi']; ?></td>
                        <td>
                            <a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"]) ?>" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>