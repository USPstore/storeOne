<?php
//pages ini akan kita gunakan untuk menangani halaman statis (home,about,contact)
namespace App\Controllers;

use \App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $Produk;
    public function __construct()
    {
        $this->Produk = new ProdukModel();
    }

    public function index()
    {
        // Menangkap keyword
        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $hasilCari = $this->Produk->search($keyword);
        } else {
            $hasilCari = $this->Produk;
        }
        // $allProduk = $this->Produk->findAll(); //find all=select*from
        $data = [
            'title' => 'Produk | USP',
            'produk' => $this->Produk->getProduk()
        ];
        // Instansiasi model ProdukModel kedalam kontroler produk
        // $Produk = new ProdukModel();
        // d($allProduk);


        // dengan engine templating
        return view('pages/produk', $data);
    }

    public function detail($slug)
    {
        // $allProduk = $this->Produk->getProduk($slug);

        $data = [
            'title' => 'detail | USP',
            'produk' => $this->Produk->getProduk($slug)
        ];
        // engine templating
        // echo $slug;

        // Jika data produk tidak ada
        if (empty($data['produk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk yang anda pilih' . $slug . 'tidak ditemukan');
        }
        return view('pages/detail', $data);
    }
}
