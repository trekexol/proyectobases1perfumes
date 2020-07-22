<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion_Ingrediente extends Model
{
    protected $table = 'presentacion_ingrediente';
    protected $primaryKey = 'pc';
    public $filleable = ['precio', 'volumen_ml', 'id_materia', 'id_otros_ingredientes'];
    public $timestamps = false;
} 