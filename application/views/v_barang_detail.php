<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4><strong>DETAIL DATA BARANG</strong></h4>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-responsive-sm">
                <tr>
                    <th>Nama Barang</th>
                    <td><?php echo $detail->nama_barang ?></td>
                </tr>
                <tr>
                    <th>Harga Barang</th>
                    <td>Rp. <?php echo number_format($detail->harga, 0) ?></td>
                </tr>
                <tr>
                    <th>Deskripsi Barang</th>
                    <td><?php echo $detail->deskripsi_barang ?></td>
                </tr>
                <tr>
                    <td>
                        <img src="<?= base_url('assets/img/barang/' . $detail->gambar_barang) ?>" width="300px">
                    </td>
                </tr>
            </table> <a href="<?php echo base_url('barang/index'); ?>" class=" btn btn-primary">Kembali</a>
        </div>
    </div>
</div>