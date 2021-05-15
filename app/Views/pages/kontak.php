<!-- Kita akan kasih tahu bahwa halaman ini akan menggunakan template  -->
<?= $this->extend('layout/template'); ?>
<!-- setelah itu beritahu mana contentnya -->
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Ini kontak USP!</h1>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>