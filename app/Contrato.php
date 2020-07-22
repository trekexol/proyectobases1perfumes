<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';
    protected $primaryKey = 'id_contrato';
    public $filleable = ['id_productor','id_proveedor', 'descuento','fecha_inicial', 'exclusividad', 'fecha_final', 'motivo_cancelacion'];

    public $timestamps = false;
}
