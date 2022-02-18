<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protrcted $fillable = ['dni', 'apellidoynombre','matricula','matricula2','correo','numerocontacto','comprobantepago'];

}
