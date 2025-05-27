<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswatest extends Authenticatable
{
    use Notifiable, HasFactory; // ⬅️ Tambahkan HasFactory di sini

    protected $table = 'siswa';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id', 'nama', 'email', 'password', 'kelas', 'jenis_kelamin', 'image',
    ];
}
