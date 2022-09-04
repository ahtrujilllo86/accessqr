<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'idfrac',
        'nombre1',
        'nombre2',
        'apellidop',
        'apellidom',
        'correo',
        'password',
        'token',
        'casa'
    ];
}
