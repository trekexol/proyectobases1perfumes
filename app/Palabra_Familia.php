<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palabra_Familia extends Model
{
    protected $table = 'p_f';
    public $filleable = ['id_palabra', 'id_familia'];
    public $incrementing = false;
    public $timestamps = false;

   
}
