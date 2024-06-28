<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}
