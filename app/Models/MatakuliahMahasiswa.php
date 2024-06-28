<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatakuliahMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'user_roles'; // Nama tabel pivot

    protected $fillable = ['user_id', 'role_id', 'additional_column']; // Kolom-kolom yang dapat diisi

    public $timestamps = false; // Matikan pengelolaan timestamps
}
