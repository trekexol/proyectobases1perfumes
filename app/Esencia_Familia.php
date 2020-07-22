<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esencia_Familia extends Model
{
    protected $table = 'f_e';
   public $filleable = ['id_esencia_perfume', 'id_familia'];

    public $timestamps = false;

    public $incrementing = false;

    public function scopeEsencia($query, $id_esencia_perfume)
    {   
        //retorna todas las formulas de un productor cuando esta finalizada
        return $query->where('id_esencia_perfume', '=', $id_esencia_perfume);
    }
   
}
