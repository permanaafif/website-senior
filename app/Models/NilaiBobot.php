<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiBobot extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['mahasiswa_id','mata_kuliah_id','bobot_tugas','bobot_kuis', 'bobot_uts', 'bobot_uas','nilai_akhir','grade'];

    // public function matakuliah()
    // {
    //     return $this->belongsTo(MataKuliah ::class, 'mata_kuliah_id');
    // }


    // public function nilaiakhir()
    // {
    //     return $this->belongsTo(NilaiAkhir::class, 'nilai_akhir_id');
    // }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

}
