<?php
// app\Models\User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    public $incrementing = false; // karena 'id' sudah string
    public $timestamps = false; // tidak menggunakan kolom timestamps

    protected $fillable = [
        'id', 'nama', 'email', 'password', 'kelas', 'jenis_kelamin', 'image',
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_user');
    }
}
