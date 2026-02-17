<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliahs';
    
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks'
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}