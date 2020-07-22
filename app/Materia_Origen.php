<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia_Origen extends Model
{
    protected $table = 'origen';
    public $filleable = ['id_materia', 'id_pais'];
    public $incrementing = false;
    public $timestamps = false;

   
}
