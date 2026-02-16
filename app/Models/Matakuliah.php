<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'matakuliahs';

    // PERBAIKAN: Hapus primaryKey 'kode_mk' karena kita menggunakan 'id' (default Laravel)
    // Laravel secara otomatis tahu primary key adalah 'id' yang auto-increment
    
    // PERBAIKAN: Hapus kolom 'semester' dari fillable karena tidak ada di migration Langkah 1
    protected $fillable = [
        'kode_mk', 
        'nama_mk', 
        'sks'
    ];

    /**
     * Relasi HasMany: Satu Mata Kuliah bisa diambil banyak Mahasiswa
     * Digunakan untuk Tugas Mandiri Nomor 2
     */
    public function mahasiswas() 
    { 
        // Pastikan foreign key merujuk ke 'matakuliah_id' di tabel mahasiswas
        return $this->hasMany(Mahasiswa::class, 'matakuliah_id');
    }
}