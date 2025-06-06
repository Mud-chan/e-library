<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            BukuSeeder::class,
            CounterBacaSeeder::class,
        ]);

        User::factory()->create([
            'nama' => 'Test User',      // Ganti 'name' jadi 'nama'
            'email' => 'test@example.com',
        ]);
    }
}
