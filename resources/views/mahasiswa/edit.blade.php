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

                <div class="form-group">
                    <label>Mata Kuliah</label>
                    <select name="matakuliah_id" class="form-control" required>
                        @foreach($matakuliahs as $mk)
                            <option value="{{ $mk->id }}"
                                {{ $mahasiswa->matakuliah_id == $mk->id ? 'selected' : '' }}>
                                {{ $mk->nama_mk }}
                            </option>
                        @endforeach
                    </select>
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