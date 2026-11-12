<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'rtn',
        'empresa',
        'contacto',
        'telefono',
        'categoria',
        'lim_credito',
        'dias_credito',
        'activo',
        'registro',
];
}
