<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan semua data mahasiswa
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Menampilkan form tambah mahasiswa
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required'
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Menampilkan form edit mahasiswa
     */
    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update data mahasiswa
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'matakuliah' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Menghapus data mahasiswa
     */
    public function destroy($nim)
    {
        Mahasiswa::destroy($nim);
        return redirect()->route('mahasiswa.index');
    }
}