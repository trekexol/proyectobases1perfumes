<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class miembro_ifra extends Model
{
    protected $table = 'miembro_ifra';
    protected $primaryKey = 'id';
    public $filleable = ['fecha_inicial', 'fecha_final', 'tipo', 'id_productor', 'id_proveedor'];
    public $timestamps = false;
}
