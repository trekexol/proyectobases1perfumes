<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productor_Pais extends Model
{
    protected $table = 'productor_pais';
    protected $primaryKey = null;
    public $incrementing = false;
    public $filleable = ['id_pais', 'id_productor'];
    public $timestamps = false;
}
