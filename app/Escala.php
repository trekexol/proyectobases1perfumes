<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    protected $table = 'formula_escala';
    protected $primaryKey = 'fecha_inicial';
    public $filleable = ['escala_inicial', 'escala_final', 'fecha_final'];
    public $timestamps = false; 
}
