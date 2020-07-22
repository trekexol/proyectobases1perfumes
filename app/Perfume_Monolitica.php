<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfume_Monolitica extends Model
{
    protected $table = 'monolitica';
    public $filleable = ['id_perfume', 'id_esencia'];
    public $incrementing = false;
    public $timestamps = false;

   
}
