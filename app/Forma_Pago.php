<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forma_Pago extends Model
{
    protected $table = 'forma_pago';
    protected $primaryKey = 'id';
    public $filleable = ['id_proveedor', 'nombre', 'tipo', 'plazo_dias', 'descripcion', 'cuotas', 'porcentaje_cuotas'];
    public $timestamps = false;
}
