<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpActivit extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['minggu', 'subcpmk_id', 'bk_pemb', 'mt_pemb', 'wk_penilaian_id'];
}
