<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id(); // Ini adalah Primary Key (id) yang akan dirujuk Mahasiswa
            $table->string('kode_mk')->unique(); 
            $table->string('nama_mk'); 
            $table->integer('sks'); 
            $table->timestamps(); 
        }); 
    }

    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};