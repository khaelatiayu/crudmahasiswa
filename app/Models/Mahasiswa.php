<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primaryKey = 'nim';   // Primary key bukan id
    public $incrementing = false;    // Karena bukan auto increment
    protected $keyType = 'string';   // Karena NIM berupa string

    protected $fillable = ['nim', 'nama', 'kelas', 'matakuliah'];
}