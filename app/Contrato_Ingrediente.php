<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato_Ingrediente extends Model 
{
    protected $table = 'contrato_ingrediente';
    protected $primaryKey = null;
    public $incrementing = false;
    public $filleable = ['id_contrato','id_presentacion_ingrediente', 'id_proveedor', 'id_productor'];

    public $timestamps = false;
}