<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

Route::get('/matakuliah/{id}', [MatakuliahController::class, 'show'])
     ->name('matakuliah.show');

/*
|--------------------------------------------------------------------------
| Route Resource
|--------------------------------------------------------------------------
*/

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matakuliah', MatakuliahController::class);