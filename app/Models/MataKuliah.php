<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
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

    public function rp()
    {
        return $this->hasOne(Rp::class, );
    }

    public function nilaibobot()
    {
        return $this->hasOne(NilaiBobot::class);
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

}
