<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class PenjualSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'PT.USP',
                'alamat'    => 'Banjarmasin',
                'kontak' => '081392552459',
                'created_at' => Time::now('Asia/Kuala_Lumpur'),
                'updated_at' => Time::now('Asia/Kuala_Lumpur')
            ],
            [
                'nama' => 'PT.Kain Sejahtera',
                'alamat'    => 'Temanggung',
                'kontak' => '081392552459',
                'created_at' => Time::now('Asia/Kuala_Lumpur'),
                'updated_at' => Time::now('Asia/Kuala_Lumpur')
            ],
            [
                'nama' => 'PT.Sablon',
                'alamat'    => 'Semarang',
                'kontak' => '081392552459',
                'created_at' => Time::now('Asia/Kuala_Lumpur'),
                'updated_at' => Time::now('Asia/Kuala_Lumpur')
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO penjual (nama, alamat,kontak,created_at,updated_at) VALUES(:nama:, :alamat:, :kontak:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        // $this->db->table('Penjual')->insert($data);
        $this->db->table('Penjual')->insertBatch($data);
    }
}
