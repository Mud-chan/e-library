<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounterBacaTable extends Migration
{
    public function up()
    {
        Schema::create('counter_baca', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_buku');
            $table->string('id_siswa');
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
            $table->timestamp('date')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('counter_baca');
    }
}
