@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Edit Data Mahasiswa</h3>

    {{-- Notifikasi Error Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- NIM (Tidak Bisa Diubah) --}}
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $mahasiswa->nim }}"
                           disabled>
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="{{ old('nama', $mahasiswa->nama) }}"
                           required>
                </div>

                {{-- Kelas --}}
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text"
                           name="kelas"
                           class="form-control"
                           value="{{ old('kelas', $mahasiswa->kelas) }}"
                           required>
                </div>

                {{-- Mata Kuliah (Many to Many) --}}
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>

                    @php
                        $selectedMatkul = old(
                            'matakuliah',
                            $mahasiswa->matakuliahs->pluck('kode_mk')->toArray()
                        );
                    @endphp

                    @foreach($matakuliahs as $mk)
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="matakuliah[]"
                                   value="{{ $mk->kode_mk }}"
                                   {{ in_array($mk->kode_mk, $selectedMatkul) ? 'checked' : '' }}>

                            <label class="form-check-label">
                                {{ $mk->nama_mk }} ({{ $mk->sks }} SKS - Semester {{ $mk->semester }})
                            </label>
                        </div>
                    @endforeach
                </div>

                {{-- Tombol --}}
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection