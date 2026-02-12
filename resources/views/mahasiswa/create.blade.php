@extends('layouts.app')

@section('content')

<h4>Tambah Mahasiswa</h4>

<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Matakuliah</label>
        <input type="text" name="matakuliah" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection