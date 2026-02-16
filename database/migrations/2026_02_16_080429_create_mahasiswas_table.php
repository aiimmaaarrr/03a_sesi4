<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('nim')->primary(); // Primary key sebagai string
            $table->string('nama'); // Kolom nama sebagai string
            $table->string('kelas'); // Kolom kelas sebagai string
            $table->string('matakuliah'); // Kolom matakuliah sebagai string
            $table->timestamps(); // Opsional: menambahkan created_at dan updated_at
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};