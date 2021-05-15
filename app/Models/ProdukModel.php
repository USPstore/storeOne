<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields = ['icon_produk', 'kode_produk', 'nama_produk', 'kategori', 'slug', 'harga_beli', 'harga_jual', 'stok_produk', 'deskripsi', 'icon_produk']; //kontrol apa saja kolom tabel yang bisa diisi

    public function getProduk($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->table('produk');
        // $builder = $this->like('nama_produk', $keyword);
        // return $builder;

        // atau bisa ditulis
        return $this->table('produk')->like('nama_produk', $keyword)->orLike('kode_produk', $keyword);
    }
}
