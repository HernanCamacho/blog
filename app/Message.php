<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // Si el modelo está en singular del nombre de la tabla laravel lo busca automaticamente
    // Si no se puede hacer lo siguiente:
    // protected $table = 'nombre_de_la_tabla';
    protected $fillable = ['nombre', 'email', 'mensaje'];
}
