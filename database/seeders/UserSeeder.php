<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 'guru1',
            'nama' => 'Guru Test',
            'email' => 'guru@test.com',
            'password' => bcrypt('password'),
            'kelas' => null,
            'jenis_kelamin' => 'Laki-laki',
            'image' => null,
        ]);
        User::create([
            'id' => 'siswa1',
            'nama' => 'Siswa Test',
            'email' => 'siswa@test.com',
            'password' => bcrypt('password'),
            'kelas' => 'XII IPA 1',
            'jenis_kelamin' => 'Perempuan',
            'image' => null,
        ]);
    }
}
