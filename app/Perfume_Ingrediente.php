<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfume_Ingrediente extends Model
{
    protected $table = 'otros_componentes';
    public $filleable = ['id_perfume', 'id_otros_ingredientes'];
    public $incrementing = false;
    public $timestamps = false;

   
}
