<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id';
    public $filleable = ['fecha', 'estatus', 'fecha_confirmacion', 'numero_factura', 'monto_total', 'id_productor', 'id_proveedor', 'id_condicion_pago', 'id_condicion_envio','id_contrato', 'id_contrato_proveedor', 'id_contrato_productor'];
    public $timestamps = false;
}
