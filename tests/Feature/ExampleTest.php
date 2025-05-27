<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Siswatest;
use Illuminate\Support\Facades\Hash;


class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Pengujian Halaman Awal, Logreg, Forgot Password (tanpa login)
     * dan Katalog Buku (dengan login sebagai hikarilight83@gmail.com)
     */
    public function test_the_application_returns_a_successful_response(): void
    {



        // Halaman yang tidak perlu login
        $home = $this->get('/');
        $home->assertStatus(200);

        $logreg = $this->get('/logreg');
        $logreg->assertStatus(200);

        $forgot = $this->get('/forgot-password');
        $forgot->assertStatus(200);

        // Buat user dummy
    $siswa = Siswatest::factory()->create([
        'email' => 'hikarilight83@gmail.com',
        'password' => Hash::make('12345678'),
    ]);

    // Request tanpa login (cookie)
    $this->get('/katalogbuku')->assertStatus(302); // pasti redirect login

    // Request dengan cookie user_id berisi id siswa
    $response = $this->withCookie('user_id', $siswa->id)
                     ->get('/katalogbuku');

    $response->assertStatus(200);
    }
}
