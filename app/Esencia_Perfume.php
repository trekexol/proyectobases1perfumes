<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esencia_Perfume extends Model
{
    protected $table = 'esencia_perfume';
    protected $primaryKey = 'tsca_cas';
    public $filleable = ['nombre', 'tipo', 'descripcion'];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->orWhere('nombre', 'LIKE', "%$name%");
        }
    }
}
