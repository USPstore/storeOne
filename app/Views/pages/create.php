<!-- dengan engine templating -->
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="my-3">Form Tambah Produk</h1>

            <form class="mb-3" action="/admin/save" method="post" enctype="multipart/form-data">
                <!-- fitur baru ci untuk amankan form-->
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="kode_produk" class="col-sm-2 col-form-label">Kode Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kode_produk')) ? 'is-invalid' : ''; ?>" id="kode_produk" name="kode_produk" autofocus value="<?= old('kode_produk'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('kode_produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" value="<?= old('nama_produk'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('nama_produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" value="<?= old('kategori'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('kategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_beli" class="col-sm-2 col-form-label">harga_beli</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('harga_beli')) ? 'is-invalid' : ''; ?>" id="harga_beli" name="harga_beli" value="<?= old('harga_beli'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('harga_beli'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga_jual" class="col-sm-2 col-form-label">harga_jual</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('harga_jual')) ? 'is-invalid' : ''; ?>" id="harga_jual" name="harga_jual" value="<?= old('harga_jual'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('harga_jual'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stok_produk" class="col-sm-2 col-form-label">stok_produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('stok_produk')) ? 'is-invalid' : ''; ?>" id="stok_produk" name="stok_produk" value="<?= old('stok_produk'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('stok_produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="icon_produk" class="col-sm-2 col-form-label">icon_produk</label>
                    <div class="col-sm-2">
                        <img src="/image/default.jpeg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('icon_produk')) ? 'is-invalid' : ''; ?>" id="icon_produk" name="icon_produk" value="<?= old('icon_produk'); ?>" onchange="previewImage()">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                <?= $validation->getError('icon_produk'); ?>
                            </div>
                            <label class="custom-file-label" for="icon_produk">Pilih Gambar</label>
                        </div>

                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Tambah </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>