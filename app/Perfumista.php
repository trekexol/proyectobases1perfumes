<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfumista extends Model
{
    protected $table = 'perfumista';
    protected $primaryKey = 'id';
    public $filleable = ['id_pais', 'tipo', 'nombre_primero', 'nombre_segundo', 'apellido_primero', 'apellido_segundo', 'genero'];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->orWhere('nombre_primero', 'LIKE', "%$name%");
        }
    }
}
