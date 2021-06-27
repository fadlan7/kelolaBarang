<h4><strong>DETAIL DATA BARANG</strong></h4>
<table class="table">
    <tr>
        <th>Nama Barang</th>
        <td><?php echo $detail->nama_barang ?></td>
    </tr>
    <tr>
        <th>Harga Barang</th>
        <td><?php echo $detail->harga ?></td>
    </tr>
    <tr>
        <th>Deskripsi Barang</th>
        <td><?php echo $detail->deskripsi_barang ?></td>
    </tr>
    <tr>
</table> <a href="<?php echo base_url('barang/index'); ?>" class=" btn btn-primary">Kembali</a>