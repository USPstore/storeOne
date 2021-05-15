<?php

namespace App\Controllers;

use \App\Models\ProdukModel;

class Admin extends BaseController
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

        // menangkap halaman
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $data = [
            'title' => 'Kelola Produk | USP',
            // 'produk' => $this->Produk->getProduk()
            'produk' => $this->Produk->paginate(3, 'produk'), //3 adalah jml produk per halaman
            'pager'  => $this->Produk->pager,
            'currentPage' => $currentPage
        ];
        return view('pages/admin', $data);
    }

    public  function create()
    {
        session();
        $data = [
            'title' => 'Tambah Produk Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('pages/create', $data);
    }

    public function save()
    {
        // Validasi input
        if (!$this->validate([
            'kode_produk' =>
            [
                'rules' => 'required|is_unique[produk.kode_produk]',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],

            'nama_produk' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'kategori' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'harga_beli' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'harga_jual' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'stok_produk' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'deskripsi' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'icon_produk' =>
            [
                'rules' => 'max_size[icon_produk,1024]|is_image[icon_produk]|mime_in[icon_produk,image/jpg,image/jpeg,image/png]',
                'errors' =>
                [

                    'max_size' => '{field}  ukuran gambar terlalu  besar (max 1MB)',
                    'is_image' => '{field}  yang kamu pilih bukan gambar',
                    'mime_in' => '{field}  yang kamu pilih bukan gambar'
                ]
            ]



        ])) {

            // $validation = \Config\Services::validation();
            // dd($validation);
            // return redirect()->to('/admin/create')->withInput()->with('validation', $validation); //ketika redirect ke halaman input, sertakan data yg diinput, sertakan validasi. data dan validasi ini akan tersimpan didalam session dan akan ditangkap lagi oleh methode create
            return redirect()->to('/admin/create')->withInput();
        }
        // dd($this->request->getVar('kode_produk')); menangkap data yg diinput
        // dd('berhasil');


        // Ambil gambar
        $ambilGambar = $this->request->getFile('icon_produk');
        // dd($ambilGambar);

        // Jika tidak ada gambar yang diupload, gunakan gambar default.jpg
        if ($ambilGambar->getError() == 4) {
            $namaGambar = 'default.jpeg';
        } else {

            // Generate nama random gambar
            $namaGambar = $ambilGambar->getRandomName();

            // pindahkangambar
            $ambilGambar->move('image', $namaGambar); //=public/image 
            // ambil nama gambar
            // $namaGambar = $ambilGambar->getName();
        }


        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->Produk->save([
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori' => $this->request->getVar('kategori'),
            'slug' => $slug,
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'stok_produk' => $this->request->getVar('stok_produk'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'icon_produk' => $namaGambar

        ]);
        session()->setFlashdata('pesan', 'Produk berhasil ditambahkan'); //membuat flash message sebelum redirect
        return redirect()->to('/admin');
    }

    public function delete($id)
    {
        // menghapus file gambar dari server
        // langkah 1.cari gambar berdasarkan id  pada model
        $icon_produk = $this->Produk->find($id);
        // langkah 2. cek jika gambarnya default.jpeg
        if ($icon_produk['icon_produk'] != 'default.jpeg') {
            // hapus gambar
            unlink('image/' . $icon_produk['icon_produk']);
        }
        $this->Produk->delete($id); //method delete dan save itu otomatis dr ci nya
        session()->setFlashdata('pesan', 'Produk berhasil dihapus');
        return redirect()->to('/admin');
    }

    public function edit($slug)
    {
        session();
        $data = [
            'title' => 'Ubah Produk ',
            'validation' => \Config\Services::validation(),
            'produk' => $this->Produk->getProduk($slug)
        ];
        return view('pages/edit', $data);
    }

    public function update($id)
    {

        $kodeLama = $this->Produk->getProduk($this->request->getVar('slug'));
        if ($kodeLama['kode_produk'] == $this->request->getVar('kode_produk')) {
            $rule_kode_produk = 'required';
        } else {
            $rule_kode_produk = 'required|is_unique[produk.kode_produk]';
        }
        // Validasi input
        if (!$this->validate([
            'kode_produk' =>
            [
                'rules' => $rule_kode_produk,
                'errors' =>
                [
                    'required' => '{field}  harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],

            'nama_produk' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'kategori' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'harga_beli' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'harga_jual' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'stok_produk' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'deskripsi' =>
            [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field}  harus diisi.'
                ]
            ],
            'icon_produk' =>
            [
                'rules' => 'max_size[icon_produk,1024]|is_image[icon_produk]|mime_in[icon_produk,image/jpg,image/jpeg,image/png]',
                'errors' =>
                [

                    'max_size' => '{field}  ukuran gambar terlalu  besar (max 1MB)',
                    'is_image' => '{field}  yang kamu pilih bukan gambar',
                    'mime_in' => '{field}  yang kamu pilih bukan gambar'
                ]
            ]

        ])) {

            // $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/admin/edit/' . $this->request->getVar('slug'))->withInput(); //ketika redirect ke halaman input, sertakan data yg diinput, sertakan validasi. data dan validasi ini akan tersimpan didalam session dan akan ditangkap lagi oleh methode create
        }

        $ambilGambar = $this->request->getFile('icon_produk');
        // cek gambar,apakah tetap gambar lama
        if ($ambilGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('icon_produkLama');
        } else {
            // Generate nama random gambar
            $namaGambar = $ambilGambar->getRandomName();

            // pindahkangambar
            $ambilGambar->move('image', $namaGambar); //=public/image 
            // hapus file lama
            unlink('image/' . $this->request->getVar('icon_produkLama'));
        }

        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->Produk->save([
            'id' => $id,
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori' => $this->request->getVar('kategori'),
            'slug' => $slug,
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'stok_produk' => $this->request->getVar('stok_produk'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'icon_produk' => $namaGambar

        ]);
        session()->setFlashdata('pesan', 'Produk berhasil diubah'); //membuat flash message sebelum redirect
        return redirect()->to('/admin');
    }
}
