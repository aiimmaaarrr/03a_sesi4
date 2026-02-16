<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route CRUD Mahasiswa (Otomatis mencakup index, create, store, edit, update, destroy)
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matakuliah', MatakuliahController::class);