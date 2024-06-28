<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otorisasi extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['user_id','pe_rps','koprodi','kajur'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function rp()
    {
        return $this->hasOne(Rp::class);
    }

}
