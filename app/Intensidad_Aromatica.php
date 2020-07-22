<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intensidad_Aromatica extends Model
{
    protected $table = 'intensidad_aromatica';
    protected $primaryKey = 'id';
    public $filleable = ['id_perfume', 'tipo', 'iniciales', 'concentracion', 'descripcion'];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->orWhere('concentracion', 'LIKE', "%$name%");
        }
    }
}
