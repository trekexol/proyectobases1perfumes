<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otros_Ingredientes extends Model
{
    protected $table = 'otros_ingredientes';
    protected $primaryKey = 'id';
    public $filleable = ['id_proveedor', 'nombre', 'formula_quimica', 'ipc', 'tsca_cas'];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->orWhere('nombre', 'LIKE', "%$name%");
        }
    }
}
