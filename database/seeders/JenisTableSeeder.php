<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenis;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = [
            [
                'nama' => 'Gaji',
                'kategori_id' => 1
            ],
            [
                'nama' => 'Tunjangan',
                'kategori_id' => 1
            ],
            [
                'nama' => 'Makan',
                'kategori_id' => 2
            ]
        ];

        Jenis::insert($jenis);
    }
}
