<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-body">
            <?php foreach ($barang as $key => $value) { ?>
                    
                <form action="<?php echo base_url() . 'barang/update'; ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="hidden" name="id_barang" class="form-control" value="<?php echo $value->id_barang ?>">
                                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $value->nama_barang ?>" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga Barang</label>
                                    <input type="number" name="harga" class="form-control" placeholder="Harga Barang" value="<?= $value->harga ?>" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Deskripsi Barang</label>
                                <textarea class="form-control" name="deskripsi_barang" rows="10" placeholder="Deskripsi Barang" required><?= $value->deskripsi_barang ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <a href="<?= base_url('barang/index') ?>" class="btn btn-secondary btn-sm">Back</a>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>
                </form> <?php } ?>
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