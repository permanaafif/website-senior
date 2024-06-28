<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capaian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function judul()
    {
        return $this->belongsTo(Judul::class, 'judul_id');
    }
}
