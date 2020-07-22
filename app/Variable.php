<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $table = 'variable';
    protected $primaryKey = 'id';
    public $filleable = ['nombre', 'etiqueta', 'descripcion'];
    public $timestamps = false;
}
