<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['mahasiswa_id','nilai_bobot_id','sikap','tugas', 'kompetensi', 'bobot', 'nilai_akhir'];

    // public function hitungNilaiAkhir()
    // {
    //     $nilaiAkhir = ($this->sikap * $this->nilaibobot->bobot_sikap +
    //                    $this->tugas * $this->nilaibobot->bobot_tugas +
    //                    $this->kompetensi * $this->nilaibobot->bobot_kompetensi) / 100;
    //     return $nilaiAkhir;
    // }

        public function nilaibobot()
        {
            return $this->belongsTo(NilaiBobot::class, 'nilai_bobot_id');
        }
    // public function matakuliah()
    // {
    //     return $this->belongsTo(MataKuliah::class);
    // }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
