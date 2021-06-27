<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah Data Barang</button>
            </div>
            <!-- /.card-tools -->
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
                            <td>Rp. <?= $value->harga ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/barang/' . $value->gambar_barang) ?>" alt="" srcset="" width="150px"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value->id_barang ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a href="<?= base_url('barang/edit/' . $value->id_barang) ?>" class="btn btn-primary btn-sm m-2">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?= base_url('barang/detail/' . $value->id_barang) ?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-search-plus"></i>
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


<!-- Modal add Data -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA BARANG</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('barang/tambah_aksi'); ?>
                <div class="form-group">
                    <label>Nama Barang</label> <input type="text" name="nama_barang" class="form-control">
                </div>
                <div class="form-group">
                    <label>Harga Barang</label> <input type="text" name="harga" class="form-control">
                </div>
                <div class="form-group">
                    <label>Deskripsi Barang</label>
                    <textarea name="deskripsi_barang" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>Upload Gambar Barang</label>
                    <input type="file" name="gambar_barang" class="form-control" id="image_preview">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/img/icon/no-images.png') ?>" id="image_load" width="300px">
                    </div>
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    function readImages(input) {
        if (input.files && input.files[0]) {
            let read = new FileReader();
            read.onload = function(e) {
                $('#image_load').attr('src', e.target.result)
            }
            read.readAsDataURL(input.files[0]);
        }
    }

    $("#image_preview").change(function() {
        readImages(this);
    });
</script>