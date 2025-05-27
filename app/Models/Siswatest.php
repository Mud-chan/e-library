<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswatest extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id', 'nama', 'email', 'password', 'kelas', 'jenis_kelamin', 'image',
    ];
}

