<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /** @var class-string */
    protected $model = User::class;

    /**
     * Password yang dipakai bersama agar hashing sekali saja.
     */
    protected static ?string $password = null;

    /**
     * Default state untuk model `User`.
     */
    public function definition(): array
    {
        return [
            // `id` bertipe string → gunakan UUID
            'id'             => Str::uuid()->toString(),

            // kolom di tabel `siswa`
            'nama'           => $this->faker->name(),          // ganti 'name' → 'nama'
            'email'          => $this->faker->unique()->safeEmail(),
            'password'       => static::$password ??= Hash::make('password'),

            // kolom opsional / nullable
            'kelas'          => $this->faker->randomElement(['1A', '1B', '2A', '2B']),
            'jenis_kelamin'  => $this->faker->randomElement(['L', 'P']),
            'image'          => null,                          // atau $this->faker->imageUrl()

            // hapus field di bawah jika tidak ada di tabel
            // 'email_verified_at' => now(),
            // 'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Contoh state tambahan jika Anda tetap menyimpan kolom verifikasi.
     */
    public function unverified(): static
    {
        return $this->state(fn () => [
            'email_verified_at' => null,
        ]);
    }
}
