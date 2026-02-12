<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah; // 

class Mahasiswa extends Model
{
    protected $primaryKey = 'nim';   
    public $incrementing = false;    
    protected $keyType = 'string';   

    protected $fillable = ['nim', 'nama', 'kelas'];

    //relasi
    public function matakuliahs()
    {
        return $this->belongsToMany(
            Matakuliah::class,
            'mahasiswa_matakuliah', // nama tabel pivot
            'nim',                  // foreign key di tabel pivot untuk mahasiswa
            'kode_mk'               // foreign key di tabel pivot untuk matakuliah
        );
    }
}