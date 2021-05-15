<!-- dengan engine templating -->
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
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
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-start mt-3">
                <a class="btn btn-success btn-sm " href="/admin/create" role="button">Tambah Produk Baru</a>
            </div>
            <table class="table table-sm table-responsive-sm mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Kode </th>
                        <th>Nama </th>
                        <th>Kategori </th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok awal</th>
                        <th>Stok Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (3 * ($currentPage - 1)) ?>
                    <!-- 3adalah jml data perhalaman -->
                    <?php foreach ($produk as $p) : ?>
                        <tr>
                            <td class="text-center align-middle "><?= $i++; ?></td>
                            <td class="align-middle"><img src="image/<?= $p["icon_produk"]; ?>" width="100"></td>
                            <td class="text-center align-middle "><?= $p['kode_produk']; ?></td>
                            <td class="text-center align-middle "><?= $p['nama_produk']; ?></td>
                            <td class="text-center align-middle "><?= $p['kategori']; ?></td>
                            <td class="text-center align-middle "><?= $p['harga_beli']; ?></td>
                            <td class="text-center align-middle "><?= $p['harga_jual']; ?></td>
                            <td class="text-center align-middle "><?= $p['id']; ?></td>
                            <td class="text-center align-middle "><?= $p['id']; ?></td>
                            <td class="text-center align-middle ">
                                <form action="/admin/delete/<?= $p['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus');">Hapus</button>
                                </form>
                                <a class="btn btn-warning btn-sm " href="/admin/edit/<?= $p['slug']; ?>" role="button">Ubah</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- menampilkan pagination -->
            <?= $pager->links('produk', 'produk_pagination'); ?>
            <!-- nama tabel produk, nama paginasi produk_pagination -->

        </div>
    </div>
</div>

<?= $this->endSection(); ?>