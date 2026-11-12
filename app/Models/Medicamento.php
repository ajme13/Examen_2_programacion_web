<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'categoria',
        'precio',
        'costo',
        'stock',
        'imagen',
        'laboratorio',
        'vencimiento',
        'registro',
        'lote',
];
}
