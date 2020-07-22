<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfume_Notas extends Model
{
    protected $table = 'nota';
    public $filleable = ['id_perfume', 'id_esencia','tipo'];
     public $incrementing = false;
    public $timestamps = false;

   
}
