<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F_M extends Model
{
    protected $table = 'f_m';
    protected $primaryKey = null;
    public $filleable = ['id_materia', 'id_familia'];
    public $incrementing = false;
    public $timestamps = false;
}
