@extends('layouts.app')

@section('content')

<h4>Tambah Mahasiswa</h4>

{{-- TAMPILKAN ERROR --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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
        <label>Semester</label>
        <input type="text" name="semester" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Mata Kuliah</label>
        <select name="matakuliah_id" class="form-control" required>
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach($matakuliahs as $mk)
                <option value="{{ $mk->id }}">
                    {{ $mk->nama_mk }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection