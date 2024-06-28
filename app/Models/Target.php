<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function target()
    {
        return $this->hasOne(Target::class, 'dosen_id');
    }

    public function kajian()
    {
        return $this->hasOne(Kajian::class, 'dosen_id');
    }

    public function metode()
    {
        return $this->hasOne(Metode::class, 'dosen_id');
    }
}
