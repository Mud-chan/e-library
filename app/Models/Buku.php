<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

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

    public function rating()
    {
    return $this->hasMany(Rating::class, 'id_buku');
    }

    public function getAverageRatingAttribute()
    {
    return $this->rating()->average('rating') ?? 0;
    }
}
