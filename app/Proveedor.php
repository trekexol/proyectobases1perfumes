<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $primaryKey = 'id';
    public $filleable = ['nombre', 'pagina_web', 'correo_electronico', 'calle_avenida', 'codigo_postal', 'id_pais', 'id_asociacion'];
    public $timestamps = false;
}
