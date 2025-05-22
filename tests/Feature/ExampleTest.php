<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Pengujian Halaman Awal dan Migrasi Tabel Siswa, Guru, Buku serta tabel ConterBaca
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response = $this->get('/logreg');
        

        $response->assertStatus(200);
    }
}
