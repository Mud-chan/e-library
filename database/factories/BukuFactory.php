<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BukuFactory extends Factory
{
    protected $model = Buku::class;

    public function definition()
    {
        return [
            'id' => (string) Str::uuid(),
            'guru_id' => (string) Str::uuid(), // sesuaikan dengan data guru
            'judul' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->paragraph(),
            'kategori' => $this->faker->randomElement(['Novel', 'Komik', 'Buku Cerita', 'Buku Pelajaran']),
            'tingkatan' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6']),
            'thumb' => null,
            'pdf' => null,
            'date' => $this->faker->date(),
        ];
    }
}
