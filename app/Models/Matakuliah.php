<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliahs';
    protected $primaryKey = 'kode_mk';
    public $incrementing = false; // Karena kode_mk biasanya string (huruf+angka)
    protected $keyType = 'string';

    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester'];
}
