<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Guru Test',
            'email' => 'guru@test.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'id' => 2,
            'name' => 'Siswa Test',
            'email' => 'siswa@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}
