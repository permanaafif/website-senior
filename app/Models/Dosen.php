<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function matakuliah()
    {
        return $this->hasOne(MataKuliah::class, 'dosen_id');
    }

    public function judul()
    {
        return $this->hasOne(Judul::class, 'dosen_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
