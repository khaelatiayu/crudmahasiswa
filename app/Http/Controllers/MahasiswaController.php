<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah; //
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = \App\Models\Mahasiswa::with('matakuliahs')->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $matakuliahs = Matakuliah::all();
        return view('mahasiswa.create', compact('matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required|array'
        ]);

        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        // Simpan relasi
        $mahasiswa->matakuliahs()->attach($request->matakuliah);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $matakuliahs = Matakuliah::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'matakuliahs'));
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required|array'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);

        $mahasiswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        // Update relasi pivot
        $mahasiswa->matakuliahs()->sync($request->matakuliah);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }
}