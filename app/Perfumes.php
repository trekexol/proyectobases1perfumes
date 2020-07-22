<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfumes extends Model
{
    protected $table = 'perfume';
    protected $primaryKey = 'id';
    public $filleable = ['id_productor', 'tipo', 'nombre', 'genero', 'recomendacion'];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->orWhere('nombre', 'LIKE', "%$name%");
        }
    }
}
