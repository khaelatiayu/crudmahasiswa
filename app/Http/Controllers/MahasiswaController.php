<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['matakuliah', 'user'])->get();
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
            'semester' => 'required|numeric|min:1|max:8',
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        Mahasiswa::create($data);

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
            'nim' => 'required|unique:mahasiswas,nim,'.$nim.',nim',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required|numeric|min:1|max:8',
            'matakuliah_id' => 'required|exists:matakuliahs,id'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diupdate');
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }
}