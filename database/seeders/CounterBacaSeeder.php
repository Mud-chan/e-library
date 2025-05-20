<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conterbaca;

class CounterBacaSeeder extends Seeder
{
    public function run()
    {
        Conterbaca::create([
            'id' => 'view1',
            'id_buku' => 1,
            'id_siswa' => 2,
            'date' => now(),
        ]);
    }
}
