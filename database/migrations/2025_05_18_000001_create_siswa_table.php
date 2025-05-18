<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// database/migrations/2025_05_18_000001_create_siswa_table.php
return new class extends Migration {
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('kelas')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('image')->nullable();
            $table->timestamps();   // hapus jika memang tak ingin
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
