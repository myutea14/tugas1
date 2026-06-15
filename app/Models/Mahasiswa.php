<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Ini wajib ada agar fungsi create() di Service bisa bekerja
    protected $fillable = ['nama', 'nim'];
}
