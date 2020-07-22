<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $primaryKey = 'id';
    public $filleable = ['fecha', 'monto', 'id_pedido'];
    public $timestamps = false;
}
