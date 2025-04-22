<?php

// app\Models\Comment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    public $incrementing = false; // karena 'id' sudah string
    public $timestamps = false; // tidak menggunakan kolom timestamps

    protected $fillable = [
        'id',
        'guru_id',
        'judul',
        'deskripsi',
        'kategori',
        'tingkatan',
        'thumb',
        'pdf',
        'date'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }
}
