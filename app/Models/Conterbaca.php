<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConterBaca extends Model
{
    protected $table = 'counter_baca';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id', 'id_buku', 'id_siswa', 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_siswa'); // Merujuk ke User (tabel siswa)
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
