<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otros_Componentes extends Model
{
    protected $table = 'otros_componentes';
    protected $primaryKey = ['id_perfume', 'id_otros_ingredientes'];
    public $incrementing = false;
    public $timestamps = false;
}