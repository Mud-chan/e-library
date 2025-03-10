<?php

// app\Models\Comment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmark';
    protected $primaryKey = null; // karena tidak ada primary key tunggal
    public $incrementing = false; // karena tidak ada kolom auto-increment
    public $timestamps = false; // tidak menggunakan kolom timestamps

    protected $fillable = [
        'id_siswa', 'id_buku'
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

