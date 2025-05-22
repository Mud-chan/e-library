<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->string('id')->primary(); // id string, bukan auto-increment
            $table->string('nama');
            $table->string('mengampu');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('role')->default('guru');
            // Tidak perlu timestamps karena di model sudah diset false
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
