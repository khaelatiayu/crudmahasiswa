@extends('layouts.app')

@section('content')

<h4>Edit Mata Kuliah</h4>

{{-- Error Validation --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('matakuliah.update', $matakuliah->kode_mk) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kode MK</label>
        <input type="text" class="form-control"
               value="{{ $matakuliah->kode_mk }}" readonly>
    </div>

    <div class="mb-3">
        <label>Nama MK</label>
        <input type="text" name="nama_mk"
               value="{{ $matakuliah->nama_mk }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>SKS</label>
        <input type="number" name="sks"
               value="{{ $matakuliah->sks }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Semester</label>
        <input type="number" name="semester"
               value="{{ $matakuliah->semester }}"
               class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection