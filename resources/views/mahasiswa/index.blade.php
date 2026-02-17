@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Mahasiswa</h3>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            + Tambah Mahasiswa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Mata Kuliah</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->kelas }}</td>
                        <td>{{ $mhs->semester }}</td>
                        <td>
                            {{ $mhs->matakuliah ? $mhs->matakuliah->nama_mk : '-' }}
                        </td>
                        <td>
                            <a href="{{ route('mahasiswa.edit', $mhs->nim) }}" 
                               class="btn btn-warning btn-sm">
                               Edit
                            </a>

                            <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection