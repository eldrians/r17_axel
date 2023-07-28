<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jabatan', 'jenis_kelamin', 'alamat'];
    use HasFactory;
}
