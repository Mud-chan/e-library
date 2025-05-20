<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('id')->primary(); 
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('kelas')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
