<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfumista_Perfume extends Model
{
    protected $table = 'p_p';
    public $filleable = ['id_perfume', 'id_perfumista'];
    public $incrementing = false;
    public $timestamps = false;

   
}
