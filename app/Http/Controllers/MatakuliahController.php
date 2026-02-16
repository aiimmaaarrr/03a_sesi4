<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk',
            'nama_mk' => 'required',
            'sks'     => 'required|integer',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')
                        ->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    /**
     * TUGAS MANDIRI NOMOR 2: Menampilkan mahasiswa per mata kuliah
     */
    public function show($id)
    {
        // Mengambil satu data mata kuliah beserta relasi mahasiswas-nya
        $matakuliah = Matakuliah::with('mahasiswas')->findOrFail($id);
        
        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk,' . $id,
            'nama_mk' => 'required',
            'sks'     => 'required|integer',
        ]);

        $mk = Matakuliah::findOrFail($id);
        $mk->update($request->all());

        return redirect()->route('matakuliah.index')
                        ->with('success', 'Mata Kuliah berhasil diperbarui');
    }

    public function destroy($id)
    {
        Matakuliah::destroy($id);
        return redirect()->route('matakuliah.index')
                        ->with('success', 'Mata Kuliah berhasil dihapus');
    }
}