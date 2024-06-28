<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpMk extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['judul','isijudul','cpl_prodi_id'];

    public function cplprodi()
    {
        return $this->belongsTo(CplProdi::class, 'cpl_prodi_id');
    }
}
