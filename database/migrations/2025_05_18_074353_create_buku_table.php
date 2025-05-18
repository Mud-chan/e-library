<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('guru_id');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('kategori');
            $table->string('tingkatan')->nullable();
            $table->string('thumb')->nullable();
            $table->string('pdf')->nullable();
            $table->date('date')->nullable();
            $table->timestamps(); // kalau kamu ingin pakai created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
