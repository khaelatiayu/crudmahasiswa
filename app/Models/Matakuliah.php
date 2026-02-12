<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa; // 

class Matakuliah extends Model
{
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester'
    ];

    // relasi Many to Many
    public function mahasiswas()
    {
        return $this->belongsToMany(
            Mahasiswa::class,
            'mahasiswa_matakuliah', // tabel pivot
            'kode_mk',              // foreign key matakuliah di pivot
            'nim'                   // foreign key mahasiswa di pivot
        );
    }
}