<?php
//pages ini akan kita gunakan untuk menangani halaman statis (home,about,contact)
namespace App\Controllers;

use \App\Models\ProdukModel;

class Pages extends BaseController
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

        // menjalankan model getProduk
        $data = [
            'title' => 'HOME | USP',
            'produk' => $this->Produk->getProduk()
        ];

        return view('pages/home', $data);

        // $faker = \Faker\Factory::create();
        // $data = [
        //     'title' => 'Web Official | USP' //key title akan yang akan dipanggil di view
        // ]; //data ini akan dikirim ke view

        // engine templating
        // return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | USP',
            'cek_var_dump' => ['ini', 'pakai', 'd', 'untuk ganti var_dump']
        ];
        // dengan engine templating
        return view('pages/about', $data);
    }

    public function kontak()
    {
        $data = [
            'title' => 'Kontak | USP'
        ];
        // engine templating
        return view('pages/kontak', $data);
    }
}
