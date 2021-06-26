<div class="col-md-12">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('messages')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success !</h5>';
                echo $this->session->flashdata('messages');
                echo '</div>';
            }
            ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($barang as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value->nama_barang ?></td>
                            <td>Rp. <?= number_format($value->harga, 0) ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/barang/' . $value->gambar_barang) ?>" alt="" srcset="" width="150px"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value->id_barang ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a href="<?= base_url('barang/update/' . $value->id_barang) ?>" class="btn btn-primary btn-sm m-2">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



<!-- Modal Delete -->
<?php
foreach ($barang as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value->id_barang ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_barang ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah anda yakin untuk menghapus <b><?= $value->nama_barang ?></b>?</h4>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('barang/delete/' . $value->id_barang) ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.modal -->
<?php } ?>