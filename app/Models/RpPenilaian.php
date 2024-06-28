<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpPenilaian extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['teknik','indikator','bobot'];
}
