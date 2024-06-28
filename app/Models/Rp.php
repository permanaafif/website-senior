<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rp extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['mata_kuliah_id','sks','otorisasi_id','cpl_prodi_id','desc_matkul','desc_bk','pustaka_id', 'team_id', 'tgl_penyusunan'];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
    public function otorisasi()
    {
        return $this->belongsTo(Otorisasi::class, 'otorisasi_id');
    }
    public function pustaka()
    {
        return $this->belongsTo(Pustaka::class, 'pustaka_id');
    }
    public function cplprodi()
    {
        return $this->belongsTo(CplProdi::class, 'cpl_prodi_id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }


}
