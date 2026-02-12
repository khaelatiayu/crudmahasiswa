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

    {{-- 🔥 REVISI BAGIAN INI --}}
    <div class="mb-3">
        <label>Pilih Mata Kuliah</label>

        @foreach($matakuliahs as $mk)
            <div class="form-check">
                <input class="form-check-input"
                       type="checkbox"
                       name="matakuliah[]"
                       value="{{ $mk->kode_mk }}">

                <label class="form-check-label">
                    {{ $mk->nama_mk }} ({{ $mk->sks }} SKS)
                </label>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection