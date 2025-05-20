<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConterBaca;

class CounterBacaSeeder extends Seeder
{
    public function run()
    {
        ConterBaca::create([
            'id' => 'view1',
            'id_buku' => 1,
            'id_siswa' => 'siswa1',
            'date' => now(),
        ]);
    }
}
