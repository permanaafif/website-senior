<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function target()
    {
        return $this->belongsTo(Target::class, 'target_id');
    }
}
