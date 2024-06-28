<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCpmk extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['cp_cmk_id','deskripsi'];


}
