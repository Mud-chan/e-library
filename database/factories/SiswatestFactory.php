<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SiswatestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(), // atau bisa ubah jadi auto increment kalau pakai int
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('12345678'), // default password
            'kelas' => '6A', // contoh kelas
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'image' => 'default.png', // atau URL dummy jika pakai avatar
        ];
    }
}
