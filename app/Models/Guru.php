<?php

// app\Models\Comment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id';
    public $incrementing = false; // karena 'id' sudah string
    public $timestamps = false; // tidak menggunakan kolom timestamps

    protected $fillable = [
        'id ', 'nama', 'mengampu','email','password','image','role'
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_guru');
    }
}

