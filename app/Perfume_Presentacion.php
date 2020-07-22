<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfume_Presentacion extends Model
{
    protected $table = 'presentacion_perfume';
    public $filleable = ['cantidad', 'volumen', 'fk_id_perfume', 'fk_id_intensidad'];

    public $timestamps = false;

    public $incrementing = false;
   
}
