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
            'semester'=> 'required|integer',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    public function edit($kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $kode_mk)
    {
        $request->validate([
            'nama_mk' => 'required',
            'sks'     => 'required|integer',
            'semester'=> 'required|integer',
        ]);

        $matakuliah = Matakuliah::findOrFail($kode_mk);
        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil diperbarui');
    }

    public function destroy($kode_mk)
    {
        Matakuliah::destroy($kode_mk);
        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata Kuliah berhasil dihapus');
    }
}