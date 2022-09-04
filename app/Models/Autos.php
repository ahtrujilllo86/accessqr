<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    protected $fillable = [
        'iduser',
        'marca',
        'modelo',
        'color',
        'placas',
    ];
}
