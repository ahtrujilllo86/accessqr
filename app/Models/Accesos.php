<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesos extends Model
{
    protected $fillable = [
        'indexacceso',
        'idusuario',
        'idfrac',
        'tipo',
        'nombre',
        'marca',
        'modelo',
        'color',
        'placas',
        'inicio',
        'fin',
        'vigente',
        'casa',
        'autoriza'
    ];
}
