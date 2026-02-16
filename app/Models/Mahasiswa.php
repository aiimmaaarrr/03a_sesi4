<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'nim'; // Mengatur NIM sebagai PK
    public $incrementing = false;  // Karena NIM string, bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = ['nim', 'nama', 'kelas', 'matakuliah'];
}