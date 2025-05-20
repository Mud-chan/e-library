<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CounterBaca;

class CounterBacaSeeder extends Seeder
{
    public function run()
    {
        CounterBaca::create([
            'id' => 'view1',
            'id_buku' => 1,
            'id_siswa' => 'siswa1',
            'date' => now(),
        ]);
    }
}
