<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia_Familia extends Model
{
    protected $table = 'f_m';
    public $filleable = ['id_materia', 'id_familia'];
    public $incrementing = false;
    public $timestamps = false;

   
}
