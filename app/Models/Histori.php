<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    protected $table = 'histori';
    protected $primaryKey = 'id';// karena tidak ada primary key tunggal
    public $incrementing = false; // karena tidak ada kolom auto-increment
    public $timestamps = false; // tidak menggunakan kolom timestamps

    protected $fillable = [
        'id', 'id_buku', 'id_siswa', 'date'
    ];

    public function user()
    {
    return $this->belongsTo(User::class, 'id_siswa');
    }
    public function buku()
    {
    return $this->belongsTo(Buku::class, 'id_buku');
    }
}

