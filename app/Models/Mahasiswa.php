<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['nama','nobp','kelas_id','mata_kuliah_id'];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class,'mata_kuliah_id');
    }

    // public function nilaimahasiswa()
    // {
    //     return $this->hasOne(NilaiMahasiswa::class);
    // }
    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
    public function nilairata()
    {
        return $this->hasMany(NilaiRata::class);
    }
    public function nilaiakhir()
    {
        return $this->hasOne(NilaiAkhir::class);
    }
    public function nilaibobot()
    {
        return $this->hasMany(NilaiBobot::class);
    }
}
