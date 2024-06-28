<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['name','guard_name',];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}




