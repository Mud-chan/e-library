<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'id' => 'G001',
            'nama' => 'Budi Santoso',
            'mengampu' => 'Matematika',
            'email' => 'budi@example.com',
            'password' => Hash::make('password123'), // Enkripsi password
            'image' => 'default.jpg',
            'role' => 'guru',
        ]);

        Guru::create([
            'id' => 'G002',
            'nama' => 'Siti Aminah',
            'mengampu' => 'Bahasa Indonesia',
            'email' => 'siti@example.com',
            'password' => Hash::make('siti12345'),
            'image' => 'default.jpg',
            'role' => 'guru',
        ]);
    }
}
