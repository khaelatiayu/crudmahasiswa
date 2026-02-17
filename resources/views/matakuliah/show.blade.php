@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Daftar Mahasiswa</h3>

    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $matakuliah->nama_mk }}</h5>
            <p>Kode: {{ $matakuliah->kode_mk }}</p>
            <p>SKS: {{ $matakuliah->sks }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($matakuliah->mahasiswas as $mhs)
                    <tr>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->kelas }}</td>
                        <td>{{ $mhs->semester }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada mahasiswa mengambil mata kuliah ini
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection