<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conterbacaguru extends Model
{
    protected $table = 'counter_baca_guru';
    protected $primaryKey = 'id';// karena tidak ada primary key tunggal
    public $incrementing = false; // karena tidak ada kolom auto-increment
    public $timestamps = false; // tidak menggunakan kolom timestamps

    protected $fillable = [
        'id', 'id_buku', 'id_guru', 'date'
    ];

    public function user()
    {
    return $this->belongsTo(Guru::class, 'id_guru');
    }
    public function buku()
    {
    return $this->belongsTo(Buku::class, 'id_buku');
    }
}

