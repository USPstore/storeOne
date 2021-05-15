<!-- Kita akan kasih tahu bahwa halaman ini akan menggunakan template  -->
<?= $this->extend('layout/template'); ?>
<!-- setelah itu beritahu mana contentnya -->
<?= $this->section('content'); ?>
<div class="container">
    <!-- pencarian -->
    <div class="row">
        <div class="col-md-6 mt-3">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari produk" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center mb-3">
            <!-- Kategori -->
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a href="/pages" class="btn btn-outline-primary btn-sm">Semua Produk</a>
                <a href="" class="btn btn-outline-primary btn-sm">Kaos Polos</a>
                <a href="" class="btn btn-outline-primary btn-sm">Aksesoris</a>
            </div>
        </div>
    </div>
    <div class="row">

        <?php foreach ($produk as $p) : ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="image/<?= $p["icon_produk"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p["nama_produk"]; ?></h5>
                        <p class="card-text"><?= $p["deskripsi"]; ?>.</p>
                        <h5 class="card-title">Rp <?= $p["harga_jual"]; ?>-</h5>
                        <a href="/produk/<?= $p['slug']; ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>