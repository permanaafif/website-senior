<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['user_id','prodi','kelas','mata_kuliah_id','kodemk','sksmk','kode_kelasmk'];
    // protected $policy = DataPolicy::class;


    public function matakuliah(){
        return $this->belongsTo(MataKuliah::class,'mata_kuliah_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }
    public function nilaibobot(){
        return $this->hasMany(NilaiBobot::class);
    }
}

