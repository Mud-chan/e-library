<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Pengujian Halaman Awal, Logreg, Forgot Password (tanpa login)
     * dan Katalog Buku (dengan login sebagai hikarilight83@gmail.com)
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Seed database user (jika belum ada di testing DB)
        $user = User::factory()->create([
            'email' => 'hikarilight83@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Halaman yang tidak perlu login
        $home = $this->get('/');
        $home->assertStatus(200);

        $logreg = $this->get('/logreg');
        $logreg->assertStatus(200);

        $forgot = $this->get('/forgot-password');
        $forgot->assertStatus(200);

        // Halaman yang perlu login
        $this->actingAs($user);

        $katalog = $this->get('/katalogbuku');
        $katalog->assertStatus(200);
    }
}
