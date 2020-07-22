<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Pedido extends Model
{
    protected $table = 'detalle_pedido';
    protected $primaryKey = 'id';
    public $filleable = ['cantidad', 'id_presentacion', 'id_pedido'];
    public $timestamps = null;
}
