<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia_Esencia extends Model
{
    protected $table = 'materia_esencia';
    protected $primaryKey = 'id';
    public $filleable = ['id_proveedor','estado', 'punto_ebullicion', 'ipc', 'ipc_alter', 'einecs', 'tsca_cas', 'descripcion_visual', 'nombre', 'parte', 'naturaleza', 'tipo', 'solubilidad', 'proceso', 'descproceso'];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->orWhere('nombre', 'LIKE', "%$name%");
        }
    }

}
