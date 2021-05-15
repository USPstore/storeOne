<!-- Kita akan kasih tahu bahwa halaman ini akan menggunakan template  -->
<?= $this->extend('layout/templateKategori'); ?>
<!-- setelah itu beritahu mana contentnya -->
<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <div class="col d-flex justify-content-center mb-1 mt-1">
            <span class="badge bg-danger p-2 mb-3">Kategori Aksesoris</span>
        </div>
    </div>

    <div class="row">
        <?php foreach ($produkAksesoris as $p) : ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="/image/<?= $p["icon_produk"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p["nama_produk"]; ?></h5>
                        <p class="card-text"><?= $p["deskripsi"]; ?>.</p>
                        <h5 class="card-title">Rp <?= $p["harga_jual"]; ?>-</h5>
                        <a href="/produk/<?= $p['slug']; ?>" class="">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>