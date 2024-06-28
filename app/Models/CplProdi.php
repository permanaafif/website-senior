<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CplProdi extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['judul','isijudul'];

    public function rp()
    {
        return $this->hasOne(Rp::class);
    }
    public function cpmk()
    {
        return $this->hasOne(CpMk::class);
    }


}
