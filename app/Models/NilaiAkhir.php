<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['mahasiswa_id','mata_kuliah_id','sikap','tugas','kompetensi','nilaiakhir'];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'mata_kuliah_id');
    }
    public function nilaibobot()
    {
        return $this->belongsTo(NilaiBobot::class, 'nilaibobot_id');
    }
    public function nilairata()
    {
        return $this->belongsTo(NilaiRata::class, 'nilairata_id');
    }
}
