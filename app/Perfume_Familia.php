<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfume_Familia extends Model
{
    protected $table = 'f_p';
    public $filleable = ['id_perfume', 'id_familia'];
    public $incrementing = false;
    public $timestamps = false;

   
}
