<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-body">
            <?php echo form_open_multipart('barang/update/' . $barang->id_barang) ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $barang->nama_barang ?>" required>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Barang</label>
                            <input name="price" class="form-control" placeholder="Harga Barang" value="<?= $barang->harga ?>" required>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Deskripsi Barang</label>
                    <textarea class="form-control" name="description" rows="10" placeholder="Deskripsi Barang" required><?= $barang->deskripsi_barang ?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gambar Barang</label>
                    <input type="file" name="gambar_barang" id="image_preview" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <img src="<?= base_url('assets/img/barang/' . $barang->gambar_barang) ?>" id="image_load" width="300px">
                </div>
            </div>
        </div>

        <div class="form-group">
            <a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm">Back</a>
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>

        <?php echo form_close() ?>
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