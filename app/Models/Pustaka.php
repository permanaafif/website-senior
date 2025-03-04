<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pustaka extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['utama','pendukung',];

    public function rp()
    {
        return $this->hasOne(Rp::class);
    }
}
