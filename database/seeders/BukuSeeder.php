<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run()
    {
        Buku::create([
            'guru_id' => 'guru1', // Sesuai dengan id di tabel siswa
            'judul' => 'Novel Contoh',
            'deskripsi' => 'Deskripsi novel contoh',
            'kategori' => 'Novel',
            'tingkatan' => 'SMA',
            'thumb' => 'thumb.jpg',
            'pdf' => 'contoh.pdf',
            'date' => now(),
        ]);
    }
}
