<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiRata extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['mahasiswa_id','mata_kuliah_id','tugas','kuis', 'uts','uas'];


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(Mahasiswa::class, 'mata_kuliah_id');
    }
    public function nilaibobot()
    {
        return $this->hasOne(NilaiAkhir::class);
    }
}
