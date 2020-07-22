<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otros_Materia extends Model
{
    protected $table = 'otros_materia';
    public $filleable = ['id_materia_esencia', 'id_otros_ingredientes'];
    public $incrementing = false;
    public $timestamps = false;

   
}
