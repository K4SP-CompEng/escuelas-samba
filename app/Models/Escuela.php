<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'fecha_fundacion',
        'resumen_hist',
        'direccion'
    ];
}
