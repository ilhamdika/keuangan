<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Saldo;

class SaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $saldo = [
            [
                'nominal' => 0,
                'total_pengeluaran' => 0,
                'total_pemasukan' => 0
            ]
        ];

        Saldo::insert($saldo);
    }
}
