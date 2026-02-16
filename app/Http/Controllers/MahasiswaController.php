<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan daftar mahasiswa
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Tampilkan form tambah mahasiswa
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Simpan data mahasiswa baru
     */
    public function store(Request $request)
    {
        // Bagian ini diubah agar sesuai dengan modul
        $request->validate([ 
            'nim' => 'required|unique:mahasiswas,nim', 
            'nama' => 'required', 
            'kelas' => 'required', 
            'matakuliah' => 'required' 
        ]); 

        Mahasiswa::create($request->all()); 

        return redirect()->route('mahasiswa.index')
                        ->with('success', 'Data mahasiswa berhasil ditambahkan'); 
    }
    /**
     * Tampilkan form edit
     */
    public function edit($nim)
    {
        // Mencari data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update data mahasiswa
     */
    public function update(Request $request, $nim)
    {
        // Validasi input untuk update (NIM tidak perlu divalidasi unik jika readonly)
        $request->validate([
            'nama'       => 'required|string|max:100',
            'kelas'      => 'required|string|max:20',
            'matakuliah' => 'required|string|max:100',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Hapus data mahasiswa
     */
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil dihapus!');
    }
}