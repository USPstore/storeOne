<!-- dengan engine templating -->
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <!-- class card bisa diberi style="max-width: 540px;" -->
                <div class="row g-0">
                    <div class="col-md-6 d-flex justify-content-center">
                        <img src="/image/<?= $produk['icon_produk']; ?>">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
                            <p class="card-text"><?= $produk['deskripsi']; ?></p>
                            <p class="card-text"><small class="text-muted">Up load pada <?= $produk['created_at']; ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>