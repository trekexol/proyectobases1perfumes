<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condicion_Contrato extends Model
{ 
    protected $table = 'condicion_contrato';
    protected $primaryKey = 'id';
    public $filleable = ['id_contrato','id_contrato_productor','id_contrato_proveedor',
    'id_forma_pago', 'id_proveedor_pago',
    'id_forma_envio', 'id_pais_envio', 'id_proveedor_envio'];

    public $timestamps = false;
}