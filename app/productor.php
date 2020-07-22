<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productor extends Model
{
    protected $table = 'productor';
    protected $primaryKey = 'id';
    public $filleable = ['nombre', 'pagina_web', 'calle_avenida', 'codigo_postal', 'id_asociacion'];
    public $timestamps = false;
}
