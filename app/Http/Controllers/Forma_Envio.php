<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forma_Envio extends Model
{
    protected $table = 'forma_envio';
    protected $primaryKey = 'id';
    public $filleable = ['id_proveedor', 'id_pais', 'tiempo_envio', 'coste', 'transporte', 'extra'];
 

    public $timestamps = false;
}
